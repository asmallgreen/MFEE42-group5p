<?php

session_start();
$img_m = $_POST["img_m"];
if (isset($img_m)) {
    $_SESSION["img_m"] = $img_m;
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Created</title>
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

        /* img */
        .object-fit-cover {
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
                <h1>新增產品資訊</h1>
                <div>
                    
                    <a href="product-list.php" class="btn btn-outline-secondary btn-sm"><i class="fa-solid fa-rotate-left px-1"></i>產品列表</a>
                </div>
            </div>

            <div class="chart">
                <div class="container">
                    <div class="row my-3">
                        <div class="col-6">
                            <form id="subForm" action="product-doCreate.php" method="post">
                                <div class="d-flex my-2 align-items-center text-end">
                                    <label class="mx-2 col-3" for="">產品名稱：</label>
                                    <input type="text" class="form-control" name="name" placeholder="請輸入產品名稱">
                                </div>
                                <div class="d-flex my-2 align-items-center">
                                    <label class="mx-2 col-3 text-end" for="" >類別</label>
                                    <select class="form-select" name="category">
                                        <option value="1">弓</option>
                                        <option value="2">箭</option>
                                        <option value="3">弦</option>
                                        <option value="4">服裝</option>
                                        <option value="5">其他</option>
                                    </select>
                                </div>
                                <div class="d-flex my-2 align-items-center">
                                    <label class="mx-2 col-3 text-end" for="">價格：</label>
                                    <input type="number" class="form-control" name="price" placeholder="新台幣$">
                                </div>


                                <!-- <div class="d-flex my-2 align-items-center">
                                    <label class="mx-2 col-3" for="">圖1：</label>
                                    <input type="file" class="form-control" name="img_s1">
                                </div>
                                <div class="d-flex my-2 align-items-center">
                                    <label class="mx-2 col-3" for="">圖2：</label>
                                    <input type="file" class="form-control" name="img_s2">
                                </div>
                                <div class="d-flex my-2 align-items-center">
                                    <label class="mx-2 col-3" for="">圖3：</label>
                                    <input type="file" class="form-control" name="img_s3">
                                </div>
                                <div class="d-flex my-2 align-items-center">
                                    <label class="mx-2 col-3" for="">圖4：</label>
                                    <input type="file" class="form-control" name="img_s4">
                                </div>
                                <div class="d-flex my-2 align-items-center">
                                    <label class="mx-2 col-3" for="">圖5：</label>
                                    <input type="file" class="form-control" name="img_s5">
                                </div> -->

                                <div class="d-flex my-2 align-items-center">
                                    <label class="mx-2 col-3 text-end" for="">上架數量：</label>
                                    <input type="number" class="form-control" name=""placeholder="庫存數量">
                                </div>
                                <div class="d-flex my-2 align-items-center">
                                    <label class="mx-2 col-3 text-end" for="">商品描述：</label>
                                    <textarea role="4" class="form-control" name="description" placeholder="請簡單說明產品內容(限50字內)"></textarea>
                                </div>
                            </form>

                            <!-- group btn -->
                            <form id="showForm" class="" action="product-create.php" method="post">
                                <div class="d-flex my-2 align-items-center">
                                    <label class="mx-2 col-3 text-end" for="">封面圖：</label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" value="<?= $_SESSION["img_m"] ?>" class="form-control" name="img_m">
                                        <button class="btn btn-outline-secondary" type="submit" id="showBtn">預覽</button>
                                    </div>
                                </div>
                            </form>
                            <form id="showForm" class="" action="product-create.php" method="post">
                                <div class="d-flex my-2 align-items-center">
                                    <label class="mx-2 col-3 text-end" for="">圖1：</label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" value="<?= $_SESSION["img_m"] ?>" class="form-control" name="img_m">
                                        <button class="btn btn-outline-secondary" type="submit" id="showBtn">預覽</button>
                                    </div>
                                </div>
                            </form>
                            <form id="showForm" class="" action="product-create.php" method="post">
                                <div class="d-flex my-2 align-items-center">
                                    <label class="mx-2 col-3 text-end" for="">圖2：</label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" value="<?= $_SESSION["img_m"] ?>" class="form-control" name="img_m">
                                        <button class="btn btn-outline-secondary" type="submit" id="showBtn">預覽</button>
                                    </div>
                                </div>
                            </form>
                            <form id="showForm" class="" action="product-create.php" method="post">
                                <div class="d-flex my-2 align-items-center">
                                    <label class="mx-2 col-3 text-end" for="">圖3：</label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" value="<?= $_SESSION["img_m"] ?>" class="form-control" name="img_m">
                                        <button class="btn btn-outline-secondary" type="submit" id="showBtn">預覽</button>
                                    </div>
                                </div>
                            </form>
                            <form id="showForm" class="" action="product-create.php" method="post">
                                <div class="d-flex my-2 align-items-center">
                                    <label class="mx-2 col-3 text-end" for="">圖4：</label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" value="<?= $_SESSION["img_m"] ?>" class="form-control" name="img_m">
                                        <button class="btn btn-outline-secondary" type="submit" id="showBtn">預覽</button>
                                    </div>
                                </div>
                            </form>
                            <form id="showForm" class="" action="product-create.php" method="post">
                                <div class="d-flex my-2 align-items-center">
                                    <label class="mx-2 col-3 text-end" for="">圖5：</label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" value="<?= $_SESSION["img_m"] ?>" class="form-control" name="img_m">
                                        <button class="btn btn-outline-secondary" type="submit" id="showBtn">預覽</button>
                                    </div>
                                </div>
                            </form>
                            <button class="my-2 btn btn-info" type="submit" id="subBtn">送出</button>

                        </div>
                        <div class="col-4">
                            <?php if(($_POST["img_m"])!=""):?>
                            <div class="col-auto box object-fit-cover">
                                <img class="object-fit-cover" src="/images_bow/<?= $_POST["img_m"] ?>" alt="">
                            </div>
                            <?php endif?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <script>
        // 在按鈕點擊時觸發表單提交
        const showBtn = document.getElementById("showBtn");
        showBtn.addEventListener("click", function() {
            let showForm = document.getElementById("showForm");
            showForm.submit();
        });
    </script>
    <script>
        // 在按鈕點擊時觸發表單提交
        const subBtn = document.getElementById("subBtn");
        subBtn.addEventListener("click", function() {
            let subForm = document.getElementById("subForm");
            subForm.submit();
        });
    </script>



</body>

</html>