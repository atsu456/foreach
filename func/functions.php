<?php
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