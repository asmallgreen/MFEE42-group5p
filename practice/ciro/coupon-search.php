<?php
$couponcode=$_GET["coupon_code"];
$likeCoupon="LIKE '%$couponcode%'";
require_once("coupon_db_connect.php");
$sql="SELECT coupon_id, coupon_code, discount, deadline FROM coupon WHERE coupon_code  $likeCoupon AND valid=1";
$result=$conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
$code_count = $result->num_rows;
if(empty($_GET["coupon_code"])){
$code_count=0;
}
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
        .tab-content li:nth-child(6) {
            display: block;
        }
</style>
</head>

<body>
<?php include("/xampp/htdocs/practice/dashboard-admin-header-aside.php") ?>
    <main class="main-content">
        <div class="px-3">
            <div class="py-2">
                <a href="coupon-list.php" class="btn btn-info my-2">回優惠碼列表</a>
                <form action="coupon-search.php">
                <div class="row gx-2">
                    <div class="col">
                        <input type="text" class="form-control" 
                        placeholder="搜尋優惠碼"
                        name="coupon_code"
                        >
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-info" type="submit">搜尋</button>
                    </div>
                </div>
                </form>
            </div>
            <?php
            // $user_count = $result->num_rows;
            ?>
            <div class="py-2 d-flex justify-content-between align-items-center">
                <div class="">
                <?php if(isset($couponcode)):?>
                     搜尋 <?=$couponcode?> 的結果,
                     <?php  endif;?>
                    共有<?=$code_count?> 筆符合資料
                </div>
            </div>
            <?php if($code_count!=0): ?>
            <div class="py-2 d-flex justify-content-between align-items-center">
                <a class="btn btn-info" href="newcoupon-ajax.php">新增</a>
                <div>
                共 <?= $code_count ?> 筆
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        
                        <th>code</th>
                        <th>discount</th>
                        <th>deadline</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($rows as $row): ?>
                    <tr>
                        
                        <td><?=$row["coupon_code"]?></td>
                        <td><?=$row["discount"]?></td>
                        <td><?=$row["deadline"]?></td>
                        <td>
                            <a href="coupon-edit.php?coupon_id=<?=$row["coupon_id"]?>" class="btn btn-info">編輯</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php endif?>

        </div>
    </main>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
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