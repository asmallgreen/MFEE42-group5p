<?php

if(!isset($_GET["coupon_id"])){
    die("無法作業");
}
require_once("db_connect.php");



$couponid=$_GET["coupon_id"];


$sql="UPDATE coupon SET valid=0 WHERE coupon_id ='$couponid'";


if ($conn->query($sql) === TRUE ){

    header("location: coupon-list.php?id=".$id);

} else {
    echo "刪除資料錯誤" .$conn->error;
}
