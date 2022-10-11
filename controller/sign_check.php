<?php
// 新規登録確認画面表示用のコントローラファイル

require_once '../model/db.php';
require_once '../model/function.php';
require_once '../model/shop.php';

$session = sessionModeHome();
$err = [];
$e = "";

$shop_name = get_session('shop_name');
$manager = get_session('manager');
$manager_kana = get_session('manager_kana');
$postal_code = get_session('postal_code');
$prefecture = get_session('prefecture');
$city = get_session('city');
$place = get_session('place');
$phone_number = get_session('phone_number');
$passwd = get_session('passwd');
$passwd_check = get_session('passwd_check');
$secret_question = get_session('secret_question');
$secret_answer = get_session('secret_answer');

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

// パスワードを黒丸に変換
$passwd_count = mb_strlen($passwd);
$passwd_kuro = str_repeat('●', $passwd_count);
$passwd_kuro = entity_str($passwd_kuro);


include_once '../view/shop_sign_check.php';