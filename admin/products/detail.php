<?php
session_start();
$path = '';
$hierarchy_num = array_key_last(explode('/', dirname($_SERVER['PHP_SELF'])));
if ($hierarchy_num > 1) {
  for ($cnt_path = $hierarchy_num; $cnt_path > 1; $cnt_path--) {
    $path .= '../';
  }
}
$id = isset($_GET['id']) ? (int)$_GET['id'] : '';
$img_path = $path . 'image/';
$page_title = '詳細 | 商品管理';
require_once $path . 'header.php';
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
    <title>index</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.typekit.net/pke3ujd.css">
    <script src="https://kit.fontawesome.com/0fb73e8725.js" crossorigin="anonymous"></script>
</head>

<body id="top">
    <div id="container">

        <header class="header">
            <h1 class="header__logo"><a href="../../index.php"><img src="../../image/camplogo.svg" alt="foreach campground"></a></h1>
            <nav id="g-nav">
                <ul class="nav">
                    <li class="g-nav__item"><a href="#">予約</a></li>
                    <li class="g-nav__item"><a href="shop.php">オンラインショップ</a></li>
                </ul>
            </nav>
        </header>

		<main>
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
      <?php if (!empty($product)) :
        $create_date = convert_date($product['created_on'], 'Y年n月d日 H:i:s');
        $update_date = convert_date($product['updated_on'], 'Y年n月d日 H:i:s');
      ?>
        <table class="admin-table">
          <tr>
            <th>商品ID</th>
            <td><?php echo $product['id']; ?></td>
          </tr>
          <tr>
            <th>商品名</th>
            <td><?php echo h($product['name']); ?></td>
          </tr>
          <tr>
            <th>商品画像</th>
            <td>
              <img src="<?php echo $img_path . h($product['image']) ?>" alt="">
            </td>
          </tr>
          <tr>
            <th>単価</th>
            <td><?php echo '&yen;' . number_format($product['price']) ?></td>
          </tr>
          <tr>
            <th>商品詳細</th>
            <td><?php echo nl2br(h($product['description'])) ?></td>
          </tr>
          <tr>
            <th>登録日</th>
            <td><?php echo $create_date; ?></td>
          </tr>
          <tr>
            <th>最終更新日</th>
            <td><?php echo $update_date; ?></td>
          </tr>
          <tr>
            <th>ステータス</th>
            <td>
              <?php echo ($product['is_deleted']) ? '販売停止中' : '販売中'; ?>
            </td>
          </tr>
        </table>
      <?php else : ?>
        <p class="centering">商品がありません。</p>
      <?php endif; ?>
      <p class="centering">
        <a href="./" class="btn btn-secondary">戻る</a>
        <?php if (!empty($product)) : ?>
          <a class="btn btn-menu" href="edit.php?id=<?php echo $id ?>">編集</a>
        <?php endif; ?>
      </p>

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
        <li class="ft__logo"><a href="../../index.php"><img src="../../image/camplogo.svg" alt="foreach campground"></a></li>
        <li class="ft__add"><span class="ft__name">foreach&nbsp;camp&nbsp;ground</span></li>
        <li class="ft__add">〒888-8888</li>
        <li class="ft__add">福岡県福岡市東区888-88</li>
        <li class="ft__add">0493-81-6166</li>
        </ul>
            <ul class="ft_links_ul">
                <li class="ft_links_li"><a href="access.php">アクセス</a></li>
                <li class="ft_links_li"><a href="news.php">お知らせ</a></li>
                <li class="ft_links_li"><a href="facility.php">施設紹介</a></li>
                <li class="ft_links_li"><a href="book.php">予約</a></li>
                <li class="ft_links_li"><a href="shop.php">オンラインストア</a></li>
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
</body>

</html>