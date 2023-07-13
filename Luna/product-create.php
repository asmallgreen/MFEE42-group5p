<!doctype html>
<html lang="en">

<head>
    <title>Created</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <h5 class="py-2">新增產品資訊：</h5>

        <!-- <div class="py-2">
            <nav class="nav">
                <a class="nav-link active" aria-current="page" href="#">全部</a>
                <a class="nav-link" href="#">弓</a>
                <a class="nav-link" href="#">矢</a>
                <a class="nav-link">弦</a>
            </nav>
        </div> -->
        <!-- <div class="py-2">
            <form action="doUpload.php" method="post" enctype="multipart/form-data">
                <div class="py-2">
                    <label for="">標題</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="py-2">
                    <label for="">選取檔案</label>
                    <input type="file" class="form-control" name="file">
                </div>
                <button class="btn btn-info">送出</button>
            </form>
        </div> -->
        <!-- <div class="py-2">
            <div class="row">
                <div class="col-auto">
                    <img class="mx-2 object-fit-cover" src="/images_bow/bow１.jpeg" alt="">
                    <img class="mx-2 object-fit-cover" src="/images_bow/bow2.jpeg" alt="">
                </div>
            </div>
        </div> -->
        <!-- <div class="py-2">
            <form action="" method="post">
                <label for="">類別：</label>
                <select class="form-select" name="catagory" id required>
                    <option value="">弓</option>
                    <option value="">箭</option>
                    <option value="">弦</option>
                    <option value="">配件</option>
                    <option value="">弓道依</option>
                </select>
            </form>
            <button class="my-2 btn btn-info">新增</button>
        </div> -->
        <div class="py-2">
            <form action="doCreate.php" method="post">
                <label for="">name</label>
                <input type="text" class="form-control" name="name">
                <label for="">category</label>
                <input type="text" class="form-control" name="category">
                <label for="">price</label>
                <input type="text" class="form-control" name="price">
                <label for="">img_s</label>
                <input type="text" class="form-control" name="img_s">
                <label for="">img_m</label>
                <input type="text" class="form-control" name="img_m">
                <button class="my-2 btn btn-info" type="submit">送出</button>
            </form>
        </div>
    </div>

</body>

</html>