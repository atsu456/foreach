<?php
require_once 'inc/inc_path.php';
require_once 'func/func.php';
require_once 'foreach_config.php';
require_once 'list/list.php';
$name = e($_POST['name']);
$tel = e($_POST['tel']);
if (isset($_POST['type'])) {
	$type = $_POST['type'];
} else {
	$type = array();
}
$comment = e($_POST['comment']);

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

<body id="contact">
    <div id="container">

        <header class="header">
            <h1 class="header__logo"><a href="#"><img src="image/camplogo.svg" alt="foreach campground"></a></h1>
            <nav id="g-nav">
                <ul class="nav">
                    <li class="g-nav__item"><a href="reserve.php">予約</a></li>
                    <li class="g-nav__item"><a href="shop.php">オンラインショップ</a></li>
                </ul>
            </nav>
        </header>
        <main>
        <article class="contactForm">
                <h1>入力内容の確認</h1>
                <p>入力内容を確認し、「送信するボタン」をクリックしてください。</p>
                <form action="contact_done.php" method="post">
                    <p class="contactForm_p"><label>お名前<br>
                            <?= $name ?>
                            <input type="hidden" name="name" value="<?= $name ?>"></label></p>
                    <p class="contactForm_p"><label>電話番号<br>
                            <?= $tel ?>
                            <input type="hidden" name="tel" value="<?= $tel ?>"></label></p>
                    <p class="contactForm_p">お問い合わせ種類<br>
                        <?php for ($i = 0; $i < count($type); $i++) : ?>
                            <?= $i > 0 ? ',' : '' ?>
                            <input type="hidden" name="type[]" value="<?= $type[$i] ?>">
                            <?= $type_list[$type[$i]] ?>
                        <?php endfor; ?>
                    <p class="contactForm_p"><label>お問い合わせ内容<br>
                            <?= nl2br($comment) ?>
                            <input type="hidden" name="comment" value="<?= $comment ?>"></label></p>
                    <p class="contactForm_p">
                        <input type="submit" value="送信する">
                        <input type="button" value="戻る" onclick="history.back()">
                    </p>
                </form>
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
</body>

</html>