<?php
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
require_once $path . 'func/functions.php';
$id = isset($_POST['delete_id'])?(int)$_POST['delete_id'] : '';

// $_SESSION['cart']['item'][$id] = ''; 箱は残る
unset($_SESSION['cart']['item'][$id]);

calc_totals();

header('location:cart.php');