<?php
if (!isset($_GET["id"])) {
    header("location: 404.php");
}

$id = $_GET["id"];

require_once("../project/db_connect.php");
$sql = "SELECT * FROM teacher WHERE id=$id AND valid=1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();



?>
<!doctype html>
<html lang="en">

<head>
    <title>Teacher</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <style>
        .img {
            max-width: 300px;
            max-height: 300px;
            object-fit: cover;
            clip-path: circle(40% at 50% 50%);
        }
    </style>

</head>

<body>
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">訊息</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    確定要刪除此筆教師的資料嗎?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                    <a href="doDelete.php?id=<?= $id ?>" class="btn btn-danger">確認刪除</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <img class="img my-2" src="upload/<?= $row["img"] ?>" alt="">
        <form method="post" action="doUpload.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $row["id"] ?>">
            <div class="row">
                <!-- 其他欄位... -->
                <div class="col-3 mb-2">
                    <!-- <label for="" class="form-label">上傳圖片</label> -->
                    <input type="file" class="form-control" name="file" required>
                </div>
                <div class="col-3 mb-2">
                    <button type="submit" class="btn btn-info">上傳圖片</button>
                </div>
            </div>
        </form>
        <form action="doUpdate.php" method="post">
            <table class="table table-bordered">
                <input type="hidden" name="id" value="<?= $row["id"] ?>">
                <tr>
                    <th>姓名</th>
                    <td>
                        <input type="text" class="form-control" value="<?= $row["name"] ?>" name="name">
                    </td>
                </tr>
                <tr>
                    <th>性別</th>
                    <td>
                        <input type="text" class="form-control" value="<?= $row["gender"] ?>" name="gender">
                    </td>
                </tr>
                <tr>
                    <th>連絡電話</th>
                    <td>
                        <input type="tel" class="form-control" value="<?= $row["phone"] ?>" name="phone">
                    </td>
                </tr>
                <tr>
                    <th>電子信箱</th>
                    <td>
                        <input type="email" class="form-control" value="<?= $row["email"] ?>" name="email">
                    </td>
                </tr>
                <tr>
                    <th>段位</th>
                    <td>
                        <input type="text" class="form-control" value="<?= $row["designation"] ?>" name="designation">
                    </td>
                </tr>
                <tr>
                    <th>介紹</th>
                    <td>
                        <input type="text" class="form-control" value="<?= $row["info"] ?>" name="info">
                    </td>
                </tr>
            </table>
            <div class="py-2 d-flex justify-content-between">
                <div>
                    <button class="btn btn-info" type="submit">儲存</button>
                    <a class="btn btn-info" href="teacher.php?id=<?= $row["id"] ?>">取消</a>
                </div>
                <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal">刪除</button>
            </div>
        </form>
    </div>





    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>