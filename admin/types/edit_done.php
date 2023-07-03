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
$name = $_POST['name'];

try{
    $db = getDb($dsn,$usr,$passwd);
    $sql = 'UPDATE types SET name = :name WHERE id = :id ';
    $stt = $db->prepare($sql);
    $stt->bindValue(':name',$name,PDO::PARAM_STR);
    $stt->bindValue(':id',$id,PDO::PARAM_INT);
    $stt->execute();
    header('Location:./');
}catch(PDOException $e){
    die("接続エラー：{$e->getMessage()}");
}