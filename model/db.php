<?php

// 定数設定
define('DB_HOST', ''); // データベースのホスト名又はIPアドレス
define('DB_USER', ''); // MySQLのユーザ名
define('DB_PASSWD', ''); // MySQLのパスワード
define('DB_NAME', ''); // データベース名

// DB接続
function get_connect_db() {
  $dsn = 'mysql:dbname=' . DB_NAME . '; host=' . DB_HOST . '; charset=UTF-8;';
  try {
    $db = new PDO($dsn, DB_USER, DB_PASSWD);
    // DB接続エラー用
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // SQLインジェクション防止用
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    // フェッチモード
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    // 例外処理
  } catch (PDOExeption $e) {
    die("DB接続エラー: {$e->getMessage()}");
  }
  return $db;
}


// SQL文実行（Insert, Update, Delete）
function execute_db($db, $sql, $params = array()) {
  try {
    $stmt = $db->prepare($sql);
    return $stmt->execute($params);
  } catch (PDOException $e) {
    die('クエリ実行エラー:' . $e->getMessage());
  }
  return false;
}


// SQL文実行（読みとりRead）
function read_db_array($db, $sql, $params = array()) {
  try {
    $stmt = $db->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll();
  } catch(PDOException $e) {
    die('クエリ読みとりエラー');
  }
  return false;
}
