<?php
session_start();
$path = '';
$hierarchy_num = array_key_last(explode('/', dirname($_SERVER['PHP_SELF'])));
if ($hierarchy_num > 1) {
    for ($cnt_path = $hierarchy_num; $cnt_path > 1; $cnt_path--) {
        $path .= '../';
    }
}
$img_path = 'image/';

require_once 'func/functions.php';
require_once 'inc/inc_path.php';
require_once 'foreach_config.php';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shop</title>
    <link href="css/slick.css" rel="stylesheet" />
    <link href="css/slick-theme.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.typekit.net/pke3ujd.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

<body id="shop">
    <div id="container">

        <?php require_once('header.html'); ?>

        <main>
            <article>
                <section id="recently" class="contents">
                    <div class="page_description right_flow">
                        <h1 class="title-style">
                            <p class="title-border-left">comming soon</p>
                        </h1>
                    </div>
                </section>
        </main>
        <?php require_once('footer.html'); ?>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/main.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <link rel="stylesheet" href="<?php echo $path; ?>css/style.css">
        <script src="js/menu.js"></script>

</body>

</html>