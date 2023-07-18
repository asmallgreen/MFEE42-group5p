<?php

$couponid= $_POST["coupon_id"];
$code=$_POST["coupon_code"];
$discount=$_POST["discount"];
$deadline=$_POST["deadline"];
$level=$_POST["level"];

// echo "$name,$phone,$email";

require_once("coupon_db_connect.php");

$sql = "UPDATE coupon SET coupon_code = '$code', discount = '$discount', deadline='$deadline' , level = '$level' WHERE coupon_id =$couponid ";

// echo $sql;
// exit;
if ($conn->query($sql) === TRUE ){

    header("location: coupon-list.php?");

} else {
    echo "修改資料錯誤" .$conn->error;  
}

