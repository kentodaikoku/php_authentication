<?php
require_once '../model/function.php';

$session = sessionModeHome();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/modaal@0.4.4/dist/css/modaal.min.css" />
  <link rel="stylesheet" href="../css/style.css">
  <title>パスワード再作成完了画面</title>
</head>
<body>
  
<header>
  <div>
    <a href="#">パスワード設定画面</a>
  </div>
</header>

<div class="sign_done">
  <div>
    <h2>パスワード再設定が完了しました</h2>
    <div class="link-login">
      <a class="btn btn-primary" href="../controller/login.php">ログインページへ</a>
    </div>
  </div>
</div>
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>