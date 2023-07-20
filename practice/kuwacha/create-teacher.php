<!doctype html>
<html lang="en">

<head>
  <title>Creat-Teacher</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="/practice/dashboard-css.css">
    <style>
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
        <a class="btn btn-info" href="teacher-list.php">回師資列表</a>
      </div>
        <form action="doCreate.php" method="post" enctype="multipart/form-data">
            <div class="mb-2">
                <label for=""><span class="text-danger">*</span>Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-2">
                <label for="" class="form-label"><span class="text-danger">*</span>性別</label>
                <div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
                    <label class="form-check-label" for="male">
                      男
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                    <label class="form-check-label" for="female">
                      女
                    </label>
                  </div>
                </div>
            </div>
            <div class="mb-2">
                <label for=""><span class="text-danger">*</span>Phone</label>
                <input type="tel" class="form-control" name="phone">
            </div>
            <div class="mb-2">
                <label for=""><span class="text-danger">*</span>Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-2">
                <label for=""><span class="text-danger">*</span>段位</label>
                <input type="text" class="form-control" name="designation">
            </div>
            <div class="mb-2">
                <label for="form-control">介紹</label>
                <textarea class="form-control" name="info" id="" cols="30" rows="4"></textarea>
            </div>
            <!-- <div class="mb-2">
              <input type="file" name="img" accept=".jpeg, .png">
              <input type="submit" value="img">
            </div> -->
            <button class="btn btn-info" type="submit">送出</button>
        </form>
    </div>

</main>
    

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
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