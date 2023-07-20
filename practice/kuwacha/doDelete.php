<?php

if(!isset($_GET["id"])){
    die("無法作業");
}
require_once("../project/db_connect.php");

$id=$_GET["id"];


$sql="UPDATE teacher SET valid=0 WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    header("location: teacher-list.php");
} else {
    echo "刪除資料錯誤" . $conn->error;
}