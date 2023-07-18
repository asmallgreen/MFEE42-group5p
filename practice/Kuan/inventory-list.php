<?php
require_once("db_connect.php");

$sqlTotal = "SELECT inventory.* , product.name AS product_name , product.id AS product_id,category.name AS category_name, product.valid AS product_valid
FROM inventory
JOIN product ON product.id = inventory.id
JOIN category ON category.id = inventory.category
WHERE inventory.valid=1";
$resultTotal = $conn->query($sqlTotal);
$totalInventory = $resultTotal->num_rows;

$page = $_GET["page"] ?? 1;

$perPage = 10;
$startItem = ($page - 1) * $perPage;
$totalPage = ceil($totalInventory / $perPage);


$type = $_GET["type"] ?? 1;

if ($type == 1) {
    $orderBy = "ORDER BY inventory.id ASC";
} else if ($type == 2) {
    $orderBy = "ORDER BY inventory.id DESC";
} else if ($type == 3) {
    $orderBy = "ORDER BY inventory.category ASC";
} else if ($type == 4) {
    $orderBy = "ORDER BY inventory.category DESC";
} else {
    $orderBy = "";
}



$sql = "SELECT inventory.* , product.name AS product_name , product.id AS product_id,category.name AS category_name, product.valid AS product_valid
FROM inventory
JOIN product ON product.id = inventory.id
JOIN category ON category.id = inventory.category
WHERE inventory.valid=1
$orderBy
LIMIT $startItem, $perPage";

$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
// var_dump($rows)

// category rows
$sqlCategory = "SELECT * FROM category ORDER BY id ASC";
$resultCate = $conn->query($sqlCategory);
$cateRows = $resultCate->fetch_all(MYSQLI_ASSOC);
// var_dump($cateRows);
?>

<!doctype html>
<html lang="en">

<head>
    <title>庫存管理</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.3.0 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- fontawesome icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../dashboard-css.css">
  <style>
        .tab-content li:nth-child(3){
          display: block;
        }
        .tabs li a:nth-child(3){
            display: block;
        }
    </style>
</head>

<body>
  <?php include("/xampp/htdocs/practice/dashboard-admin-header-aside.php") ?>

    <main class="main-content">
        <div class="container">
            <div class="py-2 d-flex justify-content-between align-items-center">
                <a class="btn btn-secondary" href="inventory-list.php">返回庫存首頁</a>
                <a class="btn btn-success" href="create-inventory.php">新增庫存資料</a>
            </div>
            <!-- filter start -->
            <div class="py-2 d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <!-- 多加 & 條件指定  type 1升冪 type2 降冪 -->
                    <a href="inventory-list.php?page=<?= $page ?>&type=1" class="btn btn-secondary <?php if ($type == 1) echo "active"; ?>">
                        產品編號<i class="bi bi-arrow-down"></i>
                    </a>
                    <a href="inventory-list.php?page=<?= $page ?>&type=2" class="btn btn-secondary <?php if ($type == 2) echo "active"; ?>">
                        產品編號<i class="bi bi-arrow-up"></i>
                    </a>
                    <a href="inventory-list.php?page=<?= $page ?>&type=3" class="btn btn-secondary <?php if ($type == 3) echo "active"; ?>">
                        產品類別<i class="bi bi-arrow-down"></i>
                    </a>
                    <a href="inventory-list.php?page=<?= $page ?>&type=4" class="btn btn-secondary <?php if ($type == 4) echo "active"; ?>">
                        產品類別<i class="bi bi-arrow-up"></i>
                    </a>
                </div>
                <!-- filter start -->
                <form action="search-inventory.php">
                    <div class="row justify-content-end p-2">
                        <div class="col-auto">
                            <select class="form-select" name="cate">
                                <option value="">搜尋產品類別</option>
                                <?php foreach ($cateRows as $cate) : ?>
                                    <option value="<?= $cate["id"] ?>"><?= $cate["name"] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-auto">
                            <input class="form-control" type="text" name="keyword" placeholder="搜尋產品">
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-secondary" type="submit">搜尋</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- table start -->
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>產品編號</th>
                        <th>產品類別</th>
                        <th>產品名稱</th>
                        <th>現有庫存</th>
                        <th>最低數量</th>
                        <th>編輯</th>
                        <th>刪除</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $invertory) : ?>
                        <tr class="text-center">
                            <td><?= $invertory["id"] ?></td>
                            <td><?= $invertory["category_name"] ?></td>
                            <td><?= $invertory["product_name"] ?></td>
                            <td><?= $invertory["amount"] ?></td>
                            <td><?= $invertory["min_amount"] ?></td>
                            <td>
                                <button class="btn btn-info" type="button" data-bs-toggle="modal" data-bs-target="#updateModal<?= $invertory['id'] ?>">編輯庫存</button>
                            </td>
                            <td>
                                <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $invertory['id'] ?>">刪除</button>
                            </td>
                        </tr>

                        <!-- 刪除Modal Start-->
                        <div class="modal fade" id="deleteModal<?= $invertory['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title text-danger" id="exampleModalLabel">警告</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>是否刪除產品：<?= $invertory["product_name"] ?> ？</h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                                        <a href="doDelete.php?id=<?= $invertory['id'] ?>" class="btn btn-danger">確認刪除</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 編輯Modal Start-->
                        <div class="modal fade" id="updateModal<?= $invertory['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalLabel">編輯庫存：<br><?= $invertory["product_name"] ?></h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="doUpdate-inventory.php" method="post" id="updateForm<?= $invertory['id'] ?>">
                                            <div class="mb-2">
                                                <label for="">產品編號</label>
                                                <input type="number" class="form-control" min="0" name="id" value="<?= $invertory["id"] ?>" readonly>
                                            </div>
                                            <div class="mb-2">
                                                <label for="">產品名稱</label>
                                                <input type="text" class="form-control" name="name" value="<?= $invertory["product_name"] ?>" placeholder="請輸入產品名稱(必填)" required>
                                            </div>
                                            <div class="mb-2">
                                                <label for="">產品類別</label>
                                                <select class="form-select" name="category" required>
                                                    <option value="">請選擇產品類別(必選)</option>
                                                    <?php foreach ($cateRows as $cate) : ?>
                                                        <option value="<?= $cate["id"] ?>" <?= ($cate["id"] == $invertory["category"]) ? "selected" : "" ?>><?= $cate["name"] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <div class="mb-2">
                                                <label for="">產品數量</label>
                                                <input type="number" class="form-control" value="<?= $invertory["amount"] ?>" min="0" name="amount">
                                            </div>
                                            <div class="mb-2">
                                                <label for="">庫存最低數量</label>
                                                <input type="number" class="form-control" value="<?= $invertory["min_amount"] ?>" min="0" name="min_amount">
                                            </div>
                                            <div class="text-end">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                                                <button type="submit" class="btn btn-info" form="updateForm<?= $invertory['id'] ?>">確認編輯</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- PageNavigationstart -->
            <nav aria-label="Page navigation" class="d-flex justify-content-center">
                <ul class="pagination">
                    <li class="page-item <?php if ($page == 1) echo 'disabled'; ?>">
                        <a class="page-link" href="inventory-list.php?page=1&type=<?= $type ?>" aria-label="First">
                            <span aria-hidden="true"><i class="bi bi-chevron-double-left"></i></span>
                        </a>
                    </li>
                    <?php
                    $visiblePages = 3; // 可見的頁碼
                    $startPage = max(1, $page - floor($visiblePages / 2)); // 起始頁
                    $endPage = min($startPage + $visiblePages - 1, $totalPage); // 結束頁

                    if ($endPage - $startPage + 1 < $visiblePages) {
                        $startPage = max(1, $endPage - $visiblePages + 1);
                    }

                    for ($i = $startPage; $i <= $endPage; $i++) :
                    ?>
                        <li class="page-item <?php if ($i == $page) echo "active"; ?>">
                            <a class="page-link" href="inventory-list.php?page=<?= $i ?>&type=<?= $type ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item <?php if ($page == $totalPage) echo 'disabled'; ?>">
                        <a class="page-link" href="inventory-list.php?page=<?= $totalPage ?>&type=<?= $type ?>" aria-label="Last">
                            <span aria-hidden="true"><i class="bi bi-chevron-double-right"></i></span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

    </main>
<?php include("../dashboard-js.php")?>
<script>
    // 使用 JavaScript 為 .tabs li a:nth-child(3) 元素添加 active class
    document.addEventListener("DOMContentLoaded", function() {
      const thirdTabLink = document.querySelector(".tabs li:nth-child(3) a");
      thirdTabLink.classList.add("active");
    });
  </script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>