<?php
require_once("../db-connect.php");

if (isset($_GET["category"])) {
    $category = $_GET["category"];
    $whereClouse = "WHERE product_bow.category = $category";
    //當product_bow資料夾category欄位(id)＝$category(name=category的值)時
} else {
    $whereClouse = "";
}

if ($page = $_GET["page"] ?? 1) {
    //if page不存在 page改成1
    //從網址上get page值傳到$page
    $perPage = 5;
    //一頁五筆
    $startItem = ($page - 1) * $perPage;
    //每頁開始的item-perPage
}

//Category

$sqlCate = "SELECT * FROM category_bow";
$resultCate = $conn->query($sqlCate);
$cateRows = $resultCate->fetch_all(MYSQLI_ASSOC);
$cateRow = $resultCate->fetch_assoc();



// page需要總頁數
$sqlTotal = "SELECT * FROM product_bow WHERE valid=1 ORDER BY product_bow.id ASC ";
$resultTotal = $conn->query($sqlTotal);
$numProduct = $resultTotal->num_rows;
$totalPage = ceil($numProduct / $perPage);


//篩選資料
if (isset($_GET["category"])) {
    $limit = "";
} else {
    $limit = "LIMIT $startItem, $perPage";
}
$sql = "SELECT product_bow.*, category_bow.name AS cateName FROM product_bow JOIN category_bow ON product_bow.category = category_bow.id $whereClouse AND valid=1 ORDER BY product_bow.id ASC $limit";
$result = $conn->query($sql);
$productRows = $result->fetch_all(MYSQLI_ASSOC);
if (isset($_GET["category"])) {
    $numProduct = $result->num_rows;
    $totalPage = ceil($numProduct / $perPage);
}
$limit = "LIMIT $startItem, $perPage";
$sql = "SELECT product_bow.*, category_bow.name AS cateName FROM product_bow JOIN category_bow ON product_bow.category = category_bow.id $whereClouse AND valid=1 ORDER BY product_bow.id ASC $limit";
$result = $conn->query($sql);
$productRows = $result->fetch_all(MYSQLI_ASSOC);




?>
<!doctype html>
<html lang="en">

<head>
    <title>List</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.3.0 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- font awsome -->
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

        /* dropdwon */
        .dropdown-menu {
            display: none;
        }

        .dropdown-menu:hover .dropdown-menu {
            display: block;
        }

        .listImg {
            width: 100px;
            height: 100px;
        }
    </style>
</head>

<body>
    <header class="text-bg-dark d-flex shadow fixed-top justify-content-between align-items-center">
        <a class="bg-black py-3 px-3 text-decoration-none link-light brand-name" href="/">Product management</a>
        <div class="d-flex align-items-center">
            <div class="me-3">管理者使用後台</div>

            <a href="logout-test.php" class="btn btn-dark me-3"><i class="fa-solid fa-right-from-bracket"></i> Log out</a>
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
            <div class="d-flex align-items-center border-bottom justify-content-between">
                <div class="d-flex  align-items-center">
                    <h1 class="mx-2 my-3">產品管理</h1>
                    <a class="navbar-brand fs-4 ms-2" href="product-list.php">Product
                        <i class="mx-2 fa-solid fa-circle-chevron-right"></i>
                        <?php if (!isset($_GET["category"])) {
                            echo "全部";
                        } ?>
                        <?php foreach ($cateRows as $cate) : ?>
                            <?php if (isset($_GET["category"]) && $_GET["category"] == $cate["id"]) {
                                echo $cate["name"];
                            } ?>
                        <?php endforeach; ?>
                    </a>
                </div>

                <div class="d-flex align-items-center me-5">
                    
                    <a href="product-create.php" class="btn"><i class="fa-solid fa-circle-plus">新增</i></a>
                        <button class="btn" id="delBtn"><i class="fa-solid fa-trash">刪除</i></button>

                    <div class="d-flex justify-content-end align-middle">
                        共 <?= $numProduct ?> 筆, 第 <?= $page ?> 頁</div>
                </div>
            </div>
            <!-- ========================================== -->
            <div class="chart">
                <!-- nav -->
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                    <div class="container-fluid">

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link ms-4<?php if (!isset($_GET["category"])) echo "active" ?>" aria-current="page" href="product-list.php"> 全部</a>
                                </li>

                                <?php foreach ($cateRows as $cate) : ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?php if (isset($_GET["category"]) && $_GET["category"] == $cate["id"]) echo "active"; ?>" name="category" href="product-list.php?category=<?= $cate["id"] ?>" href="#"><?= $cate["name"] ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <form class="d-flex" action="product-search.php">
                                <input class="form-control me-2" type="search" placeholder="搜尋產品名稱" aria-label="Search" name="name" value="<?= $_GET["name"] ?>">
                                <input type="number" name="page"  hidden >
                                <button class="btn btn-outline-success" type="submit">search</button>
                            </form>
                        </div>
                    </div>
                </nav>
                <!-- list -->
                <form class="mx-3" id="delForm" action="product-doDelete.php">

                    <table class="table text-center align-middle">
                        <thead class="">
                            <tr class=" table-bordered ">
                                <th class=""></th>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Created_at</th>
                                <th></th>
                            </tr>
                        </thead>
                        <?php foreach ($productRows as $product) : ?>
                            <tbody class="">
                                <tr class="">
                                    <td class=""><input class="form-check-input" type="checkbox" value="<?= $product["id"] ?>" name="id[]"></td>
                                    <td><?= $product["id"] ?></td>
                                    <td><img class="listImg" src="/images_bow/<?= $product["img_s1"] ?>" alt=""></td>
                                    <td><?= $product["name"] ?></td>
                                    <td><?= $product["cateName"] ?></td>
                                    <td><?= $product["price"] ?></td>
                                    <td><?= $product["created_at"] ?></td>
                                    <td><a href="product-info.php?id=<?= $product["id"] ?>" class="btn"><i class="fa-solid fa-circle-arrow-right"></i>產品資訊</a>
                                        <a href="product-edit.php?id=<?= $product["id"] ?>" class="btn">
                                            <i修改 class="fa-solid fa-pen">修改</i>
                                        </a>

                                    </td>
                                </tr>
                            </tbody>
                        <?php endforeach; ?>
                    </table>
                </form>
                <!-- page -->
                <div class="mx-3 my-2">
                    <nav aria-label="">
                        <ul class="pagination ">
                            <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                                <li class="page-item <?php if ($i == $page) echo "active" ?>"><a class="page-link" href="<?php if (isset($_GET["category"])) {
                                                                                                                                echo "product-list.php?category=" . $category . "&page=" . $i;
                                                                                                                            } else {
                                                                                                                                echo "product-list.php?page=" . $i;
                                                                                                                            } ?>"><?= $i ?></a></li>
                            <?php endfor; ?>
                        </ul>
                    </nav>
                </div>
            </div>

        </div>
    </main>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <!-- dropdown -->
    <!-- <script>
        const dropdownElementList = document.querySelectorAll('.dropdown-toggle')
        const dropdownList = [...dropdownElementList].map(dropdownToggleEl => new bootstrap.Dropdown(dropdownToggleEl))
    </script> -->

<script>
  // 在按鈕點擊時觸發表單提交
  const delBtn = document.getElementById("delBtn");
  delBtn.addEventListener("click", function() {
    let delForm = document.getElementById("delForm");
    delForm.submit();
  });
</script>
</body>

</html>