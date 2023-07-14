<?php
session_start();
// require_once("../db_connect-test.php");


if (!isset($_SESSION["user"])) {
    header("location: sign-in-test.php");
}
$id = $_SESSION["user"]["id"];

// $account=$_POST["account"];
$name = $_POST["name"];
$gender = $_POST["gender"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$address = $_POST["address"];


if (empty($name)) {
    $_SESSION["error"]["nameMessage"] = "請輸入姓名";
    header("location: member-edit.php");
    exit;
}
if (empty($email)) {
    $_SESSION["error"]["emailMessage"] = "請輸入信箱";
    header("location: member-edit.php");
    exit;
}
if (empty($phone)) {
    $_SESSION["error"]["phoneMessage"] = "請輸入電話號碼";
    header("location: member-edit.php");
    exit;
}
if (empty($address)) {
    $_SESSION["error"]["addressMessage"] = "請輸入地址";
    header("location: member-edit.php");
    exit;
}

//使用PDO預處理來預防SQL injection
require_once("pdo-connect-test.php");
$sql = "UPDATE membership SET name='$name', gender='$gender', email='$email', phone='$phone', address='$address' WHERE id=$id";
$stmt = $db_host->prepare($sql);

try {
    $stmt->execute();
    $_SESSION["user"]["name"]=$name;
    $_SESSION["user"]["gender"]=$gender;
    $_SESSION["user"]["email"]=$email;
    $_SESSION["user"]["phone"]=$phone;
    $_SESSION["user"]["address"]=$address;
    header("location: dashboard-test.php");
} catch (PDOException $e) {
    echo "預處理陳述式執行失敗！ <br/>";
    echo "Error: " . $e->getMessage() . "<br/>";
    // $db_host = NULL;
    exit;
}


// 還沒有使用PDO防止SQL injection

// $sql="UPDATE membership SET name='$name', gender='$gender', email='$email', phone='$phone', address='$address' WHERE id=$id";


// if ($conn->query($sql) === TRUE) {
//     header("location: dashboard-test.php");

// } else {
//     echo "修改失敗: " . $conn->error;
// }
