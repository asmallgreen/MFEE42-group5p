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
        <div class="py-2">
            <form action="doCreate.php" method="post">
                <label for="">name</label>
                <input type="text" class="form-control" name="name">
                <label for="">category</label>
                <input type="number" class="form-control" name="category">
                <label for="">price</label>
                <input type="number" class="form-control" name="price">
                <label for="">img_s1</label>
                <input type="text" class="form-control" name="img_s1">
                <label for="">img_s2</label>
                <input type="text" class="form-control" name="img_s2">
                <label for="">img_s3</label>
                <input type="text" class="form-control" name="img_s3">
                <label for="">img_s4</label>
                <input type="text" class="form-control" name="img_s4">
                <label for="">img_s5</label>
                <input type="text" class="form-control" name="img_s5">
                <label for="">img_m</label>
                <input type="text" class="form-control" name="img_m">
                <label for="">description</label>
                <input type="text" class="form-control" name="description">
                <button class="my-2 btn btn-info" type="submit">送出</button>
            </form>
        </div>
    </div>

</body>

</html>