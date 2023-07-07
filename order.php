<?php
session_start();
$path = '';
$hierarchy_num = array_key_last(explode('/', dirname($_SERVER['PHP_SELF'])));
if ($hierarchy_num > 1) {
  for ($cnt_path = $hierarchy_num; $cnt_path > 1; $cnt_path--) {
    $path .= '../';
  }
}
$page_title = '注文情報入力';
require_once 'func/functions.php';
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>shop</title>
  <link href="css/slick.css" rel="stylesheet" />
  <link href="css/slick-theme.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.typekit.net/pke3ujd.css">

<body id="shop">
  <div id="container">
    <?php require_once('header.html'); ?>
    <main>
      <div class="container container-narrow">
        <section class="cart">
          <form action="order_confirm.php" method="post">
            <p class="form-item">
              <label for="name">お名前</label><input type="text" name="name" id="name" required>
            </p>
            <p class="form-item">
              <label for="email">メールアドレス</label><input type="email" name="email" id="email" required>
            </p>
            <p class="form-item">
              <label for="address">お届け先</label><input type="text" name="address" id="address" required>
            </p>
            <p class="form-btn centering">
              <button class="btn btn-secondary" type="button" onclick="history.back();">カートに戻る</button>
              <button class="btn btn-primary" type="submit">入力内容を確認する</button>
            </p>
          </form>

      </div>
    </main>
    </section>
    </article>
    </main>
    <?php require_once('footer.html'); ?>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="js/menu.js"></script>
</body>

</html>