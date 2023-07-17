<?php
if (isset($_GET["name"])) {
    $name = $_GET["name"];
    $whereClouse = "WHERE name LIKE '%$name%' AND valid=1";
} elseif (isset($_GET["start"]) && isset($_GET["end"])) {
    $start = $_GET["start"];
    if ($start == "") $start = "2023-01-01";
    $end = $_GET["end"];
    if ($end == "") $end = "2023-12-31";
    $whereClouse = " WHERE DATE(created_at) BETWEEN '$start' AND '$end' AND valid=1";
} elseif (isset($_GET["min"]) && isset($_GET["max"])) {
    $min = $_GET["min"];
    if ($min == "") $min = 0;
    $max = $_GET["max"];
    if ($max == "") $max = 9999999;
    $whereClouse = "WHERE product_bow.price>=$min AND product_bow.price<=$max AND valid=1";
} else {
    $product_count = 0;
}

require_once("../db-connect.php");
$sql = "SELECT id, name, category, price, created_at, img_m, description FROM product_bow $whereClouse";
$result = $conn->query($sql);
$products = $result->fetch_all(MYSQLI_ASSOC);
$product_count =  $result->num_rows;
if (isset($_GET["name"]) || isset($_GET["start"]) && isset($_GET["end"]) || isset($_GET["min"]) && isset($_GET["max"])) {
    $product_count =  $result->num_rows;
} else {
    $product_count = 0;
}

//Category
require_once("../db-connect.php");
$sqlCate = "SELECT * FROM category_bow";
$resultCate = $conn->query($sqlCate);
$rowsCate = $resultCate->fetch_all(MYSQLI_ASSOC);

//Item
require_once("../db-connect.php");
$sqlItem = "SELECT * FROM item_bow ";
$resultItem = $conn->query($sqlItem);
$rowsItem = $resultItem->fetch_all(MYSQLI_ASSOC);

//Style
require_once("../db-connect.php");
$sqlStyle = "SELECT * FROM style_bow ";
$resultStyle = $conn->query($sqlStyle);
$rowsStyle = $resultStyle->fetch_all(MYSQLI_ASSOC);

//StyleItem
require_once("../db-connect.php");
$sqlStyleItem = "SELECT * FROM styleItem_bow ";
$resultStyleItem = $conn->query($sqlStyleItem);
$rowsStyleItem = $resultStyleItem->fetch_all(MYSQLI_ASSOC);

?>

<!doctype html>
<html lang="en">

<head>
    <title>search</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
            overflow: scroll;
        }

        .main-content {
            margin-left: var(--aside-width);
            padding-top: calc(var(--page-spacing-top) + 10px);
        }

        .chart {
            height: 400px;
        }

        /* img */
        .object-fit-cover {
            /* width: 200px; */
            height: 200px;
        }

        .itemCate {
            display: none;
        }
        .itemItem {
            display: none;
        }
        .itemStyle {
            display: none;
        }
        .expand {
            display: block;
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
            <div class="my-2 d-flex justify-content-between text-secondary px-3">
                <div> 產品名稱搜尋</div>
                <a role="button" href="">
                    <i class="fa-regular fa-square-plus text-secondary"></i>
                </a>
            </div>
            <nav class="navbar">
                <div class="container-fluid">
                    <form class="d-flex" action="product-search.php">
                        <input class="form-control me-2" type="search" placeholder="搜尋產品名稱" name="name" value="<?= $_GET["name"] ?>">
                        <button class="btn btn-outline-success" type="submit">search</button>
                    </form>
                </div>
            </nav>
            <hr>


            <!-- time -->
            <form action="product-search.php">
                <div class="my-2 d-flex justify-content-between text-secondary px-3 align-items-center">
                    <div> 上架時間</div>
                    <button class="btn">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
                <div class="row ">
                    <div class=" d-flex justify-content-between">
                        <input type="date" class="form-control ms-2 me-1" name="start" value="<?php if (isset($start)) echo $start ?>">
                        <input type="date" class="form-control ms-1 me-2" name="end" value="<?php if (isset($end)) echo $end ?>">
                    </div>
                </div>
            </form>
            <hr>
            <!-- price -->
            <form action="product-search.php">
                <div class="my-2 d-flex justify-content-between text-secondary px-3 align-items-center">
                    <div> 價格篩選</div>
                    <button class="btn">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
                <div class="row ">
                    <div class=" d-flex justify-content-between">
                        <input placeholder="最低價$" type="number" class="form-control ms-2 me-1" name="min" value="<?php if (isset($min)) echo $min ?>">
                        <input  placeholder="最高價$" type="number" class="form-control ms-1 me-2" name="max" value="<?php if (isset($max)) echo $max ?>">
                    </div>
                </div>
            </form>
            <hr>
            <!-- cate -->
            <div class="my-2 d-flex justify-content-between text-secondary mx-3">分類</div>
            <div class="my-2 d-flex justify-content-between text-secondary mx-3">
                <div class="ms-3">類別</div>
                <a class="linkCate" href="">
                <i class="fa-solid fa-caret-down text-secondary"></i>
                </a>
            </div>
            <div class="itemCate">
                <?php foreach ($rowsCate as $rowCate) : ?>
                    <div class="ms-5 text-decoration-none  text-secondary" href="">
                        <a class="" href=""><i class="fa-solid fa-tag me-2"></i></a>
                    <?= $rowCate["name"] ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- item -->
            <div class="my-2 d-flex justify-content-between text-secondary mx-3">
                <div class="ms-3">種類</div>
                <a class="linkItem" role="button" href="">
                <i class="fa-solid fa-caret-down text-secondary"></i>
                </a>
            </div>
            <div class="itemItem">
                <?php foreach ($rowsItem as $rowItem) : ?>
                    <div class="ms-5 text-decoration-none  text-secondary" href="">
                    <i class="fa-solid fa-tag me-2 "></i><?= $rowItem["name"] ?>
                    </div>
                <?php endforeach; ?>
            </div>

           <!-- style -->
           <div class="my-2 d-flex justify-content-between text-secondary mx-3">
                <div class="ms-3">樣式</div>
                <a class="linkStyle" role="button" href="">
                <i class="fa-solid fa-caret-down text-secondary"></i>
                </a>
            </div>
            <div class="itemStyle">
                <?php foreach ($rowsStyle as $rowStyle) : ?>
                    <div class="ms-5 text-decoration-none  text-secondary" href="">
                    <i class="fa-solid fa-tag me-2"></i><?= $rowStyle["name"] ?>
                    </div>
                <?php endforeach; ?>
            </div>




            <hr>
        </nav>
    </aside>
    <main class="main-content">
        <div class="px-3 ">
            <div class="d-flex align-items-center justify-content-between border-bottom">
                <div class="d-flex  align-items-center">
                    <h2 class="mx-2 my-4">搜尋產品結果：</h2>
                    <h5 class="mt-2"> 搜尋『 <?php if (!empty($name)) {
                                                echo $name;
                                            } elseif (isset($start) && isset($end)) {
                                                echo $start . "到" . $end;
                                            } elseif (isset($min) && isset($max)) {
                                                echo "$" . $min . "到 $" . $max;
                                            } else {
                                                echo "全部";
                                            } ?>
                        』, 共 <?= $product_count ?> 筆符合</h5>
                </div>
                <a href="product-list.php" class="btn btn-outline-secondary btn-sm"><i class="fa-solid fa-rotate-left px-1"></i>產品列表</a>
            </div>
            <div class="mt-4 chart">
                <div class="container">
                    <!-- card -->
                    <div class="row">
                        <?php foreach ($products as $product) : ?>
                            <div class="col-auto mx-2 my-2 d-flex">
                                <div class="card" style="width: 20rem;">
                                    <img src="/images_bow/<?= $product["img_m"] ?>" class="object-fit-cover card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">產品名稱<?= $product["name"] ?></h5>
                                        <p class="card-text">...</p>
                                        <!-- <a href="#" class="btn btn-primary">商品說明</a> -->
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>



                    <div class="row">
                        <div class="col-6">
                            <form action="">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Created_at</th>
                                        </tr>
                                    </thead>
                                    <?php foreach ($products as $product) : ?>
                                        <tbody>
                                            <tr>
                                                <td><?= $product["id"] ?></td>
                                                <td><?= $product["name"] ?></td>
                                                <td><?= $product["category"] ?></td>
                                                <td><?= $product["price"] ?></td>
                                                <td><?= $product["created_at"] ?></td>
                                            </tr>
                                        </tbody>
                                    <?php endforeach; ?>
                                </table>
                            </form>
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

    <!-- js click -->
    <script>
        const linkCate = document.querySelector(".linkCate");
        const itemCate = document.querySelector(".itemCate");
        const linkItem = document.querySelector(".linkItem");
        const itemItem = document.querySelector(".itemItem");
        const linkStyle = document.querySelector(".linkStyle");
        const itemStyle = document.querySelector(".itemStyle");

        const tagCate = document.querySelector(".tagCate");

        linkCate.addEventListener("click", function(event) {
            event.preventDefault(); // 阻止連結的默認行為
            itemCate.classList.toggle("expand");
        });
        linkItem.addEventListener("click", function(event) {
            event.preventDefault(); // 阻止連結的默認行為
            itemItem.classList.toggle("expand");
        });
        linkStyle.addEventListener("click", function(event) {
            event.preventDefault(); // 阻止連結的默認行為
            itemStyle.classList.toggle("expand");
        });

        tagCate.addEventListener("click",function(event){
            event.preventDefault(); // 阻止連結的默認行為
            tagCate.classList.toggle("expand");
        })
    </script>
</body>

</html>