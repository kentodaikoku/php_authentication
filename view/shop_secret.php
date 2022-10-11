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
  <title>秘密の質問フォーム</title>
</head>
<body>
  <header>
    <div>
      <a href="#">秘密の質問認証画面</a>
    </div>
  </header>

  <div class="flex">
    <div>
      <p class="rule">*設定した秘密の質問及び回答をご入力してください</p>

      <?php if ($login_err === TRUE) { ?>
        <p class="err">入力内容があっていません</p>
      <?php } ?>

      <div id="secret_form">
        <form action="secret_form_func.php" method="post">

          <div class="mb-3">
            <label for="user" class="form-label">店舗ID</label>
            <input name="shop_id" type="text" class="form-control" id="user" placeholder="shop_id">
          </div>

          <div class="mb-3 row">
            <label for="secret_question" class="form-label">秘密の質問</label>
            <div class="col-sm-10">
              <select name="secret_question" id="secret_question" class="form-select" aria-label="Default select example">
                <option value="" selected>選択してください</option>
                <?php foreach ($secret_question as $key => $value) { ?>
                  <option value="<?php print $key; ?>"><?php print $value; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="mb-3">
            <label for="secret_answer" class="form-label">秘密の質問（回答）</label>
            <input type="text" name="secret_answer" class="form-control" id="secret_answer" placeholder="">
          </div>

          <div class="login_btn">
            <input type="submit" value="認証する" class="btn btn-primary"/><br>
          </div>

        </form>

        <div class="links">
          <a href="login.php" class="btn btn-primary">ログインページ</a>
        </div>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>