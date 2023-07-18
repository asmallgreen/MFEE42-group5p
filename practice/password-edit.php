<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location: sign-in.php");
}
require_once("../db_connect-test.php");
$sql = "SELECT * FROM membership WHERE id='{$_SESSION['user']['id']}'";

// $md5Password=$_SESSION["user"]["password"];
// require_once("../db_connect-test.php");
// $sql= "SELECT * FROM membership WHERE id=";
// $result=$conn->query($sql);

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

        .chart {
            height: 400px;
        }

        .deletemember {
            top: 170px;
            right: 50px;
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
                    <a class="navbar-brand" href="dashboard-test.php">會員中心</a>
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
                        <a class="d-block py-2 px-3 text-decoration-none" href="password-edit.php">
                            <i class="fa-solid fa-key"></i> 修改密碼
                        </a>
                    </div>
                </li>

        </nav>
    </aside>
    <main class="main-content">
        <div class="px-3">
            <div class="d-flex justify-content-between align-items-center border-bottom">
                <h1 id="title">修改密碼</h1>
                <div>
                    <div class="btn-group btn-group-sm " role="group" aria-label="">
                        <button class="btn btn-outline-secondary">Share</button>
                        <button class="btn btn-outline-secondary">Export</button>
                    </div>
                    <button class="btn btn-outline-secondary btn-sm">This week</button>
                </div>
            </div>

            <form action="doPasswordEdit-test.php" method="POST">
                <div class="container d-flex justify-content-start py-3">
                    <div>
                        <div class="py-2">
                            <label for="">password</label>
                            <input type="text" class="form-control" value="" name="password">
                        </div>
                        <?php if (isset($_SESSION["error"]["passwordMessage"])) : ?>
                            <div class="pt-2 text-danger"><?= $_SESSION["error"]["passwordMessage"] ?></div>
                        <?php unset($_SESSION["error"]["passwordMessage"]);
                        endif; ?>
                        <div class="py-2">
                            <label for="">repassword</label>
                            <input type="text" class="form-control" value="" name="repassword">
                        </div>
                        <?php if (isset($_SESSION["error"]["repasswordMessage"])) : ?>
                            <div class="pt-2 text-danger"><?= $_SESSION["error"]["repasswordMessage"] ?></div>
                        <?php unset($_SESSION["error"]["repasswordMessage"]);
                        endif; ?>
                         <?php if (isset($_SESSION["error"]["errorPasswordMessage"])) : ?>
                            <div class="pt-2 text-danger"><?= $_SESSION["error"]["errorPasswordMessage"] ?></div>
                        <?php unset($_SESSION["error"]["errorPasswordMessage"]);
                        endif; ?>
                    </div>
                </div>
                <div class="pt-2 ps-2">
                    <button class="btn btn-info text-end" type="submit">
                        修改完成
                    </button>
                </div>
            </form>
            <!-- <div action="doDelete-test.php" method="POST" class="position-absolute deletemember">
                <button class="btn btn-danger" type="submit">刪除會員資料</button>
            </div> -->
        </div>

    </main>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>


</body>

</html>