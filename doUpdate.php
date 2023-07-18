<?php

$id=$_POST["id"];
$name=$_POST["name"];
$gender=$_POST["gender"];
$phone=$_POST["phone"];
$email=$_POST["email"];
$designation=$_POST["designation"];
$info=$_POST["info"];


// echo "$name, $gender, $phone, $email, $Designation, $info";

require_once("../project/db_connect.php");


$sql="UPDATE teacher SET name='$name', gender='$gender', phone='$phone', email='$email', designation='$designation', info='$info' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("location: teacher.php?id=" . $id);
} else {
    echo "修改資料錯誤: " , $conn->error;
}

