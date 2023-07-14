<?php

// $id=$_POST["id"];
$name = $_POST["name"];
$category = $_POST["category"];
$price = $_POST["price"];
$id = $_GET["id"];


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

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <div class="container">


        <form class="py-2" action="doEdit.php" method="post">
            <h3>修改資訊：</h3>
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td><input type="hidden" name="id" value="<?= $id ?>"><?= $id ?></td>

                </tr>
                <tr>
                    <th>Name</th>
                    <td><input type="text" name="name" value="<?= $row["name"]; ?>"></td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td><input type="text" name="category" value="<?= $row["category"]; ?>"></td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td><input type="text" name="price" value="<?= $row["price"]; ?>"></td>
                </tr>
            </table>

            <button class="btn btn-info" type="submit">儲存</button>
            <a class="btn btn-info" href="product-list.php">取消</a>
         
        </form>

        
    </div>

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