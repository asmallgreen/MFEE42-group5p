<?php
session_start();
// require_once("../db_connect-test.php");


if (!isset($_SESSION["user"])) {
    header("location: sign-in-test.php");
}
$id = $_SESSION["user"]["id"];

// $account=$_POST["account"];
$password = $_POST["password"];
$repassword=$_POST["repassword"];


if (empty($password)) {
    $_SESSION["error"]["passwordMessage"] = "請輸入密碼";
    header("location: password-edit.php");
    exit;
}
if (empty($repassword)) {
    $_SESSION["error"]["repasswordMessage"] = "請再次輸入密碼";
    header("location: password-edit.php");
    exit;
}
if ($password!=$repassword) {
    $_SESSION["error"]["errorPasswordMessage"] = "密碼輸入不一致";
    header("location: password-edit.php");
    exit;
}
$md5Password=md5($password);
//使用PDO預處理來預防SQL injection
require_once("pdo-connect-test.php");
$sql = "UPDATE membership SET password='$md5Password' WHERE id=$id";
$stmt = $conn->prepare($sql);

try {
    $stmt->execute();
    $_SESSION["user"]["password"]=$password;
    $_SESSION["passwordEditSuccess"];
    header("location: password-edit.php");
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
