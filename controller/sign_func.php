<?php
// 新規登録確認処理用コントローラファイル

require_once '../model/db.php';
require_once '../model/function.php';
require_once '../model/shop.php';

$session = sessionModeHome();

// unset($_SESSION);
$err = [];

// フォームから送られてきた値を変数に代入
$shop_name = get_post('shop_name');
$manager = get_post('manager');
$manager_kana = get_post('manager_kana');
$postal_code = get_post('postal_code');
$prefecture = get_post('prefecture');
$city = get_post('city');
$place = get_post('place');
$phone_number = get_post('phone_number');
$passwd = get_post('passwd');
$passwd_check = get_post('passwd_check');
$secret_question = get_post('secret_question');
$secret_answer = get_post('secret_answer');

// エンコーディング
$shop_name = entity_str($shop_name);
$manager = entity_str($manager);
$manager_kana = entity_str($manager_kana);
$postal_code = entity_str($postal_code);
$prefecture = entity_str($prefecture);
$city = entity_str($city);
$place = entity_str($place);
$phone_number = entity_str($phone_number);
$passwd = entity_str($passwd);
$passwd_check = entity_str($passwd_check);
$secret_question = entity_str($secret_question);
$secret_answer = entity_str($secret_answer);

// バリデーション
// 空文字
if (emptySign($shop_name, $manager, $manager_kana, $postal_code, $prefecture, $city, $place, $phone_number, $passwd, $passwd_check, $secret_question, $secret_answer)) {
  $err[] = '未入力の欄があります';
} else {
  $_SESSION['shop_name'] = $shop_name;
  $_SESSION['manager'] = $manager;
  $_SESSION['prefecture'] = $prefecture;
  $_SESSION['city'] = $city;
  $_SESSION['place'] = $place;
  $_SESSION['secret_answer'] = $secret_answer;
  $_SESSION['secret_question'] = $secret_question;
}
// カタカナ表記
if (preg_match("/^[ァ-ヴ]+$/u", $manager_kana)) {
  $_SESSION['manager_kana'] = $manager_kana;
} else {
  $err[] = '「責任者（フリガナ）」はカタカナ文字で入力してください';
}
// 郵便番号
if (preg_match('/^[0-9]{3}-[0-9]{4}$/', $postal_code)) {
  $_SESSION['postal_code'] = $postal_code;
} else {
  $err[] = '「郵便番号」の入力に誤りがあります';
}
//電話番号
if (preg_match('/^0\d(-\d{4}|\d-\d{3}|\d\d-\d\d|\d{3}-\d)-\d{4}$/', $phone_number)|| preg_match('/^0[789]0-\d{4}-\d{4}$/', $phone_number)) {
  $_SESSION['phone_number'] = $phone_number;
} else {
  $err[] = '「電話番号」の入力に誤りがあります';
}
// パスワード
if (preg_match('/^[a-zA-Z0-9]{6,}+$/', $passwd) ) {
  if ($passwd === $passwd_check) {
    $_SESSION['passwd'] = $passwd;
    $_SESSION['passwd_check'] = $passwd_check;
  } else {
  $err[] = '「パスワード（確認）」が一致していません';
  }
} else {
  $err[] = '「パスワード」は半角英数字６文字以上で入力してください';
}

// エラー用
if (count($err) !== 0) {
  // $_SESSION['errors'] = array();
  $_SESSION['errors'] = $err;
  redirect_to('sign.php');
}

redirect_to('sign_check.php');