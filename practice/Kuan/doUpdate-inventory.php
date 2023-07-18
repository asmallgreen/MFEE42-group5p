<?php

if(!isset($_POST["id"])){
    die("無法作業");
}
require_once("db_connect.php");

$id = $_POST["id"];
$name = $_POST["name"];
$name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$category = $_POST["category"];
$amount = $_POST["amount"];
$min_amount = $_POST["min_amount"];

// var_dump($id, $name, $category, $amount, $min_amount);

$sql = "UPDATE inventory, product
SET
product.name = '$name',
product.category_id='$category',
inventory.category='$category',
inventory.amount='$amount',
inventory.min_amount='$min_amount'
WHERE product.id='$id' AND inventory.id='$id'";

if ($conn->query($sql) === TRUE ) {
    header("location: inventory-list.php");
} else {
    echo "修改資料錯誤: " . $conn->error;
}