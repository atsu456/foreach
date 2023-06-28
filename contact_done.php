<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.typekit.net/pke3ujd.css">
    <script src="https://kit.fontawesome.com/0fb73e8725.js" crossorigin="anonymous"></script>
</head>

<body id="top">
    <div id="container">

        <header class="header">
            <h1 class="header__logo"><a href="#"><img src="image/camplogo.svg" alt="foreach campground"></a></h1>
            <nav id="g-nav">
                <ul class="nav">
                    <li class="g-nav__item"><a href="reserve.php">予約</a></li>
                    <li class="g-nav__item"><a href="shop.php">オンラインショップ</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <article>
                <?php
                try {
                    $db = getDb($dsn, $usr, $passwd);
                    $sql = 'INSERT INTO contact (name,tel,comment,contact_number) VALUES (:name,:tel,:comment,:contact_number)';
                    $stt = $db->prepare($sql);
                    $stt->bindValue(':name', $name, PDO::PARAM_STR);
                    $stt->bindValue(':tel', $tel, PDO::PARAM_STR);
                    $stt->bindValue(':comment', $comment, PDO::PARAM_STR);
                    $stt->bindValue(':contact_number', $contact_number, PDO::PARAM_STR);
                    $stt->execute();

                    if (count($type) > 0) {
                        $sql2 = 'SELECT id FROM contact WHERE contact_number = :contact_number';
                        $stt2 = $db->prepare($sql2);
                        $stt2->bindValue(':contact_number', $contact_number, PDO::PARAM_STR);
                        $stt2->execute();
                        $result = $stt2->fetch(PDO::FETCH_ASSOC);

                        $sql3 = 'INSERT INTO contact_types (contact_id,type_id,contact_number) VALUES  ';
                        for ($i = 0; $i < count($type); $i++) {
                            if ($i > 0) {
                                $sql3 .= ',';
                            }
                            $sql3 .= "({$result['id']},{$type[$i]},'{$contact_number}')";
                        }
                        $stt3 = $db->query($sql3);
                    }
                } catch (PDOException $e) {
                    die("接続エラー{$e->getMessage()}");
                }
                ?>
                <h1>お問い合わせが完了しました。</h1>
                <p>スタッフよりご連絡差し上げますので、今しばらくお待ちください。</p>
                <button><a href="index.php "></a>HOME</button>
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
</body>

</html>
