<?php

// if(isset($_GET["page"])){
//     $page=$_GET["page"];
// }else{
//     $page=1;
// }

// $page=isset($_GET["page"]) ? $_GET["page"] : 1;
//PHP 7.0 新增的寫法
$page = $_GET["page"] ?? 1;

$type=$_GET["type"] ?? 1;

// $page=$_GET["page"];

require_once("../project/db_connect.php");

$sqlTotal = "SELECT id FROM teacher WHERE valid=1";
$resultTotal = $conn->query($sqlTotal);
$totalTeacher = $resultTotal->num_rows;

$perpage = 5;
$startItem = ($page - 1) * $perpage;

//計算需總共頁數
$totalPage = ceil($totalTeacher/$perpage);

if($type==1){
    // $sql = "SELECT id, name, gender, phone, email, designation, info FROM teacher WHERE valid=1 ORDER BY id ASC LIMIT $startItem, $perpage";
    $orderBy="ORDER BY id ASC";
}elseif($type==2){
    // $sql = "SELECT id, name, gender, phone, email, designation, info FROM teacher WHERE valid=1 ORDER BY id DESC LIMIT $startItem, $perpage";
    $orderBy="ORDER BY id DESC";

}elseif($type==3){
    $orderBy="ORDER BY name ASC";
}elseif($type==4){
    $orderBy="ORDER BY name DESC";
}else{
    header("location: 404.php");
}

$sql = "SELECT id, name, gender, phone, email, designation, info FROM teacher WHERE valid=1 $orderBy LIMIT $startItem, $perpage";


$result = $conn->query($sql);
?>
<!doctype html>
<html lang="en">

<head>
    <title>Teacher List</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="container">
        <div class="py-2">
            <form action="search.php">
                <div class="row gx-2">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="搜尋老師名稱" name="name">
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-info" type="submit">搜尋</button>
                    </div>
                </div>
            </form>

        </div>
        <?php
        $user_count = $result->num_rows;
        ?>
        <div class="py-2 d-flex justify-content-between align-items-center  ">
            <a class="btn btn-info" href="create-teacher.php">新增</a>

            <div class="py">
                共 <?= $totalTeacher ?> 人，第 <?= $page ?> 頁
            </div>
        </div>
        <div class="py-2 d-flex justify-content-end">
            <div>
                <a href="teacher-list.php?page=<?= $page ?>&type=1" class="btn btn-info <?php if($type==1)echo "active";?>">id<i class="fa-solid fa-arrow-down-short-wide"></i></a>
                <a href="teacher-list.php?page=<?= $page ?>&type=2" class="btn btn-info <?php if($type==2)echo "active";?>">id<i class="fa-solid fa-arrow-up-short-wide"></i></a>
                <a href="teacher-list.php?page=<?= $page ?>&type=3" class="btn btn-info <?php if($type==3)echo "active";?>">姓名<i class="fa-solid fa-arrow-down-short-wide"></i></a>
                <a href="teacher-list.php?page=<?= $page ?>&type=4" class="btn btn-info <?php if($type==4)echo "active";?>">姓名<i class="fa-solid fa-arrow-up-short-wide"></i></a>
            </div>
        </div>
        <?php
        //把 query 出來的資料轉換為關聯是陣列
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        // var_dump($row);
        // echo $row["name"],"<br>";
        ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>性別</th>
                    <th>phone</th>
                    <th>email</th>
                    <th>段位</th>
                    <th>介紹</th>
                    <th>照片</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $row) : ?>
                    <tr>
                        <td><?= $row["id"] ?></td>
                        <td><?= $row["name"] ?></td>
                        <td><?= $row["gender"] ?></td>
                        <td><?= $row["phone"] ?></td>
                        <td><?= $row["email"] ?></td>
                        <td><?= $row["designation"] ?></td>
                        <td><?= $row["info"] ?></td>
                        <td>
                            <a class="btn btn-info" href="teacher.php?id=<?= $row["id"] ?>">顯示</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                    <li class="page-item"><a class="page-link link-secondary" href="teacher-list.php?page=<?=$i?>&type=<?=$type?>"><?= $i ?></a></li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>
    <script>
        let teacher = <?= json_encode($rows) ?>;

        console.log(teacher)
    </script>




    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

</body>

</html>