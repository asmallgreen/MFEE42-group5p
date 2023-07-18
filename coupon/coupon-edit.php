<?php
if(!isset($_GET["coupon_id"])){
    header("location:/404.php");
}
$couponid=$_GET["coupon_id"];

require_once("coupon_db_connect.php");
$sql ="SELECT * FROM coupon WHERE coupon_id =$couponid AND valid=1 AND NOW() >= startdate AND NOW() <= deadline";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
// var_dump($rows);

?>

<!doctype html>
<html lang="en">

<head>
    <title>Admin center</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">訊息</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        確認刪除?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
        <a href="coupon-doDelete.php?coupon_id=<?=$couponid?>" type="button" class="btn btn-primary">確認</a>
      </div>
    </div>
  </div>
</div>
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
        <div class="px-3">
           <form action="coupon-doUpdate.php" method="post">
                <table class= "table table-bordered">
                    <input type="hidden" name="coupon_id" value="<?=$row["coupon_id"]?>">
                    <tr>
                        <th>Code</th>
                        <td><input type="text" class="form-control" value="<?=$row["coupon_code"]?>" name="coupon_code"></td>
                    </tr>
                    <tr>
                        <th>discount</th>
                        <td><input type="text" class="form-control" value="<?=$row["discount"]?>" name="discount"></td>
                    </tr>
                    <tr>
                        <th>startdate</th>
                        <td><input type="date" class="form-control" value="<?=$row["startdate"]?>" name="startdate"></td>
                    </tr>
                    <tr>
                        <th>deadline</th>
                        <td><input type="date" class="form-control" value="<?=$row["deadline"]?>" name="deadline"></td>
                    </tr>
                    <tr>
                        <th>level</th>
                        <td><input type="number" min="0" max="10" class="form-control" value="<?=$row["level"]?>" name="level"></td>
                    </tr>
                </table>
                <div class="py-2 d-flex justify-content-between">
                    <div>
                        <button class="btn btn-primary" type="submit"  id="send">儲存</button>
                        <a href="coupon-list.php" class="btn btn-primary">取消</a>
                    </div>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" type="button">刪除</button>
                </div>
            </form>

        </div>
    </main>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>