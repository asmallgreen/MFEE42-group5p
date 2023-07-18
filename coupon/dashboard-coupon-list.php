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
    <title>Admin center</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        :root {
            --aside-width: 300px;
            --page-spacing-top: 56px;
        }

        .brand-name {
            width: var(--aside-width);
        }

        .main-aside {
            width: var(--aside-width);
            padding-top: calc(var(--page-spacing-top) + 10px);
        }

        .main-content {
            margin-left: var(--aside-width);
            padding-top: calc(var(--page-spacing-top) + 10px);
        }

        .chart {
            height: 400px;
        }
    </style>
</head>

<body>
    <header class="text-bg-dark d-flex shadow fixed-top justify-content-between align-items-center">
        <a class="bg-black py-3 px-3 text-decoration-none link-light brand-name" href="/">管理者後臺介面</a>
        <div class="d-flex align-items-center">
            <div class="me-3">
                hi, 慕朵
            </div>

            <!-- <a href="logout-test.php" class="btn btn-dark me-3"><i class="fa-solid fa-right-from-bracket"></i> Log out</a> -->
        </div>
    </header>
    <aside class="main-aside position-fixed bg-light vh-100 border-end">
        <nav class="">
            <ul class="list-unstyled">
                <div class="my-2 d-flex justify-content-between text-secondary px-3">
                    <div> 會員</div>
                    <a role="button" href="">
                        <i class="fa-regular fa-square-plus text-secondary"></i>
                    </a>
                </div>
                <li>
                    <a class="d-block py-2 px-3 text-decoration-none" href="./dashboard-admin-test.php">
                        <i class="fa-solid fa-users fa-fw me-2"></i>會員資料
                    </a>
                </li>
                <div class="my-2 d-flex justify-content-between text-secondary px-3">
                    <div> 產品</div>
                    <a role="button" href="">
                        <i class="fa-regular fa-square-plus text-secondary"></i>
                    </a>
                </div>

                <li>
                    <a class="d-block py-2 px-3 text-decoration-none" href="">
                        <i class="fa-solid fa-cart-shopping fa-fw me-2"></i>產品目錄
                    </a>
                </li>
                <div class="my-2 d-flex justify-content-between text-secondary px-3">
                    <div> 庫存</div>
                    <a role="button" href="">
                        <i class="fa-regular fa-square-plus text-secondary"></i>
                    </a>
                </div>
                <li>
                    <a class="d-block py-2 px-3 text-decoration-none" href="">
                    <i class="fa-solid fa-box fa-fw me-2"></i>庫存目錄
                    </a>
                </li>
                <div class="my-2 d-flex justify-content-between text-secondary px-3">
                    <div> 課程</div>
                    <a role="button" href="">
                        <i class="fa-regular fa-square-plus text-secondary"></i>
                    </a>
                </div>
                <li>
                    <a class="d-block py-2 px-3 text-decoration-none" href="">
                    <i class="fa-solid fa-book fa-fw me-2"></i>課程目錄
                    </a>
                </li>
                <div class="my-2 d-flex justify-content-between text-secondary px-3">
                    <div> 師資</div>
                    <a role="button" href="">
                        <i class="fa-regular fa-square-plus text-secondary"></i>
                    </a>
                </div>
                <li>
                    <a class="d-block py-2 px-3 text-decoration-none" href="">
                        <i class="fa-solid fa-user fa-fw me-2"></i>師資目錄
                    </a>
                </li>
                <div class="my-2 d-flex justify-content-between text-secondary px-3">
                    <div> 行銷</div>
                    <a role="button" href="">
                        <i class="fa-regular fa-square-plus text-secondary"></i>
                    </a>
                </div>
                <li>
                    <a class="d-block py-2 px-3 text-decoration-none" href="">
                        <i class="fa-solid fa-comments-dollar fa-fw me-2"></i>行銷目錄
                    </a>
                </li>

            </ul>

            <hr>
            <!-- <ul class="list-unstyled">
            
            <li>
                <a class="d-block py-2 px-3 text-decoration-none" href="./member-edit.php">
                    <i class="fa-solid fa-gear fa-fw me-2"></i>Setting
                </a>
            </li>
            
            <li>
                <a class="d-block py-2 px-3 text-decoration-none" href="logout-test.php">
                    <i class="fa-solid fa-right-from-bracket fa-fw me-2"></i>Sign out
                </a>
            </li>
        </ul> -->
        </nav>
    </aside>
    <main class="main-content">
        <div class="px-3">
        <div class="py-2">
            <form action="dashboard-coupon-search.php">
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
            <a class="btn btn-info" href="dashboard-newcoupon-ajax.php">新增</a>
            <div>
                共 <?= $totalUser ?> 筆, 第 <?= $page ?> 頁
            </div>
        </div>
        <div class="py-2 d-flex justify-content-end">
            <div class="btn-group">
                <a href="dashboard-coupon-list.php?page=<?=$page?>&type=1" class="btn btn-dark <?php if($type==1)echo"active"?>">id <i class="fa-solid fa-arrow-down-short-wide" ></i></a>
                <a href="dashboard-coupon-list.php?page=<?=$page?>&type=2" class="btn btn-dark <?php if($type==2)echo"active"?>">id <i class="fa-solid fa-arrow-up-wide-short"></i></a>
                <a href="dashboard-coupon-list.php?page=<?=$page?>&type=3" class="btn btn-dark <?php if($type==3)echo"active"?>">code <i class="fa-solid fa-arrow-down-short-wide" ></i></a>
                <a href="dashboard-coupon-list.php?page=<?=$page?>&type=4" class="btn btn-dark <?php if($type==4)echo"active"?>">code <i class="fa-solid fa-arrow-up-wide-short"></i></a>
                <a href="dashboard-coupon-list.php?page=<?=$page?>&type=5" class="btn btn-dark <?php if($type==5)echo"active"?>">deadline <i class="fa-solid fa-arrow-down-short-wide" ></i></a>
                <a href="dashboard-coupon-list.php?page=<?=$page?>&type=6" class="btn btn-dark <?php if($type==6)echo"active"?>">deadline <i class="fa-solid fa-arrow-up-wide-short"></i></a> 
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
                            <a href="dashboard-coupon-edit.php?coupon_id=<?= $row["coupon_id"] ?>" class="btn btn-info">編輯</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php for($i=1 ; $i<=$totalPage; $i++): ?>
                <li class="page-item  <?php if($i==$page) echo "active";?>"><a class="page-link" href="dashboard-coupon-list.php?page=<?=$i?>&type=<?=$type?>"><?=$i?></a></li>
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
</body>

</html>