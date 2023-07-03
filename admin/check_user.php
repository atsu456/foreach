<?php
session_start();       //セッションを使用する
require_once '../inc/inc_path.php';
require_once '../func/func.php';
require_once '../../foreach_config.php';


$email = $_POST['email'];
$password = $_POST['password'];

try{
    //emailアドレスを検索条件にしてusersテーブルを検索
    $db = getDb($dsn, $usr, $passwd);
    $sql = 'SELECT * FROM users WHERE email = :email';
    $stt = $db->prepare($sql);
    $stt->bindValue(':email', $email, PDO::PARAM_STR);
    $stt->execute();
    $result = $stt->fetch(PDO::FETCH_ASSOC);

    // print '<pre>';
    // print_r($result);
    // print '</pre>';

    //(2)該当するレコードが存在しない場合
    if(!$result){
        $_SESSION['message'] = '入力データが違います';
        header('Location:login.php');
        exit;
    }

    //(3)該当するレコードが存在する場合、パスワードが正しいかチェックする
    $pass_h = password_verify($password,$result['password']);
    // ↑パスワードが正しい場合、true 正しくない場合、falsaが入る
    
    // (4)パスワードが正しくない場合
    if(!$pass_h){
        $_SESSION['message'] = '入力データが違います';
        header('Location:login.php');
        exit;
}
// (5)パスワードが正しい場合
     $_SESSION['login'] = session_id(); //セッションIDを保持する
     $_SESSION['login_name']=$result['name'];
     header('Location:./');

}catch(PDOException $e){
    die("接続エラー：{$e->getMessage()}");
}

// if($email == 'admin@test.co.jp' && $password == 'adminpass'){
//     // メールとパスワードが正しい場合
//     $_SESSION['login'] = session_id(); //セッションIDを保持する
//     header('Location:./');
// }else{
//     // メールとパスワードが正しいくなかった場合
//     $_SESSION['message'] = '入力データが違います';
//     header('Location:login.php');
// }