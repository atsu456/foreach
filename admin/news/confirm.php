<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location:login.php');
}
require_once '../../inc/inc_path.php';
require_once '../../func/func.php';
require_once 'foreach_config.php';

$id = (int)$_POST['id'];
$title = $_POST['title'];
$topics_date = $_POST['topics_date'];
$article = $_POST['article'];
$news_image = $_POST['news_image'];

$topics_array = explode('-',$topics_date);
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
                <h1>新規登録：ニュース-確認-</h1>
                <form action="add_done.php" method="post" class="admin">
                <dl>
                    <dt>タイトル</dt>
                    <dd><?= $title ?><input type="hidden" name="title" value="<?= $title ?>"></dd>
    
                    <dt>日付</dt>
					<dd><?= $topics_array[0] ?>年<?= $topics_array[1] ?>月<?= $topics_array[2] ?>日	
						<input type="hidden" name="topics_date" value="<?= $topics_date ?>"></dd>
					<dt>テキスト</dt>
					<dd><?= nl2br($article) ?>
	                    <input type="hidden" name="article" value="<?= $article ?>">
					</dd>
					<dt>image</dt>
					<dd><img src= "<?= '../../image/' . $news_image ?>" alt=""><input type="hidden" name="news_image" value="<?= $news_image ?>"></dd>
                </dl>
                <div class="adminBtn">
                        <input type="hidden" name="password" value="<?= $password ?>">
                        <input type="submit" value="送信する">
                        <input type="button" value="戻る" onclick="history.back()">
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