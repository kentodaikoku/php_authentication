<?php
// パスワード再設定処理用コントローラファイル

require_once '../model/db.php';
require_once '../model/function.php';
require_once '../model/shop.php';

$session = sessionModeHome();
$shop_id = $_SESSION['shop'];

// post受け取る
$request = get_request_method();
if ($request === 'POST') {
    $passwd = get_post('passwd');
    $passwd_check = get_post('passwd_check');

  // バリデーション
  if (empty($passwd) || empty($passwd_check)) {
    $_SESSION['passwd_err'] = true;
    redirect_to('reset_passwd.php');
  } else {
    if ($passwd !== $passwd_check) {
      $_SESSION['passwd_err'] = true;
      redirect_to('reset_passwd.php');
    } else {
      if (!preg_match('/^[a-zA-Z0-9]{6,}+$/', $passwd)) {
        $_SESSION['passwd_err'] = true;
        redirect_to('reset_passwd.php');
      }
    }
  }
  
  // パスワードハッシュ化
    $passwd = password_hash($passwd, PASSWORD_DEFAULT);

  // DB操作
  $db = get_connect_db();
  try {
      $result = update_passwd($db, array($passwd, $shop_id));
  } catch(PDOException $e) {
      die('パスワード更新エラー：' . $e->getMessage());
  }

  // パスワード再設定完了ページへ（viewディレクトリ）
  redirect_to('../view/shop_new_passwd.php');
}