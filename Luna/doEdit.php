<?php


$id=$_POST["id"];
$name=$_POST["name"];
$category=$_POST["category"];
$price=$_POST["price"];
$img_s=$_POST["img_s"];
$img_m=$_POST["img_m"];
$update = date('Y-m-d H:i:s');

// echo $id, $name, $category, $price, $img_s, $img_m, $update;

require_once("../db-connect.php");



$sql="UPDATE product_bow SET name='$name', category='$category', price='$price', img_s='$img_s', img_m='$img_m', updated_at='$update' WHERE id=$id ";

if(!isset($id)){
    echo "請依正常管道進入(無取得id值)";
}



if ($conn->query($sql) === True) {
    echo "新增資料成功";

} else {
    echo "Error:" . $sql . "<br>" . $conn->error;
}