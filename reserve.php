<?php

require_once 'func/func.php';
?>
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

<body id="reserve">

  <header class="header">
    <h1 class="header__logo"><a href="index.php"><img src="image/camplogo.svg" alt="foreach campground"></a></h1>
    <nav id="g-nav">
      <ul class="nav">
        <li class="g-nav__item"><a href="#">予約</a></li>
        <li class="g-nav__item"><a href="shop.php">オンラインショップ</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <article>
      <section id="mv">
        <div class="mv__text">
          <h1 class="mv__lead">RESERVE</h1>
        </div>
      </section>

      <div class="section_reserve contents">
        <div class="section_left">
          <h1>プラン一覧</h1>
          <div class="campsite_article">
            <div class="campsite_top">
              <img src="image/freesite.jpg" alt="" class="site_img">
              <div>
                <h2>フリーサイト(電源なし)</h2>
              </div>
              <p>¥7,150/拍(税込み)</p>
              <p><i class="fas fa-users"></i> 1~6名</p>
              <p><i class="fas fa-car"></i> 車１台</p>
              <p><i class="fas fa-campground"></i> テント・タープ１張りまで</p>
            </div>
            <div class="text">
              <p>フリーサイト(電源なし)は、キャンプ場内のエリアで、電気や電源が提供されていないキャンプスペースのことです。キャンプ場内の他の設備やアメニティは利用できますが、電力を必要とするデバイスや設備の使用は制限される可能性があります。電源なしフリーサイトを利用する場合は、自分自身で必要な設備やライティング、充電などの準備をする必要があります。自然の中でシンプルなキャンプ体験を楽しみたい方におすすめのスペースです。</p>
            </div>
            <div class="button_reserve">
              <a href="reserve_form.php">予約手続きへ進む</a>
            </div>
          </div>

          <!-- Plan 2: 区画電源オートサイト(電源あり) -->
          <div class="campsite_article">
            <div class="campsite_top">
              <img src="image/autosite.jpg" alt="" class="site_img">
              <div>
                <h2>区画電源オートサイト(電源あり)</h2>
              </div>
              <p>¥8,250/拍(税込み)</p>
              <p><i class="fas fa-users"></i> 1~6名</p>
              <p><i class="fas fa-car"></i> 車１台</p>
              <p><i class="fas fa-campground"></i> テント・タープ１張りまで</p>
            </div>
            <div class="text">
              <p>区画電源オートサイト(電源あり)は、キャンプ場内に設けられたエリアで、テントやキャンピングカーを自由に設置することができます。このエリアには電源があり、電気を利用することができます。電源を利用することで、照明や冷蔵庫、電気ストーブなどの電化製品を使うことができます。電源あり区画フリーサイトは、キャンプ場での快適な滞在を求める人々におすすめのスペースです。</p>
            </div>
            <div class="button_reserve">
              <a href="reserve_form.php">予約手続きへ進む</a>
            </div>
          </div>
          <!-- Plan 3: ソロキャンプサイト(電源なし) -->

          <div class="campsite_article">
            <div class="campsite_top">
              <img src="image/solosite.jpg" alt="" class="site_img">
              <div>
                <h2>ソロキャンプサイト(電源なし)</h2>
              </div>
              <p>¥4,400/拍(税込み)</p>
              <p><i class="fas fa-users"></i> 1~6名</p>
              <p><i class="fas fa-car"></i> 車１台</p>
              <p><i class="fas fa-campground"></i> テント・タープ１張りまで</p>
            </div>
            <div class="text">
              <p>ソロキャンプサイト（電源なし）は、一人で利用することができるキャンプ場です。このキャンプ場では、電源が提供されていないため、自然の中でシンプルな生活を楽しむことができます。テントを張り、寝袋で寝泊まりし、焚火を囲んで食事をしたり、アウトドアアクティビティを楽しむことができます。電源がないため、携帯電話や電化製品の利用は制限されますが、自然の中での静寂な時間を過ごしたい方におすすめのスペースです。</p>
            </div>
            <div class="button_reserve">
              <a href="reserve_form.php">予約手続きへ進む</a>
            </div>
          </div>
        </div>

        <div class="section_right">

        <h1>空室カレンダー</h1>

          <div class="calendar-section">
            
            <h1><?= $thisYear . '年 / ' . $thisMonth . '月' ?></h1>
            
            <table class="calendar">
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
            <?php $d = $objToday->format('j') ?>
            <?php if($dateCount >= $d): ?>
            <td class="day <?= "$thisYear-$thisMonth-$dateCount" == $objToday->format('Y-m-d') ? 'today' : ''; ?>" onclick="showSelectedDate('<?= "$thisYear-$thisMonth-$dateCount" ?>')">
            <?= $dateCount; ?><br>
            〇
            </td>
            <?php else: ?>
              <td  <?= "$thisYear-$thisMonth-$dateCount" == $objToday->format('Y-m-d') ? 'today' : ''; ?>" >
            <?= $dateCount; ?><br>
            -
            </td>
            <?php endif; ?>
            </div>
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
  <script>
    function showSelectedDate(date) {
//        document.getElementById('selectedDateContainer').textContent = date;
document.getElementById('date').value = date;
          // ここで選択された日付を他の要素に表示する処理を行う
    }
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        
        document.getElementById("date").setAttribute("min", today);
    });
</script>
</body>

</html>