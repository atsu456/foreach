<?php
// カートに商品を追加する処理を書く。
session_start();
$_SESSION['cart']['total_price'] = 0;
$_SESSION['cart']['total_quantity'] = 0;

$path = '';
$hierarchy_num = array_key_last(explode('/', dirname($_SERVER['PHP_SELF'])));
if ($hierarchy_num > 1) {
	for ($cnt_path = $hierarchy_num; $cnt_path > 1; $cnt_path--) {
		$path .= '../';
	}
}
require_once 'func/functions.php';

$id = isset($_POST['id'])?(int)$_POST['id'] : '';
$name = $_POST['name'];
$image = $_POST['image'];
$price = (int)$_POST['price'];
$quantity = (int)$_POST['quantity'];

if(isset($_SESSION['cart']['item'][$id])){
	$quantity = $_SESSION['cart']['item'][$id]['quantity'] + $quantity;
}

if(!empty($_POST['id'])){
    $_SESSION['cart']['item'][$id] = [
		'name' => $name,
		'image' => $image,
		'price' => $price,
		'quantity' => $quantity,
		'subtotal' => $price * $quantity,
	];
}
// foreach($_SESSION['cart']['item'] as $item){
// 	$_SESSION['cart']['total_price'] += $item['subtotal'];
// }
// $_SESSION['cart']['total_quantity'] = 0;
// foreach($_SESSION['cart']['item'] as $item){
// 	$_SESSION['cart']['total_quantity'] += $item['quantity'];
// }
calc_totals();

// echo '<pre>';
// print_r($_SESSION['cart']);
// echo '</pre>';
header('location:cart.php');