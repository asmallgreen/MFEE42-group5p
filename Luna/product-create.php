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
    <link rel="stylesheet" href="/practice/dashboard-css.css">
    <style>
        .tab-content li:nth-child(2) {
            display: block;
        }

        /* img */
        .object-fit-cover {
            width: 400px;
            height: 400px;
        }
    </style>

</head>

<body>
    <?php include("/xampp/htdocs/practice/dashboard-admin-header-aside.php") ?>

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
                                    <label class="mx-2 col-3 text-end" for="">類別</label>
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
                                    <input type="number" class="form-control" name="" placeholder="庫存數量">
                                </div>
                                <div class="d-flex my-2 align-items-center">
                                    <label class="mx-2 col-3 text-end" for="">商品描述：</label>
                                    <textarea role="4" class="form-control" name="description" placeholder="請簡單說明產品內容(限50字內)"></textarea>
                                </div>
                                <div class="d-flex my-2 align-items-center">
                                    <label class="mx-2 col-3 text-end" for="">圖:1</label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" value="" class="form-control" name="img_s1">
                                        <button class="btn btn-outline-secondary" type="submit" id="">預覽</button>
                                    </div>
                                </div>
                                <div class="d-flex my-2 align-items-center">
                                    <label class="mx-2 col-3 text-end" for="">圖:2</label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" value="" class="form-control" name="img_s2">
                                        <button class="btn btn-outline-secondary" type="submit" id="">預覽</button>
                                    </div>
                                </div>
                                <div class="d-flex my-2 align-items-center">
                                    <label class="mx-2 col-3 text-end" for="">圖:3</label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" value="" class="form-control" name="img_s3">
                                        <button class="btn btn-outline-secondary" type="submit" id="">預覽</button>
                                    </div>
                                </div>
                                <div class="d-flex my-2 align-items-center">
                                    <label class="mx-2 col-3 text-end" for="">圖:4</label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" value="" class="form-control" name="img_s4">
                                        <button class="btn btn-outline-secondary" type="submit" id="">預覽</button>
                                    </div>
                                </div>
                                <div class="d-flex my-2 align-items-center">
                                    <label class="mx-2 col-3 text-end" for="">圖:5</label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" value="" class="form-control" name="img_s5">
                                        <button class="btn btn-outline-secondary" type="submit" id="">預覽</button>
                                    </div>
                                </div>
                                <div class="d-flex my-2 align-items-center">
                                    <label class="mx-2 col-3 text-end" for="">封面圖：</label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" value="" class="form-control" name="img_m">
                                        <button class="btn btn-outline-secondary" type="submit" id="">預覽</button>
                                    </div>
                                </div>
                            </form>

                            <!-- group btn -->
                            <!-- <form id="showForm" class="" action="product-create.php" method="post">
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
                                        <input type="file" class="form-control" value="<?= $_SESSION["img_s1"] ?>" class="form-control" name="img_s1">
                                        <button class="btn btn-outline-secondary" type="submit" id="showBtn">預覽</button>
                                    </div>
                                </div>
                            </form>
                            <form id="showForm" class="" action="product-create.php" method="post">
                                <div class="d-flex my-2 align-items-center">
                                    <label class="mx-2 col-3 text-end" for="">圖2：</label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" value="<?= $_SESSION["img_s2"] ?>" class="form-control" name="img_s2">
                                        <button class="btn btn-outline-secondary" type="submit" id="showBtn">預覽</button>
                                    </div>
                                </div>
                            </form>
                            <form id="showForm" class="" action="product-create.php" method="post">
                                <div class="d-flex my-2 align-items-center">
                                    <label class="mx-2 col-3 text-end" for="">圖3：</label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" value="<?= $_SESSION["img_s3"] ?>" class="form-control" name="img_s3">
                                        <button class="btn btn-outline-secondary" type="submit" id="showBtn">預覽</button>
                                    </div>
                                </div>
                            </form>
                            <form id="showForm" class="" action="product-create.php" method="post">
                                <div class="d-flex my-2 align-items-center">
                                    <label class="mx-2 col-3 text-end" for="">圖4：</label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" value="<?= $_SESSION["img_s4"] ?>" class="form-control" name="img_s4">
                                        <button class="btn btn-outline-secondary" type="submit" id="showBtn">預覽</button>
                                    </div>
                                </div>
                            </form>
                            <form id="showForm" class="" action="product-create.php" method="post">
                                <div class="d-flex my-2 align-items-center">
                                    <label class="mx-2 col-3 text-end" for="">圖5：</label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" value="<?= $_SESSION["img_s5"] ?>" class="form-control" name="img_s5">
                                        <button class="btn btn-outline-secondary" type="submit" id="showBtn">預覽</button>
                                    </div>
                                </div>
                            </form> -->
                            <button class="my-2 btn btn-info" type="submit" id="subBtn">送出</button>

                        </div>
                        <div class="col-4">
                            <?php if (isset($_POST["img_m"]) && $_POST["img_m"]!="") : ?>
                                <div class="col-auto box object-fit-cover">
                                    <img class="object-fit-cover" src="/practice/Luna/images_bow/<?= $_POST["img_m"] ?>" alt="">
                                </div>
                            <?php endif ?>
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
    <?php include("/xampp/htdocs/practice/dashboard-js.php") ?>
    <script>
        // 使用 JavaScript 為 .tabs li a:nth-child() 元素添加 active class
        document.addEventListener("DOMContentLoaded", function() {
            const firstTabLink = document.querySelector(".tabs li:nth-child(2) a");
            firstTabLink.classList.add("active");
        });
    </script>



</body>

</html>