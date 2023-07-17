<?php


$page = $_GET["page"] ?? 1;

$type=$_GET["type"] ?? 1;

require_once("db_connect.php");

$sqlTotal = "SELECT coupon_id FROM coupon WHERE valid=1 AND NOW() >= startdate AND NOW() <= deadline";
$resultTotal = $conn->query($sqlTotal);
$totalUser = $resultTotal->num_rows;

$perPage = 5;
$startItem = ($page - 1) * $perPage;

//計算總共頁數
$totalPage=ceil($totalUser/$perPage);

if($type==1){    
    $orderBy = "ORDER BY coupon_id ASC";
}elseif($type==2){    
    $orderBy = "ORDER BY coupon_id DESC";
}elseif($type==3){
    $orderBy = "ORDER BY coupon_code ASC";
}elseif($type==4){
    $orderBy = "ORDER BY coupon_code DESC";
}elseif($type==5){
    $orderBy = "ORDER BY deadline ASC";
}elseif($type==6){
    $orderBy = "ORDER BY deadline DESC";
}else{
    header("location:../404.php");
}



$sql = "SELECT coupon_id, coupon_code, discount, deadline , startdate , level FROM coupon WHERE valid=1 AND NOW() >= startdate AND NOW() <= deadline   $orderBy LIMIT $startItem, $perPage";

$result = $conn->query($sql);

?>
<!doctype html>
<html lang="en">

<head>
    <title>Coupon list</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container">
        
        <div class="py-2">
            <form action="search.php">
                <div class="row gx-2">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="搜尋優惠碼" name="coupon_code">
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-info" type="submit">搜尋</button>
                    </div>
                </div>
            </form>
        </div>
        <?php   
        $user_count = $result->num_rows;
        ?>
        <div class="py-2 d-flex justify-content-between align-items-center">
            <a class="btn btn-info" href="newcoupon-ajax.php">新增</a>
            <div>
                共 <?= $totalUser ?> 筆, 第 <?= $page ?> 頁
            </div>
        </div>
        <div class="py-2 d-flex justify-content-end">
            <div class="btn-group">
                <a href="coupon-list.php?page=<?=$page?>&type=1" class="btn btn-dark <?php if($type==1)echo"active"?>">id <i class="fa-solid fa-arrow-down-short-wide" ></i></a>
                <a href="coupon-list.php?page=<?=$page?>&type=2" class="btn btn-dark <?php if($type==2)echo"active"?>">id <i class="fa-solid fa-arrow-up-wide-short"></i></a>
                <a href="coupon-list.php?page=<?=$page?>&type=3" class="btn btn-dark <?php if($type==3)echo"active"?>">code <i class="fa-solid fa-arrow-down-short-wide" ></i></a>
                <a href="coupon-list.php?page=<?=$page?>&type=4" class="btn btn-dark <?php if($type==4)echo"active"?>">code <i class="fa-solid fa-arrow-up-wide-short"></i></a>
                <a href="coupon-list.php?page=<?=$page?>&type=5" class="btn btn-dark <?php if($type==5)echo"active"?>">deadline <i class="fa-solid fa-arrow-down-short-wide" ></i></a>
                <a href="coupon-list.php?page=<?=$page?>&type=6" class="btn btn-dark <?php if($type==6)echo"active"?>">deadline <i class="fa-solid fa-arrow-up-wide-short"></i></a> 
            </div>
        </div>  
        <?php
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        // var_dump($rows);
        // exit;
        ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>coupon_id</th>
                    <th>coupon_code</th>
                    <th>discount</th>
                    <th>startdate</th>
                    <th>deadline</th>
                    <th>level</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $row) : ?>
                    <tr>
                        <td><?= $row["coupon_id"] ?></td>
                        <td><?= $row["coupon_code"] ?></td>
                        <td><?= $row["discount"] ?></td>
                        <td><?= $row["startdate"] ?></td>
                        <td><?= $row["deadline"] ?></td>
                        <td><?= $row["level"] ?></td>
                        <td>
                            <a href="coupon-edit.php?coupon_id=<?= $row["coupon_id"] ?>" class="btn btn-info">編輯</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php for($i=1 ; $i<=$totalPage; $i++): ?>
                <li class="page-item  <?php if($i==$page) echo "active";?>"><a class="page-link" href="coupon-list.php?page=<?=$i?>&type=<?=$type?>"><?=$i?></a></li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>

</body>

</html>