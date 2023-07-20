<?php

$severname = "localhost";
$username = "admin";
$password = "12345";
$dbname = "project";


$conn = new mysqli($severname, $username, $password, $dbname);
$conn->set_charset("utf8");
// 檢查連線
if ($conn->connect_error) {
    die("連線失敗: " . $conn->connect_error);
}else{
    // echo "連線成功";
}