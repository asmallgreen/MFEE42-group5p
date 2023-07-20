<?php
if (!isset($_GET["id"])) {
    // die("資料不存在");
    header("location:admin-member.php");
}
$id = $_GET["id"];

require_once("db_connect-test.php");

$sql = "SELECT * FROM membership WHERE id=$id AND valid=1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
// var_dump($row);

if ($row["gender"] == 1) {
    $genderValue = "男";
} elseif ($row["gender"] == 2) {
    $genderValue = "女";
} else {
    $genderValue = "";
}

if ($row["level"] == 1) {
    $level = "普通會員";
} elseif ($row["level"] == 2) {
    $level = "VIP會員";
} elseif($row["level"] == 3) {
    $level = "VVIP會員";
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="/practice/dashboard-css.css">
    <style>
        .tab-content li:first-child {
            display: block;
        }
    </style>
</head>

<body>
    <?php include("/xampp/htdocs/practice/dashboard-admin-header-aside.php") ?>
    <main class="main-content">
        <div class="container-fluid">
            <div class="py-2">
                <a class="btn btn-info" href="admin-member.php">回使用者列表</a>
            </div>
            <table class="table table-bordered">
                <tr>
                <div class="p-2">
                        <div class="col-lg-3 col-md-4">
                            <div class="ratio ratio-1x1">
                               <img class="object-fit-cover" src="images/<?= $row["member_img"]; ?>" alt="">
                            </div>
                        </div>
                    </div>
                    
                </tr>

                <tr>
                    <th>帳號</th>
                    <td><?= $row["account"] ?></td>
                </tr>
                <tr>
                    <th>姓名</th>
                    <td><?= $row["name"] ?></td>
                </tr>
                <tr>
                    <th>性別</th>
                    <td><?= $genderValue ?></td>
                </tr>
                <tr>
                    <th>生日</th>
                    <td><?= $row["birthday"] ?></td>
                </tr>
                <tr>
                    <th>email</th>
                    <td><?= $row["email"] ?></td>
                </tr>
                <tr>
                    <th>電話</th>
                    <td><?= $row["phone"] ?></td>
                </tr>
                <tr>
                    <th>地址</th>
                    <td><?= $row["address"] ?></td>
                </tr>
                <tr>
                    <th>會員等級</th>
                    <td><?= $row["level"] ?></td>
                </tr>
                <tr>
                    <th>註冊時間</th>
                    <td><?= $row["created_at"] ?></td>
                </tr>
            </table>
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
            const firstTabLink = document.querySelector(".tabs li:nth-child(1) a");
            firstTabLink.classList.add("active");
        });
    </script>

</body>

</html>