<?php
// 連線資料庫所需資料
$servername = "localhost";
$username = "admin";
$password = "12345";
$dbname = "project";

// 建立連線物件
$conn = new mysqli($servername , $username, $password ,$dbname);

// 檢查連線
if($conn->connect_error){
    die("連線失敗: " .$conn->connect_error);
}else{
    // echo"連線成功45654";
}
