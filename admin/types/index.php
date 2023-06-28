<?php
session_start();
if(!isset($_SESSION['login'])){
	header('Location:login.php');
}
require_once '../../inc/inc_path.php';
require_once '../../func/func.php';
require_once 'foreach_config.php';
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
            <h1 class="header__logo"><a href="#"><img src="../../image/camplogo.svg" alt="foreach campground"></a></h1>
            <nav id="g-nav">
                <ul class="nav">
                    <li class="g-nav__item"><a href="reserve.php">予約</a></li>
                    <li class="g-nav__item"><a href="shop.php">オンラインショップ</a></li>
                </ul>
            </nav>
        </header>

        <main class="admin_main">
		<article id="admin">
			<h1>管理：お問い合わせ種類</h1>
			<p class="add"><a href="add.php">新規登録</a></p>
			<?php
				try{
					$db = getDb($dsn, $usr, $passwd);
					$sql = 'SELECT * FROM types ORDER BY id';
					$stt = $db->query($sql);
					$result = $stt->fetchAll(PDO::FETCH_ASSOC);
			?>
			<table class="admin_tb">
				<thead>
					<tr>
						<th>ID</th>
						<th>項目名</th>
						<th>操作</th>
					</tr>
				</thead>
				<?php foreach($result as $row): ?>
					<tr>
						<td><?= $row['id'] ?></td>
						<td><?= e($row['name']) ?></td>
						<td>
							<form action="edit.php" method="post">
								<input type="hidden" name="id" value="<?= $row['id'] ?>">
								<input type="submit" value="編集">
							</form>
							<form action="delete.php" method="post">
								<input type="hidden" name="id" value="<?= $row['id'] ?>">
								<input type="submit" value="削除">
							</form>
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
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
                    <li class="ft__logo"><a href="#"><img src="../../image/camplogo.svg" alt="foreach campground"></a></li>
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
                    <li class="ft_links_li"><a href="contact.php">お問い合わせ</a></li>
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