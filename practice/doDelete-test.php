
<?php
session_start();
if(!isset($_SESSION["user"])){
    header("location: sign-in-test.php");
}

$id=$_SESSION["user"]["id"];


require_once("../db_connect-test.php");
$sql="UPDATE membership SET valid=0 WHERE id=$id";


if ($conn->query($sql) === TRUE) {
    header("location: sign-up-test.php");

} else {
    echo "刪除失敗: " . $conn->error;
}
