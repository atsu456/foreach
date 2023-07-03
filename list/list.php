<?php
// お問い合わせの種類
// 配列情報の作成
// $type_list = [1=>'診療・検査について',2=>'その他',];
$type_list =[];

try{
    $db = getDb($dsn,$usr,$passwd);
    $sql = 'SELECT * FROM types ORDER BY id';
    $stt = $db->query($sql);
    $result = $stt->fetchAll(PDO::FETCH_ASSOC);

    // print '<pre>';
    // print_r($result);
    // print '</pre>';

    foreach($result as $data){
        $type_list[$data['id']] = $data['name'];
    }
    // print '<pre>';
    // print_r($type_list);
    // print '</pre>';

}catch(PDOException $e){
    die("接続エラー:{$e->getMessage()}");
}
?>