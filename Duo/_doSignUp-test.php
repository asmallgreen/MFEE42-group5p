<?php

if(!isset($_POST["account"])){
    die("請依正常管道進入");
}
if(empty($_POST["account"])){
    die("請輸入帳號");
}
if(empty($_POST["password"])){
    die("請輸入密碼");
}
if(empty($_POST["name"])){
    die("請輸入姓名");
}
if(empty($_POST["birthday"])){
    die("請選擇生日");
}
if(empty($_POST["email"])){
    die("請輸入email");
}
if(empty($_POST["phone"])){
    die("請輸入手機號碼");
}
        $pattern = "/^09\d{8}$/";
        if(preg_match($pattern, $_POST["phone"])){
            echo "手機號碼格式正確";
        }else{
            echo "手機號碼格式錯誤";
        }

if(empty($_POST["address"])){
    die("請輸入地址");
}

$account=$_POST["account"];
$password=$_POST["password"];
$repassword=$_POST["repassword"];
$name=$_POST["name"];
$gender=$_POST["gender"];
$birthday=$_POST["birthday"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$selectedCity=$_POST["selected_city"];
$district=$_POST["district"];
$address=$_POST["address"];
$fullAddress=$selectedCity.$district.$address;

$now=date("Y-m-d H:i:s");

if($password!=$repassword){
    die("密碼前後不一致");
}
$password=md5($password);

require_once("../db_connect-test.php");

$sql="INSERT INTO membership (account, password, name, gender, birthday, email, phone, address, created_at, valid) VALUES ( '$account','$password','$name', '$gender', '$birthday', '$email', '$phone', '$fullAddress','$now', 1)";


if ($conn->query($sql) === TRUE) {
    header ("location: sign-in-test.php");
} else {
    echo "註冊失敗: " . $conn->error;
}

$conn->close();