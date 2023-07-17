<?php
require __DIR__ . '/vendor/autoload.php';

// 連接 Google Sheets 服務物件
$client = new Google_Client();
$client->setApplicationName('Google Sheet');
$client->setScopes([Google_Service_Sheets::SPREADSHEETS_READONLY]);
$client->setAuthConfig('API.json');
$service = new Google_Service_Sheets($client);

// 取得 Google Sheets 資料
$spreadsheetId = '1CB3rTmaqqsH--_TVnhzXQekXOAsF0V8y2EtY5fyz9fo';
$range = 'Sheet1!A1:N2';
$response = $service->spreadsheets_values->get($spreadsheetId, $range);
$values = $response->getValues();

// 連接資料庫
require_once("../db-connect.php");

// 檢查連接是否成功
if ($conn->connect_error) {
    die("連接失敗: " . $conn->connect_error);
}


// 將資料插入資料庫
foreach ($values as $row) {
    $name=$row[0];
    $category=$row[1];
    $price=$row[2];
    $img_s1=$row[3];
    $img_s2=$row[4];
    $img_s3=$row[5];
    $img_s4=$row[6];
    $img_s5=$row[7];
    $img_m=$row[8];
    $description=$row[9];
    $now = date('Y-m-d H:i:s');




    // $column1 = $row[0];
    // $column2 = $row[1];
    // $column3 = $row[2];
    // $column4 = $row[3];


    $sql = "INSERT INTO product_bow (name, category, price, img_s1, img_s2, img_s3, img_s4, img_s5, img_m, created_at, valid, description) VALUES ('$name', '$category', '$price', '$img_s1', '$img_s2', '$img_s3', '$img_s4', '$img_s5', '$img_m', '$now', 1, '$description')";
    // $sql = "INSERT INTO product_bow (name, category, price, column4) VALUES ('$column1', '$column2', '$column3', '$column4')";

    if ($conn->query($sql) === TRUE) {
        echo "資料插入成功";
    } else {
        echo "資料插入失敗: " . $conn->error;
    }
}

// 關閉資料庫連接
$conn->close();
?>
