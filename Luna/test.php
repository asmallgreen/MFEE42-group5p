<?php
// ini_set('display_errors', 1);
// error_reporting(E_ALL);

// require_once("../db-connect.php");
// $sql = "SELECT product_bow.*, category_bow.name AS cateName FROM product_bow JOIN  category_bow ON product_bow.category = category_bow.id";

// $result = $conn->query($sql);
// $rows = $result->fetch_all(MYSQLI_ASSOC);
// if ($result !== false) {
//     // 查詢成功
//     // 使用 $rows 進行後續處理
//     foreach ($rows as $row) {
//         echo $row["id"];
//     }
// } else {
//     // 查詢失敗
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $conn->close();
?>

<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
//category類別
require_once("../db-connect.php");
$sqlCate = "SELECT * FROM category_bow ";
$resultCate = $conn->query($sqlCate);
$rowsCate = $resultCate->fetch_all(MYSQLI_ASSOC);
if ($resultCate !== false) {
    // echo "cate連線成功";
} else {
    // 查詢失敗
    echo "Error: " . $sql . "<br>" . $conn->error;
}


//item項目
require_once("../db-connect.php");
$sqlItem = "SELECT * FROM item_bow ";
$resultItem = $conn->query($sqlItem);
$rowsItem = $resultItem->fetch_all(MYSQLI_ASSOC);
$rowitem = $resultItem->fetch_assoc();
if ($resultItem !== false) {
    // echo "item連線成功";
} else {
    // 查詢失敗
    echo "Error: " . $sql . "<br>" . $conn->error;
}


//style樣式類別
require_once("../db-connect.php");
$sqlStyle = "SELECT * FROM style_bow ";
$resultStyle = $conn->query($sqlStyle);
$rowsStyle = $resultStyle->fetch_all(MYSQLI_ASSOC);
if ($resultStyle !== false) {
    // echo "style連線成功";
} else {
    // 查詢失敗
    echo "Error: " . $sql . "<br>" . $conn->error;
}
//styleitem樣式選項
require_once("../db-connect.php");
$sqlStyleItem = "SELECT * FROM styleItem_bow ";
$resultStyleItem = $conn->query($sqlStyleItem);
$rowsStyleItem = $resultStyleItem->fetch_all(MYSQLI_ASSOC);
if ($resultStyleItem !== false) {
    // echo "styleItem連線成功";
} else {
    // 查詢失敗
    echo "Error: " . $sql . "<br>" . $conn->error;
}


// 四個資料表結合
// require_once("../db-connect.php");
// $sql = "SELECT category_bow.id AS cateKey, item_bow.category AS itemKey, category_bow.name AS cateName, item_bow.name AS itemName, style_bow.name AS styleName, styleItem_bow.name FROM item_bow JOIN category_bow ON item_bow.category = category_bow.id JOIN style_bow ON item_bow.style = style_bow.id JOIN styleItem_bow ON style_bow.id = styleItem_bow.style";

//cate+item
require_once("../db-connect.php");
$sqlCI = "SELECT category_bow.id AS cateKey, item_bow.category AS itemKey, category_bow.name AS cateName, item_bow.name AS itemName FROM item_bow JOIN category_bow ON item_bow.category = category_bow.id";
$resultCI = $conn->query($sqlCI);
$rowsCI = $resultCI->fetch_all(MYSQLI_ASSOC);
if ($resultCI !== false) {
    foreach ($rowsCI as $rowCI) {
    }
} else {
    // 查詢失敗
    echo "Error: " . $sqlCI . "<br>" . $conn->error;
}


//style+styleitem
require_once("../db-connect.php");
$sqlSI = "SELECT style_bow.id AS styleKey, styleItem_bow.style AS styleItemKey, styleItem_bow.name AS styleItemName, style_bow.name AS styleName FROM style_bow JOIN styleItem_bow ON style_bow.id = styleItem_bow.style";
$resultSI = $conn->query($sqlSI);
$rowsSI = $resultSI->fetch_all(MYSQLI_ASSOC);
if ($resultSI !== false) {
    foreach ($rowsSI as $rowSI) {
    }
} else {
    // 查詢失敗
    echo "Error: " . $sqlSI . "<br>" . $conn->error;
}



$conn->close();
?>
<?php

// $category = $_GET["category"];
// $item = $_GET["item"];
// $style = $_GET["style"];
// $styleItem = $_GET["styleItem"];

?>

<!doctype html>
<html lang="en">

<head>
    <title>Test</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .item {
            display: none;
            /* 初始時隱藏項目 */
        }

        .expanded .item {
            display: block;
            /* 展開時顯示項目 */
        }
    </style>

</head>

<body>
    <div class="container">
    
        <!-- <div class="flex-shrink-0 p-3" style="width: 280px;">
            <a href="/" class="d-flex align-items-center pb-3 mb-3 link-body-emphasis text-decoration-none border-bottom">
                <svg class="bi pe-none me-2" width="30" height="24">
                    <use xlink:href="#bootstrap" />
                </svg>
                <span class="fs-5 fw-semibold">Collapsible</span>
            </a>
            <ul class="list-unstyled ps-0">
                <li class="mb-1">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                        Home
                    </button>
                    <div class="collapse show" id="home-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Overview</a></li>
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Updates</a></li>
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Reports</a></li>
                        </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                        Dashboard
                    </button>
                    <div class="collapse" id="dashboard-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Overview</a></li>
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Weekly</a></li>
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Monthly</a></li>
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Annually</a></li>
                        </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                        Orders
                    </button>
                    <div class="collapse" id="orders-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">New</a></li>
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Processed</a></li>
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Shipped</a></li>
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Returned</a></li>
                        </ul>
                    </div>
                </li>
                <li class="border-top my-3"></li>
                <li class="mb-1">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                        Account
                    </button>
                    <div class="collapse" id="account-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">New...</a></li>
                            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Profile</a></li>
                            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Settings</a></li>
                            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Sign out</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div> -->


        <!-- 
  <a class="linkCate my-3" href="#">點擊展開/收起項目
  <div class="item">項目1</div>
  <div class="item">項目2</div>
  <div class="item">項目3</div>
  <div class="item">項目4</div>
  </a>
  <script>
    const linkCate = document.querySelector(".linkCate");

    linkCate.addEventListener("click", function() {
      this.classList.toggle("expanded");
    });
  </script> -->



        <!-- cate+item -->


        <div class="container">
            <div class="row">
                <div class="col my-5">
                <i class="fa-solid fa-broom"></i>
                    <?php foreach ($rowsCate as $rowCate) : ?>
                        <?php echo $rowCate["name"].":"; ?>
                        <select name="" id="">
                            <?php foreach ($rowsCI as $rowCI) : ?>
                                <?php if ($rowCI["cateKey"] == $rowCate["id"]) : ?>

                                    <option value=""><?= $rowCI["itemName"]; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>


        <br>
        <!-- style+styleItem -->



        <div class="container">
            <div class="row">
                <div class="col">
                    <?php foreach ($rowsStyle as $rowStyle) : ?>
                        <?php echo $rowStyle["name"] . ":"; ?>
                        <select name="" id="">
                            <?php foreach ($rowsSI as $rowSI) : ?>
                                <?php if ($rowSI["styleKey"] == $rowStyle["id"]) : ?>
                                    <option value=""><?= $rowSI["styleItemName"] ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>



        <!-- <?php foreach ($rowsCate as $rowCate) : ?>
    <?php echo $rowCate["name"]; ?>
    <?php endforeach; ?> -->

        <!-- <div class="row my-3">
            <form action="test.php" method="">
                <select class="col-2 mx-2" name="category" id="">
                    <?php foreach ($rowsCate as $rowCate) : ?>
                        <option value="<?= $rowCate["id"] ?>"><?= $rowCate["name"] ?></option>

                    <?php endforeach; ?>
                    <?php if (isset($category)) {
                        echo $category;
                    } else {
                        echo "未取得category值";
                    } ?>
                </select>
                <select class="col-2 mx-2" name="item" id="">
                    <?php foreach ($rowsItem as $rowItem) : ?>
                        <option value="<?= $rowItem["id"] ?>"><?= $rowItem["name"] ?></option>
                    <?php endforeach; ?>
                </select>
                <select class="col-2 mx-2" name="style" id="">
                    <?php foreach ($rowsStyle as $rowStyle) : ?>
                        <option value="<?= $rowStyle["id"] ?>"><?= $rowStyle["name"] ?></option>
                    <?php endforeach; ?>
                </select>
                <select class="col-2 mx-2" name="styleItem" id="">
                    <?php foreach ($rowsStyleItem as $rowStyleItem) : ?>
                        <option value="<?= $rowStyleItem["id"] ?>"><?= $rowStyleItem["name"] ?></option>
                    <?php endforeach; ?>
                </select>
                <button class="btn btn-info">送出</button>
            </form>

        </div> -->

        <!-- <div class="row my-3">
            <?php foreach ($rows as $row) : ?>
                <table class="table table-bordered col-6">
                    <tr>
                        <th class="col-2">
                            <?= $row["cateName"] ?></th>
                        <td class="col-4"><?= $row["itemName"] ?></td>
                        <td class="col-4"><?= $row["styleName"] ?></td>
                        <td class="col-4"><?= $row["name"] ?></td>
                    </tr>
                </table>
            <?php endforeach; ?>
        </div> -->

    </div>


    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <script src="sidebars.js"></script>

</body>

</html>