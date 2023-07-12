<?php
session_start();
require_once '../../inc/inc_path.php';
require_once 'foreach_config.php';
require_once '../../func/functions.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : '';
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
		<main class="admin_main">
		<article id="admin">
			<?php
			try {
				$db = getDB($dsn, $usr, $passwd);
				$sql = 'SELECT * FROM products WHERE id=:id';
				$stt = $db->prepare($sql);
				$stt->bindValue(':id', $id, PDO::PARAM_INT);
				$stt->execute();
				$product = $stt->fetch(PDO::FETCH_ASSOC);
				$db = null;
			?>
				<div class="container container-narrow">
					<p class="centering">
						<span>
							<?php
							if (isset($_SESSION['msg'])) {
								echo $_SESSION['msg'];
							}
							$_SESSION['msg'] = '';
							?>
						</span>
					</p>
					<?php if (!empty($product)) : ?>
						<form action="edit_done.php" method="post" enctype="multipart/form-data">
							<!-- <table class="admin-table"> -->
							<table class="admin_tb">
								<tr>
									<th>商品ID</th>
									<td>
										<?php echo $product['id']; ?>
										<input type="hidden" name="id" value="<?php echo $product['id']; ?>">
									</td>
								</tr>
								<tr>
									<th>商品名</th>
									<td><input type="text" name="name" id="name" value="<?php echo $product['name']; ?>"></td>
								</tr>
								<tr>
									<th>商品画像</th>
									<td>
										<img src="../../image/<?php echo h($product['image']) ?>" alt="">
										<input type="file" name="image" id="image">
									</td>
								</tr>
								<tr>
									<th>単価</th>
									<td><input type="number" name="price" id="price" value="<?php echo $product['price']; ?>">
									</td>
								</tr>
								<tr>
									<th>商品詳細</th>
									<td><textarea name="description" id="description"><?php echo $product['description']; ?></textarea></td>
								</tr>
								<tr>
									<th>ステータス</th>
									<td>
										<select name="is_deleted" id="is_deleted">
											<option value="0" <?php echo ($product['is_deleted']) == 0 ? 'selected' : ''; ?>>販売中</option>
											<option value="1" <?php echo ($product['is_deleted'] != 0) ? 'selected' : ''; ?>>販売停止中</option>
										</select>
									</td>
								</tr>
							</table>
						<?php else : ?>
							<p class="centering">商品がありません。</p>
						<?php endif; ?>
						<div class="adminBtn">
							<?php if (!empty($product)) : ?>
							<input type="submit" value="編集する">
							<?php endif; ?>
                            <input type="button" value="戻る" onclick="history.back()">
						</div>
                    	
							
							</div>
						</form>

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