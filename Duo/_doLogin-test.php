<?php

session_start();


require_once("../db_connect-test.php");

if(!isset($_POST["account"])){
    echo "請循正常管道進入";
    exit;
}
$account=$_POST["account"];
$password=$_POST["password"];
// $password=md5($password);

// echo $name.", ".$password;

$sql="SELECT * FROM membership WHERE account='$account' AND password='$password'";

$result=$conn->query($sql);
$userCount=$result->num_rows;
$user=$result->fetch_assoc();

if($userCount===0){//登入失敗
    // echo "帳號或密碼不正確";
    if(!isset($_SESSION["error"]["times"])){
        $_SESSION["error"]["times"]=1;
    }else{
        $_SESSION["error"]["times"]++;
    }
 
    // $_SESSION["error"]=[
    //     "message"=>"帳號或密碼不正確"
    // ];
    $_SESSION["error"]["message"]="帳號或密碼不正確";
    header("location: sign-in-test.php");

}else{//登入成功
    // echo $userCount."<br>";
    unset($_SESSION["error"]);
    $_SESSION["user"]=$user;
    header("location: dashboard-test.php");
}

