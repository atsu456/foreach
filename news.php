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
    <?php require_once('header.html'); ?>

    <main>
      <section id="mv">
        <div class="mv__text">
          <h1 class="mv__lead">NEWS</h1>
        </div>
      </section>

      <section id="recently" class="contents">
        <section class="regular slider newsslide">
          <?php
          try {
            $db = getDb($dsn, $usr, $passwd);
            $sql = 'SELECT * FROM news';
            $stt = $db->prepare($sql);
            $stt->execute();
            $result = $stt->fetchAll(PDO::FETCH_ASSOC);
          ?>
            <div class="slideshow">
              <?php foreach ($result as $row) : ?>
                <a href="news_detail.php?id=<?= $row['id'] ?>" method="post">
                  <img src="<?= 'image/' . $row['news_image'] ?>" alt="news_image">
                  <p class="news_slide_images"><?= $row['title'] ?></p>
                </a>
              <?php endforeach; ?>
            </div>
          <?php
          } catch (PDOException $e) {
            die("接続エラー：{$e->getMessage()}");
          }
          ?>
          <div>
          </div>
        </section>

        <div class="news_description">
          <h1 class="title-style">
            <p class="recently title-border-right">NEWS&nbsp;INFORMATION</p>
            <p class="description">
              たくさんの方にキャンプを楽しんでもらう為に、
              色々なイベントを開催しています！<br>
              安心して楽しめるイベント！<br>
              おいしいご飯！<br>
              いろんな仲間と過ごしてみませんか？
            </p>
          </h1>
        </div>
        <div class="calendar-section" id="calendar_link">
          <h1>
            <a href="?refYear=<?= $objPrevMonth->format('Y') ?>&refMonth=<?= $objPrevMonth->format('m') ?> " class="nav-link">◀︎</a>
            <?= $thisYear . '年 / ' . $thisMonth . '月' ?>
            <!-- ナビゲーションリンク -->
            <a href="?refYear=<?= $objNextMonth->format('Y') ?>&refMonth=<?= $objNextMonth->format('m') ?>" class="nav-link">▶︎</a>
          </h1>
          <div class="calendar">
            <h1>NEWS カレンダー</h1>
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
                try {
                  // データベースに接続
                  $db = getDb($dsn, $usr, $passwd);
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
                } catch (PDOException $e) {
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
      </section>
    </main>
    <?php require_once('footer.html'); ?>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/app.js"></script>
    <script type="text/javascript">
    </script>
    <script src="js/menu.js"></script>
</body>
</html>