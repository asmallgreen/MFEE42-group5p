<?php


$page = $_GET["page"] ?? 1;

$type=$_GET["type"] ?? 1;
$orderBy=" ";
$available = " ";
if($type==1){    
    $orderBy = "ORDER BY startdate ASC";
}elseif($type==2){    
    $orderBy = "ORDER BY startdate DESC";
}elseif($type==3){
    $orderBy = "ORDER BY coupon_code ASC";
}elseif($type==4){
    $orderBy = "ORDER BY coupon_code DESC";
}elseif($type==5){
    $orderBy = "ORDER BY deadline ASC";
}elseif($type==6){
    $orderBy = "ORDER BY deadline DESC";
}elseif($type==7){
    $available = "AND NOW() >= startdate AND NOW() <= deadline";
}elseif($type==8){
    $available = " ";
}else{
    header("location:../404.php");
}

require_once("coupon_db_connect.php");

$sqlTotal = "SELECT coupon_id FROM coupon WHERE valid=1 $available ";
$resultTotal = $conn->query($sqlTotal);
$totalUser = $resultTotal->num_rows;

$perPage = 5;
$startItem = ($page - 1) * $perPage;

//計算總共頁數
$totalPage=ceil($totalUser/$perPage);

$sql = "SELECT coupon_id, coupon_code, discount, deadline , startdate , level FROM coupon WHERE valid=1 $available $orderBy LIMIT $startItem, $perPage";

$result = $conn->query($sql);

?>

<!doctype html>
<html lang="en">

<head>
    <title>Admin center</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="/practice/dashboard-css.css">
<style>
        .tab-content li:nth-child(6) {
            display: block;
        }
</style>
</head>

<body>
<?php include("/xampp/htdocs/practice/dashboard-admin-header-aside.php") ?>
   
    <main class="main-content">
        <div class="px-3">
                <div class="pb-2">
                    <form action="coupon-search.php">
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
                <?php   $user_count = $result->num_rows; ?>
                <div class="py-2 d-flex justify-content-between align-items-center">
                    <a class="btn btn-info" href="newcoupon-ajax.php">新增</a>
                    <div>
                        共 <?= $totalUser ?> 筆, 第 <?= $page ?> 頁
                    </div>
                </div>
                <div class="py-2 d-flex justify-content-between">
                    <div class="btm-group">
                        <a href="coupon-list.php?page=<?=$page?>&type=7" class=" btn btn-primary  <?php if($type==7)echo"active"?> ">Available Now </a>
                        <a href="coupon-list.php?page=<?=$page?>&type=8" class=" btn btn-primary  <?php if($type==8)echo"active"?> ">All </a>
                    </div>
                    <div class="btn-group">
                        
                        <a href="coupon-list.php?page=<?=$page?>&type=3" class="btn btn-dark <?php if($type==3)echo"active"?>">Code <i class="fa-solid fa-arrow-down-short-wide" ></i></a>
                        <a href="coupon-list.php?page=<?=$page?>&type=4" class="btn btn-dark <?php if($type==4)echo"active"?>">Code <i class="fa-solid fa-arrow-up-wide-short"></i></a>
                        <a href="coupon-list.php?page=<?=$page?>&type=1" class="btn btn-dark <?php if($type==1)echo"active"?>">Startdate <i class="fa-solid fa-arrow-down-short-wide" ></i></a>
                        <a href="coupon-list.php?page=<?=$page?>&type=2" class="btn btn-dark <?php if($type==2)echo"active"?>">Startdate <i class="fa-solid fa-arrow-up-wide-short"></i></a>
                        <a href="coupon-list.php?page=<?=$page?>&type=5" class="btn btn-dark <?php if($type==5)echo"active"?>">Deadline <i class="fa-solid fa-arrow-down-short-wide" ></i></a>
                        <a href="coupon-list.php?page=<?=$page?>&type=6" class="btn btn-dark <?php if($type==6)echo"active"?>">Deadline <i class="fa-solid fa-arrow-up-wide-short"></i></a> 
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
    </main>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <?php include("/xampp/htdocs/practice/dashboard-js.php") ?>
     <script>
    // 使用 JavaScript 為 .tabs li a:nth-child() 元素添加 active class
    document.addEventListener("DOMContentLoaded", function() {
      const lastTabLink = document.querySelector(".tabs li:nth-child(6) a");
      lastTabLink.classList.add("active");
    });
  </script>
</body>

</html>