<?php
// ログイン画面表示用コントローラファイル

require_once '../model/db.php';
require_once '../model/function.php';

session_start();

// ログイン済みの場合
if (isset($_SESSION['shop_id']) === true) {
    $shop_id = $_SESSION['shop_id'];
    // home
    redirect_to('../view/home.php');
} else {
    session_destroy();
}

// エラー用
if (isset($_SESSION['login_err']) === true) {
    $login_err = $_SESSION['login_err'];
    $_SESSION['login_err'] = FALSE;
} else {
    $login_err = FALSE;
}

// セッション
$_SESSION = [];

// // cookie
// if (isset($_COOKIE['user_name']) === true) {
//     $user_name = $_COOKIE['user_name'];
// } else {
//     $user_name = '';
// }
// $user_name = entity_str($user_name);

include_once '../view/shop_login.php';