<?php
if(!isset($_GET["id"])){
    die("無法作業 未取得id");
}
require_once("/xampp/htdocs/practice/db_connect-test.php");


if (isset($_GET["id"]) && is_array($_GET["id"])) {
  $ids = $_GET["id"];
  foreach ($ids as $id) {
    echo $id . "<br>";
  }
}




foreach ($ids as $id) {
$sql="UPDATE product_bow SET valid=0 WHERE id='$id'";    
if ($conn->query($sql) === TRUE) {
// echo "刪除成功";
    header("location: product-list.php");

} else {
    echo "刪除資料錯誤: " . $conn->error;
}}
$conn->close();