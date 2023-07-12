<?php
session_start();
$path = '';
$hierarchy_num = array_key_last(explode('/', dirname($_SERVER['PHP_SELF'])));
if ($hierarchy_num > 1) {
  for ($cnt_path = $hierarchy_num; $cnt_path > 1; $cnt_path--) {
    $path .= '../';
  }
}
$page_title = '注文完了';
require_once 'func/functions.php';
require_once 'inc/inc_path.php';
require_once 'foreach_config.php';

$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$order_code = numbers(128);
try {
  $db = getDb($dsn, $usr, $passwd);
  $sql_orders = 'INSERT INTO orders (name,email,address,created_on,updated_on,order_code) VALUES (:name,:email,:address,now(),now(),:order_code)';
  $stt_orders = $db->prepare($sql_orders);
  $stt_orders->bindValue(':name', $name, PDO::PARAM_STR);
  $stt_orders->bindValue(':email', $email, PDO::PARAM_STR);
  $stt_orders->bindValue(':address', $address, PDO::PARAM_STR);
  $stt_orders->bindValue(':order_code', $order_code, PDO::PARAM_STR);
  $stt_orders->execute();

  // $orders_id = $dbh->lastInsertId();
  $sql_order_id = 'SELECT id FROM orders WHERE order_code = :order_code';
  $stt_order_id = $db->prepare($sql_order_id);
  $stt_order_id->bindValue(':order_code', $order_code, PDO::PARAM_STR);
  $stt_order_id->execute();
  $order_id = $stt_order_id->fetch((PDO::FETCH_ASSOC));

  $sql_orders_products = 'INSERT INTO orders_products (product_id,order_id,quantity,created_on,updated_on,order_code) VALUES ';
  foreach ($_SESSION['cart']['item'] as $product_id => $item) {
    $sql_orders_products .= "(?,?,?,now(),now(),?)";
    if ($item != end($_SESSION['cart']['item'])) {
      $sql_orders_products .= ',';
    }
  }

  $stt_orders_products = $db->prepare($sql_orders_products);

  $cnt = 0;
  foreach ($_SESSION['cart']['item'] as $product_id => $item) {
    $stt_orders_products->bindValue(++$cnt, $product_id, PDO::PARAM_INT);
    $stt_orders_products->bindValue(++$cnt, $order_id['id'], PDO::PARAM_INT);
    $stt_orders_products->bindValue(++$cnt, $item['quantity'], PDO::PARAM_STR);
    $stt_orders_products->bindValue(++$cnt, $order_code, PDO::PARAM_STR);
  }
  $stt_orders_products->execute();
  $db = null;
  unset($_SESSION['cart']);
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
            <p class="cart-thanks-msg centering">ご注文ありがとうございました！</p>
            <p class="centering">
              <br>
              <button class="btn btn-primary" type="button" onclick="location.href='onlineshop.php';">お買い物を続ける</button>
            </p>
          </section>
        </div>
      </main>
      <?php require_once('footer.html'); ?>
    <?php
  } catch (PDOException $e) {
    echo 'エラー発生:' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '<br>';
    exit;
  }
    ?>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/menu.js"></script>

  </body>

  </html>
