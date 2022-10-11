<?php
// 新規登録処理用コントローラファイル

require_once '../model/db.php';
require_once '../model/function.php';
require_once '../model/shop.php';

$session = sessionModeHome();

// 該当セッションの値を変数に代入
$shop_name = get_session('shop_name');
$manager = get_session('manager');
$manager_kana = get_session('manager_kana');
$postal_code = get_session('postal_code');
$prefecture = get_session('prefecture');
$city = get_session('city');
$place = get_session('place');
$phone_number = get_session('phone_number');
$passwd = get_session('passwd');
$secret_question = get_session('secret_question');
$secret_answer = get_session('secret_answer');

// パスワードハッシュ化
$passwd = password_hash($passwd, PASSWORD_DEFAULT);

// 登録日時用変数
$time = '';

$db = get_connect_db();

// shop_table追加
try {
    $result = insert_shop($db, $shop_name, $manager, $manager_kana, $passwd, $phone_number, $time);
} catch(PDOException $e) {
    die("DB挿入エラー1: {$e->getMessage()}");
}

// shop_id取得
try {
    $shop_id = $db->lastInsertId();
    $_SESSION['login_id'] = $shop_id;
} catch(PDOException $e) {
    die('DB取得エラー：' . $e->getMessage());
}

// address_table追加
try {
    $address = insert_address($db, $shop_id, $postal_code, $prefecture, $city, $place, $time);
} catch(PDOException $e) {
    die('DB挿入エラー２：' . $e->getMessage());
}

// secret_table追加
try {
    $secret = insert_secret($db, $shop_id, $secret_question, $secret_answer, $time);
} catch(PDOException $e) {
    die('DB挿入エラー３：' . $e->getMessage());
}

redirect_to('sign_done.php');