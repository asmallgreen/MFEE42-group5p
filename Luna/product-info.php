<?php
// $id=$_POST["id"];
$id = $_GET["id"];

require_once("../db-connect.php");
$sql = "SELECT * FROM product_bow WHERE valid=1 AND id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!doctype html>
<html lang="en">

<head>
  <title>Info</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <!-- font awsome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    .img_m {
      width: 400px;
      height: 400px;
    }

    .img_s {
      width: 80px;
      height: 80px;
    }
  </style>
</head>

<body>
  <div class="container">
    <!-- nav -->
    <div class="row my-4">
      <nav class="col-auto" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="product-list.php">回產品列表</a></li>
          <li class="breadcrumb-item active" aria-current="page">類別:<?=$row["category"]?></li>
          <li class="breadcrumb-item active" aria-current="page">產品名稱:<?=$row["name"]?></li>
        </ol>
      </nav>
      <div class="col">
        <form action="">
          <input name="name" placeholder="搜尋產品名稱" type="text" class="form-control">
      </div>
      <div class="col-auto">
        <button class="btn-info btn" type="submit">搜尋</button>
      </div>
      </form>
    </div>
    <hr>
    <!-- img -->
    <div class="d-flex">
      <div class="d-flex flex-column my-3">
        <img src="/images_bow/<?= $row["img_s1"] ?>" alt="" class="img_s mb-3">
        <img src="/images_bow/<?= $row["img_s2"] ?>" alt="" class="img_s mb-3">
        <img src="/images_bow/<?= $row["img_s3"] ?>" alt="" class="img_s mb-3">
        <img src="/images_bow/<?= $row["img_s4"] ?>" alt="" class="img_s mb-3">
      </div>
      <div class="ms-5">
        <img class="img_m" src="/images_bow/<?= $row["img_m"] ?>" alt="">
      </div>
      <div class="my-5 ms-5">
        <h5>產品名稱：『 正弦 』<?= $row["name"] ?></h5>
        <h6 class="my-2">長度：</h6>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="" id="">
          <label class="form-check-label" for="">
            並寸
          </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="" id="">
          <label class="form-check-label" for="">
            二寸伸
          </label>
        </div>
        <h6 class="my-2">拉力數：</h6>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="" id="">
          <label class="form-check-label" for="">
            1號
          </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="" id="">
          <label class="form-check-label" for="">
          2號
          </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="" id="">
          <label class="form-check-label" for="">
          3號
          </label>
        </div>
        <h6 class="my-2">價格：$<?= $row["price"] ?></h6>
        <hr>
        <h6 class="my-2">商品描述：<?= $row["description"] ?></h6>


      </div>
    </div>

  </div>
</body>

</html>