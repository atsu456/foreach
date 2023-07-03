<?php
session_start();
$path = '';
$hierarchy_num = array_key_last(explode('/', dirname($_SERVER['PHP_SELF'])));
if ($hierarchy_num > 1) {
  for ($cnt_path = $hierarchy_num; $cnt_path > 1; $cnt_path--) {
    $path .= '../';
  }
}
$img_path = $path . 'image/';

require_once $path . 'func/functions.php';
require_once $path . 'inc/inc_path.php';
require_once 'foreach_config.php';
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
   <article>
    <div class="container">
    <?php
    try {
      $db = getDb($dsn, $usr, $passwd);
      $sql = 'SELECT id,name,price,image FROM products WHERE is_deleted = 0';
      $stt = $db->query($sql);
      $products = $stt->fetchAll(PDO::FETCH_ASSOC);
      $db = null;
      if (!empty($products)) :
    ?>
        <section class="grid-container">
          <?php foreach ($products as $item) : ?>
            <div class="item">
              <div class="item__image">
                <figure><img src="<?php echo $img_path . h($item['image']); ?>" alt="" width="300" height="200"></figure>
              </div>
              <h2 class="item__name"><?php echo h($item['name']); ?></h2>
              <p class="item__price">&yen;<?php echo number_format($item['price']); ?></p>
              <a href="cart_detail.php?id=<?php echo $item['id']; ?>" class="btn-item">詳しく見る</a>
            </div>
          <?php endforeach; ?>
            </a>
          </div>
      <?php else : ?>
        <p class="centering"><span>商品がありません。</span></p>
      <?php endif; ?>
        </section>
        <div class="btn-cart">
				<a href="cart.php">
					<div class="btn-cart__inner">
						<p class="btn-cart__quantity" id="js-cart-quantity" style="<?php echo isset($_SESSION['cart']['total_quantity']) && ($_SESSION['cart']['total_quantity'] > 0) ? 'display:grid' : 'display:none' ?>"><?php echo isset($_SESSION['cart']['total_quantity']) ? $_SESSION['cart']['total_quantity'] : '' ?></p>
						<span class="material-symbols-outlined icon-cart">shopping_cart</span>
					</div>
				</a>
			</div>

  </div>
   </article>
   
</main>
<?php
    } catch (PDOException $e) {
      echo 'エラー発生:' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '<br>';
      exit;
    }
?>


                </section>
            </article>
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
  	<link rel="stylesheet" href="<?php echo $path; ?>css/style.css">
</body>
</html>