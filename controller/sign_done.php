<?php
// 新規登録完了コントローラファイル

require_once '../model/db.php';
require_once '../model/function.php';
require_once '../model/shop.php';

// セッション消す？？
$session = sessionModeHome();

// 表示用shop_idをセッション変数から取得
$login_id = get_session('login_id');

//セッション削除
$_SESSION = [];

include_once '../view/shop_sign_done.php';