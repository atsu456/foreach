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

//カレンダー

// タイムゾーンを日本に変更
date_default_timezone_set('Asia/Tokyo');
// 曜日表示用の配列
$weekday = array('日', '月', '火', '水', '木', '金', '土',);
// $weekday = array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat',);

// GETで基準日のデータを受け取れたら値を変数へ格納
$refYear = isset($_GET['refYear']) ? $_GET['refYear'] : '';
$refMonth = isset($_GET['refMonth']) ? $_GET['refMonth'] : '';

// 今日のオブジェクトを生成
$objToday = new DateTime();

// 基準日のオブジェクトを生成
if (empty($refYear) && empty($refMonth)) {
  $objRefDate = new DateTime();
} else {
  $objRefDate = new DateTime("$refYear-$refMonth-1");
}
// 年月日をそれぞれ変数へ格納
$thisYear = $objRefDate->format('Y');
$thisMonth = $objRefDate->format('m');
$thisDate = $objRefDate->format('j');
// 表示用の月を変数へ格納
$thisDisplayMonth_num = $objRefDate->format('n');
$thisDisplayMonth_str = $objRefDate->format('F');
// 曜日を取得
$thisWeekDay = $objRefDate->format('w');
// 当月の総日数を取得
$thisFullDays = $objRefDate->format('t');

// 基準日を元に初日のオブジェクトを生成
$objFirstDateTime = new DateTime("$thisYear-$thisMonth-1");
// 初日の曜日を取得
$thisFirstWeekDay = $objFirstDateTime->format('w');

// 基準日を元に最終日のオブジェクトを生成
$objLastDateTime = new DateTime("$thisYear-$thisMonth-$thisFullDays");
// 最終日の曜日を取得
$thisLastWeekDay = $objLastDateTime->format('w');

// 前月のオブジェクトを生成
$objPrevMonth = new DateTime("$thisYear-$thisMonth-1 -1 Months");
// 次月のオブジェクトを生成
$objNextMonth = new DateTime("$thisYear-$thisMonth-1 +1 Months");