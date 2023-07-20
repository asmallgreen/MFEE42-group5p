<?php

require_once("coupon_db_connect.php");

if(!isset($_POST["couponcode"])){
    // echo "請依正常管道進入此頁";
    $data=[
        "status"=>0,
        "message"=>"無有效參數"
    ];
    echo json_encode($data);
    exit;
}

$couponcode=$_POST["couponcode"];
$discount=$_POST["discount"];
$deadline=$_POST["deadline"];
$level=$_POST["level"];
$startdate=$_POST["startdate"];




if(empty($_POST["couponcode"])){
    $data=[
        "status"=>0,
        "message"=>"請輸入couponcode"
    ];
    echo json_encode($data);
    exit;
}
if(empty($_POST["discount"])){
    $data=[
        "status"=>0,
        "message"=>"請輸入discount"
    ];
    echo json_encode($data);
    exit;
}
if(empty($_POST["startdate"])){
    $data=[
        "status"=>0,
        "message"=>"請設定生效日期"
    ];
    echo json_encode($data);
    exit;
}
if(empty($_POST["deadline"])){
    $data=[
        "status"=>0,
        "message"=>"請設定有效日期"
    ];
    echo json_encode($data);
    exit;
}
if(empty($_POST["level"])){
    $data=[
        "status"=>0,
        "message"=>"請設定會員等級"
    ];
    echo json_encode($data);
    exit;
}



$sql="SELECT * FROM coupon WHERE coupon_code = '$couponcode' AND valid=1 ";
$result=$conn->query($sql);
$codeCount=$result->num_rows;

if($codeCount==1){
    $data=[
        "status"=>0,
        "message"=>"已有相同優惠碼"
    ];
    echo json_encode($data);
    exit;
}


// $data=[
//     "name"=>$name,
//     "password"=>$password,
//     "repassword"=>$repassword
// ];

$sql="INSERT INTO coupon (coupon_code, discount, startdate , deadline ,level ,valid) VALUES ('$couponcode', '$discount', '$startdate' ,'$deadline' ,'$level' ,1)";

if ($conn->query($sql) === TRUE) {
    $data=[
        "status"=>1,
        "message"=>"新增優惠碼成功"
    ];
    echo json_encode($data);

} else {
    // echo "新增資料錯誤: " . $conn->error;
    $data=[
        "status"=>0,
        "message"=>"新增資料錯誤: " . $conn->error
    ];
    echo json_encode($data);

}


// echo json_encode($data);
$conn->close();


