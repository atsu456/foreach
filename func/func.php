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
