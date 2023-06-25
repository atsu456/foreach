<?php
session_start();
require_once '../inc/inc_path.php';
require_once '../func/func.php';
require_once 'foreach_config.php';

$email = $_POST['email'];
$password = $_POST['password'];

try{
    $db = getDb($dsn, $usr, $passwd);
    $sql = 'SELECT * FROM users WHERE email = :email';
    $stt = $db->prepare($sql);
    $stt->bindValue(':email', $email, PDO::PARAM_STR);
    $stt->execute();
    $result = $stt->fetch(PDO::FETCH_ASSOC);

    if(!$result){
        $_SESSION['message'] = '入力データが違います';
        header('Location:login.php');
        exit;
    }

    $pass_h = password_verify($password,$result['password']);

    if(!$pass_h){
        $_SESSION['message'] = '入力データが違います';
        header('Location:login.php');
        exit;
    }

    $_SESSION['login'] = session_id();
    $_SESSION['login_name'] = $result['name'];
    header('Location:./');

}catch(PDOException $e){
    die("接続エラー：{$e->getMessage()}");
}