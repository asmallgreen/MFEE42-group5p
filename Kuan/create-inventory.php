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
  </style>

</head>

<body>
  <header class="text-bg-dark d-flex shadow fixed-top justify-content-between align-items-center">
    <a class="bg-black py-3 px-3 text-decoration-none link-light brand-name" href="/">管理者後臺介面</a>
    <div class="d-flex align-items-center">
      <div class="me-3">
        hi, 慕朵
      </div>

      <!-- <a href="logout-test.php" class="btn btn-dark me-3"><i class="fa-solid fa-right-from-bracket"></i> Log out</a> -->
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
  <script>


  </script>


</body>

</html>