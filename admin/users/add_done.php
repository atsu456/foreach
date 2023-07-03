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
$email = htmlspecialchars_decode($_POST['email'],ENT_QUOTES);
//パスワードはハッシュ化する
$password = htmlspecialchars_decode($_POST['password'],ENT_QUOTES);
$password_hash = password_hash($password,PASSWORD_DEFAULT);

//print $password . '<br>';
//print $password_hash . '<br>';

try{
    $db = getDb($dsn,$usr,$passwd);
    $sql = 'INSERT INTO users (name,email,password) VALUES (:name, :email,:password)';
    $stt = $db->prepare($sql);
    $stt->bindValue(':name',$name,PDO::PARAM_STR);
    $stt->bindValue(':email',$email,PDO::PARAM_STR);
    $stt->bindValue(':password',$password_hash,PDO::PARAM_STR);
    $stt->execute();
    header('Location:./');
}catch(PDOException $e){
    die("接続エラー：{$e->getMessage()}");
}