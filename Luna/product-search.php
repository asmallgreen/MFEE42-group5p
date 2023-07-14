<?php
require_once("../db-connect.php");

if (isset($_GET["name"])) {
    $name = $_GET["name"];
    $whereClouse = "WHERE name LIKE '%$name%'";
} elseif (isset($_GET["start"]) && isset($_GET["end"])) {
    $start = $_GET["start"];
    if ($start == "") $start = "2023-01-01";
    $end = $_GET["end"];
    if ($end == "") $end = "2023-12-31";
    $whereClouse = "WHERE DATE(created_at) BETWEEN '$start' AND '$end'";
} elseif (isset($_GET["min"]) && isset($_GET["max"])) {
    $min = $_GET["min"];
    if ($min == "") $min = "0";
    $max = $_GET["max"];
    if ($max == "") $max = "999999";
    $whereClouse = "WHERE product_bow.price>=$min AND product_bow.price<=$max";
} else {
    $product_count = 0;
}
$sql = "SELECT id, name, category, price, created_at FROM product_bow $whereClouse AND valid=1";
$result = $conn->query($sql);
$products = $result->fetch_all(MYSQLI_ASSOC);
$product_count = $result->num_rows;


?>

<!doctype html>
<html lang="en">

<head>
    <title>search</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <a href="product-list.php" class="my-2 btn btn-info">產品列表</a>
        <!-- search input -->
        <div class="py-2">
            <form action="product-search.php">
                <div class="row gx-2">
                    <div class="col">
                        <input name="name" placeholder="搜尋產品名稱" type="text" class="form-control">
                    </div>
                    <div class="col-auto">
                        <button class="btn-info btn" type="submit">搜尋</button>
                    </div>
            </form>
        </div>
        <div class="py-2">
            <form action="product-search.php">
                <div class="row gx-4 align-items-end">
                    <div class="col-auto">
                        <label for="">開始時間：</label>
                        <input type="date" class="form-control" name="start" value="<?php if (isset($start)) echo $start ?>">
                    </div>
                    <div class="col-auto">
                        <label for="">結束時間：</label>
                        <input type="date" class="form-control" name="end" value="<?php if (isset($end)) echo $end ?>">
                    </div>
                    <div class="col-auto"><button class="btn btn-info">送出</button></div>

                </div>
            </form>
        </div>
        <div class="py-2">
            <form action="product-search.php">
                <div class="row gx-4 align-items-end">
                    <div class="col-auto">
                        <input type="number" class="form-control" name="min" value="<?php if (isset($min)) echo $min ?>">
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" name="max" value="<?php if (isset($max)) echo $max ?>">
                    </div>
                    <div class="col-auto"><button class="btn btn-info">送出</button></div>

                </div>
            </form>
        </div>
        <div class="py-2">
            <div class="">
                <h6> 搜尋<?= $name ?><?= $start . "到" . $end ?><?=$min. "到" .$max?>的結果,共<?= $product_count ?>筆符合</h6>
            </div>
        </div>
        <div class="py-2">
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




    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>