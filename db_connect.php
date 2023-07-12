<?php

// 建立資料庫
// 需要以下資料
$servername = "localhost";
$username = "root";
$password = "XZ2e/w@@J]EkELUW";
$dbname = "bownet_db";

$conn = new mysqli($servername, $username, $password, $dbname);
// 檢查連線
if($conn->connect_error){
    die("連線失敗: ").$conn->connect_error;
}else{
    echo "連線成功";
}