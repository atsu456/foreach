<?php
require_once '../../inc/inc_path.php';
require_once '../../func/func.php';
require_once 'foreach_config.php';

$id = (int)$_POST['id'];//削除画面から送信されたIDを受け取る
try{
    //お問い合わせテーブルのレコードを削除
    $db = getDb($dsn, $usr, $passwd);
    $sql = 'DELETE FROM contact WHERE id = :id';
    $stt = $db->prepare($sql);
    $stt->bindValue(':id',$id,PDO::PARAM_INT);
    $stt->execute();
    
    //お問い合わせの種類を削除
    $sql2 = 'DELETE FROM contact_types WHERE contact_id = :id';
    $stt2 = $db->prepare($sql2);
    $stt2->bindValue(':id',$id,PDO::PARAM_INT);
    $stt2->execute();

    //お問い合わせ一覧に遷移
    header('Location:./');
}catch(PDOException $e){
    die("接続エラー：{$e->getMessage()}");
}