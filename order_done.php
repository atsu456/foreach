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
require_once $path . 'header.php';
require_once $path . 'func/functions.php';
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

        <header class="header">
            <h1 class="header__logo"><a href="index.php"><img src="image/camplogo.svg" alt="foreach campground"></a></h1>
            <nav id="g-nav">
                <ul class="nav">
                    <li class="g-nav__item"><a href="#">予約</a></li>
                    <li class="g-nav__item"><a href="#">オンラインショップ</a></li>
                </ul>
            </nav>
        </header>

        <main>
    <div class="container">
      <p class="cart-thanks-msg centering">ご注文ありがとうございました！</p>
      <p class="centering">
        <button class="btn btn-primary" type="button" onclick="location.href='./';">お買い物を続ける</button>
      </p>
    </div>
  </main>
        <footer class="footer">
        <div class="ft">
        <ul class="ft__ul">
        <li class="ft__logo"><a href="#"><img src="image/camplogo.svg" alt="foreach campground"></a></li>
        <li class="ft__add"><span class="ft__name">foreach camp ground</span></li>
        <li class="ft__add">〒888-8888</li>
        <li class="ft__add">福岡県福岡市東区888-88</li>
        <li class="ft__add">0493-81-6166</li>
        </ul>
            <ul class="ft_links_ul">
                <li class="ft_links_li"><a href="#">アクセス</a></li>
                <li class="ft_links_li"><a href="#">お知らせ</a></li>
                <li class="ft_links_li"><a href="#">施設紹介</a></li>
                <li class="ft_links_li"><a href="#">予約</a></li>
                <li class="ft_links_li"><a href="#">オンラインストア</a></li>
            </ul>
            <ul class="ft_links_ul">
                <li class="ft_links_li"><a href="#">会社概要・拠点情報</a></li>
                <li class="ft_links_li"><a href="#">事業情報</a></li>
                <li class="ft_links_li"><a href="#">採用情報</a></li>
                <li class="ft_links_li"><a href="#">個人情報保護方針</a></li>
                <li class="ft_links_li"><a href="#">ソーシャルメディアポリシー</a></li>
            </ul>
            </div>
            <div class="ft_snsLinks">
                <ul class="ft_snsLinks_ul">
                    <li><a href="#"><i class="fa-brands fa-square-facebook"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-square-twitter"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-square-instagram"></i></a></li>
                </ul>
            </div>
            <div class="ft_copyright">©2023 foreach campground</div>
        </footer>   
<?php
} catch (PDOException $e) {
  echo 'エラー発生:' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '<br>';
  exit;
}
?> 
</body>
</html>