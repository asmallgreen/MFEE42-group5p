<?php
$couponcode=$_GET["coupon_code"];
$likeCoupon="LIKE '%$couponcode%'";
require_once("coupon_db_connect.php");
$sql="SELECT coupon_id, coupon_code, discount, deadline FROM coupon WHERE coupon_code  $likeCoupon AND valid=1";
$result=$conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
$code_count = $result->num_rows;
if(empty($_GET["coupon_code"])){
$code_count=0;
}



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
                <a href="coupon-list.php" class="btn btn-info my-2">回優惠碼列表</a>
                <form action="coupon-search.php">
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
                    <?php if(isset($couponcode)):?>
                     搜尋 <?=$couponcode?> 的結果,
                     <?php  endif;?>
                    共有<?=$code_count?> 筆符合資料
                </div>
            </div>
            <?php if($code_count!=0): ?>
            <div class="py-2 d-flex justify-content-between align-items-center">
                <a class="btn btn-info" href="newcoupon-ajax.php">新增</a>
                <div>
                共 <?= $code_count ?> 筆
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        
                        <th>code</th>
                        <th>discount</th>
                        <th>deadline</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($rows as $row): ?>
                    <tr>
                        
                        <td><?=$row["coupon_code"]?></td>
                        <td><?=$row["discount"]?></td>
                        <td><?=$row["deadline"]?></td>
                        <td>
                            <a href="coupon-edit.php?coupon_id=<?=$row["coupon_id"]?>" class="btn btn-info">編輯</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php endif?>

        </div>
    </main>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>