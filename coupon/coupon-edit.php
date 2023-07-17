<?php
if(!isset($_GET["coupon_id"])){
    header("location:/404.php");
}
$couponid=$_GET["coupon_id"];

require_once("db_connect.php");
$sql ="SELECT * FROM coupon WHERE coupon_id =$couponid AND valid=1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
// var_dump($rows);

?>




<!doctype html>
<html lang="en">

<head>
  <title>Code</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

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
        <a href="doDelete.php?coupon_id=<?=$couponid?>" type="button" class="btn btn-primary">確認</a>
      </div>
    </div>
  </div>
</div>
    <div class="container">
        <!-- <div class="py-2">
            <a href="user-list.php" class="btn btn-dark">back</a>
        </div> -->
        <form action="doUpdate.php" method="post">
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
                <th>deadline</th>
                <td><input type="date" class="form-control" value="<?=$row["deadline"]?>" name="deadline"></td>
            </tr>
            <tr>
                <th>level</th>
                <td><input type="number" min="0" max="10" class="form-control" value="<?=$row["level"]?>" name="level"></td>
            </tr>
        </table>
        <div class="py-2 d-flex justify-content-between">
        <div >
            <button class="btn btn-primary" type="submit"  id="send">儲存</button>
            <a href="coupon-list.php" class="btn btn-primary">取消</a>
        </div>
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" type="button">刪除</button>
        </div>
        </form>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>