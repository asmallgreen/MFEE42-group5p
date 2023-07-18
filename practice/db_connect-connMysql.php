<?php
header("Content-Type: text/html; charset=utf-8");
// 資料庫主機設定
$servername="localhost";
$username="admin";
$password="12345";
$dbname="project";


//  資料庫連線及判定
 $db_link = @new mysqli($servername, $username, $password, $dbname);
 if ($db_link -> connect_error !="") {
    die("資料庫連線失敗");
 }else{
    // echo "連線成功";
    $db_link -> query("SET NAMES 'utf8'");
    // echo "資料庫連線成功";
 }