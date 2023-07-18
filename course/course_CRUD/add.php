<?php
require_once("../db_connect.php");

// 處理圖片上傳的程式
if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
  $target_dir = "../images/"; //文件存放目錄
  $file_name = basename($_FILES["image"]["name"]);
  $target_file = $target_dir . $file_name;


  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    $_POST["image"] = $target_file;
  } else {
    echo "圖片上傳失敗。";
  }
}

if (isset($_POST["action"]) && ($_POST["action"] == "add")) {
  $sql_query = "INSERT INTO course (name ,capacity ,level, teacher_id,price ,location ,startDate, endDate, startTime, endTime, hours, image, description) VALUES (?, ?, ?, ? ,? ,?, ?, ?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql_query);
  $stmt->bind_param("sssssssssssss", $_POST["name"], $_POST["capacity"], $_POST["level"], $_POST["teacher_id"], $_POST["price"], $_POST["location"], $_POST["startDate"], $_POST["endDate"], $_POST["startTime"], $_POST["endTime"], $_POST["hours"], $_POST["image"], $_POST["description"]);
  $stmt->execute();
  $stmt->close();
  $conn->close();
  //重新導向回到主畫面
  header("Location: data_page.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>課程管理系統</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
  <script>
    function previewImage(event) {
      var reader = new FileReader();
      reader.onload = function() {
        var output = document.getElementById('imagePreview');
        output.src = reader.result;
      };
      reader.readAsDataURL(event.target.files[0]);
    }

    function cancelUpload() {
      var imageInput = document.getElementById('image');
      var imagePreview = document.getElementById('imagePreview');

      imageInput.value = '';
      imagePreview.src = '';
    }
  </script>

</head>

<body>
  <h1 class="text-center">課程管理系統 - 新增課程</h1>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <a href="data_page.php" class="btn btn-primary">回主畫面</a>
        <br><br>
        <form action="" method="post" name="formAdd" id="formAdd" enctype="multipart/form-data">
          <table class="table table-bordered">
            <tr>
              <th>欄位</th>
              <th>資料</th>
            </tr>
            <tr>
              <td>課程名稱</td>
              <td><input type="text" name="name" id="name" placeholder="輸入課程名稱" class="form-control"></td>
            </tr>
            <tr>
              <td>人數限制</td>
              <td><input type="text" name="capacity" id="capacity" placeholder="輸入人數限制" class="form-control"></td>
            </tr>
            <tr>
              <td>難易分級</td>
              <td>
                <input type="radio" name="level" id="radio1" value="1" checked class="form-check-input">
                <label for="radio1" class="form-check-label">初學</label>
                <input type="radio" name="level" id="radio2" value="2" class="form-check-input">
                <label for="radio2" class="form-check-label">入門</label>
                <input type="radio" name="level" id="radio3" value="3" class="form-check-input">
                <label for="radio3" class="form-check-label">進階</label>
              </td>
            </tr>
            <tr>
              <td>授課教師</td>
              <td><input name="teacher_id" type="text" id="teacher_id" placeholder="輸入授課教師" class="form-control"></td>
            </tr>
            <tr>
              <td>課程價格</td>
              <td><input name="price" type="text" id="price" placeholder="輸入課程價格" class="form-control"></td>
            </tr>
            <tr>
              <td>上課地點</td>
              <td><input name="location" type="text" id="location" placeholder="輸入上課地點" class="form-control"></td>
            </tr>
            <tr>
              <td>課程日期</td>
              <td>
                <div class="row">
                  <div class="col-md-6">
                    <input name="startDate" type="date" id="startDate" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <input name="endDate" type="date" id="endDate" class="form-control">
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>上課時間</td>
              <td>
                <div class="row">
                  <div class="col-md-6">
                    <input name="startTime" type="time" id="startTime" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <input name="endTime" type="time" id="endTime" class="form-control">
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>課程時數</td>
              <td><input name="hours" type="text" id="hours" placeholder="輸入課程時數" class="form-control"></td>
            </tr>
            <tr>
              <td>課程圖片</td>
              <td>
                <div class="row">
                  <div class="col-9">
                  <input name="image" type="file" id="image" accept="image/*" onchange="previewImage(event)" class="form-control">
                  </div>
                  <div class="col-2">
                  <input type="button" value="取消上傳" class="btn" onclick="cancelUpload()">
                  </div>
                </div>
                
                <img id="imagePreview" width="200" class="mt-2">
              </td>
            </tr>
            <tr>
              <td>課程敘述</td>
              <td><textarea name="description" type="textarea" id="description" placeholder="輸入課程敘述" class="form-control" rows="10" cols="10"></textarea></td>
            </tr>
            <tr>
              <td colspan="2" align="center">
                <input name="action" type="hidden" value="add">
                <input type="submit" name="button" id="button" value="新增資料" class="btn btn-primary">
                <input type="reset" name="button2" id="button2" value="重新填寫" class="btn btn-secondary">
                
              </td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>
</body>

</html>