<?php

/**
* 特殊文字をHTMLエンティティに変換する
* @param str $str 変換前文字
* @return str 変換後文字
*/
function entity_str($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}


// 現在時刻を取得
function get_time() {
  $date = date('Y-m-d H:i:s');
  return $date;
}

// 空文字判定
function is_empty($str) {
  if (empty($str)) {
    return true;
  }
  return false;
}

// URLリンク用関数
function redirect_to ($url) {
    header('Location:' . $url );
    exit;
}

// セッション取得＆設定
// session
function sessionMode() {
  // セッション開始
  session_start();
  // セッション変数からuser_id取得
  if (isset($_SESSION['shop_id']) === TRUE) {
    $shop_id = $_SESSION['shop_id'];
  } else {
     // 非ログインの場合、ログインページへリダイレクト
    redirect_to('login.php');
  }
}

// セッション取得＆設定（ログインページ＆新規登録ページ）
function sessionModeHome() {
  session_start();
  // ログインされていればホームページへ
  if (isset($_SESSION['shop_id']) === TRUE) {
      $shop_id = $_SESSION['shop_id'];
      redirect_to('../../include/view/home.php');
  }
}

/**
* リクエストメソッドを取得
* @return str GET/POST/PUTなど
*/
function get_request_method() {
    return $_SERVER['REQUEST_METHOD'];
}


/**
* POSTデータを取得
* @param str $key 配列キー  @return str POST値
*/
function get_post($key) {
    $str = '';
    if (isset($_POST[$key]) === TRUE) {
        $str = $_POST[$key];
    }
    // 値が入ってなければ空文字を返す
    return $str;
}

// セッションデータを取得
function get_session($key) {
  $str = '';
  if (isset($_SESSION[$key]) === true) {
    $str = $_SESSION[$key];
  }
  // 値が入ってなければ空文字を返す
  return $str;
}