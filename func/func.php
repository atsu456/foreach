<?php

function e(string $str, string $charset = 'UTF-8'): string{
    return htmlspecialchars($str , ENT_QUOTES | ENT_HTML5 , $charset, false);
}

function getDb($dsn,$usr,$passwd) : PDO {
    //データベースへの接続を確立
    $db = new PDO($dsn, $usr, $passwd);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    return $db;
}
//ランダムな文字列の生成
function numbers($num){
    $chars = array();
    $chars = array_flip(
        array_merge(
            range('a','z'),range('A','Z'),range('0','9')
        )
    );
    $contact_number = '';
    for($i=0;$i<$num;$i++){
        $contact_number .= array_rand($chars);
    }
    return $contact_number;
}
