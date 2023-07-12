<?php
require_once 'inc/inc_path.php';
require_once 'foreach_config.php';
require_once 'func/func.php';
require_once 'list/list.php';

$name = htmlspecialchars_decode($_POST['name'], ENT_QUOTES);
$tel = htmlspecialchars_decode($_POST['tel'], ENT_QUOTES);
$type = (isset($_POST['type']) ? $_POST['type'] : array());
$comment = htmlspecialchars_decode($_POST['comment'], ENT_QUOTES);

$contact_number = numbers(64);
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

<body id="top">
    <div id="container">

    <?php require_once('header.html'); ?>
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
                <div class="contact_end">
                    <h1>お問い合わせが完了しました。</h1>
                    <p>スタッフよりご連絡差し上げますので、今しばらくお待ちください。</p>
                </div>
            </article>
        </main>
        <?php require_once('footer.html'); ?>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/menu.js"></script>
</body>

</html>