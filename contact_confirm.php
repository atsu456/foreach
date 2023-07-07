<?php
require_once 'inc/inc_path.php';
require_once 'func/func.php';
require_once 'foreach_config.php';
require_once 'list/list.php';
$name = e($_POST['name']);
$tel = e($_POST['tel']);
if (isset($_POST['type'])) {
    $type = $_POST['type'];
} else {
    $type = array();
}
$comment = e($_POST['comment']);

?>

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

<body id="contact">
    <div id="container">

        <?php require_once('header.html'); ?>
        <main>
            <article class="contactForm">
                <h1>入力内容の確認</h1>
                <p>入力内容を確認し、「送信するボタン」をクリックしてください。</p>
                <form action="contact_done.php" method="post">
                    <p class="contactForm_p"><label>お名前<br>
                            <?= $name ?>
                            <input type="hidden" name="name" value="<?= $name ?>"></label></p>
                    <p class="contactForm_p"><label>電話番号<br>
                            <?= $tel ?>
                            <input type="hidden" name="tel" value="<?= $tel ?>"></label></p>
                    <p class="contactForm_p">お問い合わせ種類<br>
                        <?php for ($i = 0; $i < count($type); $i++) : ?>
                            <?= $i > 0 ? ',' : '' ?>
                            <input type="hidden" name="type[]" value="<?= $type[$i] ?>">
                            <?= $type_list[$type[$i]] ?>
                        <?php endfor; ?>
                    <p class="contactForm_p"><label>お問い合わせ内容<br>
                            <?= nl2br($comment) ?>
                            <input type="hidden" name="comment" value="<?= $comment ?>"></label></p>
                    <p class="contactForm_p">
                        <input type="submit" value="送信する">
                        <input type="button" value="戻る" onclick="history.back()">
                    </p>
                </form>
            </article>
        </main>
        <?php require_once('footer.html'); ?>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/menu.js"></script>
</body>

</html>