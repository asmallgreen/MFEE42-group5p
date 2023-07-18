<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location: sign-in-test.php");
}
$gender = $_SESSION["user"]["gender"];

if ($gender == 1) {
    $genderValue = "男";
} elseif ($gender == 2) {
    $genderValue = "女";
} else {
    $genderValue = "";
}

if (isset($_SESSION["user"]["member_img"])) {
    $memberImg = $_SESSION["user"]["member_img"];
}
if (empty($_SESSION["user"]["member_img"])) {
    $memberImg = "avatar01.jpg";
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Membership center</title>
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

        .borderbottom {
            border-bottom: 7px solid transparent;
        }

        .chart {
            height: 400px;
        }
    </style>
</head>

<body>
    <header class="text-bg-dark d-flex shadow fixed-top justify-content-between align-items-center">
        <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark container-fluid" data-bs-theme="dark">
            <div class="container-fluid d-flex justify-content-between">
                <!-- <a class="navbar-brand" href="#">
      <img src="/images/bow_icon.jpg" alt="Bootstrap" width="30" height="24">
    </a> -->
                <div>
                    <a class="navbar-brand" href="#">會員中心</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>


                <div class=" borderbottom" id="navbarNav">
                    <div class="d-flex align-items-center">
                        <div class="me-3 ">
                            hi, <?= $_SESSION["user"]["name"] ?>
                        </div>

                        <a href="logout-test.php" class="btn btn-dark me-3"><i class="fa-solid fa-right-from-bracket"></i> Log out</a>
                    </div>
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
            <ul class="list-unstyled">
            <li class="p-3">
                    <h2 class="" id="">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            會員
                        </button>
                    </h2>
                    <div class="">
                    <a class="d-block py-2 px-3 text-decoration-none" href="./member-edit.php">
                        <i class="fa-solid fa-user-pen"></i> 修改會員資料
                    </a>
                    </div>
                    <div class="">
                    <a class="d-block py-2 px-3 text-decoration-none" href="">
                        <i class="fa-solid fa-key"></i> 修改密碼
                    </a>
                    </div>
                </li>
                
        </nav>
    </aside>
    <main class="main-content">
        <div class="px-3">
            <div class="d-flex justify-content-between align-items-center border-bottom">
                <h1>會員資料中心</h1>
                <div>
                    <div class="btn-group btn-group-sm " role="group" aria-label="">
                        <button class="btn btn-outline-secondary">Share</button>
                        <button class="btn btn-outline-secondary">Export</button>
                    </div>
                    <button class="btn btn-outline-secondary btn-sm">This week</button>
                </div>
            </div>

            <div class="chart">
                <div class="p-5">
                    <!-- 會員頭像 -->
                    <div class="p-2">
                        <div class="col-lg-3 col-md-4">
                            <div class="ratio ratio-1x1">
                                <img class="object-fit-cover" src="images/<?= $memberImg; ?>" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- 會員資料 -->
                    <div class="w-75">
                        <div class="d-flex py-1">
                            <div class="h3 text-primary w-50"><?= $_SESSION["user"]["account"] ?></div>
                            <div class="w-75 align-bottom pt-2">LV.<?= $_SESSION["user"]["level"] ?></div>
                        </div>
                        <div class="d-flex py-2">
                            <div class="text-secondary w-50">name</div>
                            <div class="w-75"><?= $_SESSION["user"]["name"] ?></div>
                        </div>
                        <div class="d-flex py-2">
                            <div class="text-secondary w-50">gender</div>
                            <div class="w-75"><?= $genderValue ?></div>
                        </div>
                        <div class="d-flex py-2">
                            <div class="text-secondary w-50">birthday</div>
                            <div class="w-75"><?= $_SESSION["user"]["birthday"] ?></div>
                        </div>
                        <div class="d-flex py-2">
                            <div class="text-secondary w-50">email</div>
                            <div class="w-75"><?= $_SESSION["user"]["email"] ?></div>
                        </div>
                        <div class="d-flex py-2">
                            <div class="text-secondary w-50">phone</div>
                            <div class="w-75"><?= $_SESSION["user"]["phone"] ?></div>
                        </div>
                        <div class="d-flex py-2">
                            <div class="text-secondary w-50">address</div>
                            <div class="w-75"><?= $_SESSION["user"]["address"] ?></div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>