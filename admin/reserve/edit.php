<?php
session_start();
//セッション情報がセットされていなかったらログインページへ
if (!isset($_SESSION['login'])) {
    header('Location:../login.php');
}
require_once '../../inc/inc_path.php';
require_once '../../func/func.php';
require_once 'foreach_config.php';

$id = (int)$_POST['id']; //一覧画面から送信されたIDを受け取る
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
            <h1 class="header__logo"><a href="../../index.php"><img src="../../image/camplogo.svg" alt="foreach campground"></a></h1>
            <div class="t-nav">
                <nav id="g-nav">
                    <ul class="nav">
                        <li class="g-nav__item"><a href="../../reserve.php">予約</a></li>
                        <li class="g-nav__item"><a href="../../onlineshop.php">オンラインショップ</a></li>
                    </ul>
                </nav>
                <button class="hamburger-menu" id="js-hamburger-menu">
                    <span class="hamburger-menu__bar"></span>
                    <span class="hamburger-menu__bar"></span>
                    <span class="hamburger-menu__bar"></span>
                </button>
            </div>
            <nav class="navigation">
                <ul class="navigation__list">
                    <li class="navigation__list-item"><a href="../../news.php" class="navigation__link">NEWS</a></li>
                    <li class="navigation__list-item"><a href="../../facility.php" class="navigation__link">FACILITY</a></li>
                    <li class="navigation__list-item"><a href="../../onlineshop.php" class="navigation__link">ONLINE SHOP</a></li>
                    <li class="navigation__list-item"><a href="../../access.php" class="navigation__link">ACCESS</a></li>
                    <li class="navigation__list-item"><a href="../../contact.php" class="navigation__link">CONTACT</a></li>
                </ul>
            </nav>
        </header>
        <main class="admin_main">
            <article id="admin">
                <h1>編集：ユーザ</h1>
                <?php
                try {
                    $db = getDb($dsn, $usr, $passwd);
                    $sql = 'SELECT * FROM reserve WHERE id = :id';
                    $stt = $db->prepare($sql);
                    $stt->bindValue(':id', $id, PDO::PARAM_INT);
                    $stt->execute();
                    $result = $stt->fetch(PDO::FETCH_ASSOC);
                ?>
                    <div class="admin">
                        <form action="edit_done.php" method="post">
                        <dl>
    <dt><label for="date">到着日</label></dt>
    <dd>
        <input type="date" name="date" id="date" value="<?= $result['date'] ?>">
        <input type="date" name="previous_date" id="previous_date" value="<?= $result['date'] ?>" disabled>
    </dd>
    <dt><label for="name_kanji">名前(漢字)</label></dt>
    <dd>
        <input type="text" name="name_kanji" id="name_kanji" value="<?= $result['name_kanji'] ?>">
        <input type="text" name="previous_name_kanji" id="previous_name_kanji" value="<?= $result['name_kanji'] ?>" disabled>
    </dd>
    <dt><label for="name_kana">名前(カナ)</label></dt>
    <dd>
        <input type="text" name="name_kana" id="name_kana" value="<?= $result['name_kana'] ?>">
        <input type="text" name="previous_name_kana" id="previous_name_kana" value="<?= $result['name_kana'] ?>" disabled>
    </dd>
    <dt><label for="stay">宿泊数</label></dt>
    <dd>
        <input type="number" name="stay" id="stay" value="<?= $result['stay'] ?>">
        <input type="number" name="previous_stay" id="previous_stay" value="<?= $result['stay'] ?>" disabled>
    </dd>
    <dt><label for="adult">大人人数</label></dt>
    <dd>
        <input type="number" name="adult" id="adult" value="<?= $result['adult'] ?>">
        <input type="number" name="previous_adult" id="previous_adult" value="<?= $result['adult'] ?>" disabled>
    </dd>
    <dt><label for="child">子供人数</label></dt>
    <dd>
        <input type="number" name="child" id="child" value="<?= $result['child'] ?>">
        <input type="number" name="previous_child" id="previous_child" value="<?= $result['child'] ?>" disabled>
    </dd>
    <dt><label for="campsite">キャンプサイトの種類</label></dt>
    <dd>
                    <select id="campsite" name="campsite" value="<?= $result['campsite'] ?>">
                    <option value="フリーサイト(電源なし)">フリーサイト(電源なし)</option>
                    <option value="区画電源オートサイト(電源あり)">区画電源オートサイト(電源あり)</option>
                    <option value="ソロキャンプサイト(電源なし)">ソロキャンプサイト(電源なし)</option>
                    </select>
        <input type="text" name="previous_campsite" id="previous_campsite" value="<?= $result['campsite'] ?>" disabled>
    </dd>
    <dt><label for="email">メールアドレス</label></dt>
    <dd>
        <input type="email" name="email" id="email" value="<?= $result['email'] ?>">
        <input type="email" name="previous_email" id="previous_email" value="<?= $result['email'] ?>" disabled>
    </dd>
    <dt><label for="tell">電話番号</label></dt>
    <dd>
        <input type="tel" name="tell" id="tell" value="<?= $result['tell'] ?>">
        <input type="tel" name="previous_tell" id="previous_tell" value="<?= $result['tell'] ?>" disabled>
    </dd>
    <dt><label for="postcode">郵便番号</label></dt>
    <dd>
        <input type="text" name="postcode" id="postcode" value="<?= $result['postcode'] ?>">
        <input type="text" name="previous_postcode" id="previous_postcode" value="<?= $result['postcode'] ?>" disabled>
    </dd>
    <dt><label for="prefecture">都道府県</label></dt>
    <dd>
        <input type="text" name="prefecture" id="prefecture" value="<?= $result['prefecture'] ?>">
        <input type="text" name="previous_prefecture" id="previous_prefecture" value="<?= $result['prefecture'] ?>" disabled>
    </dd>
    <dt><label for="address">住所</label></dt>
    <dd>
        <input type="text" name="address" id="address" value="<?= $result['address'] ?>">
        <input type="text" name="previous_address" id="previous_address" value="<?= $result['address'] ?>" disabled>
    </dd>
    <dt><label for="birthdate">生年月日</label></dt>
    <dd>
        <input type="date" name="birthdate" id="birthdate" value="<?= $result['birthdate'] ?>">
        <input type="date" name="previous_birthdate" id="previous_birthdate" value="<?= $result['birthdate'] ?>" disabled>
    </dd>
</dl>
<div class="adminBtn">
                                <input type="hidden" name="id" id="id" value="<?= $result['id'] ?>">
                                <input type="submit" value="編集する">
                                <input type="button" value="戻る" onclick="history.back()">
</div>
                        </form>
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
                    <li class="ft__add"><span class="ft__name">foreach camp ground</span></li>
                    <li class="ft__add">〒888-8888</li>
                    <li class="ft__add">福岡県福岡市東区888-88</li>
                    <li class="ft__add">0493-81-6166</li>
                </ul>
                <ul class="ft_links_ul">
                    <li class="ft_links_li"><a href="../../reserve.php">予約</a></li>
                    <li class="ft_links_li"><a href="../../news.php">お知らせ</a></li>
                    <li class="ft_links_li"><a href="../../facility.php">施設紹介</a></li>
                    <li class="ft_links_li"><a href="../../onlineshop.php">オンラインストア</a></li>
                    <li class="ft_links_li"><a href="../../access.php">アクセス</a></li>
                </ul>
                <ul class="ft_links_ul">
                    <li class="ft_links_li"><a href="../../contact.php">お問い合わせ</a></li>
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
        <script src="../../js/jquery-3.3.1.min.js"></script>
        <script src="../../js/menu.js"></script>
</body>

</html>