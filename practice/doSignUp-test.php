<?php
session_start();
// if(!isset($_POST["account"])){
//     $_SESSION["error"]["accountMessage"] = "請輸入帳號";
//     header("location: sign-up-test.php");
//     exit;
//     // die("請依正常管道進入");
// }
$account=$_POST["account"];
$password=$_POST["password"];
$repassword=$_POST["repassword"];
$name=$_POST["name"];
$gender=$_POST["gender"];
$birthday=$_POST["birthday"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$selectedCity=$_POST["selected_city"];
$district=$_POST["district"];
$address=$_POST["address"];
$fullAddress=$selectedCity.$district.$address;


$_SESSION["account"]=$account;
$_SESSION["password"]=$password;
$_SESSION["repassword"]=$repassword;
$_SESSION["name"]=$name;
$_SESSION["gender"]=$gender;
$_SESSION["birthday"]=$birthday;
$_SESSION["email"]=$email;
$_SESSION["phone"]=$phone;
$_SESSION["selectedCity"]=$selectedCity;
$_SESSION["district"]=$district;
$_SESSION["address"]=$address;

$now=date("Y-m-d H:i:s");
if(empty($account)){
    $_SESSION["error"]["accountMessage"] = "請輸入帳號";
    header("location: sign-up-test.php");
    exit;
    // die("請輸入帳號");
}
if(empty($_POST["password"])){
    $_SESSION["error"]["passwordMessage"] = "請輸入密碼";
    header("location: sign-up-test.php");
    exit;
    // die("請輸入密碼");
}
if(empty($_POST["repassword"])){
    $_SESSION["error"]["repasswordMessage"] = "請再次輸入密碼";
    header("location: sign-up-test.php");
    exit;
    // die("請輸入密碼");
}
if(empty($_POST["name"])){
    $_SESSION["error"]["nameMessage"] = "請輸入姓名";
    header("location: sign-up-test.php");
    exit;
    // die("請輸入姓名");
}
if(empty($_POST["birthday"])){
    $_SESSION["error"]["birthdayMessage"] = "請輸入生日";
    header("location: sign-up-test.php");
    exit;
    // die("請選擇生日");
}
if(empty($_POST["email"])){
    $_SESSION["error"]["emailMessage"] = "請輸入電子信箱";
    header("location: sign-up-test.php");
    exit;
    // die("請輸入email");
}
        $emailpattern= "^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$";
        if(preg_match($emailpattern, $_POST["email"])){
            // echo "電子信箱格式正確";
        }else{
            // echo "電子信箱格式錯誤";
            $_SESSION["error"]["emailformMessage"] = "電子信箱格式錯誤";
        }
if(empty($_POST["phone"])){
    $_SESSION["error"]["phoneMessage"] = "請輸入電話號碼";
    header("location: sign-up-test.php");
    exit;
    // die("請輸入手機號碼");
}
        $pattern = "/^09\d{8}$/";
        if(preg_match($pattern, $_POST["phone"])){
            // echo "手機號碼格式正確";
        }else{
            // echo "手機號碼格式錯誤";
        }

if(empty($_POST["address"])){
    // die("請輸入地址");
    $_SESSION["error"]["addressMessage"] = "請輸入地址";
    header("location: sign-up-test.php");
    exit;
}

if($password!=$repassword){
    $_SESSION["error"]["passwordNotMatchMessage"] = "密碼前後不一致";
    header("location: sign-up-test.php");
    exit;
    // die("密碼前後不一致");
}
$md5Password=md5($password);
// var_dump($md5Password);
$account=$_POST["account"];
$password=$_POST["password"];
$repassword=$_POST["repassword"];
$name=$_POST["name"];
$gender=$_POST["gender"];
$birthday=$_POST["birthday"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$selectedCity=$_POST["selected_city"];
$district=$_POST["district"];
$address=$_POST["address"];
$fullAddress=$selectedCity.$district.$address;


require_once("pdo-connect-test.php");

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
        $sql = "INSERT INTO membership (account, password, name, gender, birthday, email, phone, address, level, member_img, created_at, valid) VALUES (:account, :password, :name, :gender, :birthday, :email, :phone, :address, 1, :member_img, :created_at, 1)";


$stmt = $conn->prepare($sql);
$stmt->bindParam(':account', $account);
$stmt->bindParam(':password', $md5Password);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':gender', $gender);
$stmt->bindParam(':birthday', $birthday);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':phone', $phone);
$stmt->bindParam(':address', $fullAddress);
$stmt->bindParam(':member_img', $filename);
$stmt->bindParam(':created_at', $now);

if ($stmt->execute()) {
    echo "會員註冊成功";
    if (!empty($filename)) {
        echo "，且照片已上傳並保存";
        $_SESSION["user"]["member_img"] = $filename;
    }
    echo "<br>";

    // 更新暫存中的會員資料
    $_SESSION["user"]["account"] = $account;
    $_SESSION["user"]["level"] = $level;
    $_SESSION["user"]["name"] = $name;
    $_SESSION["user"]["gender"] = $gender;
    $_SESSION["user"]["email"] = $email;
    $_SESSION["user"]["phone"] = $phone;
    $_SESSION["user"]["birthday"] = $birthday;
    $_SESSION["user"]["address"] = $address;
    $_SESSION["user"]["member_img"] = $filename;

    header("location: dashboard-test.php");
} else {
    echo "修改會員資料錯誤: " . $stmt->errorInfo()[2] . "<br>";
}

// $sql="INSERT INTO membership (account, password, name, gender, birthday, email, phone, address, level, member_img, created_at, valid) VALUES ( '$account','$md5Password','$name', '$gender', '$birthday', '$email', '$phone', '$fullAddress', 1, $filename, '$now', 1)";

// $stmt = $db_host->prepare($sql);


// if ($conn->query($sql) === TRUE) {
//     $memberId = $conn->insert_id;

// if($_FILES["file"]["error"]==0){

//     if(move_uploaded_file($_FILES["file"]["tmp_name"], "images/".$_FILES["file"]["name"])){
//         $filename=$_FILES["file"]["name"];
//         echo "上傳成功, 檔名為".$filename;

//         $sql = "INSERT INTO membership (account, password, name, gender, birthday, email, phone, address, level, member_img, created_at, valid) VALUES ('$account', '$md5Password', '$name', '$gender', '$birthday', '$email', '$phone', '$fullAddress', 1, '$filename', '$now', 1)";

//             if ($conn->query($sql) === TRUE) {
//                 // header("location: product-picture.php");
//                 echo "會員註冊成功，且照片已上傳並保存";
//             } else {
//                 echo "新增會員資料錯誤: " . $conn->error;
//             }

//             // $conn->close();
//     }else{
//         echo "上傳照片失敗";
//     }
// }else{
//     echo "上傳照片時發生錯誤: " . $_FILES["file"]["error"];
// }
//     // header ("location: sign-in-test.php");
// // } else {
// //     echo "註冊失敗: " . $conn->error;
// // }

// $conn->close();


// 使用PDO預處理

// if ($_FILES["file"]["error"] == 0) {
//     if (move_uploaded_file($_FILES["file"]["tmp_name"], "images/" . $_FILES["file"]["name"])) {
//         $filename = $_FILES["file"]["name"];
//         echo "上傳成功，檔名為" . $filename;

//         $sql = "INSERT INTO membership (account, password, name, gender, birthday, email, phone, address, level, member_img, created_at, valid) VALUES (:account, :password, :name, :gender, :birthday, :email, :phone, :address, 1, :member_img, :created_at, 1)";
//         $stmt = $conn->prepare($sql);

//         $stmt->bindParam(':account', $account);
//         $stmt->bindParam(':password', $md5Password);
//         $stmt->bindParam(':name', $name);
//         $stmt->bindParam(':gender', $gender);
//         $stmt->bindParam(':birthday', $birthday);
//         $stmt->bindParam(':email', $email);
//         $stmt->bindParam(':phone', $phone);
//         $stmt->bindParam(':address', $fullAddress);
//         $stmt->bindParam(':member_img', $filename);
//         $stmt->bindParam(':created_at', $now);

//         if ($stmt->execute()) {
//             echo "會員註冊成功，且照片已上傳並保存";
//         } else {
//             echo "新增會員資料錯誤: " . $stmt->errorInfo()[2];
//         }
//     } else {
//         echo "上傳照片失敗";
//     }
// } else {
//     echo "上傳照片時發生錯誤: " . $_FILES["file"]["error"];
// }

// $conn = null;

