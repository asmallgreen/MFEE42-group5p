<?php

// $page = $_GET["page"] ?? 1;


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


// page需要總頁數
$sqlTotal = "SELECT * FROM product_bow WHERE valid=1 ORDER BY product_bow.id ASC ";
$resultTotal = $conn->query($sqlTotal);
$numProduct = $resultTotal->num_rows;
$totalPage = ceil($numProduct / $perPage);


//篩選資料
$sql = "SELECT product_bow.*, category_bow.name AS cateName FROM product_bow JOIN category_bow ON product_bow.category = category_bow.id $whereClouse AND valid=1 ORDER BY product_bow.id ASC LIMIT $startItem, $perPage";
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

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <!-- Bootstrap CSS v5.3.0  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <!-- font awsome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
  <div class="container">
    <!-- 搜尋 -->
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
  </div>
  <!-- 篩選category -->
  <div class="py-2">
    <ul class="nav nav-underline">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="product-list.php">全部</a>
      </li>
      <?php foreach ($cateRows as $cate) : ?>
        <li class="nav-item">
          <a class="nav-link" name="category" href="product-list.php?category=<?= $cate["id"] ?>"><?= $cate["name"] ?></a>
        </li>
      <?php endforeach; ?>
    </ul>


  </div>
  <!-- 產品列表 -->
  <div class="">
    <form class="" action="doDelete.php">

      <div class="d-flex justify-content-end">
        <a href="product-create.php" class="btn"><i class="fa-regular fa-square-plus">新增</i></a>
        <button class="btn"><i class="fa-regular fa-square-plus" id="del">刪除</i></button>
      </div>


      <div class="d-flex justify-content-end">
        <?php $numProduct = $resultTotal->num_rows; ?>
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
            <th>Image_s</th>
            <th>Image_m</th>
            <th>Created_at</th>
            <th>Updated_at</th>
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
              <td><?= $product["category"] ?></td>
              <td><?= $product["price"] ?></td>
              <td><?= $product["img_s"] ?></td>
              <td><?= $product["img_m"] ?></td>
              <td><?= $product["created_at"] ?></td>
              <td><?= $product["updated_at"] ?></td>
              <td><a href="product-info.php" class="btn"><i class="fa-regular fa-square-plus"></i>INFO</a>
                <a href="product-edit.php?id=<?= $product["id"] ?>" class="btn"><i class="fa-regular fa-square-plus">修改</i></a>

              </td>
            </tr>
          </tbody>
        <?php endforeach; ?>
      </table>
    </form>

  </div>

  <!-- page -->
  <div class="py-2">
    <nav aria-label="">
      <ul class="pagination ">
        <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
          <li class="page-item <?php if ($i == $page) echo "active" ?>"><a class="page-link" href="product-list.php?page=<?= $i ?>"><?= $i ?></a></li>
        <?php endfor; ?>
      </ul>
    </nav>
  </div>
  </div>

  <!-- js -->
  <script>

  </script>
</body>

</html>