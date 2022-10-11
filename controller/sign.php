<?php
// 新規登録画面表示用コントローラファイル

require_once '../model/db.php';
require_once '../model/function.php';
require_once '../model/shop.php';

$session = sessionModeHome();

$errors = [];
if(isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);    
}

// 戻るボタン押したとき要用のセッション変数
$shop_name = get_session('shop_name');
$manager = get_session('manager');
$manager_kana = get_session('manager_kana');
$postal_code = get_session('postal_code');
$prefecture_is = get_session('prefecture');
$city = get_session('city');
$place = get_session('place');
$phone_number = get_session('phone_number');
$passwd = get_session('passwd');
$passwd_check = get_session('passwd_check');
$secret_question_is = get_session('secret_question');
$secret_answer = get_session('secret_answer');

// エンコーディング
$shop_name = entity_str($shop_name);
$manager = entity_str($manager);
$manager_kana = entity_str($manager_kana);
$postal_code = entity_str($postal_code);
$prefecture_is = entity_str($prefecture_is);
$city = entity_str($city);
$place = entity_str($place);
$phone_number = entity_str($phone_number);
$passwd = entity_str($passwd);
$passwd_check = entity_str($passwd_check);
$secret_question_is = entity_str($secret_question_is);
$secret_answer = entity_str($secret_answer);

$prefecture = prefecture_array();
$secret_question = secret_question_array();

include_once '../view/shop_sign.php';