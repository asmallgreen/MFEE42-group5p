<?php
require_once("../project/db_connect.php");

$id=$_POST["id"];
$img=$_FILES["file"]["name"];

// $file=$_FILES["file"];
// echo $id . $img;
if ($_FILES["file"]["error"]==0) {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"])) {

        $filename = $_FILES["file"]["name"];
        echo "上傳成功，檔名為" . $filename;

        $sql = "UPDATE teacher SET img='$filename' WHERE id = '$id'";
        // $conn->set_charset("utf8");
        // echo $sql;

        if ($conn->query($sql) === TRUE) {
            
            header("location: teacher-edit.php?id=" . $id);
        } else {
            echo "新增資料錯誤: " . $conn->error;
        }
    } else {
        echo "上傳失敗";
    }
} else {
    var_dump($_FILES["file"]["error"]);
}
