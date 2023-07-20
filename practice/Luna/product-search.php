<?php
// ini_set('display_errors', 1);
// error_reporting(E_ALL);
$type = $_GET["type"] ?? 1 ;
if ($type == 1) {
    $whereClouse=" ";
    $orderBy = "ORDER BY product_bow.id ASC";
} 
if ($type == 2) {
    $whereClouse=" ";
    $orderBy = "ORDER BY product_bow.id DESC";
} 
if ($type == 3) {
    $whereClouse=" ";
    $orderBy = "ORDER BY product_bow.price ASC";
} if ($type == 4) {
    $whereClouse=" ";
    $orderBy = "ORDER BY product_bow.price DESC";
}

if (isset($_GET["name"]) && $_GET["name"]!="") {
    $name = $_GET["name"];
    $whereClouse = "name LIKE '%$name%' AND";
}
elseif (isset($_GET["start"]) && isset($_GET["end"])) {
    $start = $_GET["start"];
    if ($start == "") $start = "2023-01-01";
    $end = $_GET["end"];
    if ($end == "") $end = "2023-12-31";
    $whereClouse = "DATE(created_at) BETWEEN '$start' AND '$end' AND";
}
elseif (isset($_GET["min"]) && isset($_GET["max"])) {
    $min = $_GET["min"];
    if ($min == "") $min = 0;
    $max = $_GET["max"];
    if ($max == "") $max = 9999999;
    $whereClouse = "product_bow.price>='$min' AND product_bow.price<= '$max' AND";
}
elseif (isset($_GET["category"])) {
    $category = $_GET["category"];
    $whereClouse = "product_bow.category= '$category' AND";
}
elseif (isset($_GET["item"])) {
    $item = $_GET["item"];
    $whereClouse = "product_bow.item= '$item' AND";
}  
    // $name = " ";
    // $page = " ";
    // $category = " ";
    // $product_count = " ";
    // $item=" ";
    // $whereClouse="";

// 資料庫
require_once("/xampp/htdocs/practice/db_connect-test.php");
$sql = "SELECT * FROM product_bow WHERE $whereClouse valid=1 $orderBy";
$result = $conn->query($sql);
$products = $result->fetch_all(MYSQLI_ASSOC);
$product_count =  $result->num_rows;

if (isset($_GET["name"]) && $_GET["name"]!="" || isset($_GET["start"]) && isset($_GET["end"]) || isset($_GET["min"]) && isset($_GET["max"]) || isset($_GET["category"]) || isset($_GET["item"]) || isset($_GET["type"]) ) {
    $product_count =  $result->num_rows;
} else {
    $product_count = 0;
}

//  else {
//     $whereClouse="";
//     $orderBy = "";
// }


//Category
// 資料庫
if (isset($_GET["category"])) {
    $category = $_GET["category"];
    $whereClouse = " WHERE id=$category";
} else {
    $category = "";
    $whereClouse = "";
}
$sqlCate = "SELECT * FROM category_bow $whereClouse";
$resultCate = $conn->query($sqlCate);
if (isset($_GET["category"])) {
    $rowcate = $resultCate->fetch_assoc();
} else {
    $rowsCate = $resultCate->fetch_all(MYSQLI_ASSOC);
}

// Item
// $item=$_GET["item"];
if(isset($_GET["item"])){
    $sqlItem = "SELECT * FROM item_bow WHERE id=$item";
    $resultItem = $conn->query($sqlItem);
    $rowItem = $resultItem->fetch_assoc();
    // echo $rowItem["name"];
}



// Style
// $sqlStyle = "SELECT * FROM style_bow ";
// $resultStyle = $conn->query($sqlStyle);
// $rowsStyle = $resultStyle->fetch_all(MYSQLI_ASSOC);

// StyleItem
// $sqlStyleItem = "SELECT * FROM styleItem_bow ";
// $resultStyleItem = $conn->query($sqlStyleItem);
// $rowsStyleItem = $resultStyleItem->fetch_all(MYSQLI_ASSOC);

//style+styleitem
// 資料庫
$sqlCI = "SELECT item_bow.id, category_bow.id AS cateKey, item_bow.category AS itemKey, category_bow.name AS cateName, item_bow.name AS itemName FROM item_bow JOIN category_bow ON item_bow.category = category_bow.id ";
$resultCI = $conn->query($sqlCI);
$rowsCI = $resultCI->fetch_all(MYSQLI_ASSOC);


$conn->close();


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

  
    <link rel="stylesheet" href="/practice/dashboard-css.css">
    <style>
        .tab-content li:nth-child(2){
        display: block;
        }
        /* img */
        .object-fit-cover {
            /* width: 200px; */
            height: 200px;
        }
        .main-aside{
            overflow: scroll;
        }
    </style>

</head>

<body>
<?php include("/xampp/htdocs/practice/dashboard-admin-header-aside.php") ?>

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
                        <input class="form-control me-2" type="search" placeholder="搜尋產品名稱" name="name" value="<?php if(isset( $_GET["name"])) echo $_GET["name"] ?>">
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
                        <input placeholder="最高價$" type="number" class="form-control ms-1 me-2" name="max" value="<?php if (isset($max)) echo $max ?>">
                    </div>
                </div>
            </form>
            <hr>
            <!-- cate -->
            <div class="d-flex justify-content-between align-items-center">
                <div class="my-2 d-flex text-secondary align-items-center">
                    <i class="fa-solid fa-bars text-secondary ms-3 me-2"></i>
                    <div class="me-2">類別</div>
                    <a class="linkCate" href="product-search.php?type=&page=&name="><i class="fa-solid fa-caret-down text-secondary"></i></a>
                </div>
            </div>
            <!-- 手風琴 -->
            <?php foreach ($rowsCate as $rowCate) : ?>

<div class="accordion accordion-flush" id="type">
    <div class="accordion-item">
        <h2 class="accordion-header ms-4">
            <button class=" accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#typeItem<?= $rowCate["id"] ?>" aria-expanded="false" aria-controls="typeItem<?= $rowCate["id"] ?>">
                <?= $rowCate["name"]; ?>
            </button>
        </h2>
        <!--  -->
        <div id="typeItem<?= $rowCate["id"] ?>" class="accordion-collapse collapse" data-bs-parent="#tpye">
            <div class="accordion-body">
                <?php foreach ($rowsCI as $rowCI) : ?>
                    <div class="ms-5">
                        <?php if ($rowCI["cateKey"] == $rowCate["id"]) : ?>
                            <a class="text-secondary text-decoration-none" href="product-search.php?item=<?= $rowCI["id"] ?>"><?= $rowCI["itemName"]; ?></a>

                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php endforeach; ?>

<!-- <div class="itemCate">
<?php foreach ($rowsCate as $rowCate) : ?>
    <div class="ms-5 text-decoration-none text-secondary">
        <a href="product-search.php?type=&page=&name=&category=<?= $rowCate["id"] ?>" class="text-decoration-none text-secondary"><?= $rowCate["name"] ?></a>
        <a class="linkItem" href=""><i class="fa-solid fa-caret-down text-secondary"></i></a>
        <div class="ms-5">
            <?php foreach ($rowsCI as $rowCI) : ?>
                <div class="itemItem">
                    <?php if ($rowCI["cateKey"] == $rowCate["id"]) : ?>
                        <?= $rowCI["itemName"]; ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>


    </div>
<?php endforeach; ?>
</div> -->
          
            






            <hr>
        </nav>
    </aside>
    <main class="main-content">
        <div class="px-3 ">
            <div class="d-flex align-items-center justify-content-between border-bottom">
                        <?php if(isset($_GET["name"]) || isset($_GET["start"]) || isset($_GET["end"]) || isset($_GET["min"]) || isset($_GET["max"]) || isset($_GET["category"]) || isset($_GET["item"])):?>
                <div class="d-flex  align-items-center">
                    <h2 class="mx-2 my-4">搜尋產品結果：</h2>
                    <h5 class="mt-2"> 搜尋『
                        <?php if (isset($name) && $name!="") {
                            echo $name;
                        } ?>
                        <?php if (isset($start) && isset($end)) {
                            echo $start . "到" . $end;
                        } ?>
                        <?php if (isset($min) && isset($max)) {
                            echo "$" . $min . "到 $" . $max;
                        } ?>
                        <?php if (isset($category)&& $category!="") {
                            echo $rowcate["name"];
                        } ?>
                        <?php if (isset($item)&& $item!="") {
                            echo $rowItem["name"];
                        } ?>

                        』, 共 <?= $product_count ?> 筆符合</h5>
                </div>
                <?php endif; ?> 
                <?php if(!isset($_GET["name"]) && !isset($_GET["start"]) && !isset($_GET["end"]) && !isset($_GET["min"]) && !isset($_GET["max"]) && !isset($_GET["category"])&& !isset($_GET["item"])):?>
                    <h2 class="mx-2 my-4">所有產品</h2>
                    <?php endif; ?>
                <div class="d-flex">
                    <div class="btn-group btn-group-sm me-3" role="group" aria-label="">
                        <a href="/practice/Luna/product-search.php?<?php if(isset($_GET["name"])) echo "name=" . $_GET['name']; ?>&type=1" class="btn btn-outline-secondary">ID升冪</a>
                        <a href="/practice/Luna/product-search.php?<?php if(isset($_GET["name"])) echo "name=" . $_GET['name']; ?>&type=2" class="btn btn-outline-secondary">ID降冪</a>
                        <a href="/practice/Luna/product-search.php?<?php if(isset($_GET["name"])) echo "name=" . $_GET['name']; ?>&type=3" class="btn btn-outline-secondary">Price升冪</a>
                        <a href="/practice/Luna/product-search.php?<?php if(isset($_GET["name"])) echo "name=" . $_GET['name']; ?>&type=4" class="btn btn-outline-secondary">Price降冪</a>
                    </div>
                    <a href="product-list.php" class="btn btn-outline-secondary btn-sm"><i class="fa-solid fa-rotate-left px-1"></i>產品列表</a>
                </div>

            </div>
            <div class="mt-4 chart">
                <div class="container">
                    <!-- card -->
                    <div class="row">
                        <?php foreach ($products as $product) : ?>
                            <div class="col-auto mx-2 my-2 d-flex">
                                <div class="card" style="width: 20rem;">
                                    <img src="/practice/Luna/images_bow/<?= $product["img_m"] ?>" class="object-fit-cover card-img-top" alt="...">
                                    <div class="card-body">
                                    <p class="card-title">商品編號：<?= $product["id"] ?></p>
                                        <h5 class="card-text">產品名稱：『 <?= $product["name"] ?> 』</h5>
                                        <p class="card-text">價錢：$<?= $product["price"] ?></p>
                                        <p class="card-text">item：<?= $product["item"] ?></p>
                                        <!-- <a href="#" class="btn btn-primary">商品說明</a> -->
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>



                    <div class="row">
                        <div class="col-6">
                            <form action="">
                                <!-- <table class="table table-bordered">
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
                                </table> -->
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
<?php include("/xampp/htdocs/practice/dashboard-js.php")?>
 <script>
    // 使用 JavaScript 為 .tabs li a:nth-child() 元素添加 active class
    document.addEventListener("DOMContentLoaded", function() {
      const firstTabLink = document.querySelector(".tabs li:nth-child(2) a");
      firstTabLink.classList.add("active");
    });
  </script>

    <!-- js click -->
    <script>

    </script>
</body>

</html>