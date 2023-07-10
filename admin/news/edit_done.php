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


if($image_data == '') {
    $image_data = $_POST['image_before'];
}

try{
    $db = getDb($dsn,$usr,$passwd);
    $sql = 'UPDATE news SET title = :title, topics_date = :topics_date, article = :article, news_image = :news_image WHERE id = :id';
    $stt = $db->prepare($sql);
    $stt->bindValue(':title',$title,PDO::PARAM_STR);
    $stt->bindValue(':topics_date',$topics_date,PDO::PARAM_STR);
    $stt->bindValue(':article',$article,PDO::PARAM_STR);
    $stt->bindValue(':news_image',$news_image,PDO::PARAM_STR);

    $stt->bindValue(':id',$id,PDO::PARAM_INT);
    $stt->execute();
    header('Location:./');
}catch(PDOException $e){
    die("接続エラー：{$e->getMessage()}");
}