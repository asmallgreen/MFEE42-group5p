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
// $sql = "UPDATE membership SET name='$name', gender='$gender', email='$email', phone='$phone', address='$address', member_img='$filename' WHERE id=$id";

// $stmt = $db_host->prepare($sql);


// try {
//     $stmt->execute();
//     $_SESSION["user"]["name"]=$name;
//     $_SESSION["user"]["gender"]=$gender;
//     $_SESSION["user"]["email"]=$email;
//     $_SESSION["user"]["phone"]=$phone;
//     $_SESSION["user"]["address"]=$address;
//     // header("location: dashboard-test.php");
//     echo "預處理成功 <br/>";
// } catch (PDOException $e) {
//     echo "預處理陳述式執行失敗！ <br/>";
//     echo "Error: " . $e->getMessage() . "<br/>";
//     // $db_host = NULL;
//     exit;
// }


// 還沒有使用PDO防止SQL injection

// $sql="UPDATE membership SET name='$name', gender='$gender', email='$email', phone='$phone', address='$address' WHERE id=$id";


// if ($conn->query($sql) === TRUE) {
//     header("location: dashboard-test.php");

// } else {
//     echo "修改失敗: " . $conn->error;
// }


// if ($_FILES["file"]["error"] == 0) {
//     if (move_uploaded_file($_FILES["file"]["tmp_name"], "images/" . $_FILES["file"]["name"])) {
//         $filename = $_FILES["file"]["name"];
//         echo "上傳成功，檔名為" . $filename."<br>";

//         $sql = "UPDATE membership SET name='$name', gender='$gender', email='$email', phone='$phone', address='$address', member_img='$filename' WHERE id=$id";

//         $stmt = $db_host->prepare($sql);

//         if ($stmt->execute()) {
//             echo "會員資料修改成功，且照片已上傳並保存"."<br>";
//                 $_SESSION["user"]["name"]=$name;
//                 $_SESSION["user"]["gender"]=$gender;
//                 $_SESSION["user"]["email"]=$email;
//                 $_SESSION["user"]["phone"]=$phone;
//                 $_SESSION["user"]["address"]=$address;
//                 $_SESSION["user"]["member_img"]=$filename;
//                 header("location: dashboard-test.php");
//         } else {
//             echo "修改會員資料錯誤: " . $stmt->errorInfo()[2]."<br>";
//         }
//     } else {
//         echo "上傳照片失敗"."<br>";
//     }
// } else {
//     echo "上傳照片時發生錯誤: " . $_FILES["file"]["error"]."<br>";
// }

// $conn = null;

// 檢查是否有文件上傳
if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
    // 有文件上傳時的處理邏輯
    if (move_uploaded_file($_FILES["file"]["tmp_name"], "images/" . $_FILES["file"]["name"])) {
        $filename = $_FILES["file"]["name"];
        echo "上傳成功，檔名為" . $filename . "<br>";
    } else {
        echo "上傳照片失敗" . "<br>";
        // 可以選擇在這裡停止執行或採取其他適當的操作
        // return; // 停止執行
    }
} else {
    // 沒有文件上傳時的處理邏輯
    $filename = "avatar01.jpg"; // 設定默認文件
}

// 更新語句
$sql = "UPDATE membership SET name='$name', gender='$gender', email='$email', phone='$phone', address='$address', member_img='$filename' WHERE id=$id";

$stmt = $db_host->prepare($sql);

if ($stmt->execute()) {
    echo "會員資料修改成功";
     // 顯示Modal對話框

 
    if (!empty($filename)) {
        echo "，且照片已上傳並保存";
        $_SESSION["user"]["member_img"] = $filename;
    }
    echo "<br>";

    // 更新暫存中的會員資料
    $_SESSION["user"]["name"] = $name;
    $_SESSION["user"]["gender"] = $gender;
    $_SESSION["user"]["email"] = $email;
    $_SESSION["user"]["phone"] = $phone;
    $_SESSION["user"]["address"] = $address;
    $_SESSION["user"]["member_img"] = $filename;
    
    echo '<script>$("#exampleModal1").modal("show");</script>';

    // 自動跳轉頁面
    echo '<script>setTimeout(function() { window.location.href = "dashboard-test.php"; }, 2000);</script>';
    // echo '<script>$(document).ready(function() {
    //     $("#exampleModal1").modal("show");
    //     setTimeout(function() {
    //         window.location.href = "dashboard-test.php";
    //     }, 2000);
    // });</script>';

    header("location: dashboard-test.php");
} else {
    echo "修改會員資料錯誤: " . $stmt->errorInfo()[2] . "<br>";
}



    
