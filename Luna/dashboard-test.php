
<!doctype html>
<html lang="en">

<head>
  <title>Membership center</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    :root{
        --aside-width:300px;
        --page-spacing-top:56px;
    }
    
    .brand-name{
        width: var(--aside-width);
    }
    .main-aside{
        width: var(--aside-width);
        padding-top: calc(var(--page-spacing-top) + 10px);
    }
    .main-content{
        margin-left: var(--aside-width);
        padding-top: calc(var(--page-spacing-top) + 10px);
    }
    .chart{
        height: 400px;
    }
</style>
</head>

<body>
<header class="text-bg-dark d-flex shadow fixed-top justify-content-between align-items-center">
    <a class="bg-black py-3 px-3 text-decoration-none link-light brand-name" href="/">Product management</a>
    <div class="d-flex align-items-center">
      <div class="me-3">
        hi, <?=$_SESSION["user"]["name"]?>
      </div>
      
        <a href="logout-test.php" class="btn btn-dark me-3"><i class="fa-solid fa-right-from-bracket"></i> Log out</a>
    </div>
</header>
<aside class="main-aside position-fixed bg-light vh-100 border-end">
    <nav class="">
        <ul class="list-unstyled">
            <li>
                <a class="d-block py-2 px-3 text-decoration-none" href="./member-edit.php">
                <i class="fa-solid fa-user-pen"></i>修改會員資料
                </a>
            </li>
            <li>
                <a class="d-block py-2 px-3 text-decoration-none" href="">
                    <i class="fa-regular fa-note-sticky fa-fw me-2"></i>Order
                </a>
            </li>
            <li>
                <a class="d-block py-2 px-3 text-decoration-none" href="product-list.php">
                    <i class="fa-solid fa-cart-shopping fa-fw me-2"></i>Product
                </a>
            </li>
            <li>
                <a class="d-block py-2 px-3 text-decoration-none" href="">
                    <i class="fa-solid fa-user-group fa-fw me-2"></i>Customers
                </a>
            </li>
            <li>
                <a class="d-block py-2 px-3 text-decoration-none" href="">
                    <i class="fa-solid fa-chart-line fa-fw me-2"></i>Report
                </a>
            </li>
            <li>
                <a class="d-block py-2 px-3 text-decoration-none" href="">
                    <i class="fa-solid fa-puzzle-piece fa-fw me-2"></i>Intergrations
                </a>
            </li>
        </ul>
        <div class="my-3 d-flex justify-content-between text-secondary px-3">
            <div> SAVED REPORTS</div>
            <a role="button" href="">
            <i class="fa-regular fa-square-plus text-secondary"></i>
            </a>
        </div>
        <ul class="list-unstyled">
            <li>
                <a class="d-block py-2 px-3 text-decoration-none" href="">
                    <i class="fa-regular fa-file-lines fa-fw me-2"></i>Current month
                </a>
            </li>
            <li>
                <a class="d-block py-2 px-3 text-decoration-none" href="">
                    <i class="fa-regular fa-file-lines fa-fw me-2"></i> Last quarter
                </a>
            </li>
            <li>
                <a class="d-block py-2 px-3 text-decoration-none" href="">
                    <i class="fa-regular fa-file-lines fa-fw me-2"></i>Social engagement 
                </a>
            </li>
            <li>
                <a class="d-block py-2 px-3 text-decoration-none" href="">
                    <i class="fa-regular fa-file-lines fa-fw me-2"></i>Year-end sale
                </a>
            </li>
        </ul>
        <hr>
        <ul class="list-unstyled">
            
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
        </ul>
    </nav>
</aside>
<main class="main-content">
<div class="px-3">
    <div class="d-flex justify-content-between align-items-center border-bottom">
    <h1>產品管理</h1>
    <div>
        <div class="btn-group btn-group-sm " role="group" aria-label="">
            <button class="btn btn-outline-secondary">Share</button>
            <button class="btn btn-outline-secondary">Export</button>
        </div>
        <button class="btn btn-outline-secondary btn-sm">This week</button>
    </div>
    </div>
    
    <div class="chart">

    </div>
    
</div>
</main>


  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>