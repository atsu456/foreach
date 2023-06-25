<?php
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
    <title>news</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rammetto+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.typekit.net/pke3ujd.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slick-theme.css">
    <scrip src="https://kit.fontawesome.com/0fb73e8725.js" crossorigin="anonymous"></script>
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
        <article class="news_detail">
			<?php
			try{
				$db = getDb( $dsn, $usr, $passwd);
				$sql = 'SELECT * FROM news ORDER BY topics_date DESC LIMIT 3';
				$stt = $db->prepare($sql);
				$stt->execute();
				$result = $stt->fetchAll(PDO::FETCH_ASSOC);
			?>
			<?php foreach($result as $row): ?>
				<?php
					$topics_array = explode('-',$row['topics_date']);
				?>
				<p>
                    <h3><?= nl2br(e($row['title'])) ?></h3>
					<time datetime="<?= $row ['topics_date'] ?>"><?= $topics_array[0] ?>年<?= $topics_array[1] ?>月<?= $topics_array[2] ?>日</time>
                    <br>
                    <?= nl2br(e($row['article'])) ?>
				</p>	
			<?php endforeach; ?>
			<?php
			}catch(PDOException $e){
				die("接続エラー：{$e->getMessage()}");
			}
			?>
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