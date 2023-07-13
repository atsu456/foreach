<?php
session_start();
require_once 'inc/inc_path.php';
require_once 'foreach_config.php';
require_once 'func/func.php';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slick-theme.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.typekit.net/pke3ujd.css">
    <script src="https://kit.fontawesome.com/0fb73e8725.js" crossorigin="anonymous"></script>
</head>

<body id="top">
    <div id="container">
        <?php require_once('header.html'); ?>
        <main>
            <article>

                <section id="mv">
                    <div class="mv__text">
                        <h1 class="mv__copy">福岡にあるリゾートと森の融合体</h1>
                        <p class="mv__lead">QUIET PLACE<br>AND THE<br>STARRY SKY</p>
                    </div>
                </section>
                <section id="news01" class="contents">
                    <div class="page_description">
                        <div class="air-box"></div>
                        <h2 class="title-style">
                            01
                            <p class="title-border-right">NEWS</p>
                        </h2>
                        <p>イベント情報など<br>最新の情報をお届けいたします。</p>
                        <a href="news.php" class="btn">READ MORE</a>
                    </div>
                    <figure class="contents_img"><img src="image/news.jpg" alt="NEWS"></figure>
                </section>

                <section id="facility02" class="contents">
                    <div class="page_description right_flow">
                        <h2 class="title-style">
                            02
                            <p class="title-border-left">FACILITY</p>
                        </h2>
                        <p>サイトや料金など、<br>快適にキャンプをお楽しみ頂くための<br>施設をご紹介いたします。</p>
                        <a href="facility.php" class="btn btn_r">READ MORE</a>
                    </div>
                    <figure class="contents_img"><img src="image/tent1.jpg" alt="テント"></figure>
                </section>

                <section id="onlinestore03" class="contents">
                    <div class="page_description">
                        <h2 class="title-style">
                            03
                            <p class="title-border-right">ONLINE SHOP</p>
                        </h2>
                        <p>キャンプギア、アパレル用品の購入はこちらから！<br>限定商品も取り扱っていますので<br>是非ご覧ください。</p>
                        <a href="onlineshop.php" class="btn">READ MORE</a>
                    </div>
                    <figure class="contents_img"><img src="image/mug.jpg" alt="マグカップ"></figure>
                </section>

                <section id="access04" class="contents">
                    <div class="page_description right_flow">
                        <h2 class="title-style">
                            04
                            <p class="title-border-left">ACCESS</p>
                        </h2>
                        <p>foreach camp ground<br>〒888-8888<br>福岡県福岡市東区888-88<br>0493-81-6166</p>
                        <a href="access.php" class="btn btn_r">READ MORE</a>
                    </div>
                    <figure class="contents_img"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3322.4990464990346!2d130.41543891189113!3d33.618300173212035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x35418e24cd64f3c5%3A0x73c2317117dd07f9!2z56aP5bKh5biC5p2x5Yy65L-d5YGl56aP56WJ44K744Oz44K_44O8!5e0!3m2!1sja!2sjp!4v1687952413671!5m2!1sja!2sjp" width="100%" height="576" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></figure>
                </section>

            </article>
        </main>
        <?php require_once('footer.html'); ?>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/app.js"></script>
        <script src="js/menu.js"></script>
</body>

</html>
