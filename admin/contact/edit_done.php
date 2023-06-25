<?php
require_once '../../inc/inc_path.php';
require_once '../../func/func.php';
require_once 'foreach_config.php';

$id = (int)$_POST['id'];//編集画面から送信されたIDを受け取る

$name = $_POST['name'];
$tel = $_POST['tel'];
$type = ( isset($_POST['type']) ? $_POST['type'] : array() );
$comment= $_POST['comment'];
$contact_number = $_POST['contact_number'];

try{
    $db = getDb($dsn,$usr,$passwd);
    //お問い合わせを上書きする
    $sql = 'UPDATE contact SET name = :name, tel = :tel ,comment = :comment WHERE id = :id';
    $stt = $db->prepare($sql);
    $stt->bindValue(':name',$name, PDO::PARAM_STR);
    $stt->bindValue(':tel',$tel, PDO::PARAM_STR);
    $stt->bindValue(':comment',$comment, PDO::PARAM_STR);
    $stt->bindValue(':id',$id, PDO::PARAM_INT);
    $stt->execute();

    //今まで登録されていたお問い合わせの種類を削除する
    $sql2 = 'DELETE FROM contact_types WHERE contact_id = :id';
    $stt2 = $db->prepare($sql2);
    $stt2->bindValue(':id',$id,PDO::PARAM_INT);
    $stt2->execute();

    //お問い合わせの種類にチェックがある場合のみ実行
    if(count($type) > 0){
        //お問い合わせの種類を登録する
        $sql3 = 'INSERT INTO contact_types (contact_id,type_id,contact_number) VALUES  ';
        for($i = 0; $i < count($type); $i++){
            if($i > 0){
                $sql3 .= ',';	
            }
            //contact_idは編集画面より渡されたIDを使用する
            $sql3 .= "({$id},{$type[$i]},'{$contact_number}')";
        }
        $stt3 = $db->query($sql3);
    }
 
    header('Location:./');
}catch(PDOException $e){
    die("接続エラー{$e->getMessage()}");
}