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
  <title>新規登録画面</title>
</head>
<body>
  <header>
    <div>
      <a href="#">新規登録画面</a>
    </div>
  </header>
  
  <div class="flex">
    <div>
      <p class="rule">*すべて必須項目です</p>
      
      <!--エラー表示-->
      <?php if (count($errors) !== 0) { ?>
        <?php foreach ($errors as $value) { ?>
        <p class="err"><?php echo $value; ?></p>
        <?php } ?>
      <?php } ?>
      
      <div id="sign_up">
        <form method="POST" action="sign_func.php">
          <!---->
          <div class="mb-3 row">
            <label for="shop_name" class="col-sm-2 col-form-label">店舗名</label>
            <div class="col-sm-10">
              <input name="shop_name" type="text" class="form-control" id="shop_name" placeholder="" value="<?php echo $shop_name; ?>">
            </div>
          </div>
          <!---->
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">責任者名</label>
            <div class="col-sm-10">
              <input name="manager" type="text" class="form-control" id="manager" placeholder="" value="<?php echo $manager; ?>">
            </div>
          </div>
          <!---->
          <div class="mb-3 row">
            <label for="manager_kana" class="col-sm-2 col-form-label">責任者名（フリガナ）</label>
            <div class="col-sm-10">
              <input name="manager_kana" type="text" class="form-control" id="manager_kana" placeholder="カタカナで入力してください" value="<?php echo $manager_kana; ?>">
            </div>
          </div>
          <!---->
          <div class="mb-3 row">
            <label for="postal_code" class="col-sm-2 col-form-label">郵便番号</label>
            <div class="col-sm-10">
              <input name="postal_code" type="text" class="form-control" id="postal_code" placeholder="ハイフンありで入力してください" value="<?php echo $postal_code; ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="prefectures" class="col-sm-2 col-form-label">都道府県</label>
            <div class="col-sm-10">
              <select name="prefecture" id="prefectures" class="form-select" aria-label="Default select example">
                <?php if (get_session('prefecture')) { ?>
                <option value="<?php echo $prefecture_is; ?>" selected><?php echo $prefecture_is; ?></option>
                <?php } else { ?>
                <option value="" selected>選択してください</option>
                <?php } ?>
                <?php foreach ($prefecture as $key => $value) { ?>
                  <option value="<?php print $value; ?>"><?php print $value; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="city" class="col-sm-2 col-form-label">市区町村</label>
            <div class="col-sm-10">
              <input name="city" type="text" class="form-control" id="city" value="<?php echo $city; ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="place" class="col-sm-2 col-form-label">番地</label>
            <div class="col-sm-10">
              <input name="place" type="text" class="form-control" id="place" value="<?php echo $place; ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="phone_number" class="col-sm-2 col-form-label">電話番号</label>
            <div class="col-sm-10">
              <input name="phone_number" type="tel" class="form-control" id="phone_number" placeholder="ハイフンありで入力してください" value="<?php echo $phone_number; ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="passwd" class="col-sm-2 col-form-label">パスワード</label>
            <div class="col-sm-10">
              <input type="password" name="passwd" class="form-control" id="passwd" placeholder="半角英数字６文字以上で入力してください" value="<?php echo $passwd; ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="passwd_check" class="col-sm-2 col-form-label">パスワード（確認）</label>
            <div class="col-sm-10">
              <input type="password" name="passwd_check" class="form-control" id="passwd_check" placeholder="" value="<?php echo $passwd_check; ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="secret_question" class="col-sm-2 col-form-label">秘密の質問</label>
            <div class="col-sm-10">
              <select name="secret_question" id="secret_question" class="form-select" aria-label="Default select example">
              <?php if (get_session('secret_question') !== '') { ?>
                <?php if ($secret_question_is === '1') { ?>
                  <option value="<?php echo $secret_question_is; ?>" selected>店舗のあいことば</option>
                <?php } elseif ($secret_question_is === '2') { ?>
                  <option value="<?php echo $secret_question_is; ?>" selected>好きなアーティスト</option>
                <?php } else { ?>
                  <option value="<?php echo $secret_question_is; ?>" selected>好きなブランド</option>
                <?php } ?>
                <?php foreach ($secret_question as $key => $value) { ?>
                  <option value="<?php print $key; ?>"><?php print $value; ?></option>
                <?php } ?>
              <?php } else { ?>
                <option value="" selected>選択してください</option>
                <?php foreach ($secret_question as $key => $value) { ?>
                  <option value="<?php print $key; ?>"><?php print $value; ?></option>
                <?php } ?>
              <?php } ?>
              </select>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="secret_answer" class="col-sm-2 col-form-label">秘密の質問回答</label>
            <div class="col-sm-10">
              <input type="text" name="secret_answer" class="form-control" id="secret_answer" placeholder="パスワードを忘れた際に使用するものです" value="<?php echo $secret_answer; ?>">
            </div>
          </div>

          <div class="submit">
            <input type="submit" value="確認画面へ" class="btn btn-primary"/>
            <a class="btn btn-primary" href="login.php">ログインページへ</a>
          </div>

        </form>
      </div>
    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>