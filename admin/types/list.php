<?php
//お問い合わせの種類
//配列情報の作成
$type_list = [];

try {
    $db = getDb($dsn, $usr, $passwd);
    $sql = 'SELECT * FROM types ORDER BY id';
    $stt = $db->query($sql);
    $result = $stt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $date) {
        $type_list[$date['id']] = $date['name'];
    }
} catch (PDOException $e) {
    die("接続エラー：{$e->getMessage()}");
}
