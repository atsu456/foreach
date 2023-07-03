<?php
session_start();
$path = '';
$hierarchy_num = array_key_last(explode('/', dirname($_SERVER['PHP_SELF'])));
if ($hierarchy_num > 1) {
	for ($cnt_path = $hierarchy_num; $cnt_path > 1; $cnt_path--) {
		$path .= '../';
	}
}
require_once 'func/functions.php';
require_once 'inc/inc_path.php';
require_once 'foreach_config.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : '';

try {
	$db = getDb($dsn, $usr, $passwd);
	$sql = 'SELECT id,name,price,description,image FROM products WHERE is_deleted = 0 AND id = :id';
	$stt = $db->prepare($sql);
	$stt->bindValue(':id', $id, PDO::PARAM_INT);
	$stt->execute();
	$item = $stt->fetch(PDO::FETCH_ASSOC);
	$db = null;

  $img_path = 'image/';
  $page_title = '商品一覧';
    if (!empty($item)) {
		$page_title = h($item['name']);
	} else {
		$page_title = 'エラー';
	}
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="<?php echo $path; ?>css/style.css">
  <link rel="stylesheet" href="https://use.typekit.net/pke3ujd.css">
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
			<?php if (!empty($item)) : ?>
				<section class="item-detail side-by-side">
					<form action="add_cart.php" method="post">
						<div class="item-detail__img">
							<figure><img src="<?php echo $img_path . $item['image']; ?>" alt=""></figure>
						</div>
						<div class="item-detail__info">
							<h2 class="item-detail__name"><?php echo h($item['name']); ?></h2>
							<p class="item-detail__price">&yen;<?php echo number_format($item['price']); ?></p>
							<p class="item-detail__description"><?php echo nl2br(h($item['description'])); ?></p>
							<p class="item-detail__quantity">数量
								<input type="number" name="quantity" id="quantity" min="1" value="1">
							</p>
							<p class="item-detail__btn">
								<input type="hidden" name="id" value="<?php echo $item['id']; ?>">
								<input type="hidden" name="name" value="<?php echo $item['name']; ?>">
								<input type="hidden" name="image" value="<?php echo $item['image']; ?>">
								<input type="hidden" name="price" value="<?php echo $item['price']; ?>">
								<input class="btn-item" type="submit" value="カートに入れる">
								<a class="btn-item btn-item-secondary" href="./">戻る</a>
							</p>
						</div>
					</form>
				</section>
			<?php else : ?>
				<p class="centering"><span>商品がありません。</span></p>
			<?php endif; ?>
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