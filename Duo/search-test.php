<?php
if(isset($_GET["name"])){
    $name=$_GET["name"];
  require_once("../db_connect-test.php");
//   搜尋功能 (設定WHERE到想搜尋的欄位，加上LIKE %參數% 可以不用抓完整精準的字元)
  $sql="SELECT id, name, gender, email, phone, level FROM membership WHERE name LIKE '%$name%' AND valid=1";
  $result = $conn->query($sql);
  $rows=$result->fetch_all(MYSQLI_ASSOC);
  $user_count=$result->num_rows;
  }else{
    $user_count=0;
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
        <a class="bg-black py-3 px-3 text-decoration-none link-light brand-name" href="/">Admin center</a>
        <div class="d-flex align-items-center">
            <div class="me-3">
                hi, Muduo
            </div>

            <!-- <a href="logout-test.php" class="btn btn-dark me-3"><i class="fa-solid fa-right-from-bracket"></i> Log out</a> -->
        </div>
    </header>
    <aside class="main-aside position-fixed bg-light vh-100 border-end">
        <nav class="">
            <ul class="list-unstyled">
                <li>
                    <a class="d-block py-2 px-3 text-decoration-none" href="./dashboard-admin-test.php">
                        <i class="fa-solid fa-users"></i>會員資料
                    </a>
                </li>
                <li>
                    <a class="d-block py-2 px-3 text-decoration-none" href="">
                        <i class="fa-regular fa-note-sticky fa-fw me-2"></i>Order
                    </a>
                </li>
                <li>
                    <a class="d-block py-2 px-3 text-decoration-none" href="">
                        <i class="fa-solid fa-cart-shopping fa-fw me-2"></i>Product
                    </a>
                </li>
                <li>
                    <a class="d-block py-2 px-3 text-decoration-none" href="">
                        <i class="fa-solid fa-user-group fa-fw me-2"></i>Customers
                    </a>
                </li>
                <li>
                    <a class="d-block py-2 px-3 text-decoration-none" href="">
                        <i class="fa-solid fa-chart-line fa-fw me-2"></i>Report
                    </a>
                </li>
                <li>
                    <a class="d-block py-2 px-3 text-decoration-none" href="">
                        <i class="fa-solid fa-puzzle-piece fa-fw me-2"></i>Intergrations
                    </a>
                </li>
            </ul>
            <div class="my-3 d-flex justify-content-between text-secondary px-3">
                <div> SAVED REPORTS</div>
                <a role="button" href="">
                    <i class="fa-regular fa-square-plus text-secondary"></i>
                </a>
            </div>
            <ul class="list-unstyled">
                <li>
                    <a class="d-block py-2 px-3 text-decoration-none" href="">
                        <i class="fa-regular fa-file-lines fa-fw me-2"></i>Current month
                    </a>
                </li>
                <li>
                    <a class="d-block py-2 px-3 text-decoration-none" href="">
                        <i class="fa-regular fa-file-lines fa-fw me-2"></i> Last quarter
                    </a>
                </li>
                <li>
                    <a class="d-block py-2 px-3 text-decoration-none" href="">
                        <i class="fa-regular fa-file-lines fa-fw me-2"></i>Social engagement
                    </a>
                </li>
                <li>
                    <a class="d-block py-2 px-3 text-decoration-none" href="">
                        <i class="fa-regular fa-file-lines fa-fw me-2"></i>Year-end sale
                    </a>
                </li>
            </ul>
            <hr>

        </nav>
    </aside>
    <main class="main-content">
        <div class="px-3">
<!-- 搜尋使用者 -->
        <div class="py-2">
        <form action="search-test.php">
             <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="搜尋使用者" name="name">
            </div>
            <div class="col-auto">
                <button class="btn btn-info" type="submit">搜尋</button>
            </div>
        </div>
        </form>
        </div>
<!-- 會員資料 -->
            <div class="d-flex justify-content-between align-items-center border-bottom">
                <h1>會員資料</h1>
                <div>
                    <div class="btn-group btn-group-sm " role="group" aria-label="">
                        <button class="btn btn-outline-secondary">Share</button>
                        <button class="btn btn-outline-secondary">Export</button>
                    </div>
                    <button class="btn btn-outline-secondary btn-sm">This week</button>
                </div>
            </div>
<!-- 會員資料列表內容 -->
            <div class="chart">
                <div class="py-2">
                    <?php if(isset($_GET["name"])):?>
                        <div class="py-2">
                            搜尋 <span class="text-danger"><?=$name?></span>  的結果,共有 <span class="text-danger"><?=$user_count?></span> 筆符合資格的資料
                        </div>
                    <?php endif;?>
                </div>
                <?php if($user_count!=0):?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>gender</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>level</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rows as $row) : ?>
                            <tr>
                                <td><?= $row["id"] ?></td>
                                <td><?= $row["name"] ?></td>
                                <td><?= $row["gender"] ?></td>
                                <td><?= $row["email"] ?></td>
                                <td><?= $row["phone"] ?></td>
                                <td><?= $row["level"] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php endif;?>
                <div class="d-flex justify-content-end">
                    <a class="btn btn-info" href="dashboard-admin-test.php">返回會員列表</a>
                </div>
                
             </div><!-- chart結束 -->

        </div>
    </main>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>