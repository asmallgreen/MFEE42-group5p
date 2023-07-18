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
    echo "圖片更新失敗。";
  }
}
if (isset($_POST["action"]) && ($_POST["action"] == "update")) {
  $sql_query = "UPDATE course SET name=?, capacity=?, level=?, price=?, location=?, startDate=?, endDate=?, startTime=?, endTime=?, hours=?, schedule=?, qualification=?, target=?, intro=?, image=?, description=?, valid=?, teacher_id=?, discount_id=? WHERE id=?";
  $stmt = $conn->prepare($sql_query);
  $stmt->bind_param("sssssssssssssssssssi", $_POST["name"], $_POST["capacity"], $_POST["level"], $_POST["price"], $_POST["location"], $_POST["startDate"], $_POST["endDate"], $_POST["startTime"], $_POST["endTime"], $_POST["hours"], $_POST["schedule"], $_POST["qualification"], $_POST["target"], $_POST["intro"], $_POST["image"], $_POST["description"], $_POST["valid"], $_POST["teacher_id"], $_POST["discount_id"], $_POST["id"]);
  $stmt->execute();
  $stmt->close();
  $conn->close();
  //重新導向回到主畫面
  header("Location: data_page.php");
}
$sql_select = "SELECT id, name ,capacity ,level ,price ,location ,startDate, endDate, startTime, endTime, hours, schedule, qualification, target, intro, image, description, valid, teacher_id, discount_id FROM course WHERE id = ?";
$stmt = $conn->prepare($sql_select);
$stmt->bind_param("i", $_GET["id"]);
$stmt->execute();
$stmt->bind_result($id, $name, $capacity, $level, $price, $location, $startDate, $endDate, $startTime, $endTime, $hours, $schedule, $qualification, $target, $intro, $image, $description, $valid, $teacher_id, $discount_id);
$stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>課程管理系統</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/css/bootstrap.min.css">
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
  <script>
    function validateForm() {
      var formElements = [{
          id: 'name',
          message: '請輸入課程名稱'
        },
        {
          id: 'capacity',
          message: '請輸入人數限制',
          checkNumeric: true
        },
        {
          id: 'teacher_id',
          message: '請輸入授課教師'
        },
        {
          id: 'price',
          message: '請輸入課程價格',
          checkNumeric: true
        },
        {
          id: 'location',
          message: '請輸入上課地點'
        },
        {
          id: 'startDate',
          message: '請輸入課程日期'
        },
        {
          id: 'endDate',
          message: '請輸入課程日期'
        },
        {
          id: 'startTime',
          message: '請輸入課程時間'
        },
        {
          id: 'endTime',
          message: '請輸入課程時間'
        },
        {
          id: 'hours',
          message: '請輸入課程時數',
          checkNumeric: true
        },
        {
          id: 'image',
          message: '請上傳課程圖片'
        },
        {
          id: 'description',
          message: '請填寫課程敘述'
        }
      ];

      var errorContainer = document.getElementById('errorContainer');
      var errorMessages = document.getElementById('errorMessages');
      errorMessages.innerHTML = '';
      errorContainer.style.display = 'none';

      var hasError = false;

      for (var i = 0; i < formElements.length; i++) {
        var element = document.getElementById(formElements[i].id);
        var value = element.value.trim();

        if (value === '') {
          errorMessages.innerHTML += '<li>' + formElements[i].message + '</li>';
          if (!hasError) {
            element.focus();
            hasError = true;
          }
        }

        if (formElements[i].checkNumeric && isNaN(value)) {
          errorMessages.innerHTML += '<li>' + formElements[i].message + '必須是數字</li>';
          if (!hasError) {
            element.focus();
            hasError = true;
          }
        }
      }

      if (startDate.value > endDate.value) {
        errorMessages.innerHTML += '<li>開始日期不可晚於結束日期</li>';
        if (!hasError) {
          startDate.focus();
          hasError = true;
        }
      }

      if (startTime.value > endTime.value) {
        errorMessages.innerHTML += '<li>開始時間不可晚於結束時間</li>';
        if (!hasError) {
          startTime.focus();
          hasError = true;
        }
      }

      if (hasError) {
        errorContainer.style.display = 'block';
        return false;
      }

      return true;
    }
  </script>


</head>

<body>
  <h1 class="text-center">課程管理系統 - 修改資料</h1>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-6">
        <a href="javascript:history.go(-1)" class="btn btn-primary ">回上一頁</a>
        <br><br>
        <div id="errorContainer" class="alert alert-danger" style="display: none;">
          <ul id="errorMessages"></ul>
        </div>
        <form action="" method="post" name="formAdd" id="formAdd" enctype="multipart/form-data" onsubmit="return validateForm()">

          <table class="table table-bordered">
            <tr align="center">
              <th>欄位</th>
              <th>資料</th>
            </tr>
            <tr>
              <td>課程名稱</td>
              <td><input type="text" name="name" id="name" value="<?php echo $name; ?>" class="form-control"></td>
            </tr>
            <tr>
              <td>人數限制</td>
              <td><input type="text" name="capacity" id="capacity" value="<?php echo $capacity; ?>" class="form-control"></td>
            </tr>
            <tr>
              <td>難易分級</td>
              <td>
                <input type="radio" name="level" id="radio1" value="1" class="form-check-input" <?php if ($level == "1") echo "checked"; ?>>
                <label for="radio1" class="form-check-label">初學</label>
                <input type="radio" name="level" id="radio2" value="2" class="form-check-input" <?php if ($level == "2") echo "checked"; ?>>
                <label for="radio2" class="form-check-label">入門</label>
                <input type="radio" name="level" id="radio3" value="3" class="form-check-input" <?php if ($level == "3") echo "checked"; ?>>
                <label for="radio3" class="form-check-label">進階</label>

              </td>
            </tr>
            <tr>
              <td>授課教師</td>
              <td><input name="teacher_id" type="text" id="teacher_id" value="<?php echo $teacher_id; ?>" class="form-control"></td>
            </tr>
            <tr>
              <td>課程價格</td>
              <td><input type="text" name="price" id="price" value="<?php echo $price; ?>" class="form-control"></td>
            </tr>
            <tr>
              <td>上課地點</td>
              <td><input type="text" name="location" id="location" value="<?php echo $location; ?>" class="form-control"></td>
            </tr>
            <tr>
              <td>開課日期</td>
              <td>
                <div class="row">
                  <div class="col-md-6">
                    <input type="date" name="startDate" id="startDate" value="<?php echo $startDate; ?>" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <input type="date" name="endDate" id="endDate" value="<?php echo $endDate; ?>" class="form-control">
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>上課時間</td>
              <td>
                <div class="row">
                  <div class="col-md-6">
                    <input type="time" name="startTime" id="startTime" value="<?php echo $startTime; ?>" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <input type="time" name="endTime" id="endTime" value="<?php echo $endTime; ?>" class="form-control">
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>課程時數</td>
              <td><input name="hours" type="text" id="hours" value="<?php echo $hours; ?>" class="form-control"></td>
            </tr>
            <tr>
              <td>課程圖片</td>
              <td>
                <div class="row">
                  <div class="col-9">
                    <input name="image" type="hidden" id="image" class="form-control" value="<?php echo $image; ?>">
                    <input name="image" type="file" id="image" accept="image/*" onchange="previewImage(event)" class="form-control">
                  </div>
                  <div class="col-2">
                    <input type="button" value="取消上傳" class="btn" onclick="cancelUpload()">
                  </div>
                </div>
                <img id="imagePreview" width="200" class="mt-2" src="<?php echo $image; ?>">
              </td>
            </tr>
            <tr>
              <td>課程敘述</td>
              <td><textarea name="description" type="text" id="description" class="form-control" rows="10" cols="10"><?php echo $description; ?></textarea></td>
            </tr>
            <tr>
              <td>開放報名</td>
              <td>
                <div class="toggle">
                  <input type="radio" name="valid" id="radio4" value="0" class="form-check-input" <?php if ($valid == "0") echo "checked"; ?>>
                  <label for="radio4" class="form-check-label">未開放</label>
                  <input type="radio" name="valid" id="radio5" value="1" class="form-check-input" <?php if ($valid == "1") echo "checked"; ?>>
                  <label for="radio5" class="form-check-label">已開放</label>
                </div>

              </td>
            </tr>
            <tr>
              <td colspan="2" align="center">
                <input name="id" type="hidden" value="<?php echo $id; ?>">
                <input name="action" type="hidden" value="update">
                <input type="submit" name="button" id="button" value="更新資料" class="btn btn-primary">
                <input type="reset" name="button2" id="button2" value="重新填寫" class="btn btn-secondary">
              </td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
$stmt->close();
$conn->close();
?>