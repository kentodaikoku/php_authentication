<?php
// 秘密の質問認証処理用コントローラファイル

require_once '../model/db.php';
require_once '../model/function.php';
require_once '../model/shop.php';

session_start();

// post取得
$request = get_request_method();
if (get_request_method() === 'POST') {
  
  $shop_id = get_post('shop_id');
  $secret_question_is = get_post('secret_question');
  $secret_answer = get_post('secret_answer');

  // DB操作
  $db = get_connect_db();
  try {
    $result = get_secret($db, array($shop_id, $secret_question_is, $secret_answer));
  } catch(PDOException $e) {
    die('DB取得エラー：' . $e->getMessage());
  }

  // 入力内容がマッチしているか判断
  if (isset($result['secret_id']) === true) {
    $_SESSION['shop'] = $shop_id;
    redirect_to('reset_passwd.php');
  } else {
    $_SESSION['login_err'] = TRUE;
    redirect_to('secret_form.php');
  }
}