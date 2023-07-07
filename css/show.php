<?php
session_start();
//セッション情報がセットされていなかったらログインページへ
if (!isset($_SESSION['login'])) {
    header('Location:../login.php');
}

require_once '../inc/inc_path.php';
require_once '../func/func.php';
require_once 'foreach_config.php';

$id = (int)$_POST['id'];
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://use.typekit.net/pke3ujd.css">
    <script src="https://kit.fontawesome.com/0fb73e8725.js" crossorigin="anonymous"></script>
</head>

<body id="top">
    <div id="container">

        <?php require_once('header.html'); ?>

        <main class="admin_main">
            <article id="admin">
                <h1>詳細：ユーザ</h1>
                <?php
                try {
                    $db = getDb($dsn, $usr, $passwd);
                    $sql = 'SELECT * FROM users WHERE id = :id';
                    $stt = $db->prepare($sql);
                    $stt->bindValue(':id', $id, PDO::PARAM_INT);
                    $stt->execute();
                    $result = $stt->fetch(PDO::FETCH_ASSOC);
                ?>
                    <div class="admin">
                        <dl>
                            <dt>ID</dt>
                            <dd><?= $result['id'] ?></dd>
                            <dt>メールアドレス</dt>
                            <dd><?= $result['email'] ?></dd>
                            <dt>パスワード</dt>
                            <dd><?= e($result['password']) ?></dd>
                        </dl>
                        <p><input type="button" value="戻る" onclick="history.back()"></p>
                    </div>
                <?php
                } catch (PDOException $e) {
                    die("接続エラー：{$e->getMessage()}");
                }
                ?>
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
                <li class="ft_links_li"><a href="onlineshop.php">オンラインストア</a></li>
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
</body>

</html>
