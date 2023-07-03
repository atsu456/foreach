<?php
session_start();
$path = '';
$hierarchy_num = array_key_last(explode('/', dirname($_SERVER['PHP_SELF'])));
if ($hierarchy_num > 1) {
  for ($cnt_path = $hierarchy_num; $cnt_path > 1; $cnt_path--) {
    $path .= '../';
  }
}
$page_title = '注文情報入力';
require_once 'func/functions.php';
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
  <div class="container container-narrow">
    <section class="cart">
    <form action="order_confirm.php" method="post">
      <p class="form-item">
        <label for="name">お名前</label><input type="text" name="name" id="name" required>
      </p>
      <p class="form-item">
        <label for="email">メールアドレス</label><input type="email" name="email" id="email" required>
      </p>
      <p class="form-item">
        <label for="address">お届け先</label><input type="text" name="address" id="address" required>
      </p>
      <p class="form-btn centering">
        <button class="btn btn-secondary" type="button" onclick="history.back();">カートに戻る</button>
        <button class="btn btn-primary" type="submit">入力内容を確認する</button>
      </p>
    </form>

  </div>
</main>
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
</body>
</html>