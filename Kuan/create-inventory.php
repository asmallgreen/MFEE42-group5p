<?php
require_once("db_connect.php");

$sqlCategory = "SELECT * FROM category ORDER BY id ASC";
$resultCate = $conn->query($sqlCategory);
$cateRows = $resultCate->fetch_all(MYSQLI_ASSOC);
// var_dump($cateRows);


?>



<!doctype html>
<html lang="en">

<head>
  <title>create inventory</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <div class="container">
    <?php //echo date('Y-m-d H:i:s') 
    ?>
    <div class="py-2">
      <a class="btn btn-info" href="inventory-list.php">返回庫存列表</a>
    </div>
    <form action="doCreate-inventory.php" method="post">
      <div class="mb-2">
        <label for="">產品編號</label>
        <input type="number" class="form-control" min="0" name="id" placeholder="未輸入時將自動新增">
      </div>
      <div class="mb-2">
        <label for="">產品名稱</label>
        <input type="text" class="form-control" name="name" placeholder="請輸入產品名稱(必填)" required>
      </div>
      <div class="mb-2">
        <label for="">產品類別</label>
        <select class="form-select" name="category" required>
          <option value="" selected>請選擇產品類別(必選)</option>
          <?php foreach ($cateRows as $cate) : ?>
            <option value="<?= $cate["id"] ?>"><?= $cate["name"] ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <div class="mb-2">
        <label for="">產品數量</label>
        <input type="number" class="form-control" value="0" min="0" name="amount">
      </div>
      <div class="mb-2">
        <label for="">庫存最低數量</label>
        <input type="number" class="form-control" value="0" min="0" name="min_amount">
      </div>
      <button class="btn btn-info" type="submit" id="send">送出</button>
    </form>
  </div>



  <!-- Bootstrap JavaScript Libraries -->
  <?php include("js.php") ?>
  <script>


  </script>


</body>

</html>