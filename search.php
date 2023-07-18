<?php

if(isset($_GET["name"])) {
    $name=$_GET["name"];
    require_once("../project/db_connect.php");

    if(!empty($_GET["name"])){
        $sql="SELECT id, name, gender, phone, email, designation, info FROM teacher WHERE name LIKE '%$name%' AND valid=1";
        $result=$conn->query($sql);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $user_count=$result->num_rows;
    }else{
        $user_count=0;
    }
}

// var_dump($rows);

?>

<!doctype html>
<html lang="en">

<head>
  <title>Search</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="py-2">
            <a class="btn btn-info" href="teacher-list.php">回到師資列表</a>
        </div>
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
        <div class="py-2 d-flex justify-content-between align-items-center">    
            <?php if(isset($_GET["name"])): ?>    
            <div>
                搜尋 <?=$name?> 的結果，共有 <?=$user_count?> 筆符合的資料
            </div>
            <?php endif; ?>
        </div>
        <?php if($user_count!=0): ?>
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
                <?php foreach ($rows as $row): ?>
                <tr>
                    <td><?=$row["id"]?></td>
                    <td><?=$row["name"]?></td>
                    <td><?=$row["gender"]?></td>
                    <td><?=$row["phone"]?></td>
                    <td><?=$row["email"]?></td>
                    <td><?=$row["designation"]?></td>
                    <td><?=$row["info"]?></td>
                    <td>
                        <a class="btn btn-info" href="teacher.php?id=<?=$row["id"]?>">顯示</a>
                    </td>
                </tr>
                <?php endforeach; ?>  
            </tbody>
        </table>
        <?php endif; ?>
    </div>





</body>

</html>