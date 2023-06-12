<?php
session_start();
$path = '';
$hierarchy_num = array_key_last(explode('/', dirname($_SERVER['PHP_SELF'])));
if ($hierarchy_num > 1) {
	for ($cnt_path = $hierarchy_num; $cnt_path > 1; $cnt_path--) {
		$path .= '../';
	}
}
require_once $path . 'func/functions.php';
require_once $path . 'inc/inc_path.php';
require_once 'easy_cart_config.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : '';

try {
	$dbh = getDb($dsn, $user, $pass);
	$sql = 'SELECT id,name,price,description,image FROM products WHERE is_deleted = 0 AND id = :id';
	$stmt = $dbh->prepare($sql);
	$stmt->bindValue(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
	$item = $stmt->fetch(PDO::FETCH_ASSOC);
	$dbh = null;

	$img_path = $path . 'img/';
	if (!empty($item)) {
		$page_title = h($item['name']);
	} else {
		$page_title = 'エラー';
	}
	require_once $path . 'php/header.php';
?>
	<main>
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
	</main>
<?php
} catch (PDOException $e) {
	echo 'エラー発生:' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '<br>';
	exit;
}
?>
<?php require_once $path . 'php/footer.php'; ?>
<script src="js/addCart.js"></script>
</body>

</html>