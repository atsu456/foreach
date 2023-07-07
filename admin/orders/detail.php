<?php
session_start();
$id = (int)$_GET['id'];
$total = 0;
require_once '../../inc/inc_path.php';
require_once 'foreach_config.php';
require_once '../../func/functions.php';
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>index</title>
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="https://use.typekit.net/pke3ujd.css">
  <script src="https://kit.fontawesome.com/0fb73e8725.js" crossorigin="anonymous"></script>
</head>

<body id="top">
  <div id="container">

    <header class="header">
      <h1 class="header__logo"><a href="../../index.php"><img src="../../image/camplogo.svg" alt="foreach campground"></a></h1>
      <div class="t-nav">
        <nav id="g-nav">
          <ul class="nav">
            <li class="g-nav__item"><a href="../../reserve.php">予約</a></li>
            <li class="g-nav__item"><a href="../../onlineshop.php">オンラインショップ</a></li>
          </ul>
        </nav>
        <button class="hamburger-menu" id="js-hamburger-menu">
          <span class="hamburger-menu__bar"></span>
          <span class="hamburger-menu__bar"></span>
          <span class="hamburger-menu__bar"></span>
        </button>
      </div>
      <nav class="navigation">
        <ul class="navigation__list">
          <li class="navigation__list-item"><a href="../../news.php" class="navigation__link">NEWS</a></li>
          <li class="navigation__list-item"><a href="../../facility.php" class="navigation__link">FACILITY</a></li>
          <li class="navigation__list-item"><a href="../../onlineshop.php" class="navigation__link">ONLINE SHOP</a></li>
          <li class="navigation__list-item"><a href="../../access.php" class="navigation__link">ACCESS</a></li>
          <li class="navigation__list-item"><a href="../../contact.php" class="navigation__link">CONTACT</a></li>
        </ul>
      </nav>
    </header>
    <main>
      <?php
      try {
        $db = getDB($dsn, $usr, $passwd);
        // SQLを書く
        $sql = 'SELECT orders.name AS customer_name, orders.email, orders.address, orders.created_on, orders.updated_on, orders_products.order_id, orders_products.quantity, products.name AS product_name, products.price 
    FROM orders
    JOIN orders_products ON orders.id = orders_products.order_id
    JOIN products ON orders_products.product_id = products.id
    WHERE orders.id = :id;';
        $stt = $db->prepare($sql);
        $stt->bindValue(':id', $id, PDO::PARAM_INT);
        $stt->execute();
        $detail = $stt->fetchAll(PDO::FETCH_ASSOC);
        $db = null;
        $create_date = convert_date($detail[0]['created_on'], 'Y年n月d日 H:i:s');
        $update_date = convert_date($detail[0]['updated_on'], 'Y年n月d日 H:i:s');
      ?>
        <div class="container-narrow">
          <dl class="admin-info">
            <dt>受注番号</dt>
            <dd>No.<?php echo $detail[0]['order_id']; ?></dd>
            <dt>注文日時</dt>
            <dd><?php echo $create_date; ?></dd>
            <dt>更新日時</dt>
            <dd><?php echo $update_date; ?></dd>
            <dt>お名前</dt>
            <dd><?php echo ($detail[0]['customer_name']); ?> 様</dd>
            <dt>メールアドレス</dt>
            <dd><?php echo ($detail[0]['email']); ?></dd>
            <dt>お届け先</dt>
            <dd><?php echo ($detail[0]['address']); ?></dd>
          </dl>
          <table class="admin-table admin-table-wide">
            <thead>
              <tr>
                <th>商品名</th>
                <th>単価</th>
                <th>数量</th>
                <th>小計</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($detail as $item) : ?>
                <?php
                $product_name = $item['product_name'];
                $price = $item['price'];
                $quantity = $item['quantity'];
                $subtotal = $price * $quantity;
                $total += $subtotal;
                ?>
                <tr>
                  <td><?php echo ($product_name); ?></td>
                  <td><?php echo "&yen;" . number_format($price); ?></td>
                  <td><?php echo $quantity; ?></td>
                  <td><?php echo "&yen;" . number_format($subtotal); ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
            <tfoot>
              <th colspan="3">合計</th>
              <td><?php echo "&yen;" . number_format($total); ?></td>
            </tfoot>
          </table>
          <p class="centering"><a href="./" class="btn btn-secondary">戻る</a></p>
        </div>
    </main>
  <?php
      } catch (PDOException $e) {
        echo 'エラー発生:' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '<br>';
        exit;
      }
  ?>
  <footer class="footer">
    <div class="ft">
      <ul class="ft__ul">
        <li class="ft__add"><span class="ft__name">foreach camp ground</span></li>
        <li class="ft__add">〒888-8888</li>
        <li class="ft__add">福岡県福岡市東区888-88</li>
        <li class="ft__add">0493-81-6166</li>
      </ul>
      <ul class="ft_links_ul">
        <li class="ft_links_li"><a href="../../reserve.php">予約</a></li>
        <li class="ft_links_li"><a href="../../news.php">お知らせ</a></li>
        <li class="ft_links_li"><a href="../../facility.php">施設紹介</a></li>
        <li class="ft_links_li"><a href="../../onlineshop.php">オンラインストア</a></li>
        <li class="ft_links_li"><a href="../../access.php">アクセス</a></li>
      </ul>
      <ul class="ft_links_ul">
        <li class="ft_links_li"><a href="../../contact.php">お問い合わせ</a></li>
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
  <script src="../../js/jquery-3.3.1.min.js"></script>
  <script src="../../js/menu.js"></script>
</body>

</html>