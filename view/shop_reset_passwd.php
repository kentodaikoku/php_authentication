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
  <title>パスワード初期化画面</title>
</head>
<body>
  <header>
    <div>
      <a href="#">パスワード設定画面</a>
    </div>
  </header>

  <div class="flex">
    <div>
      <h2>パスワードリセット画面</h2>
      <p class="rule">*半角英数字６文字以上でご入力ください</p>
      
      <?php if ($passwd_err === TRUE) { ?>
        <p class="err">入力内容があっていません</p>
      <?php } ?>

      <div id="reset_passwd">
        <form action="reset_passwd_func.php" method="post">
          <div class="mb-3">
            <label for="passwd" class="form-label">パスワード</label>
            <input type="password" name="passwd" class="form-control" id="passwd" placeholder="password">
          </div>
          <div class="mb-3">
            <label for="passwd_check" class="form-label">パスワード（確認）</label>
            <input type="password" name="passwd_check" class="form-control" id="passwd_check" placeholder="">
          </div>
          <div class="login_btn">
            <input type="submit" value="パスワード再作成" class="btn btn-primary"/><br>
          </div>
        </form>
        <a class="btn btn-primary" href="login.php">ログインページ</a>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>