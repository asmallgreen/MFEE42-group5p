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
$sqlCate = "SELECT * FROM category_bow ";
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

</head>

<body>
    <!-- nav -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="product-list.php">Product
            <i class="mx-2 fa-solid fa-circle-chevron-right"></i>
 <?php if(isset($_GET["category"])){
  
       echo $cateRow["name"];
    }else{
        echo "全部";
    }?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php if (!isset($_GET["category"])) echo "active" ?>" aria-current="page" href="product-list.php">全部</a>
                    </li>

                    <?php foreach ($cateRows as $cate) : ?>
                        <li class="nav-item">
                            <a class="nav-link <?php if (isset($_GET["category"]) && $_GET["category"] == $cate["id"]) echo "active"; ?>" name="category" href="product-list.php?category=<?= $cate["id"] ?>" href="#"><?= $cate["name"] ?></a>
                        </li>
                    <?php endforeach; ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" action="product-search.php">
                    <input class="form-control me-2" type="search" placeholder="搜尋產品名稱" aria-label="Search" name="name" value="<?=$_GET["name"]?>">
                    <button class="btn btn-outline-success" type="submit">search</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- list -->
    <form class="mx-3" action="doDelete.php">

        <div class="d-flex justify-content-end">
            <a href="product-create.php" class="btn"><i class="fa-solid fa-circle-plus">新增</i></a>
            <button class="btn"><i class="fa-solid fa-trash">刪除</i></button>
        </div>


        <div class="d-flex justify-content-end">
            共 <?= $numProduct ?> 筆, 第 <?= $page ?> 頁

        </div>
        <table class="table table-bordered">

            <thead>
                <tr>
                    <th class=""></th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Created_at</th>
                    <th></th>
                </tr>
            </thead>
            <?php foreach ($productRows as $product) : ?>
                <tbody>
                    <tr>
                        <td class=""><input class="form-check-input" type="checkbox" value="<?= $product["id"] ?>" name="id[]"></td>
                        <td><?= $product["id"] ?>
                        </td>
                        <td><?= $product["name"] ?></td>
                        <td><?= $product["cateName"] ?></td>
                        <td><?= $product["price"] ?></td>
                        <td><?= $product["created_at"] ?></td>
                        <td><a href="product-info.php?id=<?= $product["id"] ?>" class="btn"><i class="fa-solid fa-circle-arrow-right"></i>產品資訊</a>
                            <a href="product-edit.php?id=<?= $product["id"] ?>" class="btn"><i修改 class="fa-solid fa-pen">修改</i></a>

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
                    <li class="page-item <?php if ($i == $page) echo "active" ?>"><a class="page-link" href="
          <?php if (isset($_GET["category"])) {
                        echo "product-list.php?category=" . $category . "&page=" . $i;
                    } else {
                        echo "product-list.php?page=" . $i;
                    } ?>"><?= $i ?></a></li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>




    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>