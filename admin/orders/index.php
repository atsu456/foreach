<?php
session_start();
require_once '../../inc/inc_path.php';
require_once 'foreach_config.php';
require_once '../../func/functions.php';

try {
  $db = getDb($dsn, $usr, $passwd);
  $sql = 'SELECT id,name,created_on FROM orders ORDER BY id';
  $stt = $db->query($sql);
  $orders = $stt->fetchAll(PDO::FETCH_ASSOC);
  $db = null;
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
        <div class="container-narrow">
          <?php if (!empty($orders)) : ?>
            <!-- <table class="admin-table ta_c"> -->
            <table class="admin_tb">
              <thead>
                <tr>
                  <th>注文番号</th>
                  <th>顧客名</th>
                  <th>受注日時</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($orders as $order) :
                  $order_date = convert_date($order['created_on'], 'Y年n月d日 H:m:s');
                ?>

                  <tr>
                    <td><?php echo $order['id']; ?></td>
                    <td><?php echo h($order['name']); ?></td>
                    <td><?php echo $order_date; ?></td>
                    <td class="adminOperation">
                      <!-- <p class="centering"> -->
                      <div class="adminBtn">
                        <a href="detail.php?id=<?php echo $order['id'] ?>">
                        <input type="submit" value="詳細">
                      </a>
                      </div>
                    <!-- </p> -->
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php else : ?>
            <p class="centering">受注情報がありません。</p>
          <?php endif; ?>
          <!-- <p class="centering">
            <a class="btn btn-secondary" href="../">戻る</a>
          </p> -->
          <div class="adminBtn">
          <a href="../">
              <input type="button" value="戻る">
          </a>
          </div>
        </div>
      
    <?php
  } catch (PDOException $e) {
    echo 'エラー発生:' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '<br>';
    exit;
  }
    ?>
    </article>
    </main>
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