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

$password = htmlspecialchars_decode($_POST['password'],ENT_QUOTES);

$id = (int)$_POST['id'];
//print $password . '<br>';
//print $password_hash . '<br>';

try{
    $db = getDb($dsn,$usr,$passwd);
    //emailとIDを検索条件にしてusersテーブルを検索する
    $sql0 ='SELECT * FROM users WHERE email=:email AND id=:id';
    $stt0 = $db->prepare($sql0);
    $stt0->bindValue(':email',$email,PDO::PARAM_STR);
    $stt0->bindValue(':id',$id,PDO::PARAM_INT);
    $stt0->execute();
    $result = $stt0->fetch(PDO::FETCH_ASSOC);

    //print_r($result);//検索結果があったら表示される
    //print '<br>';
    //更新処理
    $sql = 'UPDATE users SET ';
    //emailが変更された時のみ変更する
    if(!$result){
        $sql .= 'email = :email,';
    }
    //パスワードが入力されたときのみ変更する
    if($password != ''){
        $sql .= 'password = :password,';
    }
    $sql .='name=:name WHERE id = :id';

    //print $sql;
    $stt = $db->prepare($sql);
    if(!$result){
        $stt->bindValue(':email',$email,PDO::PARAM_STR);
    }
    if($password != ''){
        //パスワードはハッシュ化する
        $password_hash = password_hash($password,PASSWORD_DEFAULT);
        $stt->bindValue(':password',$password_hash,PDO::PARAM_STR);
    }
    $stt->bindValue(':name',$name,PDO::PARAM_STR);
    $stt->bindValue(':id',$id,PDO::PARAM_INT);
    $stt->execute();
    header('Location:./');
}catch(PDOException $e){
    die("接続エラー：{$e->getMessage()}");
}