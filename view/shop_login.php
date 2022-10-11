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
  <title>ログイン画面</title>
</head>
<body>
  <header>
    <div>
      <a href="#">ログイン画面</a>
    </div>
  </header>
  
  <div class="flex">
    <div>
      <?php if ($login_err === TRUE) { ?>
        <p class="err">ユーザー名又はパスワードが違います</p>
      <?php } ?>
      
      <div id="login">
        <form method="post" action="login_func.php">
          <div class="mb-3">
            <label for="user" class="form-label">ID</label>
            <input name="shop_id" type="text" class="form-control" id="user" placeholder="shop_id">
          </div>
          <div class="mb-3">
            <label for="passwd" class="form-label">パスワード</label>
            <input type="password" name="passwd" class="form-control" id="passwd" placeholder="password">
          </div>
          <div class="login_btn">
            <input type="submit" value="ログイン" class="btn btn-primary"/><br>
          </div>
        </form>
      </div>
      
      <div class="links">
          <a class="btn btn-primary" href="../controller/sign.php">新規登録へ</a>
      </div>
    
      <div class="links">
        <a href="secret_form.php">パスワードを忘れた方はこちら</a>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>