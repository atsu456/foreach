<?php
session_start();
$path = '';
$hierarchy_num = array_key_last(explode('/', dirname($_SERVER['PHP_SELF'])));
if ($hierarchy_num > 1) {
  for ($cnt_path = $hierarchy_num; $cnt_path > 1; $cnt_path--) {
    $path .= '../';
  }
}
$page_title = '受注管理';
require_once $path . 'header.php';
require_once $path . 'func/functions.php';
require_once $path . 'inc/inc_path.php';
require_once 'foreach_config.php';
try {
  $db = getDb($dsn, $usr, $passwd);
  $sql = 'SELECT id,name,image,is_deleted FROM products ORDER BY is_deleted,id';
  $stt = $db->query($sql);
  $products = $stt->fetchAll(PDO::FETCH_ASSOC);
  $dbh = null;
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
      <table class="admin-table ta_c">
        <thead>
          <tr>
            <th>商品ID</th>
            <th>商品名</th>
            <th>操作</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($products as $item) : ?>
            <tr class="<?php echo ($item['is_deleted'] != 0) ? 'disabled' : ''; ?>">
              <td><?php echo $item['id']; ?></td>
              <td> <?php echo ($item['name']); ?>
              </td>
              <td>
                <p class="centering">
                  <a class="btn btn-menu" href="detail.php?id=<?php echo $item['id'] ?>">詳細</a>
                  <a class="btn btn-menu" href="edit.php?id=<?php echo $item['id'] ?>">編集</a>
                </p>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <p class="centering"><a href="../" class="btn btn-secondary">戻る</a><a href="add.php" class="btn btn-primary">新規登録</a></p>
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