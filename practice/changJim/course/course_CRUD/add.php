<?php
require_once("connMysql.php");

if (isset($_POST["action"]) && ($_POST["action"] == "add")) {
  $sql_query = "INSERT INTO course (name ,capacity ,level, teacher_id,price ,location ,startDate, endDate, startTime, endTime, hours, image, description) VALUES (?, ?, ?, ? ,? ,?, ?, ?, ?, ?, ?, ?, ?)";
  $stmt = $db_link->prepare($sql_query);
  $stmt->bind_param("sssssssssssss", $_POST["name"], $_POST["capacity"], $_POST["level"], $_POST["teacher_id"], $_POST["price"], $_POST["location"], $_POST["startDate"], $_POST["endDate"], $_POST["startTime"], $_POST["endTime"], $_POST["hours"], $_POST["image"], $_POST["description"]);
  $stmt->execute();
  $stmt->close();
  $db_link->close();
  //重新導向回到主畫面
  header("Location: data_page.php");
}
?>

<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>課程管理系統</title>
  <link rel="stylesheet" href="/practice/dashboard-css.css">


  <style>
        .tab-content li:nth-child(4){
          display: block;
        }
    </style>
</head>

<body>
<header class="text-bg-dark d-flex shadow fixed-top justify-content-between align-items-center">
        <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
            <div class="container-fluid">
                <!-- <a class="navbar-brand" href="#">
      <img src="/images/bow_icon.jpg" alt="Bootstrap" width="30" height="24">
    </a> -->
                <a class="navbar-brand" href="#">管理者後臺介面</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav tabs">
                        <li class="nav-item px-2">
                            <a class="nav-link" aria-current="page" href="#">會員</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link" href="#">產品</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link" href="#">庫存</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link  active" href="#">課程</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link " href="#">師資</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link " href="#">行銷</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- <a class="bg-black py-3 px-3 text-decoration-none link-light brand-name" href="dashboard-admin-test.php">管理者後臺介面</a>
        <div class="d-flex align-items-center">
            <div class="me-3">
                hi, 慕朵
            </div> -->

    </header>
    <aside class="main-aside position-fixed bg-light vh-100 border-end">
        <nav class="">
            <ul class="list-unstyled tab-content">
                <li class="p-3">
                    <h2 class="" id="">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            會員
                        </button>
                    </h2>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="admin-member.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>會員資料
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="sign-up-test.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>會員註冊
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="sign-in-test.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>會員登入
                        </a>
                    </div>
                </li>

                <!-- <li>
                    <a class="d-block py-2 px-3 text-decoration-none memberaside" id="memberaside" href="admin-member.php">
                        <i class="fa-solid fa-users fa-fw me-2"></i>會員資料
                    </a>
                </li> -->
                <li class="p-3">
                    <h2 class="" id="">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            產品
                        </button>
                    </h2>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="admin-member.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>欄位一
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="sign-up-test.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>欄位二
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="sign-in-test.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>欄位三
                        </a>
                    </div>
                </li>
                <li class="p-3">
                    <h2 class="" id="">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            庫存
                        </button>
                    </h2>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none " id="memberaside" href="/practice/Kuan/inventory-list.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>庫存列表
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none " id="memberaside" href="/practice/Kuan/create-inventory.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>新增庫存
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="/practice/Kuan/search-inventory.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>庫存搜尋
                        </a>
                    </div>
                </li>
                <li class="p-3">
                    <h2 class="" id="">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            課程
                        </button>
                    </h2>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="data_page.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>課程列表
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="add.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>新增課程
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="update.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>課程修改
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="deleted_data_page.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>已下架課程列表
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="restore.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>已下架課程管理
                        </a>
                    </div>
                </li>
                <li class="p-3">
                    <h2 class="" id="">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            師資
                        </button>
                    </h2>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="admin-member.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>欄位一
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="sign-up-test.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>欄位二
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="sign-in-test.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>欄位三
                        </a>
                    </div>
                </li>
                <li class="p-3">
                    <h2 class="" id="">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            行銷
                        </button>
                    </h2>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="admin-member.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>欄位一
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="sign-up-test.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>欄位二
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="sign-in-test.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>欄位三
                        </a>
                    </div>
                </li>

            </ul>

            <hr>
   
        </nav>
    </aside>
  <main class="main-content">
    <h1 align="center">課程管理系統 - 新增課程</h1>
  <p align="center"><a href="data_page.php">回主畫面</a></p>
  <form action="" method="post" name="formAdd" id="formAdd">
    <table border="1" align="center" cellpadding="4">
      <tr>
        <th>欄位</th>
        <th>資料</th>
      </tr>
      <tr>
        <td>課程名稱</td>
        <td><input type="text" name="name" id="name" placeholder="輸入課程名稱"></td>
      </tr>
      <tr>
        <td>人數限制</td>
        <td><input type="text" name="capacity" id="capacity" placeholder="輸入人數限制"></td>
      </tr>
      <tr>
        <td>難易分級</td>
        <td>
          <input type="radio" name="level" id="radio" value="1" checked>初學
          <input type="radio" name="level" id="radio" value="2">入門
          <input type="radio" name="level" id="radio" value="3">進階
        </td>
      </tr>
      <tr>
        <td>授課教師</td>
        <td><input name="teacher_id" type="text" id="teacher_id" placeholder="輸入授課教師"></td>
      </tr>
      <tr>
        <td>課程價格</td>
        <td><input name="price" type="text" id="price" placeholder="輸入課程價格"></td>
      </tr>
      <tr>
        <td>上課地點</td>
        <td><input name="location" type="text" id="location" placeholder="輸入上課地點"></td>
      </tr>
      <tr>
        <td>課程日期</td>
        <td><input name="startDate" type="date" id="startDate"> ~ <input name="endDate" type="date" id="endDate"></td>
      </tr>
      <tr>
        <td>上課時間</td>
        <td><input name="startTime" type="time" id="startTime"> ~ <input name="endTime" type="time" id="endTime"></td>
      </tr>
      <tr>
        <td>課程時數</td>
        <td><input name="hours" type="text" id="hours" placeholder="輸入課程時數"></td>
      </tr>
      <tr>
        <td>上傳圖片</td>
        <td><input name="image" type="file" id="image" placeholder=""></td>
      </tr>
      <tr>
        <td>課程敘述</td>
        <td><input name="description" type="text" id="description" placeholder="輸入課程敘述"></td>
      </tr>


      <tr>
        <td colspan="2" align="center">
          <input name="action" type="hidden" value="add">
          <input type="submit" name="button" id="button" value="新增資料">
          <input type="reset" name="button2" id="button2" value="重新填寫">
        </td>
      </tr>
    </table>
  </form>
  </main>
  
</body>
<?php include("/xampp/htdocs/practice/dashboard-js.php")?>
</html>