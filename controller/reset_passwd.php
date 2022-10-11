<?php
// パスワードリセット表示用コントローラファイル

require_once '../model/db.php';
require_once '../model/function.php';
require_once '../model/shop.php';

$session = sessionModeHome();


// エラー用
if (isset($_SESSION['passwd_err']) === true) {
    $passwd_err = $_SESSION['passwd_err'];
    $_SESSION['passwd_err'] = FALSE;
} else {
    $passwd_err = FALSE;
}

include_once '../view/shop_reset_passwd.php';