<?php
session_start();
//セッション情報がセットされていなかったらログインページへ
if(!isset($_SESSION['login'])){
	header('Location:../login.php');
}
require_once '../../inc/inc_path.php';
require_once '../../func/func.php';
require_once 'foreach_config.php';
require_once '../../list/list.php';

$id = (int)$_POST['id'];//一覧画面から送信されたIDを受け取る
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
                    <li class="g-nav__item"><a href="#">予約</a></li>
                    <li class="g-nav__item"><a href="#">オンラインショップ</a></li>
                </ul>
            </nav>
        </header>

        <main class="admin_main">
		<article id="admin">
			<h1>削除：お問い合わせ</h1>
			<?php
				try{
					$db = getDb($dsn, $usr, $passwd);
					$sql = 'SELECT * FROM contact WHERE id = :id';
					$stt = $db->prepare($sql);
					$stt->bindValue(':id',$id,PDO::PARAM_INT);
					$stt->execute();
					//1件データを取得する場合はfetch（戻り値は配列）
					$result = $stt->fetch(PDO::FETCH_ASSOC);
					
					//お問い合わせの種類を取得
					$sql2 = 'SELECT * FROM contact_types WHERE contact_id = :id';
					$stt2 = $db->prepare($sql2);
					$stt2->bindValue(':id',$id,PDO::PARAM_INT);
					$stt2->execute();
					//複数件データを取得する場合はfetchAll（二次元配列）	
					$result2 = $stt2->fetchAll(PDO::FETCH_ASSOC);				
			?>

			<dl>
				<dt>ID</dt>
				<dd><?= $result['id'] ?></dd>
				<dt>お名前</dt>
				<dd><?= e($result['name']) ?></dd>
				<dt>電話番号</dt>
				<dd><?= e($result['tel']) ?></dd>
				<dt>お問い合わせの種類</dt>
				<dd>
					<?php
					for($i = 0; $i<count($result2); $i++){
						if($i > 0){
							print ',';	
						}
						$key =  $result2[$i]['type_id'];
						print $type_list[$key] ;
					}
					?>
				</dd>
				<dt>お問い合わせ内容</dt>
				<dd><?= nl2br(e($result['comment'])) ?></dd>
			</dl>
			<form action="delete_done.php" method="post">
				<p>
					<input type="hidden" name="id" value="<?= $result['id'] ?>">
					<input type="submit" value="削除">
					<input type="button" value="戻る" onclick="history.back()">
				</p>
			</form>
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