<?php

// function e(string $str, string $charset = 'UTF-8'): string{
//     return htmlspecialchars($str, ENT_QUOTES | ENT_HTML5, $charset, false);
// }

// function getDb($dsn,$usr,$passwd) : PDO {

//     // データベースの接続を確立
//     $db = new PDO($dsn, $usr, $passwd);
//     $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//     return $db;
// }
// //ランダムな文字列の生成
// function numbers($num){
//     $chars = array();
//     $chars = array_flip(
//         array_merge(
//             range('a','z'),range('A','Z'),range('0','9')
//         )
//     );
//     $contact_number = '';
//     for($i=0;$i<$num;$i++){
//         $contact_number .= array_rand($chars);
//     }
//     return $contact_number;
// }
// 画像のデータベースに接続
function connectDB() {
    $param = 'mysql:dbname=foreach;host=localhost';
    try {
        $pdo = new PDO($param, 'root', 'root');
        return $pdo;

    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}

//カート
function h($str): string
{
  return htmlspecialchars($str, ENT_QUOTES, 'utf-8');
}

function getDB($dsn, $user, $pass): PDO
{
  $dbh = new PDO($dsn, $user, $pass);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $dbh;
}

function numbers($num): string
{
  $chars = array();
  $chars = array_flip(
    array_merge(
      range('a', 'z'),
      range('A', 'Z'),
      range('0', '9')
    )
  );
  $contact_number = '';
  for ($i = 0; $i < $num; $i++) {
    $contact_number .= array_rand($chars);
  }
  return $contact_number;
}

function convert_date($date, $format): string
{
  return date($format, strtotime($date));
}

function calc_totals()
{
  foreach ($_SESSION['cart']['item'] as $item) {
    $_SESSION['cart']['total_price'] += $item['subtotal'];
    $_SESSION['cart']['total_quantity'] += $item['quantity'];
  }
}

//カレンダー

// タイムゾーンを日本に変更
date_default_timezone_set('Asia/Tokyo');
// 曜日表示用の配列
$weekday = array('日', '月', '火', '水', '木', '金', '土',);
// $weekday = array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat',);

// 今日のオブジェクト
$objRefDate = new DateTime();

$thisYear = $objRefDate->format('Y');
$thisMonth = $objRefDate->format('n');
$thisDate = $objRefDate->format('j');
// 当月の総日数
$thisFullDays = $objRefDate->format('t');
// 初日の曜日
$objFirstDateTime = new DateTime("$thisYear-$thisMonth-1");
$thisFirstWeekDay = $objFirstDateTime->format('w');
// 最終日の曜日
$objLastDateTime = new DateTime("$thisYear-$thisMonth-$thisFullDays");
$thisLastWeekDay = $objLastDateTime->format('w');
// 前月のオブジェクトを生成
$objPrevMonth = new DateTime("$thisYear-$thisMonth-1 -1 Months");
// 前月の総日数
$prevFullDays = $objPrevMonth->format('t');
// 次月のオブジェクトを生成
$objNextMonth = new DateTime("$thisYear-$thisMonth-1 +1 Months");
// 次月の総日数
$nextFullDays = $objNextMonth->format('t');


//今月カレンダー表示
$result_calendar = [];
//前月の端数
for($i = $nextFullDays-($thisFirstWeekDay-1); $i <= $prevFullDays; $i++){
    // print $i . '日, ';
    $result_calendar[] = $i;
}
//今月の日にち
for($k = 1; $k <= $thisFullDays; $k++){
    // print $k . '日, ';
    $result_calendar[] = $k;
}
//次月の端数
for($j = 1; $j <= (6-$thisLastWeekDay); $j++){
    // print $j . '日, ';
    $result_calendar[] = $j;
}