<?php

// $id=$_POST["id"];
// $name = $_POST["name"];
// $category = $_POST["category"];
// $price = $_POST["price"];
date_default_timezone_set('Asia/Taipei');

$id = $_GET["id"];
$now = date('Y-m-d H:i:s');


require_once("/xampp/htdocs/practice/db_connect-test.php");

$sql = "SELECT * FROM product_bow WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
// var_dump($id)

?>



<!doctype html>
<html lang="en">

<head>
    <title>Edit</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.3.0 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/practice/dashboard-css.css">
    <style>
        .tab-content li:nth-child(2){
        display: block;
        }
        /* product */
        .editImg{
            width: 350px;
            height: 350px;
        }
    </style>

</head>

<body>
<?php include("/xampp/htdocs/practice/dashboard-admin-header-aside.php") ?>
    
    <main class="main-content">
        <div class="px-3">
            <div class="d-flex justify-content-between align-items-center border-bottom">
                <h1>修改產品資訊</h1>
                <div>
                    <a href="product-list.php" class="btn btn-outline-secondary btn-sm"><i class="fa-solid fa-rotate-left px-1"></i>產品列表</a>
                </div>
            </div>
            <div class="chart">
                <div class="container">
                    <div class="row my-2 d-flex">
                        <div class="col-auto my-2 mx-2">
                            <img class="editImg" src="/practice/Luna/images_bow/<?= $row["img_m"] ?>" alt="">
                        </div>
                        <div class="col-8">
                            <form class="py-2" action="product-doEdit.php" method="post">
                                <table class="table table-bordered">
                                    <tr>
                                        <th class="col-2">商品編號：</th>
                                        <td class="col-8"><input type="hidden" name="id" value="<?= $id ?>"><?= $id ?></td>
                                    </tr>
                                    <tr>
                                        <th class="col-2">封面圖：</th>
                                        <td class="col-8 form-control"><input type="file" name="img_m" value="<?= $row["img_m"] ?>"></td>
                                    </tr>
                                    <tr>
                                        <th class="col-2">圖1：</th>
                                        <td class="col-8 form-control"><input type="file" name="img_s1" value="<?= $row["img_s1"] ?>"></td>
                                    </tr>
                                    <tr>
                                        <th class="col-2">圖2：</th>
                                        <td class="col-8 form-control"><input type="file" name="img_s2" value="<?= $row["img_s2"] ?>"></td>
                                    </tr>
                                    <tr>
                                        <th class="col-2">圖3：</th>
                                        <td class="col-8 form-control"><input type="file" name="img_s3" value="<?= $row["img_s3"] ?>"></td>
                                    </tr>
                                    <tr>
                                        <th class="col-2">圖4：</th>
                                        <td class="col-8 form-control"><input type="file" name="img_s4" value="<?= $row["img_s4"] ?>"></td>
                                    </tr>
                                    <tr>
                                        <th class="col-2">圖5：</th>
                                        <td class="col-8 form-control"><input type="file" name="img_s5" value="<?= $row["img_s5"] ?>"></td>
                                    </tr>
                                    <tr>
                                        <th>商品名稱：</th>
                                        <td><input type="text" name="name" value="<?= $row["name"]; ?>"></td>
                                    </tr>
                                    <tr>
                                        <th>類別：</th>
                                        <td>
                                        <select class="form-select" name="category">
                                <option value="1">Bow</option>
                                <option value="2">Arrow</option>
                                <option value="3">String</option>
                                <option value="4">Other</option>
                                <option value="4">Suit</option>
                            </select></td>
                                    </tr>
                                    <tr>
                                        <th>價格：</th>
                                        <td><input type="text" name="price" value="<?= $row["price"]; ?>"></td>
                                    </tr>
                                    <tr>
                                        <th>商品說明：</th>
                                        <td>
                                        <textarea class="form-control" rows="6" name="description" placeholder=""><?=$row["description"]?></textarea>
                                    </tr>
                                    <tr>
                                        <th>上架狀態：</th>
                                        <td><input type="hidden" name="valid" value="<?=$row["valid"]?>">
                                        <?php if($row["valid"]==1){echo "上架中";}else{echo "未上架";} ?></td>
                                    </tr>
                                    <tr>
                                        <th>更新狀態：</th>
                                        <td><input type="hidden"><?php if($row["updated_at"]== "" || $row["updated_at"]== "0000-00-00 00:00:00"){
                                            echo "新商品";
                                        }else{
                                            echo "已更新";
                                        }?></td>
                                    </tr>
                                    <tr>
                                        <th>最後更新日期：</th>
                                        <td><input type="hidden" name="update" value="<?= $now ?>">
                                        <?php if($row["updated_at"]== "" || $row["updated_at"]== "0000-00-00 00:00:00"){
                                            echo $row["created_at"];
                                        }else{
                                            echo $row["updated_at"];
                                        }?>
                                        
                                    </tr>
                                </table>

                                <button class="btn btn-info" type="submit">儲存</button>
                                <a class="btn btn-info" href="product-list.php">取消</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
        const myModal = document.getElementById('myModal')
        const myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus()
        })
    </script>
    <?php include("/xampp/htdocs/practice/dashboard-js.php")?>
 <script>
    // 使用 JavaScript 為 .tabs li a:nth-child() 元素添加 active class
    document.addEventListener("DOMContentLoaded", function() {
      const firstTabLink = document.querySelector(".tabs li:nth-child(2) a");
      firstTabLink.classList.add("active");
    });
  </script>

</body>

</html>