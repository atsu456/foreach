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

  <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.typekit.net/pke3ujd.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slick-theme.css">
    <script src="https://kit.fontawesome.com/0fb73e8725.js" crossorigin="anonymous"></script>
    <style type="text/css">
    </style>
<body id="shop">
    <div id="container">

        <header class="header">
            <h1 class="header__logo"><a href="index.php"><img src="image/camplogo.svg" alt="foreach campground"></a></h1>
            <nav id="g-nav">
                <ul class="nav">
                    <li class="g-nav__item"><a href="#">予約</a></li>
                    <li class="g-nav__item"><a href="#">オンラインショップ</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <article>
                <section id="mv">
                    <div class="mv__text">
                        <h1 class="mv__lead">SHOP</h1>
                    </div>
                </section>
                <section id="arrivals" class="slide">
                    <div class="arrivals_description">
                        <h1 class="title-style">
                            <p class="arrivals">NEW&nbsp;ARRIVALS</p>
                        </h1>
                    </div>
                </section>
                <section class="regular slider" >
                <div>
                <a href="news_detail.php" method="post">
                <img src="image/frypan.jpg" alt="フライパン">
                </a>
                </div>
                <div>
                <a href="news_detail.php" method="post">
                <img src="image/ramp.jpg" alt="ランタン">
                </a>
                </div>
                <div>
                <a href="news_detail.php" method="post">
                <img class="img"><img src="image/mug2.jpg" alt="マグカップ">
                </a>
                </div>
                <div>
                <a href="news_detail.php" method="post">
                <img src="image/bottle.jpg" alt="ボトル">
                </a>
                </div>
                <div>
                <a href="news_detail.php" method="post">
                <img src="image/mug1.jpg" alt="マグカップ白">
                </a>
                </div>
                <div>
                <a href="news_detail.php" method="post">
                <img src="image/rantan.jpg" alt="ランタン青">
                </a>
                </div>
            </section>
            <div>
      <!-- this slide should inherit the sizes attr from the parent slider -->
      <img data-lazy="http://placehold.it/350x300?text=6-350w"  data-srcset="http://placehold.it/650x300?text=6-650w 650w, http://placehold.it/960x300?text=6-960w 960w">
    </div>
  </section>
  <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
  <script src="./slick/slick.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
    $(document).on('ready', function() {
      $(".vertical-center-4").slick({
        dots: true,
        vertical: true,
        centerMode: true,
        slidesToShow: 4,
        slidesToScroll: 2
      });
      $(".vertical-center-3").slick({
        dots: true,
        vertical: true,
        centerMode: true,
        slidesToShow: 3,
        slidesToScroll: 3
      });
      $(".vertical-center-2").slick({
        dots: true,
        vertical: true,
        centerMode: true,
        slidesToShow: 2,
        slidesToScroll: 2
      });
      $(".vertical-center").slick({
        dots: true,
        vertical: true,
        centerMode: true,
      });
      $(".vertical").slick({
        dots: true,
        vertical: true,
        slidesToShow: 3,
        slidesToScroll: 3
      });
      $(".regular").slick({
        dots: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3
      });
      $(".center").slick({
        dots: true,
        infinite: true,
        centerMode: true,
        slidesToShow: 5,
        slidesToScroll: 3
      });
      $(".variable").slick({
        dots: true,
        infinite: true,
        variableWidth: true
      });
      $(".lazy").slick({
        lazyLoad: 'ondemand', // ondemand progressive anticipated
        infinite: true
      });
    });
</script>        
                <section id="collaboration" class="contents">
                    <div class="page_description right_flow">
                        <h1 class="title-style">
                            <p class="title-border-left">COLLABORATION</p>
                        </h1>
                    </div>
                    <figure class="contents_img"><img src="image/bottle.jpg" alt="ボトル"></figure>
                </section>
                
                <section id="popular" class="contents">
                    <div class="page_description">
                        <h1 class="title-style">
                            <p class="title-border-right">POPULAR&nbsp;PRODUCTS</p>
                        </h1>
                        </div>
                        <figure class="contents_img"><img src="image/bed.jpg" alt="ベッド"></figure>
                </section>

                <section id="ALL" class="contents">
                    <div class="page_description right_flow">
                        <h1 class="title-style">
                            <p class="title-border-left"><a href="all_products.php">ALL&nbsp;PRODUCTS</a></p>
                        </h1>
                     </div>
                        <figure class="contents_img"><a href="all_products.php"><img src="image/frypan.jpg" alt="ベッド"></a></figure>
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
        
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/slick.min.js"></script>
  <script src="js/app.js"></script>

</body>
</html>