<?php
// ログイン処理用コントローラファイル

require_once '../model/db.php';
require_once '../model/function.php';
require_once '../model/shop.php';

$session = sessionModeHome();

$shop_id = get_post('shop_id');
$passwd = get_post('passwd');

$db = get_connect_db();
try {
  $result = get_shop($db, $shop_id, $passwd); 
  if (password_verify($passwd, $result['passwd'])) {
    $_SESSION['shop_id'] = $shop_id;
  redirect_to('../view/home.php');
  } else {
    $_SESSION['login_err'] = TRUE;
  redirect_to('login.php');
  }
} catch(PDOException $e) {
  die('DB取得エラー：' . $e->getMessage());
}

// idがあるか判断（empty関数でもいける？）
// if (isset($result['shop_id'])) {
//   $_SESSION['shop_id'] = $shop_id;
//   redirect_to('../../include/view/home.php');
// } else {
//   $_SESSION['login_err'] = TRUE;
//   redirect_to('login.php');
// }

// && password_verify($passwd, $result['passwd'])