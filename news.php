<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>news</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.typekit.net/pke3ujd.css">
    <script src="https://kit.fontawesome.com/0fb73e8725.js" crossorigin="anonymous"></script>
</head>

<body id="news">
    <div id="container">

        <header class="header">
            <h1 class="header__logo"><a href="index.php"><img src="image/camplogo.svg" alt="foreach campground"></a></h1>
            <nav id="g-nav">
                <ul class="nav">
                    <li class="g-nav__item"><a href="book.php">予約</a></li>
                    <li class="g-nav__item"><a href="shop.php">オンラインショップ</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <article>

                <section id="mv">
                    <div class="mv__text">
                        <h1 class="mv__lead">NEWS</h1>
                    </div>
                </section>
                <section id="textnews">
                <textarea name="" id="text" cols="100" rows="10" style="text-align:center">ここにdbからtext引っ張るよ</textarea>
                </section>
                <section id="recently" class="contents">
                    <div class="news_description">
                        <h1 class="title-style">
                            <p class="recently">RECENTLY&nbsp;NEWS</p>
                        </h1>
                    </div>
                    <ul class="news__item">
                        <li><a href="#">
                                <figure class="img"><img src="image/rantan.jpg" alt="ランタン"></figure>
                            </a></li>
                        <li><a href="#">
                                <figure class="img"><img src="image/cup.jpg" alt="マグカップ"></figure>
                            </a></li>
                            <li><a href="#">
                                <figure class="img"><img src="image/fire.jpg" alt="焚き火"></figure>
                            </a></li>
                            <li><a href="#">
                                <figure class="img"><img src="image/tent.jpg" alt="テント"></figure>
                            </a></li>
                    </ul>
                </section>
            </article>
        </main>

        <footer class="footer">
        <div class="ft">
        <ul class="ft__ul">
        <li class="ft__logo"><a href="index.php"><img src="image/camplogo.svg" alt="foreach campground"></a></li>
        <li class="ft__add"><span class="ft__name">foreach camp&nbsp;ground</span></li>
        <li class="ft__add">〒888-8888</li>
        <li class="ft__add">福岡県福岡市東区888-88</li>
        <li class="ft__add">0493-81-6166</li>
        </ul>
            <ul class="ft_links_ul">
                <li class="ft_links_li"><a href="access.php">アクセス</a></li>
                <li class="ft_links_li"><a href="news.php">お知らせ</a></li>
                <li class="ft_links_li"><a href="facility">施設紹介</a></li>
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