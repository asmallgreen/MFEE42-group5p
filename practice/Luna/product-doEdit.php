<?php


$id=$_POST["id"];
$name=$_POST["name"];
$category=$_POST["category"];
$price=$_POST["price"];
$description=$_POST["description"];
$update = $_POST["update"];

// echo $id, $name, $category, $price, $img_s, $img_m, $update;

require_once("/xampp/htdocs/practice/db_connect-test.php");



$sql="UPDATE product_bow SET name='$name', category='$category', price='$price',  updated_at='$update', description='$description' WHERE id=$id ";

if(!isset($id)){
    echo "請依正常管道進入(無取得id值)";
}



if ($conn->query($sql) === True) {
    // echo "新增資料成功";
    header("location:product-list.php");

} else {
    echo "Error:" . $sql . "<br>" . $conn->error;
}