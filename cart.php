<?php
session_start();
$path = '';
$hierarchy_num = array_key_last(explode('/', dirname($_SERVER['PHP_SELF'])));
if ($hierarchy_num > 1) {
  for ($cnt_path = $hierarchy_num; $cnt_path > 1; $cnt_path--) {
    $path .= '../';
  }
}
$img_path = 'image/';
$page_title = 'カート';
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

<body id="shop">
    <div id="container">

        <header class="header">
            <h1 class="header__logo"><a href="index.php"><img src="image/camplogo.svg" alt="foreach campground"></a></h1>
            <nav id="g-nav">
                <ul class="nav">
                    <li class="g-nav__item"><a href="reserve.php">予約</a></li>
                    <li class="g-nav__item"><a href="#">オンラインショップ</a></li>
                </ul>
            </nav>
        </header>

        <main>
  <div class="container">
    <section class="cart">
      <ul class="cart__item-list">
        <?php foreach($_SESSION['cart']['item'] as $id => $item):?>
        <li class="cart__item">
          <div class="cart__item-img">
            <figure><img src="image/<?php echo $item['image']; ?>" alt="" width="300" height="200"></figure>
          </div>
          <div class="cart__item-data">
            <div class="cart__item-name">
            <?php echo h($item['name']); ?>
            </div>
            <div class="cart__item-price">
              &yen;<?php echo $item['price']; ?>
            </div>
          </div>
          <div class="cart__item-quantity">
            <?php echo $item['quantity']; ?>
          </div>
          <div class="cart__item-subtotal">
            &yen; <?php echo $item['subtotal']; ?>
          </div>
          <form action="del_cart.php" method="post">
            <input type="hidden" name="delete_id" value="<?php echo $id; ?>">
            <input type="submit" class="btn btn-del-cart " id="js-del-cart" value="削除">
          </form>
        </li>
        <hr>
        <?php endforeach; ?>
      </ul>
      <table class="cart-total">
        <tbody>
          <tr>
            <th>注文内容</th>
            <td><?php echo $_SESSION['cart']['total_quantity']; ?>個</td>
          </tr>
          <tr>
            <th>合計金額</th>
            <td><?php echo $_SESSION['cart']['total_price']; ?></td>
          </tr>
        </tbody>
      </table>
      <div class="cart__btn-group centering">
        <a href="all_products.php" class="btn btn-secondary">お買い物を続ける</a>
        <a href="order.php" class="btn btn-primary">購入手続きへ進む</a>
      </div>
    </section>
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
        
        <script src="js/slick.min.js"></script>
  <script src="js/main.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
</body>
</html>