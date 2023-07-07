<?php
session_start();
if (!isset($_SESSION['message'])) {
    $_SESSION['message'] = '';
}

require_once '../func/func.php';
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://use.typekit.net/pke3ujd.css">
    <script src="https://kit.fontawesome.com/0fb73e8725.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="container">
        <header class="header">
            <h1 class="header__logo"><a href="../index.php"><img src="../image/camplogo.svg" alt="foreach campground"></a></h1>
            <div class="t-nav">
                <nav id="g-nav">
                    <ul class="nav">
                        <li class="g-nav__item"><a href="../reserve.php">予約</a></li>
                        <li class="g-nav__item"><a href="../onlineshop.php">オンラインショップ</a></li>
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
                    <li class="navigation__list-item"><a href="../news.php" class="navigation__link">NEWS</a></li>
                    <li class="navigation__list-item"><a href="../facility.php" class="navigation__link">FACILITY</a></li>
                    <li class="navigation__list-item"><a href="../onlineshop.php" class="navigation__link">ONLINE SHOP</a></li>
                    <li class="navigation__list-item"><a href="../access.php" class="navigation__link">ACCESS</a></li>
                    <li class="navigation__list-item"><a href="../contact.php" class="navigation__link">CONTACT</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <article>
                <h1>ログイン</h1>
                <p class="msg">
                    <?php
                    print $_SESSION['message'];
                    $_SESSION['message'] = '';
                    ?>
                </p>
                <form class="admin" action="check_user.php" method="post">
                    <dl>
                        <dt><label for="email">メールアドレス</label></dt>
                        <dd><input type="email" name="email" id="email" required></dd>
                        <dt><label for="password">パスワード</label></dt>
                        <dd><input type="password" name="password" id="password" required></dd>
                    </dl>
                    <div class="loginBtn">
                        <input type="submit" value="ログイン">
                        <input type="reset" value="リセット">
                    </div>
                </form>
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
                    <li class="ft_links_li"><a href="../reserve.php">予約</a></li>
                    <li class="ft_links_li"><a href="../news.php">お知らせ</a></li>
                    <li class="ft_links_li"><a href="../facility.php">施設紹介</a></li>
                    <li class="ft_links_li"><a href="../onlineshop.php">オンラインストア</a></li>
                    <li class="ft_links_li"><a href="../access.php">アクセス</a></li>
                </ul>
                <ul class="ft_links_ul">
                    <li class="ft_links_li"><a href="../contact.php">お問い合わせ</a></li>
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
        <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="../js/menu.js"></script>
</body>

</html>