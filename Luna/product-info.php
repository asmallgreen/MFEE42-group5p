

<!doctype html>
<html lang="en">

<head>
  <title>Info</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- font awsome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
  .object-fit-cover{
    width: 200px;
    height: 200px;
  
  }
</style>
</head>

<body>
  <div class="container">
    <div class="row my-4">
      <div class="col-md-6 col-lg-3">
        <img class="object-fit-cover" src="/images_bow/bow1.jpeg" alt="">
      </div>
      <div class="col-md-4 col-lg-3">
        <a class="btn btn-info my-2" href="product-list.php">回產品列表</a>
        
        <a href="product-edit.php" class="btn"><i class="fa-regular fa-square-plus"></i>修改</a>
       
<form action="">
  <h2>產品名稱</h2>
  
  <h4>規格：</h4>
  <label class="my-2" for="">顏色</label>
  <select class="form-select" name="" id="">
    <option value="">紅</option>
    <option value="">黑</option>
    <option value="">藍</option>
  </select>
  <label class="my-2" for="">材質</label>
  <select class="form-select" name="" id="">
  <option value="">竹</option>
    <option value="">木</option>
    <option value="">碳</option>
  </select>
  <button class="my-4 btn btn-info">送出</button>
</form>
      </div>
    </div>
  </div>
</body>

</html>