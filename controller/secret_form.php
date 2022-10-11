<?php
// 秘密の質問フォーム表示用コントローラファイル

require_once '../model/db.php';
require_once '../model/function.php';
require_once '../model/shop.php';

session_start();

$secret_question = secret_question_array();

// エラー用
if (isset($_SESSION['login_err']) === true) {
  $login_err = $_SESSION['login_err'];
  $_SESSION['login_err'] = FALSE;
} else {
  $login_err = FALSE;
}

include_once '../view/shop_secret.php';