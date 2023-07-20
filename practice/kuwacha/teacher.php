<?php
if (!isset($_GET["id"])) {
    header("location: 404.php");
}

$id = $_GET["id"];

require_once("/xampp/htdocs/practice/db_connect-test.php");
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
    <link rel="stylesheet" href="/practice/dashboard-css.css">
    <style>
        .img {
            max-width: 300px;
            max-height: 300px;
            object-fit: cover;
            clip-path: circle(40% at 50% 50%);
        }
                .tab-content li:nth-child(5){
        display: block;
        }
    </style>

</head>

<body>
<?php include("/xampp/htdocs/practice/dashboard-admin-header-aside.php") ?>
<main class="main-content">
 <div class="container">
        <div class="py-2">
            <a class="btn btn-info" href="teacher-list.php">回到師資列表</a>
        </div>
        <img class="img  mb-2" src="../images/<?= $row["img"] ?>" alt="">
        <table class="table table-bordered">
            <tr>
                <th>姓名</th>
                <td><?= $row["name"] ?></td>
            </tr>
            <tr>
                <th>性別</th>
                <td><?= $row["gender"] ?></td>
            </tr>
            <tr>
                <th>連絡電話</th>
                <td><?= $row["phone"] ?></td>
            </tr>
            <tr>
                <th>電子信箱</th>
                <td><?= $row["email"] ?></td>
            </tr>
            <tr>
                <th>段位</th>
                <td><?= $row["designation"] ?></td>
            </tr>
            <tr>
                <th>介紹</th>
                <td><?= $row["info"] ?></td>
            </tr>
        </table>
        <div class="py-2">
            <a class="btn btn-info" href="teacher-edit.php?id=<?= $row["id"] ?>">編輯</a>
        </div>
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
      const firstTabLink = document.querySelector(".tabs li:nth-child(5) a");
      firstTabLink.classList.add("active");
    });
  </script>


</body>

</html>