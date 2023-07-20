<header class="text-bg-dark d-flex shadow fixed-top justify-content-between align-items-center">
        <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
            <div class="container-fluid">
                <!-- <a class="navbar-brand" href="#">
      <img src="/images/bow_icon.jpg" alt="Bootstrap" width="30" height="24">
    </a> -->
                <a class="navbar-brand" href="/practice/dashboard-admin-test.php">管理者後臺介面</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav tabs">
                        <li class="nav-item px-2">
                            <a class="nav-link" aria-current="page" href="#">會員</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link" href="#">產品</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link" href="#">庫存</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link " href="#">課程</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link " href="#">師資</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link " href="#">行銷</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- <a class="bg-black py-3 px-3 text-decoration-none link-light brand-name" href="dashboard-admin-test.php">管理者後臺介面</a>
        <div class="d-flex align-items-center">
            <div class="me-3">
                hi, 慕朵
            </div> -->

    </header>
    <aside class="main-aside position-fixed bg-light vh-100 border-end">
        <nav class="">
            <ul class="list-unstyled tab-content">
                <li class="p-3">
                    <h2 class="" id="">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            會員
                        </button>
                    </h2>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="/practice/admin-member.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>會員資料
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="/practice/sign-up-test.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>會員註冊
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="/practice/sign-in-test.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>會員登入
                        </a>
                    </div>
                </li>

                <!-- <li>
                    <a class="d-block py-2 px-3 text-decoration-none memberaside" id="memberaside" href="admin-member.php">
                        <i class="fa-solid fa-users fa-fw me-2"></i>會員資料
                    </a>
                </li> -->
                <li class="p-3">
                    <h2 class="" id="">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            產品
                        </button>
                    </h2>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="/practice/Luna/product-list.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>產品列表
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="/practice/Luna/product-search.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>產品搜尋
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="/practice/Luna/product-create.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>新增產品
                        </a>
                    </div>
                </li>
                <li class="p-3">
                    <h2 class="" id="">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            庫存
                        </button>
                    </h2>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none " id="memberaside" href="/practice/Kuan/inventory-list.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>庫存列表
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none " id="memberaside" href="/practice/Kuan/create-inventory.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>新增庫存
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="/practice/Kuan/search-inventory.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>庫存管理
                        </a>
                    </div>
                </li>
                <li class="p-3">
                    <h2 class="" id="">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            課程
                        </button>
                    </h2>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="/practice/changJim/course/course_CRUD/data_page.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>課程列表
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="/practice/changJim/course/course_CRUD/add.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>新增課程
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="/practice/changJim/course/course_CRUD/deleted_data_page.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>已刪除課程列表
                        </a>
                    </div>
                </li>
                <li class="p-3">
                    <h2 class="" id="">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            師資
                        </button>
                    </h2>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="/practice/kuwacha/teacher-list.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>師資列表
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="/practice/kuwacha/create-teacher.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>新增師資
                        </a>
                    </div>
                </li>
                <li class="p-3">
                    <h2 class="" id="">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            行銷
                        </button>
                    </h2>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="/practice/ciro/coupon-list.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>優惠列表
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="/practice/ciro/newcoupon-ajax.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>新增優惠券
                        </a>
                    </div>
                </li>

            </ul>

            <hr>
   
        </nav>
    </aside>