<!doctype html>
<html lang="en">

<head>
  <title>coupon</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

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
  <?php include("js.php")?>
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