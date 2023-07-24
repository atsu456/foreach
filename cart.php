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
$page_title = 'カート';
require_once $path . 'func/functions.php';
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
        </header>
        <main>
            <div class="container">
                <section class="cart">
                    <?php
                    if (!isset($_SESSION)) {
                        session_start();
                    }
                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart']['item'])) :
                    ?>
                        <ul class="cart__item-list">
                            <?php foreach ($_SESSION['cart']['item'] as $id => $item) : ?>
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
                            <a href="onlineshop.php" class="btn btn-secondary">お買い物を続ける</a>
                            <a href="order.php" class="btn btn-primary">購入手続きへ進む</a>
                        </div>
                        <?php else :
                            echo "カートが空です。";
                            echo "<br>";
                            echo '<a href="onlineshop.php" class="btn btn-secondary">お買い物を続ける</a>';
                        endif;
                        ?>
                </section>
            </div>

        </main>

        <?php require_once('footer.html'); ?>
        
        <script src="js/slick.min.js"></script>
  <script src="js/main.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
</body>
</html>