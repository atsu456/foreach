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

    <?php require_once('header.html'); ?>

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
<?php require_once('footer.html'); ?>
<script src="js/slick.min.js"></script>
<script src="js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<link rel="stylesheet" href="<?php echo $path; ?>css/style.css">
<script src="js/menu.js"></script>
</body>

</html>