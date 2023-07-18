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
    </style>

</head>

<body>
<?php include("/xampp/htdocs/practice/dashboard-admin-header-aside.php") ?>
  <main class="main-content">
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
  </main>




  <!-- Bootstrap JavaScript Libraries -->
  <?php include("js.php") ?>

<script></script>

<?php include("../dashboard-js.php")?>
<script>
    // 使用 JavaScript 為 .tabs li a:nth-child() 元素添加 active class
    document.addEventListener("DOMContentLoaded", function() {
      const thirdTabLink = document.querySelector(".tabs li:nth-child(3) a");
      thirdTabLink.classList.add("active");
    });
  </script>
</body>

</html>