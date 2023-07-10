<?php
session_start();
//セッション情報がセットされていなかったらログインページへ
if(!isset($_SESSION['login'])){
	header('Location:../login.php');
}
require_once '../../inc/inc_path.php';
require_once '../../func/func.php';
require_once 'foreach_config.php';

$id = (int)$_POST['id'];
$title = $_POST['title'];
$topics_date = $_POST['topics_date'];
$article = $_POST['article'];
$news_image = $_POST['news_image'];


try{
    $db = getDb($dsn,$usr,$passwd);
    $sql = 'INSERT INTO news (title,topics_date,article,news_image) VALUES (:title, :topics_date,:article,:news_image)';
    $stt = $db->prepare($sql);
    $stt->bindValue(':title',$title,PDO::PARAM_STR);
    $stt->bindValue(':topics_date',$topics_date,PDO::PARAM_STR);
    $stt->bindValue(':article',$article,PDO::PARAM_STR);
    $stt->bindValue(':news_image',$news_image,PDO::PARAM_STR);

    $stt->execute();
    header('Location:./');
}catch(PDOException $e){
    die("接続エラー：{$e->getMessage()}");
}