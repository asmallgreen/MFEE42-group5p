<?php
if (isset($_GET["name"])) {
    $name = $_GET["name"];
    $valid = 1;
    require_once("pdo-connect-test.php");

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
    // 計算分頁相關變數
    $DuosqlTotal = "SELECT id FROM membership WHERE name LIKE '%$name%' AND valid=1 $orderBy";
    $stmtTotal = $conn->query($DuosqlTotal);
    $DuototalMember = $stmtTotal->rowCount();
    $Duopage = $_GET["page"] ?? 1;
    $Duoperpage = 5;
    $DuostartItem = ($Duopage - 1) * $Duoperpage;
    $DuototalPage = ceil($DuototalMember / $Duoperpage);

   

    // 搜尋功能 (使用 PDO 預處理，避免 SQL 注入攻擊)
    $sql = "SELECT id, name, gender, email, phone, level FROM membership WHERE name LIKE :name AND valid=:valid  $orderBy LIMIT $DuostartItem, $Duoperpage";
    $stmt = $conn->prepare($sql);

    // 使用綁定參數的方式來執行查詢
    $stmt->bindValue(':name', "%$name%", PDO::PARAM_STR);
    $stmt->bindValue(':valid', $valid, PDO::PARAM_INT);
    $stmt->execute();

    // 取得查詢結果
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $user_count = $stmt->rowCount();

    // 將所有資料進行HTML編碼
    foreach ($rows as &$row) {
        foreach ($row as &$value) {
            $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        }
    }
} else {
    $user_count = 0;
}


if (empty($_GET["name"])) {
    header("location: admin-member.php");
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
        .tab-content li:nth-child(1) {
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
                <form action="search-test.php" id="searchForm">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="搜尋使用者" name="name" id="searchInput">
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
                        <a href="http://localhost/practice/search-test.php?name=<?=$name?>&page=<?= $Duopage ?>&type=1" class="btn btn-outline-secondary <?php if ($Duotype == 1) echo "active" ?>">依id排序</a>
                        <a href="http://localhost/practice/search-test.php?name=<?=$name?>&page=<?= $Duopage ?>&type=2" class="btn btn-outline-secondary <?php if ($Duotype == 2) echo "active" ?>">依性別排序</a>
                        <a href="http://localhost/practice/search-test.php?name=<?=$name?>&page=<?= $Duopage ?>&type=3" class="btn btn-outline-secondary <?php if ($Duotype == 3) echo "active" ?>">依生日排序</a>
                        <a href="http://localhost/practice/search-test.php?name=<?=$name?>&page=<?= $Duopage ?>&type=4" class="btn btn-outline-secondary btn-sm <?php if ($Duotype == 4) echo "active" ?>">依等級排序</a>
                    </div>
                </div>
            </div>
            <!-- 會員資料列表內容 -->
            <div class="chart">
                <div class="py-2">
                    <?php if (isset($_GET["name"])) : ?>
                        <div class="py-2">
                            搜尋 <span class="text-danger"><?= $name ?></span> 的結果,共有 <span class="text-danger"><?= $user_count ?></span> 筆符合資格的資料
                        </div>
                    <?php endif; ?>
                </div>
                <?php if ($user_count != 0) : ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>gender</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>level</th>
                                <th>詳細資料</th>
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
                                    <td>
                                    <a href="member.php?id=<?= $row["id"] ?>" class="btn btn-info">顯示</a>
                                </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php for ($i = 1; $i <= $DuototalPage; $i++) : ?>
                                <li class="page-item <?php if ($i == $Duopage) echo "active"; ?>"><a class="page-link" href="search-test.php?name=<?= $name ?>&page=<?= $i ?>"><?= $i ?></a></li>

                            <?php endfor; ?>
                        </ul>
                    </nav>
                <?php endif; ?>
                <div class="d-flex justify-content-end">
                    <a class="btn btn-info" href="admin-member.php">返回會員列表</a>
                </div>

            </div><!-- chart結束 -->

        </div>
    </main>
    <?php include("/xampp/htdocs/practice/dashboard-js.php") ?>
    <script>
        // 使用 JavaScript 為 .tabs li a:nth-child() 元素添加 active class
        document.addEventListener("DOMContentLoaded", function() {
            const firstTabLink = document.querySelector(".tabs li:nth-child(1) a");
            firstTabLink.classList.add("active");
        });
    </script>
    <!-- 如果搜尋欄沒有輸入文字，按下搜尋不會跳回最初的會員列表 -->
    <script>
        document.getElementById("searchForm").addEventListener("submit", function(event) {
            // 取得搜尋輸入框的值
            var searchInputValue = document.getElementById("searchInput").value.trim();

            // 檢查是否有輸入文字
            if (searchInputValue === "") {
                // 取消表單提交的預設行為
                event.preventDefault();
            }
        });
    </script>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>