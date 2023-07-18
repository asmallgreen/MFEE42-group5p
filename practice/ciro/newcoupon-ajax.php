

<!doctype html>
<html lang="en">

<head>
    <title>Admin center</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        :root {
            --aside-width: 300px;
            --page-spacing-top: 56px;
        }

        .brand-name {
            width: var(--aside-width);
        }

        .main-aside {
            width: var(--aside-width);
            padding-top: calc(var(--page-spacing-top) + 10px);
        }

        .main-content {
            margin-left: var(--aside-width);
            padding-top: calc(var(--page-spacing-top) + 10px);
        }

        .chart {
            height: 400px;
        }
    </style>
</head>

<body>
    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModal" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="">Message</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="text-danger" id="modalError">

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            
        </div>
        </div>
    </div>
    </div>
    <header class="text-bg-dark d-flex shadow fixed-top justify-content-between align-items-center">
        <a class="bg-black py-3 px-3 text-decoration-none link-light brand-name" href="/">管理者後臺介面</a>
        <div class="d-flex align-items-center">
            <div class="me-3">
                hi, 慕朵
            </div>

            <!-- <a href="logout-test.php" class="btn btn-dark me-3"><i class="fa-solid fa-right-from-bracket"></i> Log out</a> -->
        </div>
    </header>
    <aside class="main-aside position-fixed bg-light vh-100 border-end">
        <nav class="">
            <ul class="list-unstyled">
                <div class="my-2 d-flex justify-content-between text-secondary px-3">
                    <div> 會員</div>
                    <a role="button" href="">
                        <i class="fa-regular fa-square-plus text-secondary"></i>
                    </a>
                </div>
                <li>
                    <a class="d-block py-2 px-3 text-decoration-none" href="./dashboard-admin-test.php">
                        <i class="fa-solid fa-users fa-fw me-2"></i>會員資料
                    </a>
                </li>
                <div class="my-2 d-flex justify-content-between text-secondary px-3">
                    <div> 產品</div>
                    <a role="button" href="">
                        <i class="fa-regular fa-square-plus text-secondary"></i>
                    </a>
                </div>

                <li>
                    <a class="d-block py-2 px-3 text-decoration-none" href="">
                        <i class="fa-solid fa-cart-shopping fa-fw me-2"></i>產品目錄
                    </a>
                </li>
                <div class="my-2 d-flex justify-content-between text-secondary px-3">
                    <div> 庫存</div>
                    <a role="button" href="">
                        <i class="fa-regular fa-square-plus text-secondary"></i>
                    </a>
                </div>
                <li>
                    <a class="d-block py-2 px-3 text-decoration-none" href="">
                    <i class="fa-solid fa-box fa-fw me-2"></i>庫存目錄
                    </a>
                </li>
                <div class="my-2 d-flex justify-content-between text-secondary px-3">
                    <div> 課程</div>
                    <a role="button" href="">
                        <i class="fa-regular fa-square-plus text-secondary"></i>
                    </a>
                </div>
                <li>
                    <a class="d-block py-2 px-3 text-decoration-none" href="">
                    <i class="fa-solid fa-book fa-fw me-2"></i>課程目錄
                    </a>
                </li>
                <div class="my-2 d-flex justify-content-between text-secondary px-3">
                    <div> 師資</div>
                    <a role="button" href="">
                        <i class="fa-regular fa-square-plus text-secondary"></i>
                    </a>
                </div>
                <li>
                    <a class="d-block py-2 px-3 text-decoration-none" href="">
                        <i class="fa-solid fa-user fa-fw me-2"></i>師資目錄
                    </a>
                </li>
                <div class="my-2 d-flex justify-content-between text-secondary px-3">
                    <div> 行銷</div>
                    <a role="button" href="">
                        <i class="fa-regular fa-square-plus text-secondary"></i>
                    </a>
                </div>
                <li>
                    <a class="d-block py-2 px-3 text-decoration-none" href="">
                        <i class="fa-solid fa-comments-dollar fa-fw me-2"></i>行銷目錄
                    </a>
                </li>

            </ul>

            <hr>
            <!-- <ul class="list-unstyled">
            
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
        </ul> -->
        </nav>
    </aside>
    <main class="main-content">
        <div class="px-3">
            <div class="container vh-100 d-flex justify-content-center align-items-center">
                <div>    
                    <h2 class="mb-3">Create a coupon</h2>
                    <div class="mb-2" >
                        <label for="">Coupon Code</label>                
                        <input type="text" name="couponcode" class="form-control" id="couponcode">                
                    </div>
                    <div class="mb-2" >
                        <label for="">Discount</label>                
                        <input type="number" name="discount" step="0.01" class="form-control" id="discount">
                        
                    </div>
                    <div class="mb-2" >
                        <label for="">Startdate</label>                
                        <input type="date" name="startdate" class="form-control" id="startdate">
                        
                    </div>
                    <div class="mb-2" >
                        <label for="">Deadline</label>                
                        <input type="date" name="deadline" class="form-control" id="deadline">
                        
                    </div>
                    <div class="mb-2" >
                        <label for="">level</label>                
                        <input type="number" min="0" max="10" name="level" class="form-control" id="level" >
                        
                    </div>
                    <button class="btn btn-dark" id="send">Send</button>    
                </div>
            </div>

        </div>
    </main>
    <?php include("coupon-js.php")?>
    <script>
        const infoModal = new bootstrap.Modal("#infoModal");
        const modalError=document.querySelector("#modalError");

        const couponcode = document.querySelector("#couponcode");
        const discount = document.querySelector("#discount");
        const deadline = document.querySelector("#deadline");
        const startdate = document.querySelector("#startdate");
        const level =document.querySelector("#level");
        
        const send=document.querySelector("#send");

        send.addEventListener("click", function(){
                
                let couponcodeValue=couponcode.value;
                let discountValue=discount.value;
                let deadlineValue=deadline.value;
                let startdateValue=startdate.value;
                let levelValue=level.value;

                // console.log(discountValue)
                // console.log(deadlineValue)
                // console.log(levelValue)
                
                
                
                $.ajax({
                            method: "POST", //or GET
                            url: "/coupon/newcoupon-api.php",
                            dataType: "json",
                            data: {
                                couponcode: couponcodeValue,
                                discount:discountValue,
                                deadline:deadlineValue,
                                startdate:startdateValue, 
                                level:levelValue    
                            } //如果需要
                        })
                        .done(function(response) {
                            console.log(response)

                            let status=response.status;

                            if(status==0){ //失敗
                                // error.innerText=response.message;
                                modalError.innerText=response.message
                                infoModal.show();

                            }else{ //成功
                                location.href="coupon-list.php";
                            }
                        }).fail(function(jqXHR, textStatus) {
                            console.log("Request failed: " + textStatus);
                        });

                    })
    </script>

    
</body>

</html>