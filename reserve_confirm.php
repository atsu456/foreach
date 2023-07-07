<?php
require_once 'inc/inc_path.php';
require_once 'func/func.php';
require_once 'foreach_config.php';
// フォームデータの受け取り
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

$date2 = (explode('-', $date));
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
    <script src="js/jquery-3.2.1.min.js"></script>
</head>

<body id="reserve_form">
    <?php require_once('header.html'); ?>
    <main>
        <article>

            <form action="reserve_done.php" method="post">
                <h1>予約サイト情報</h1>
                <p><label for="date">到着日　:　<?= $date2[0] . '年' . $date2[1] . '月' . $date2[2] . '日' ?></label>
                    <input type="hidden" id="date" name="date" value="<?= $date ?>">
                </p>

                <p><label for="stay">宿泊数　:　<?= $stay ?>人</label>
                    <input type="hidden" id="stay" name="stay" value="<?= $stay ?>">
                </p>

                <p><label for="adult">大人　:　<?= $adult ?>人</label>
                    <input type="hidden" id="adult" name="adult" value="<?= $adult ?>">
                </p>

                <p><label for="child">子供　:　<?= $child ?>人</label>
                    <input type="hidden" id="child" name="child" value="<?= $child ?>">
                </p>

                <p><label for="campsite">キャンプサイトの種類　:　<?= $campsite ?></label>
                    <input type="hidden" id="campsite" name="campsite" value="<?= $campsite ?>">
                </p>
            </form>

            <form action="reserve_done.php" method="post">
                <h1>代表者様のご連絡先</h1><br>
                <label for="name_kanji">氏名（漢字）　:　<?= $name_kanji ?></label>
                <input type="hidden" id="name_kanji" name="name_kanji" value="<?= $name_kanji ?>"><br>

                <label for="name_kana">氏名（カナ）　:　<?= $name_kana ?></label>
                <input type="hidden" id="name_kana" name="name_kana" value="<?= $name_kana ?>"><br>

                <label for="email">メールアドレス　:　<?= $email ?></label>
                <input type="hidden" id="email" name="email" value="<?= $email ?>"><br>

                <label for="tell">当日ご連絡のつく電話番号　:　<?= $tell ?></label>
                <input type="hidden" id="tell" name="tell" value="<?= $tell ?>"><br>

                <label for="postcode">郵便番号　:　<?= $postcode ?></label>
                <input type="hidden" id="postcode" name="postcode" value="<?= $postcode ?>"><br>

                <label for="prefecture">都道府県　:　<?= $prefecture ?></label>
                <input type="hidden" id="prefecture" name="prefecture" value="<?= $prefecture ?>"><br>

                <label for="address">住所　:　<?= $address ?></label>
                <input type="hidden" id="address" name="address" value="<?= $address ?>"><br>

                <label for="birthdate">生年月日　:　<?= $birthdate ?></label>
                <input type="hidden" id="birthdate" name="birthdate" value="<?= $birthdate ?>"><br>

                <button type="submit">予約確定</button>
            </form>
        </article>
    </main>
    <?php require_once('footer.html'); ?>
    <script>
        function showSelectedDate(date) {
            //        document.getElementById('selectedDateContainer').textContent = date;
            document.getElementById('date').value = date;
            // ここで選択された日付を他の要素に表示する処理を行う
        }
    </script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/menu.js"></script>

</body>

</html>