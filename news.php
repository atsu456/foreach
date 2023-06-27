<?php
session_start();
require_once 'inc/inc_path.php';
require_once 'func/func.php';
require_once 'foreach_config.php';
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>news</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.typekit.net/pke3ujd.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slick-theme.css">
    <script src="https://kit.fontawesome.com/0fb73e8725.js" crossorigin="anonymous"></script>
    <style type="text/css">
    </style>

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
                <section id="recently" class="contents">
                    <div class="news_description">
                        <h1 class="title-style">
                            <p class="recently">RECENTLY&nbsp;NEWS</p>
                        </h1>
                    </div>
                <section class="regular slider" >
                <div>
                <a href="news_detail.php" method="post">
                <img src="image/rantan.jpg" alt="ランタン">
                </a>
                </div>
                <div>
                <a href="news_detail.php" method="post">
                <img src="image/cup.jpg" alt="マグカップ">
                </a>
                </div>
                <div>
                <a href="news_detail.php" method="post">
                <img class="img"><img src="image/fire.jpg" alt="焚き火">
                </a>
                </div>
                <div>
                <a href="news_detail.php" method="post">
                <img src="image/tent.jpg" alt="テント">
                </a>
                </div>
                <div>
                <a href="news_detail.php" method="post">
                <img src="image/tent.jpg" alt="テント">
                </a>
                </div>
                <div>
                <a href="news_detail.php" method="post">
                <img src="image/tent.jpg" alt="テント">
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
     
<div class="calendar-section" id="calendar_link">
<h1>
          <a href="?refYear=<?= $objPrevMonth->format('Y') ?>&refMonth=<?= $objPrevMonth->format('m') ?> " class="nav-link">前の月</a>
        <?= $thisYear . '年 / ' . $thisMonth . '月' ?>
        <!-- ナビゲーションリンク -->
        <a href="?refYear=<?= $objNextMonth->format('Y') ?>&refMonth=<?= $objNextMonth->format('m') ?>" class="nav-link">次の月</a>
    </h1>
  <div class="calendar">
    <h1>newsカレンダー</h1>
      <table>
        <tr>
          <!-- カレンダーの曜日の表示 -->
          <?php foreach ($weekday as $day) : ?>
            <th><?= $day; ?></th>
          <?php endforeach; ?>
        </tr>
        <tr>
          <!-- 1日の前の空欄を表示 -->
          <?php for ($emptyCellCount = 0; $emptyCellCount < $thisFirstWeekDay; $emptyCellCount++) : ?>
            <td></td>
          <?php endfor; ?>
          <!--　カレンダーの日付を表示 -->
          <?php for ($dateCount = 1; $dateCount <= $thisFullDays; $dateCount++) : ?>
            <td class="day" <?= "$thisYear-$thisMonth-$dateCount" == $objToday->format('Y-m-d') ? 'class="today"' : ''; ?>><?= $dateCount; ?></td>
            <?php if (($dateCount + $thisFirstWeekDay) % 7 == 0) : ?>
        </tr>
        <?php if ($dateCount != $thisFullDays || $thisLastWeekDay != 6) : ?>
          <tr>
          <?php endif; ?>
        <?php endif; ?>
      <?php endfor; ?>
      <!-- 最終日の後ろの空欄を表示 -->
      <?php for ($emptyCellCount = 1; $emptyCellCount < (7 - $thisLastWeekDay); $emptyCellCount++) : ?>
        <td></td>
      <?php endfor; ?>
      </table>
  </div>
    </div>
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
        <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/slick.min.js"></script>
  <script src="js/app.js"></script>
</body>

</html>