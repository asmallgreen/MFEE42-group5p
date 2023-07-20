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
<!-- modal彈出視窗，顯示會員資料修改成功訊息 -->
<?php if (isset($_SESSION["editSuccess"])):?>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">編輯成功</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?=$_SESSION["editSuccess"]; unset($_SESSION["editSuccess"])?>
      </div>
      <div class="modal-footer">
        <a href="/practice/dashboard-test.php" type="button" class="btn btn-secondary" >關閉</a>
      </div>
    </div>
  </div>
</div>
<script>
        // 使用 JavaScript 來顯示 Modal
        document.addEventListener("DOMContentLoaded", function() {
            var modal = new bootstrap.Modal(document.getElementById("exampleModal"));
            modal.show();
        });
    </script>
    <?php endif; ?>
<header class="text-bg-dark d-flex shadow fixed-top justify-content-between align-items-center">
        <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark container-fluid" data-bs-theme="dark">
            <div class="container-fluid d-flex justify-content-between">
                <!-- <a class="navbar-brand" href="#">
      <img src="/images/bow_icon.jpg" alt="Bootstrap" width="30" height="24">
    </a> -->
                <div>
                    <a class="navbar-brand " href="dashboard-test.php">會員中心</a>
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
                <h1 id="title">修改會員資料</h1>
                <div>
                    <div class="btn-group btn-group-sm " role="group" aria-label="">
                        <button class="btn btn-outline-secondary">Share</button>
                        <button class="btn btn-outline-secondary">Export</button>
                    </div>
                    <button class="btn btn-outline-secondary btn-sm">This week</button>
                </div>
            </div>

            <form action="doEdit-test.php" method="POST" enctype="multipart/form-data">
                <div class="container d-flex justify-content-start py-3">
                    <div>
                        <!-- 更改會員頭像 -->
                        <div class="py-2">
                            <label for="">更改會員頭像</label>
                            <input type="file" class="form-control" value="" name="file">
                        </div>
                        <!-- 修改會員資料 -->
                        <div class="py-2">
                            <label for="">account</label>
                            <input type="disabled" class="form-control" value="<?= $_SESSION["user"]["account"] ?>" disabled>
                        </div>
                        <?php if (isset($_SESSION["error"]["accountMessage"])) : ?>
                            <div class="pt-2 text-danger"><?= $_SESSION["error"]["accountMessage"] ?></div>
                        <?php unset($_SESSION["error"]["accountMessage"]);
                        endif; ?>
                        <div class="py-2">
                            <label for="">name</label>
                            <input type="text" class="form-control" value="<?= $_SESSION["user"]["name"] ?>" name="name">
                        </div>
                        <?php if (isset($_SESSION["error"]["nameMessage"])) : ?>
                            <div class="pt-2 text-danger"><?= $_SESSION["error"]["nameMessage"] ?></div>
                        <?php unset($_SESSION["error"]["nameMessage"]);
                        endif; ?>
                        <div class="py-2">
                            <label for="">gender</label>
                            <select class="form-control" name="gender" id="gender" value="<?= $_SESSION["user"]["gender"] ?>">
                                <option value="0" <?= $_SESSION["user"]["gender"] === "0" ? "selected" : "" ?>>請選擇</option>
                                <option value="1" <?= $_SESSION["user"]["gender"] === "1" ? "selected" : "" ?>>男</option>
                                <option value="2" <?= $_SESSION["user"]["gender"] === "2" ? "selected" : "" ?>>女</option>
                            </select>
                        </div>
                        <div class="py-2">
                            <label for="">birthday</label>
                            <input type="disabled" class="form-control" value="<?= $_SESSION["user"]["birthday"] ?>" disabled>
                        </div>
                        <div class="py-2">
                            <label for="">email</label>
                            <input type="email" class="form-control" value="<?= $_SESSION["user"]["email"] ?>" name="email">
                        </div>
                        <?php if (isset($_SESSION["error"]["emailMessage"])) : ?>
                            <div class="pt-2 text-danger"><?= $_SESSION["error"]["emailMessage"] ?></div>
                        <?php unset($_SESSION["error"]["emailMessage"]);
                        endif; ?>
                        <div class="py-2">
                            <label for="">phone</label>
                            <input type="phone" class="form-control" value="<?= $_SESSION["user"]["phone"] ?>" name="phone">
                        </div>
                        <?php if (isset($_SESSION["error"]["phoneMessage"])) : ?>
                            <div class="pt-2 text-danger"><?= $_SESSION["error"]["phoneMessage"] ?></div>
                        <?php unset($_SESSION["error"]["phoneMessage"]);
                        endif; ?>
                        <div class=" ps-2">
                            <label for="">address</label>
                            <input type="text" class="form-control w-100" value="<?= $_SESSION["user"]["address"] ?>" name="address">
                        </div>
                        <?php if (isset($_SESSION["error"]["addressMessage"])) : ?>
                            <div class="pt-2 text-danger"><?= $_SESSION["error"]["addressMessage"] ?></div>
                        <?php unset($_SESSION["error"]["addressMessage"]);
                        endif; ?>
                        <div class="pt-2 ps-2">
                            <button class="btn btn-info text-end " id="editBtn" data-bs-toggle="modal1" data-bs-target="#exampleModal1" type="submit">
                                修改完成
                            </button>
                        </div>
                    </div>

                </div>



            </form>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel1">會員資料修改</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal1" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        您的會員資料已修改完成
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal1">Close</button>
                        <button type="button" class="btn btn-primary">關閉</button>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <div class="d-flex">
        <button class="btn btn-danger position-absolute deletemember" type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal">刪除會員資料</button>
        <form action="doDelete-test.php" method="POST" class="">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            確定要刪除會員資料嗎?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-bs-dismiss="modal">取消</button>
                            <button type="submit" class="btn btn-danger">確認刪除</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- modal彈出確認刪除訊息 -->
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!-- <script>
        const myModal = new bootstrap.Modal(document.getElementById('myModal'), options)
        const editBtn=document.querySelector("#editBtn")
        editBtn.addEventListener("click", function(){
            myModal.modal("show");
        })  
          </script> -->

</body>

</html>