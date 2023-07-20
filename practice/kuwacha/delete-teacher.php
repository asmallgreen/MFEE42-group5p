<?php

require_once("/xampp/htdocs/practice/db_connect-test.php");

$sql="DELETE FROM teacher WHERE id=11";

if ($conn->query($sql) === TRUE) {
    echo "刪除資料成功";

} else {
    echo "刪除資料成功錯誤: " . $conn->error;
}

$conn->close(); 