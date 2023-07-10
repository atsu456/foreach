<?php
session_start();
// セッション情報がセットされていなかったらログインページへリダイレクト
if (!isset($_SESSION['login'])) {
    header('Location: ../login.php');
    exit(); // スクリプトの実行を停止するために exit 文を追加
}

require_once '../../inc/inc_path.php';
require_once '../../func/func.php';
require_once 'foreach_config.php';

$id = (int)$_POST['id']; // 編集フォームから送信された ID を受け取る

// フォームの送信を処理する
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // フォームデータを取得する
    $date = $_POST['date'];
    $name_kanji = $_POST['name_kanji'];
    $name_kana = $_POST['name_kana'];
    $stay = (int)$_POST['stay'];
    $adult = (int)$_POST['adult'];
    $child = (int)$_POST['child'];
    $campsite = $_POST['campsite'];
    $email = $_POST['email'];
    $tell = $_POST['tell'];
    $postcode = $_POST['postcode'];
    $prefecture = $_POST['prefecture'];
    $address = $_POST['address'];
    $birthdate = $_POST['birthdate'];

    try {
        $db = getDb($dsn, $usr, $passwd);

        // データベース内のユーザ情報を更新する
        $sql = 'UPDATE reserve SET
                date = :date,
                name_kanji = :name_kanji,
                name_kana = :name_kana,
                stay = :stay,
                adult = :adult,
                child = :child,
                campsite = :campsite,
                email = :email,
                tell = :tell,
                postcode = :postcode,
                prefecture = :prefecture,
                address = :address,
                birthdate = :birthdate
                WHERE id = :id';

        $stt = $db->prepare($sql);
        $stt->bindValue(':date', $date, PDO::PARAM_STR);
        $stt->bindValue(':name_kanji', $name_kanji, PDO::PARAM_STR);
        $stt->bindValue(':name_kana', $name_kana, PDO::PARAM_STR);
        $stt->bindValue(':stay', $stay, PDO::PARAM_INT);
        $stt->bindValue(':adult', $adult, PDO::PARAM_INT);
        $stt->bindValue(':child', $child, PDO::PARAM_INT);
        $stt->bindValue(':campsite', $campsite, PDO::PARAM_STR);
        $stt->bindValue(':email', $email, PDO::PARAM_STR);
        $stt->bindValue(':tell', $tell, PDO::PARAM_STR);
        $stt->bindValue(':postcode', $postcode, PDO::PARAM_STR);
        $stt->bindValue(':prefecture', $prefecture, PDO::PARAM_STR);
        $stt->bindValue(':address', $address, PDO::PARAM_STR);
        $stt->bindValue(':birthdate', $birthdate, PDO::PARAM_STR);
        $stt->bindValue(':id', $id, PDO::PARAM_INT);
        
        $stt->execute();
        header('Location:./');

        

    } catch (PDOException $e) {
        die("接続エラー：{$e->getMessage()}");
    }
}
?>