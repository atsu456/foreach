<?php
require_once 'inc/inc_path.php';
require_once 'func/func.php';
require_once 'foreach_config.php';

$date = $_POST['date'];
$stay = $_POST['stay'];
$adult = $_POST['adult'];
$child = $_POST['child'];
$campsite = $_POST['campsite'];

$name_kanji = $_POST['name_kanji'];
$name_kana = $_POST['name_kana'];
$email = $_POST['email'];
$tell = $_POST['tell'];
$postcode = $_POST['postcode'];
$prefecture = $_POST['prefecture'];
$address = $_POST['address'];
$birthdate = $_POST['birthdate'];

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reserve</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.typekit.net/pke3ujd.css">
    <script src="https://kit.fontawesome.com/0fb73e8725.js" crossorigin="anonymous"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
</head>

<body id="reserve_form">

    <?php require_once('header.html'); ?>

    <main>
        <article>
            <?php
            try {
                $db = getDb($dsn, $usr, $passwd);
                $sql = 'INSERT INTO reserve (date,stay,adult,child,campsite,name_kanji,name_kana,email,tell,postcode,prefecture,address,birthdate) VALUES (:date,:stay,:adult,:child,:campsite,:name_kanji,:name_kana,:email,:tell,:postcode,:prefecture,:address,:birthdate)';
                $stt = $db->prepare($sql);
                $stt->bindValue(':date', $date, PDO::PARAM_STR);
                $stt->bindValue(':stay', $stay, PDO::PARAM_STR);
                $stt->bindValue(':adult', $adult, PDO::PARAM_STR);
                $stt->bindValue(':child', $child, PDO::PARAM_STR);
                $stt->bindValue(':campsite', $campsite, PDO::PARAM_STR);

                $stt->bindValue(':name_kanji', $name_kanji, PDO::PARAM_STR);
                $stt->bindValue(':name_kana', $name_kana, PDO::PARAM_STR);
                $stt->bindValue(':email', $email, PDO::PARAM_STR);
                $stt->bindValue(':tell', $tell, PDO::PARAM_STR);
                $stt->bindValue(':postcode', $postcode, PDO::PARAM_STR);
                $stt->bindValue(':prefecture', $prefecture, PDO::PARAM_STR);
                $stt->bindValue(':address', $address, PDO::PARAM_STR);
                $stt->bindValue(':birthdate', $birthdate, PDO::PARAM_STR);
                $stt->execute();
            } catch (PDOException $e) {
                die("接続エラー{$e->getMessage()}");
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
    <script>
        function showSelectedDate(date) {
            //        document.getElementById('selectedDateContainer').textContent = date;
            document.getElementById('date').value = date;
            // ここで選択された日付を他の要素に表示する処理を行う
        }
    </script>
    <script src="js/app.js"></script>
</body>

</html>