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
                    <li class="g-nav__item"><a href="reserve.php">予約</a></li>
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
                    <section class="regular slider slideshow newsslide" >
        <!-- <?php
				try{
					$db = getDb( $dsn, $usr, $passwd);
					$sql = 'SELECT * FROM news';
					$stt = $db->prepare($sql);
					$stt->execute();
					$result = $stt->fetchAll(PDO::FETCH_ASSOC);
				?>
                <div>
                <?php foreach($result as $row): ?>
                <a href="news_detail.php?id=<?= $row['id'] ?>" method="post">
                <img src= "<?= 'image/' . $row['news_image'] ?>" alt="ランタン">
                </a>
                </div>
                <?php endforeach; ?>         
			<?php
				}catch(PDOException $e){
					die("接続エラー：{$e->getMessage()}");
				}
			?> -->



                <div>
                <a href="news_detail.php" method="post">
                <img src="image/26155542_m.jpg" alt="びーる">
                <p>2023年06月11日</p>
                
                </a>
                </div>
                <div>
                <a href="news_detail.php" method="post">
                <img src="image/26155548_s.jpg" alt="あじさい">
                <p>2023年06月01日</p>
                </a>
                </div>
                <div>
                <a href="news_detail.php" method="post">
                <img src="image/26230033_s.jpg" alt="ランニング">
                <p>2023年05月05日</p>
                </a>
                </div>
                <div>
                <a href="news_detail.php" method="post">
                <img src="image/27009191_m.jpg" alt="夜">
                <p>2023年06月20日</p>
                </a>
                </div>
                <div>
                <a href="news_detail.php" method="post">
                <img src="image/26882613_s.jpg" alt="家族">
                <p>2023年06月11日</p>
                </a>
                </div>
                <div>
                <a href="news_detail.php" method="post">
                <img src="image/27010370_s.jpg" alt="女性たち">
                <p>2023年05月23日</p>
                </a>
                </div>
            </section>
                <div>
      <!-- this slide should inherit the sizes attr from the parent slider -->
      <img data-lazy="http://placehold.it/350x300?text=6-350w"  data-srcset="http://placehold.it/650x300?text=6-650w 650w, http://placehold.it/960x300?text=6-960w 960w">
    </div>
  </section>
     
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
          <?php
    try{
// データベースに接続
$db = getDb( $dsn, $usr, $passwd);
// newsテーブルからデータを取得
$stmt = $db->query("SELECT * FROM news");
$newsItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
          <!-- カレンダーの日付を表示 -->
<?php for ($dateCount = 1; $dateCount <= $thisFullDays; $dateCount++) : ?>
  <?php
  $currentDate = sprintf("%04d-%02d-%02d", $thisYear, $thisMonth, $dateCount);
  $isTopicsDate = false;

  // $newsItemsをループして、topics_dateと現在の日付を比較
  foreach ($newsItems as $newsItem) {
    if ($newsItem['topics_date'] == $currentDate) {
      $isTopicsDate = true;
      break;
    }
  }
  ?>

  <td class="day <?= $isTopicsDate ? 'topics-date' : '' ?>" <?= $currentDate == $objToday->format('Y-m-d') ? 'class="today"' : ''; ?>>
    <?= $dateCount; ?>
    <?php if ($isTopicsDate) : ?>
      <a href="news_detail.php?id=<?= $newsItem['id'] ?>">
      <span class="topics-mark">〇</span>
    </a>
    <?php endif; ?>
  </td>

  <?php if (($dateCount + $thisFirstWeekDay) % 7 == 0) : ?>
    </tr>
    <?php if ($dateCount != $thisFullDays || $thisLastWeekDay != 6) : ?>
      <tr>
      <?php endif; ?>
    <?php endif; ?>
<?php endfor; ?>
      <?php
    }catch(PDOException $e){
				die("接続エラー：{$e->getMessage()}");
			}
			?>
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
        <li class="ft__logo"><a href="#"><img src="image/camplogo.svg" alt="foreach campground"></a></li>
        <li class="ft__add"><span class="ft__name">foreach camp ground</span></li>
        <li class="ft__add">〒888-8888</li>
        <li class="ft__add">福岡県福岡市東区888-88</li>
        <li class="ft__add">0493-81-6166</li>
        </ul>
            <ul class="ft_links_ul">
                <li class="ft_links_li"><a href="#">アクセス</a></li>
                <li class="ft_links_li"><a href="news.php">お知らせ</a></li>
                <li class="ft_links_li"><a href="facility.php">施設紹介</a></li>
                <li class="ft_links_li"><a href="reserve.php">予約</a></li>
                <li class="ft_links_li"><a href="shop.php">オンラインストア</a></li>
            </ul>
            <ul class="ft_links_ul">
                <li class="ft_links_li"><a href="contact.php">お問い合わせ</a></li>
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
  <script type="text/javascript">
</script>

</body>

</html>
