<?php
require_once("../db_connect-test.php");
// 分頁部分 (取會員數量除以每個分頁要的數量)
$DuosqlTotal = "SELECT id FROM membership WHERE valid=1";
$DuoresultTotal = $conn->query($DuosqlTotal);
$DuototalMember = $DuoresultTotal->num_rows;
$Duopage = $_GET["page"] ?? 1;
$Duoperpage = 5;
$DuostartItem = ($Duopage - 1) * $Duoperpage;
$DuototalPage = ceil($DuototalMember / $Duoperpage);

// 篩選部分 (將ORDER BY條件設定好，放入$sql中選欄位並設定順序)
$Duotype = $_GET["type"] ?? 1;
if ($Duotype == 1) {
    $orderBy = "ORDER BY id ASC";
} elseif ($Duotype == 2) {
    $orderBy = "ORDER BY gender ASC";
} elseif ($Duotype == 3) {
    $orderBy = "ORDER BY birthday ASC";
} elseif ($Duotype == 4) {
    $orderBy = "ORDER BY level DESC";
}


$Duosql = "SELECT * FROM membership WHERE valid=1 $orderBy LIMIT $DuostartItem, $Duoperpage";
$Duoresult = $conn->query($Duosql);
$Duorows = $Duoresult->fetch_all(MYSQLI_ASSOC);


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

        .tab-content li {
            display: none;
        }
        .tabs li a{
            border-bottom: 5px solid transparent;
        }
        .tabs li a.active {
            border-bottom: 5px solid rgb(245, 82, 53);
        }

        main {
            display: none;
        }
    </style>
</head>

<body>
    <header class="text-bg-dark d-flex shadow fixed-top justify-content-between align-items-center">
        <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
            <div class="container-fluid">
                <!-- <a class="navbar-brand" href="#">
      <img src="/images/bow_icon.jpg" alt="Bootstrap" width="30" height="24">
    </a> -->
                <a class="navbar-brand" href="#">管理者後臺介面</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav tabs">
                        <li class="nav-item px-2">
                            <a class="nav-link" aria-current="page" href="#">會員</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link" href="#">產品</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link" href="#">庫存</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link " href="#">課程</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link " href="#">師資</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link " href="#">行銷</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- <a class="bg-black py-3 px-3 text-decoration-none link-light brand-name" href="dashboard-admin-test.php">管理者後臺介面</a>
        <div class="d-flex align-items-center">
            <div class="me-3">
                hi, 慕朵
            </div> -->

        <!-- <a href="logout-test.php" class="btn btn-dark me-3"><i class="fa-solid fa-right-from-bracket"></i> Log out</a> -->

    </header>
    <aside class="main-aside position-fixed bg-light vh-100 border-end">
        <nav class="">
            <ul class="list-unstyled tab-content">
                <li class="p-3">
                    <h2 class="" id="">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            會員
                        </button>
                    </h2>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="admin-member.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>會員資料
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="sign-up-test.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>會員註冊
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="sign-in-test.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>會員登入
                        </a>
                    </div>
                </li>

                <!-- <li>
                    <a class="d-block py-2 px-3 text-decoration-none memberaside" id="memberaside" href="admin-member.php">
                        <i class="fa-solid fa-users fa-fw me-2"></i>會員資料
                    </a>
                </li> -->
                <li class="p-3">
                    <h2 class="" id="">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            產品
                        </button>
                    </h2>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="admin-member.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>欄位一
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="sign-up-test.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>欄位二
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="sign-in-test.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>欄位三
                        </a>
                    </div>
                </li>
                <li class="p-3">
                    <h2 class="" id="">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            庫存
                        </button>
                    </h2>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="admin-member.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>欄位一
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="sign-up-test.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>欄位二
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="sign-in-test.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>欄位三
                        </a>
                    </div>
                </li>
                <li class="p-3">
                    <h2 class="" id="">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            課程
                        </button>
                    </h2>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="admin-member.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>欄位一
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="sign-up-test.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>欄位二
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="sign-in-test.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>欄位三
                        </a>
                    </div>
                </li>
                <li class="p-3">
                    <h2 class="" id="">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            師資
                        </button>
                    </h2>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="admin-member.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>欄位一
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="sign-up-test.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>欄位二
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="sign-in-test.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>欄位三
                        </a>
                    </div>
                </li>
                <li class="p-3">
                    <h2 class="" id="">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            行銷
                        </button>
                    </h2>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="admin-member.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>欄位一
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="sign-up-test.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>欄位二
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="sign-in-test.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>欄位三
                        </a>
                    </div>
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
                        <a href="http://localhost/practice/dashboard-admin-test.php?page=<?= $Duopage ?>&type=1" class="btn btn-outline-secondary <?php if ($Duotype == 1) echo "active" ?>">依id排序</a>
                        <a href="http://localhost/practice/dashboard-admin-test.php?page=<?= $Duopage ?>&type=2" class="btn btn-outline-secondary <?php if ($Duotype == 2) echo "active" ?>">依性別排序</a>
                        <a href="http://localhost/practice/dashboard-admin-test.php?page=<?= $Duopage ?>&type=3" class="btn btn-outline-secondary <?php if ($Duotype == 3) echo "active" ?>">依生日排序</a>
                        <a href="http://localhost/practice/dashboard-admin-test.php?=<?= $Duopage ?>&type=4" class="btn btn-outline-secondary btn-sm <?php if ($Duotype == 4) echo "active" ?>">依等級排序</a>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <div class="">
                    共 <?= $DuototalMember ?> 人, 第 <?= $Duopage ?> 頁
                </div>
            </div>
            <!-- 會員資料列表內容 -->
            <div class="chart">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>gender</th>
                            <th>birthday</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>level</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($Duorows as $Duorow) : ?>
                            <tr>
                                <td><?= $Duorow["id"] ?></td>
                                <td><?= $Duorow["name"] ?></td>
                                <td><?= $Duorow["gender"] ?></td>
                                <td><?= $Duorow["birthday"] ?></td>
                                <td><?= $Duorow["email"] ?></td>
                                <td><?= $Duorow["phone"] ?></td>
                                <td><?= $Duorow["level"] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- 分頁按鈕 -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <?php for ($i = 1; $i <= $DuototalPage; $i++) : ?>
                            <li class="page-item <?php if ($i == $Duopage) echo "active"; ?>"><a class="page-link" href="dashboard-admin-test.php?page=<?= $i ?>"><?= $i ?></a></li>
                        <?php endfor; ?>
                    </ul>
                </nav>
            </div>

        </div>
    </main>

    <script>
        const buttons = document.querySelectorAll(".tabs li a")
        const contents = document.querySelectorAll(".tab-content li")


        for (let i = 0; i < buttons.length; i++) {
            buttons[i].addEventListener("click", function() {
                for (let j = 0; j < buttons.length; j++) {
                    buttons[j].classList.remove("active")
                    contents[j].style.display = "none";
                }
                this.classList.add("active")
                console.log(contents[i].style.display = "block")
            });
        }
    </script>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>