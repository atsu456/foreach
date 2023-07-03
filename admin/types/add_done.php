<?php
session_start();
//セッション情報がセットされていなかったらログインページへ
if(!isset($_SESSION['login'])){
	header('Location:../login.php');
}
require_once '../../inc/inc_path.php';
require_once '../../func/func.php';
require_once 'foreach_config.php';

$name = htmlspecialchars_decode($_POST['name'],ENT_QUOTES);

try{
    $db = getDb($dsn,$usr,$passwd);
    $sql = 'INSERT INTO types (name) VALUES (:name)';
    $stt = $db->prepare($sql);
    $stt->bindValue(':name',$name,PDO::PARAM_STR);
    $stt->execute();
    header('Location:./');
}catch(PDOException $e){
    die("接続エラー：{$e->getMessage()}");
}