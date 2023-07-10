<?php
session_start();
//セッション情報がセットされていなかったらログインページへ
if(!isset($_SESSION['login'])){
	header('Location:../login.php');
}
require_once '../../inc/inc_path.php';
require_once '../../func/func.php';
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
    header('Location:./');
}catch(PDOException $e){
    die("接続エラー：{$e->getMessage()}");
}