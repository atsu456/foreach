<?php
require_once 'inc/inc_path.php';
require_once 'func/func.php';
require_once 'foreach_config.php';
require_once 'list/list.php';
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
                <form action="contact_confirm.php" method="post">
                    <p class="contactForm_p"><label>お名前（必須）<br>
                            <input type="text" name="name" required></label></p>
                    <p class="contactForm_p"><label>電話番号（必須）<br>
                            <input type="tel" name="tel" required></label></p>
                    <p class="contactForm_p">お問い合わせの種類<br>
                        <?php foreach ($type_list as $key => $value) : ?>
                            <label><input type="checkbox" name="type[]" value="<?= $key ?>"><?= $value ?></label>
                        <?php endforeach; ?>
                    </p>
                    <p class="contactForm_p"><label>お問い合わせの内容<br>
                            <textarea name="comment"></textarea></label></p>
                    <p class="contactForm_p">
                        <input type="submit" value="確認する">
                    </p>
                </form>
            </article>
        </main>
        <?php require_once('footer.html'); ?>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/menu.js"></script>
</body>

</html>