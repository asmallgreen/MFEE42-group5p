<?php
require_once("../db_connect-test.php");
$Duotype = $_GET["type"] ?? 1;
$Duopage = $_GET["page"] ?? 1;
// 分頁部分 (取會員數量除以每個分頁要的數量)
$DuosqlTotal = "SELECT id FROM membership WHERE valid=1";
$DuoresultTotal = $conn->query($DuosqlTotal);
$DuototalMember = $DuoresultTotal->num_rows;
$Duoperpage = 5;
$DuostartItem = ($Duopage - 1) * $Duoperpage;
$DuototalPage = ceil($DuototalMember / $Duoperpage);

// 篩選部分 (將ORDER BY條件設定好，放入$sql中選欄位並設定順序)
if ($Duotype == 1) {
    $orderBy = "ORDER BY id ASC";
} elseif ($Duotype == 2) {
    $orderBy = "ORDER BY gender ASC";
} elseif ($Duotype == 3) {
    $orderBy = "ORDER BY birthday ASC";
} elseif ($Duotype == 4) {
    $orderBy = "ORDER BY level DESC";
} else {
    header("location: admin-member.php");
}


$Duosql = "SELECT * FROM membership WHERE valid=1 $orderBy LIMIT $DuostartItem, $Duoperpage";
$Duoresult = $conn->query($Duosql);
$Duorows = $Duoresult->fetch_all(MYSQLI_ASSOC);

foreach ($Duorows as $Duorow) {
    foreach ($Duorow as $value) {
        $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }
    // unset($Duorow);
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
                        <a href="http://localhost/practice/admin-member.php?page=<?= $Duopage ?>&type=1" class="btn btn-outline-secondary <?php if ($Duotype == 1) echo "active" ?>">依id排序</a>
                        <a href="http://localhost/practice/admin-member.php?page=<?= $Duopage ?>&type=2" class="btn btn-outline-secondary <?php if ($Duotype == 2) echo "active" ?>">依性別排序</a>
                        <a href="http://localhost/practice/admin-member.php?page=<?= $Duopage ?>&type=3" class="btn btn-outline-secondary <?php if ($Duotype == 3) echo "active" ?>">依生日排序</a>
                        <a href="http://localhost/practice/admin-member.php?=<?= $Duopage ?>&type=4" class="btn btn-outline-secondary btn-sm <?php if ($Duotype == 4) echo "active" ?>">依等級排序</a>
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
                                <td>
                                    <a href="member.php?id=<?= $Duorow["id"] ?>" class="btn btn-info">顯示</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- 分頁按鈕 -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <?php for ($i = 1; $i <= $DuototalPage; $i++) : ?>
                            <li class="page-item <?php if ($i == $Duopage) echo "active"; ?>"><a class="page-link" href="admin-member.php?page=<?= $i ?>&type=<?= $Duotype ?>"><?= $i ?></a></li>
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
            buttons[i].addEventListener("click", function(event) {
                for (let j = 0; j < buttons.length; j++) {
                    event.preventDefault();
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
    <script>
        // 使用 JavaScript 為 .tabs li a:nth-child() 元素添加 active class
        document.addEventListener("DOMContentLoaded", function() {
            const firstTabLink = document.querySelector(".tabs li:nth-child(1) a");
            firstTabLink.classList.add("active");
        });
    </script>
</body>

</html>