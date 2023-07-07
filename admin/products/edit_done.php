<?php
session_start();
$path = '';
$hierarchy_num = array_key_last(explode('/', dirname($_SERVER['PHP_SELF'])));
if ($hierarchy_num > 1) {
	for ($cnt_path = $hierarchy_num; $cnt_path > 1; $cnt_path--) {
		$path .= '../';
	}
}
$id = (int)$_POST['id'];
$name = $_POST['name'];
$price = (int)$_POST['price'];
$image = $_FILES['image']['name'];
$image_path = $path . 'image/' . $image;
$description = $_POST['description'];
$is_deleted = (int)$_POST['is_deleted'];
require_once $path . 'func/functions.php';
require_once $path . 'inc/inc_path.php';
require_once 'foreach_config.php';
try {
	$db = getDB($dsn, $usr, $passwd);

	$sql = 'UPDATE products SET name=:name,price=:price,description=:description,updated_on=now(),is_deleted=:is_deleted';
	if ($_FILES['image']['error'] === 0) {
		$image = $_FILES['image']['name'];
		$image_path = $path . 'image/' . $image;
		move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
		$sql .= ',image=:image';
	}
	$sql .= ' where id = :id';
	$stt = $db->prepare($sql);
	$stt->bindValue(':name', $name, PDO::PARAM_STR);
	$stt->bindValue(':price', $price, PDO::PARAM_INT);
	$stt->bindValue(':description', $description, PDO::PARAM_STR);
	$stt->bindValue(':is_deleted', $is_deleted, PDO::PARAM_INT);
	if ($_FILES['image']['error'] === 0) {
		$stt->bindValue(':image', $image, PDO::PARAM_STR);
	}
	$stt->bindValue(':id', $id, PDO::PARAM_INT);
	echo $sql;
	$stt->execute();
	$db = null;
	$_SESSION['edit_msg'] = '編集が完了しました。';
	header('location:./detail.php?id=' . $id);
} catch (PDOException $e) {
	echo 'エラー発生:' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '<br>';
	exit;
}
