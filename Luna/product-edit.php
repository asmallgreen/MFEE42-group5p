<?php

// $id=$_POST["id"];
// $name = $_POST["name"];
// $category = $_POST["category"];
// $price = $_POST["price"];
date_default_timezone_set('Asia/Taipei');

$id = $_GET["id"];
$now = date('Y-m-d H:i:s');


require_once("../db-connect.php");

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
        /* product */
        .editImg{
            width: 400px;
            height: 400px;
        }
    </style>

</head>

<body>
    <header class="text-bg-dark d-flex shadow fixed-top justify-content-between align-items-center">
        <a class="bg-black py-3 px-3 text-decoration-none link-light brand-name" href="/">Product management</a>
        <div class="d-flex align-items-center">
            <div class="me-3">管理者使用後台</div>

            <a href="logout-test.php" class="btn btn-dark me-3"><i class="fa-solid fa-right-from-bracket"></i> Log out</a>
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
                    <a class="d-block py-2 px-3 text-decoration-none" href="product-list.php">
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
            <div class="d-flex justify-content-between align-items-center border-bottom">
                <h1>修改產品資訊</h1>
                <div>
                    <div class="btn-group btn-group-sm " role="group" aria-label="">
                        <button class="btn btn-outline-secondary">Share</button>
                        <button class="btn btn-outline-secondary">Export</button>
                    </div>
                    <a href="product-list.php" class="btn btn-outline-secondary btn-sm"><i class="fa-solid fa-rotate-left px-1"></i>產品列表</a>
                </div>
            </div>
            <div class="chart">
                <div class="container">
                    <div class="row my-2">
                        <div class="col-auto">
                            <img class="editImg" src="/images_bow/<?= $row["img_m"] ?>" alt="">
                        </div>
                        <div class="col-8">
                            <form class="py-2" action="doEdit.php" method="post">
                                <table class="table table-bordered">
                                    <tr>
                                        <th class="col-2">ID</th>
                                        <td class="col-8"><input type="hidden" name="id" value="<?= $id ?>"><?= $id ?></td>
                                    </tr>
                                    <tr>
                                        <th class="col-2">Image_m</th>
                                        <td class="col-8 form-control"><input type="file" name="img_m" value="<?= $row["img_m"] ?>"></td>
                                    </tr>
                                    <tr>
                                        <th class="col-2">Image_s1</th>
                                        <td class="col-8 form-control"><input type="file" name="img_s1" value="<?= $row["img_s1"] ?>"></td>
                                    </tr>
                                    <tr>
                                        <th class="col-2">Image_s2</th>
                                        <td class="col-8 form-control"><input type="file" name="img_s2" value="<?= $row["img_s2"] ?>"></td>
                                    </tr>
                                    <tr>
                                        <th class="col-2">Image_s3</th>
                                        <td class="col-8 form-control"><input type="file" name="img_s3" value="<?= $row["img_s3"] ?>"></td>
                                    </tr>
                                    <tr>
                                        <th class="col-2">Image_s4</th>
                                        <td class="col-8 form-control"><input type="file" name="img_s4" value="<?= $row["img_s4"] ?>"></td>
                                    </tr>
                                    <tr>
                                        <th class="col-2">Image_s5</th>
                                        <td class="col-8 form-control"><input type="file" name="img_s5" value="<?= $row["img_s5"] ?>"></td>
                                    </tr>
                                    <tr>
                                        <th>Name</th>
                                        <td><input type="text" name="name" value="<?= $row["name"]; ?>"></td>
                                    </tr>
                                    <tr>
                                        <th>Category</th>
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
                                        <th>Price</th>
                                        <td><input type="text" name="price" value="<?= $row["price"]; ?>"></td>
                                    </tr>
                                    <tr>
                                        <th>商品說明</th>
                                        <td>
                                        <textarea class="form-control" rows="6" name="description" placeholder=""><?=$row["description"]?></textarea>
                                    </tr>
                                    <tr>
                                        <th>上架狀態</th>
                                        <td><input type="hidden" name="valid" value="<?=$row["valid"]?>">
                                        <?php if($row["valid"]==1){echo "上架中";}else{echo "未上架";} ?></td>
                                    </tr>
                                    <tr>
                                        <th>更新狀態</th>
                                        <td><input type="hidden"><?php if($row["updated_at"]== "" || $row["updated_at"]== "0000-00-00 00:00:00"){
                                            echo "新商品";
                                        }else{
                                            echo "已更新";
                                        }?></td>
                                    </tr>
                                    <tr>
                                        <th>最後一次更新日期</th>
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
</body>

</html>