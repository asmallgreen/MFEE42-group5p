<?php
if(isset($_GET["coupon_code"])){
$couponcode=$_GET["coupon_code"];
require_once("db_connect.php");

$sql="SELECT coupon_id, coupon_code, discount, deadline FROM coupon WHERE coupon_code LIKE '%$couponcode%' AND valid=1";
$result=$conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
$code_count = $result->num_rows;
}else{
    $user_count=0;
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>Search</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
<div class="container">
        <div class="py-2">
            <a href="coupon-list.php" class="btn btn-info my-2">回優惠碼列表</a>
            <form action="search.php">
            <div class="row gx-2">
                <div class="col">
                    <input type="text" class="form-control" 
                    placeholder="搜尋優惠碼"
                    name="coupon_code"
                    >
                </div>
                <div class="col-auto">
                    <button class="btn btn-info" type="submit">搜尋</button>
                </div>
            </div>
            </form>
        </div>
        <?php
        // $user_count = $result->num_rows;
        ?>
        <div class="py-2 d-flex justify-content-between align-items-center">
            <div class="">
                搜尋 <?=$couponcode?> 的結果,
                共有<?=$code_count?> 筆符合資料
            </div>
        </div>
        <?php if($code_count!=0): ?>
        <div class="py-2 d-flex justify-content-between align-items-center">
            <a class="btn btn-info" href="newcooupon-ajax.php">新增</a>
            <div>
            共 <?= $code_count ?> 筆
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>code</th>
                    <th>discount</th>
                    <th>deadline</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($rows as $row): ?>
                <tr>
                    <td><?=$row["coupon_id"]?></td>
                    <td><?=$row["coupon_code"]?></td>
                    <td><?=$row["discount"]?></td>
                    <td><?=$row["deadline"]?></td>
                    <td>
                        <a href="coupon-edit.php?id=<?=$row["coupon_id"]?>" class="btn btn-info">編輯</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif?>
    </div>
</body>

</html>