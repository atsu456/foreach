<?php
session_start();
//セッション変数を空にする
$_SESSION = [];
//セッションクッキーが存在する場合には破棄
if(isset($_COOKIE[session_name()])){

    //setcookie関数(クッキー名、値、有効期限、有効なパス)
    setcookie(session_name(),'',time()-3600,'/');
}

session_destroy();
header('Location:login.php');