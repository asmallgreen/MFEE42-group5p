<?php

require_once("../project/db_connect.php");

$sql="UPDATE teacher SET phone=";

if($conn->query($sql) === TRUE) {
    echo "資料更新完成";
} else {
    echo "資料更新錯誤"
}