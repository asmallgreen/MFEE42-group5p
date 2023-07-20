<?php
if(!isset($_GET["coupon_id"])){
    header("location:/404.php");
}
$couponid=$_GET["coupon_id"];

require_once("coupon_db_connect.php");
$sql ="SELECT * FROM coupon WHERE coupon_id =$couponid AND valid=1 ";
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
    <link rel="stylesheet" href="/practice/dashboard-css.css">
    <style>
        .tab-content li:nth-child(6){
        display: block;
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
<?php include("/xampp/htdocs/practice/dashboard-admin-header-aside.php") ?>
   
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
    <?php include("/xampp/htdocs/practice/dashboard-js.php")?>
 <script>
    // 使用 JavaScript 為 .tabs li a:nth-child() 元素添加 active class
    document.addEventListener("DOMContentLoaded", function() {
      const sixthTabLink = document.querySelector(".tabs li:nth-child(6) a");
      sixthTabLink.classList.add("active");
    });
  </script>
</body>

</html>