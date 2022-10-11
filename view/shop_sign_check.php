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
  <title>新規登録確認画面</title>
</head>
<body>
  <header>
    <div>
      <a href="#">新規登録画面</a>
    </div>
  </header>

  <div class="flex">
    <div>
      <h2>新規登録確認ページ</h2>
      <div id="sign_up">
        <form method="POST" action="sign_check_func.php">
          <!---->
          <div class="mb-3 row">
            <label for="shop_name" class="col-sm-2 col-form-label">店舗名</label>
            <div class="col-sm-10">
              <span class="form-control"><?php echo $shop_name; ?></span>
              <input type="hidden" name="<?php echo $shop_name; ?>" value="<?php echo $shop_name; ?>">
              <!--<input name="shop_name" type="text" class="form-control" id="shop_name" placeholder="">-->
            </div>
          </div>
          <!---->
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">責任者名</label>
            <div class="col-sm-10">
              <span class="form-control"><?php echo $manager; ?></span>
              <input type="hidden" value="<?php echo $manager; ?>">
              <!--<input name="manager" type="text" class="form-control" id="manager" placeholder="">-->
            </div>
          </div>
          <!---->
          <div class="mb-3 row">
            <label for="manager_kana" class="col-sm-2 col-form-label">責任者名（フリガナ）</label>
            <div class="col-sm-10">
              <span class="form-control"><?php echo $manager_kana; ?></span>
              <input type="hidden" value="<?php echo $manager_kana; ?>">
              <!--<input name="manager_kana" type="text" class="form-control" id="manager_kana">-->
            </div>
          </div>
          <!---->
          <div class="mb-3 row">
            <label for="postal_code" class="col-sm-2 col-form-label">郵便番号</label>
            <div class="col-sm-10">
              <span class="form-control"><?php echo $postal_code; ?></span>
              <input type="hidden" value="<?php echo $postal_code; ?>">
              <!--<input name="postal_code" type="text" class="form-control" id="postal_code" placeholder="ハイフンありで入力してください">-->
            </div>
          </div>
          <div class="mb-3 row">
            <label for="prefectures" class="col-sm-2 col-form-label">都道府県</label>
            <div class="col-sm-10">
              <span class="form-control"><?php echo $prefecture; ?></span>
              <input type="hidden" value="<?php echo $prefecture; ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="city" class="col-sm-2 col-form-label">市区町村</label>
            <div class="col-sm-10">
              <span class="form-control"><?php echo $city; ?></span>
              <input type="hidden" value="<?php echo $city; ?>">
              <!--<input name="city" type="text" class="form-control" id="cit">-->
            </div>
          </div>
          <div class="mb-3 row">
            <label for="place" class="col-sm-2 col-form-label">番地</label>
            <div class="col-sm-10">
              <span class="form-control"><?php echo $place; ?></span>
              <input type="hidden" value="<?php echo $place; ?>">
              <!--<input name="place" type="text" class="form-control" id="place">-->
            </div>
          </div>
          <div class="mb-3 row">
            <label for="phone_number" class="col-sm-2 col-form-label">電話番号</label>
            <div class="col-sm-10">
              <span class="form-control"><?php echo $phone_number; ?></span>
              <input type="hidden" value="<?php echo $phone_number; ?>">
              <!--<input name="phone_number" type="tel" class="form-control" id="phone_number" placeholder="ハイフンありで入力してください">-->
            </div>
          </div>
          <div class="mb-3 row">
            <label for="passwd" class="col-sm-2 col-form-label">パスワード</label>
            <div class="col-sm-10">
              <span type="password" class="form-control"><?php echo $passwd_kuro; ?></span>
              <input type="hidden" value="<?php echo $passwd; ?>">
              <!--<input type="password" name="passwd" class="form-control" id="passwd" placeholder="password">-->
            </div>
          </div>
          <div class="mb-3 row">
            <label for="passwd_check" class="col-sm-2 col-form-label">パスワード（確認）</label>
            <div class="col-sm-10">
              <span class="form-control"><?php echo $passwd_kuro; ?></span>
              <input type="hidden" value="<?php echo $passwd_check; ?>">
              <!--<input type="password" name="passwd_check" class="form-control" id="passwd_check" placeholder="">-->
            </div>
          </div>
          <div class="mb-3 row">
            <label value="" for="secret_question" class="col-sm-2 col-form-label">秘密の質問</label>
            <div class="col-sm-10">
              <?php if ($secret_question === '1') { ?>
                <span class="form-control">店舗のあいことば</span>
              <?php } elseif ($secret_question === '2') { ?>
                <span class="form-control">好きなアーティスト</span>
              <?php } else { ?>
                <span class="form-control">好きなブランド</span>
              <?php } ?>
              <input type="hidden" value="<?php echo $secret_question; ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="secret_answer" class="col-sm-2 col-form-label">秘密の質問回答</label>
            <div class="col-sm-10">
              <span class="form-control"><?php echo $secret_answer; ?></span>
              <input type="hidden" value="<?php echo $secret_answer; ?>">
              <!--<input type="text" name="secret_answer" class="form-control" id="secret_answer" placeholder="パスワードを忘れた際に使用するものです">-->
            </div>
          </div>
          <div class="submit">
            <input type="submit" value="新規作成する" class="btn btn-primary"/>
            <a class="btn btn-primary" href="sign.php">戻る</a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>