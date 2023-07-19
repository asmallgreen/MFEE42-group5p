<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once("/xampp/htdocs/practice/db_connect-test.php");

$name=$_POST["name"];
$category=$_POST["category"];
$price=$_POST["price"];
$img_s1=$_POST["img_s1"];
$img_s2=$_POST["img_s2"];
$img_s3=$_POST["img_s3"];
$img_s4=$_POST["img_s4"];
$img_s5=$_POST["img_s5"];
$img_m=$_POST["img_m"];
$description=$_POST["description"];
$now = date('Y-m-d H:i:s');
$sql = "INSERT INTO product_bow (name, category, price, img_s1, img_s2, img_s3, img_s4, img_s5, img_m, created_at, valid, description) VALUES ('$name', '$category', '$price', '$img_s1', '$img_s2', '$img_s3', '$img_s4', '$img_s5', '$img_m', '$now', 1, '$description')";

//後台新增範例
// $sql = "INSERT INTO product_bow (name, category, price, img_s1, img_s2, img_s3, img_s4, img_s5, img_m, created_at, valid, description) VALUES ('Bow', '1', '10000','bow1.jpeg','bow1.jpeg','bow1.jpeg','bow1.jpeg','bow1.jpeg', 'bow1.jpeg', '$now', '1', '本店人氣No.1！在Jikishin系列中，該弓重量輕，握把窄，並且具有出色的箭飛行和箭穩定性。由於是獨一無二的線上限定商品，因此可以立即發貨。以下運費將根據送貨目的地區域收取（大約最多約2台。超過則需額外收取運費）。訂購後，我們將通過電子郵件告知您正式的總金額和付款方式。網上銷售和商店銷售的弓的運輸費用有所不同。請注意。'), ('Bow', '1', '10000','bow1.jpeg','bow1.jpeg','bow1.jpeg','bow1.jpeg','bow1.jpeg', 'bow1.jpeg', '$now', '1', '本店人氣No.1！在Jikishin系列中，該弓重量輕，握把窄，並且具有出色的箭飛行和箭穩定性。由於是獨一無二的線上限定商品，因此可以立即發貨。以下運費將根據送貨目的地區域收取（大約最多約2台。超過則需額外收取運費）。訂購後，我們將通過電子郵件告知您正式的總金額和付款方式。網上銷售和商店銷售的弓的運輸費用有所不同。請注意。')";

//multi_query新增多筆資料
// if ($conn->multi_query($sql) === True) {
//     echo "新增資料成功";
// } else {
//     echo "Error:" . $sql . "<br>" . $conn->error;
// }
if ($conn->query($sql) === True) {
    // echo "新增資料成功";
    header("location:product-list.php");
} else {
    echo "Error:" . $sql . "<br>" . $conn->error;
}
