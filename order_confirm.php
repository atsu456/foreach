<?php
session_start();
$path = '';
$hierarchy_num = array_key_last(explode('/', dirname($_SERVER['PHP_SELF'])));
if ($hierarchy_num > 1) {
  for ($cnt_path = $hierarchy_num; $cnt_path > 1; $cnt_path--) {
    $path .= '../';
  }
}
$page_title = '注文情報確認';
require_once 'func/functions.php';

$name = ($_POST['name']);
$email = ($_POST['email']);
$address = ($_POST['address']);
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
          <form action="order_done.php" method="post">
            <p class="form-item">
              <span>お名前</span><span><?php echo $name; ?></span><input type="hidden" name="name" id="name" value="<?php echo $name; ?>">
            </p>
            <p class="form-item">
              <span>メールアドレス</span><span><?php echo $email; ?></span><input type="hidden" name="email" id="email" value="<?php echo $email; ?>">
            </p>
            <p class="form-item">
              <span>お届け先</span><span><?php echo $address; ?></span><input type="hidden" name="address" id="address" value="<?php echo $address; ?>">
            </p>
            <p class="form-btn centering">
              <button class="btn btn-secondary" type="button" onclick="history.back();">修正する</button>
              <button class="btn btn-primary" type="submit">注文する</button>
            </p>
          </form>
      </div>
    </main>
    <?php require_once('footer.html'); ?>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/menu.js"></script>

</body>

</html>