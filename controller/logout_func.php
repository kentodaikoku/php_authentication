<?php
// ログアウト処理用コントローラファイル

require_once '../model/db.php';
require_once '../model/function.php';

session_start();

// セッション名取得 ※デフォルトはPHPSESSID
$session_name = session_name();
// セッション変数すべて削除
$_SESSION = [];

// ユーザのCookieに保存されているセッションIDを削除
if (isset($_COOKIE[$session_name])) {
  // sessionに関連する設定を取得
  $params = session_get_cookie_params();

  // sessionに利用しているクッキーの有効期限を過去に設定することで無効化
  setcookie($session_name, '', time() - 42000,
    $params["path"], $params["domain"],
    $params["secure"], $params["httponly"]
  );
}

session_destroy();

redirect_to('login.php');