<?php

require_once("../db-connect.php");

// $name=$_POST["name"];
// $category=$_POST["category"];
// $price=$_POST["price"];
// $img_s=$_POST["img_s"];
// $img_m=$_POST["img_m"];
$now = date('Y-m-d H:i:s');


// $sql="INSERT INTO product_bow (name, category, price, img_s, img_m, created_at, valid) VALUES ('$name', '$category', '$price', '$img_s', '$img_m', '$now', 1)";
$sql = "INSERT INTO product_bow (name, category, price, img_s, img_m, created_at, valid) VALUES ('Bow', '1', '10000','bow2.jpeg', 'bow2.jpeg', '$now', '1'), ('String', '1', '6000','bow3.jpeg', 'bow3.jpeg', '$now', '1');";
// $sql .= "INSERT INTO product_bow (name, category, price, img_s, img_m, created_at, valid) VALUES ('Bow', '1', '6000','bow2.jpeg', 'bow4.jpeg', '$now', '1');";
// $sql .= "INSERT INTO product_bow (name, category, price, img_s, img_m, created_at, valid) VALUES ('Bow', '1', '6000','bow2.jpeg', 'bow4.jpeg', '$now', '1');";

// echo $sql;
// exit;

// $result=$conn->query($sql);
// $rows=$result->fetch_all(MYSQLI_ASSOC);

if ($conn->multi_query($sql) === True) {
    //multi_query新增多筆資料
    echo "新增資料成功";
} else {
    echo "Error:" . $sql . "<br>" . $conn->error;
}
