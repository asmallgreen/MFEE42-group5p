<?php
session_start();

if (!isset($_POST["name"])) {
    die("請依正常管道進入此頁");
}

require_once("../project/db_connect.php");
// mysql_query("SET NAME UTF8");

$name = $_POST["name"];
$gender = $_POST["gender"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$designation = $_POST["designation"];
$info = $_POST["info"];
// $img=$_POST["img"];


// echo "$name, $phone, $email, $designation. $info";

// 處理上傳圖片
// if (isset($_FILES['img'])) {
//     $file = $_FILES['img'];
//     $fileName = $file['name'];
//     $fileTmpPath = $file['tmp_name'];
//     $fileError = $file['error'];

//     if ($fileError === UPLOAD_ERR_OK) {
//         $destination = 'uploads/' . $fileName;
//         move_uploaded_file($fileTmpPath, $destination);
//         $img = $destination; // 將目標位置的路徑保存到 $img 變數中
//     } else {
//         exit("圖片上傳失敗。錯誤代碼：" . $fileError);
//     }
// }

$sql = "INSERT INTO teacher (name, gender, phone, email, designation, info, valid) VALUES ('$name', '$gender', '$phone', '$email', '$designation', '$info', 1)";
$conn->set_charset("utf8");

// var_dump($gender);

// 後端表單驗證
if (empty($_POST["name"])) {
    echo "請填寫 name 欄位";
    $_SESSION["error"]=[
        "message"=>"帳號密碼不正確"
    ];
    exit; // die
}
if (empty($_POST["gender"])) {
    echo "請填寫 性別 欄位";
    exit; // die
}
if (empty($_POST["phone"])) {
    die("請輸入手機號碼");
}
$pattern = "/^09\d{8}$/";
if (preg_match($pattern, $_POST["phone"])) {
    echo "手機號碼格式正確";
} else {
    echo "手機號碼格式錯誤";
}
if (empty($_POST["email"])) {
    exit("請填寫 email 欄位");
}
if (empty($_POST["designation"])) {
    exit("請填寫 段位 欄位");
}


// echo $sql;

if ($conn->query($sql) === TRUE) {
    $latestId = $conn->insert_id;
    echo "資料表 teacher 新增資料完成，id為 $latestId";
    header("location: teacher-list.php");
} else {
    echo "新增資料錯誤: " . $conn->error;
}

$conn->close();
