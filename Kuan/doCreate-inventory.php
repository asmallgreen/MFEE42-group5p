<?php

if (!isset($_POST["name"])) {
    die("請依照正常管道進入本頁面");
}

require_once("db_connect.php");


$id = $_POST["id"];
$name = $_POST["name"];
$name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$category = $_POST["category"];
$amount = $_POST["amount"];
$min_amount = $_POST["min_amount"];

// var_dump($id, $name, $category, $amount, $min_amount);

//check inventory id
$inventoryQuery = "SELECT id FROM inventory WHERE id='$id'";
$inventoryResult = $conn->query($inventoryQuery);

//check product id
$productQuery = "SELECT id FROM product WHERE id='$id'";
$productResult = $conn->query($productQuery);

if ($inventoryResult->num_rows == 0 && $productResult->num_rows == 0) {
    $insertInventory = "INSERT INTO inventory (id, category, amount, min_amount, valid) VALUES ('$id', '$category', '$amount', '$min_amount',1)";

    $insertProduct = "INSERT INTO product (id, category_id, name) VALUES ('$id', '$category', '$name')";

    if ($conn->query($insertInventory) === TRUE && $conn->query($insertProduct) === TRUE) {
        echo "<script>
        alert('新增 {$name} 至商品表及庫存表成功');
        </script>";
        header("Refresh: 0; URL=inventory-list.php");
    } else {
        echo "<script>alert('新增庫存資料錯誤');</script>". $conn->error;
    }
} else if ($inventoryResult->num_rows == 0 && $productResult->num_rows > 0) {
    $insertInventory = "INSERT INTO inventory (id, category, amount, min_amount, valid) VALUES ('$id', '$category', '$amount', '$min_amount',1)";

    $updateProduct = "UPDATE product SET name = '$name', category_id ='$category' WHERE id ='$id'";

    if ($conn->query($insertInventory) === TRUE && $conn->query($updateProduct) === TRUE) {
        $latestId = $conn->insert_id;
        echo "<script>
        alert('商品已存在商品表，新增至庫存 編號：{$latestId}成功');
        </script>";
        header("Refresh: 0; URL=inventory-list.php");
    } else {
        echo "<script>alert('新增庫存資料錯誤');</script>". $conn->error;
    }
} else if ($inventoryResult->num_rows > 0 && $productResult->num_rows == 0) {
    $insertProduct = "INSERT INTO product (id, category_id, name) VALUES ('$id', '$category', '$name')";

    if ($conn->query($insertProduct) === TRUE) {
        echo "<script>
        alert('庫存編號已存在，請確認後透過編輯庫存修改；已協助新增商品 {$name} 成功');
        </script>";
        header("Refresh: 0; URL=inventory-list.php");
    } else {
        echo "<script>alert('新增庫存資料錯誤');</script>";
    }
}else{
    echo"<script>
    alert('庫存編號及產品編號皆已存在，請再次確認輸入資料');
    </script>";
    header("Refresh: 0; URL=inventory-list.php");
}


