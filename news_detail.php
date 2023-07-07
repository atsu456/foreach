<?php
require_once 'inc/inc_path.php';
require_once 'foreach_config.php';
require_once 'func/func.php';
$id = $_GET['id'];
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
    <scrip src="https://kit.fontawesome.com/0fb73e8725.js" crossorigin="anonymous">
        </script>
        <style type="text/css">
        </style>

</head>

<body id="news">
    <div id="container">
        <?php require_once('header.html'); ?>
        <main>
            <article class="news_detail">
                <?php
                try {
                    $db = getDb($dsn, $usr, $passwd);
                    $sql = 'SELECT * FROM news WHERE id = :id';
                    $stt = $db->prepare($sql);
                    $stt->bindParam(':id', $id);
                    $stt->execute();
                    $row = $stt->fetch(PDO::FETCH_ASSOC);
                ?>
                    <?php if ($row) { ?>
                        <h2><?= e($row['title']) ?></h2><br>
                        <img src="<?= 'image/' . $row['news_image'] ?>" alt="">
                        <p><?= date("Y年m月d日", strtotime($row['topics_date'])) ?></p>
                        <p><?= e($row['article']) ?></p>
                    <?php } else {
                        echo 'newsが見つかりませんでした。';
                    }
                    ?>
                <?php
                } catch (PDOException $e) {
                    die("接続エラー：{$e->getMessage()}");
                }
                ?>
            </article>
        </main>
        <?php require_once('footer.html'); ?>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/app.js"></script>
        <script src="js/menu.js"></script>
</body>

</html>