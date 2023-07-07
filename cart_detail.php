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

            <?php require_once('header.html'); ?>

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
        <?php require_once('footer.html'); ?>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/main.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="js/menu.js"></script>

    </body>

    </html>