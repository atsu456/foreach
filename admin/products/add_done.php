<?php
session_start();
$path = '';
$hierarchy_num = array_key_last(explode('/', dirname($_SERVER['PHP_SELF'])));
if ($hierarchy_num > 1) {
  for ($cnt_path = $hierarchy_num; $cnt_path > 1; $cnt_path--) {
    $path .= '../';
  }
}
$name = $_POST['name'];
$price = (int)$_POST['price'];
$description = $_POST['description'];

// print_r($_POST);

require_once $path . 'func/functions.php';
require_once $path . 'inc/inc_path.php';
require_once 'foreach_config.php';
try {
  $db = getDB($dsn, $usr, $passwd);

  if ($_FILES['image']['error'] === 0) {
    $image = $_FILES['image']['name'];
    $image_path = $path . 'image/' . $image;
    move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
    $sql = 'INSERT INTO products (name,price,description,image,created_on,updated_on) VALUES (:name,:price,:description,:image,now(),now())';
  } else {
    $sql = 'INSERT INTO products (name,price,description,created_on,updated_on) VALUES (:name,:price,:description,now(),now())';
  }
  $stt = $db->prepare($sql);
  $stt->bindValue(':name', $name, PDO::PARAM_STR);
  $stt->bindValue(':price', $price, PDO::PARAM_INT);
  $stt->bindValue(':description', $description, PDO::PARAM_STR);
  if ($_FILES['image']['error'] === 0) {
    $stt->bindValue(':image', $image, PDO::PARAM_STR);
  }
  $stt->execute();
  $db = null;
  $_SESSION['msg'] = '新規登録が完了しました。';
  header('location:./');
} catch (PDOException $e) {
  exit('エラー発生:' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '<br>');
}
