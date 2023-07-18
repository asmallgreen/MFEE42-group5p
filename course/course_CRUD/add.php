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
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>課程管理系統</title>
  <script>
    function previewImage(event) {
      var reader = new FileReader();
      reader.onload = function () {
        var output = document.getElementById('imagePreview');
        output.src = reader.result;
      };
      reader.readAsDataURL(event.target.files[0]);
    }
  </script>
</head>

<body>
  <h1 align="center">課程管理系統 - 新增課程</h1>
  <p align="center"><a href="data_page.php">回主畫面</a></p>
  <form action="" method="post" name="formAdd" id="formAdd" enctype="multipart/form-data">

    <table border="1" align="center" cellpadding="4">

      <tr>
        <th>欄位</th>
        <th>資料</th>
      </tr>
      <tr>
        <td>課程名稱</td>
        <td><input type="text" name="name" id="name" placeholder="輸入課程名稱"></td>
      </tr>
      <tr>
        <td>人數限制</td>
        <td><input type="text" name="capacity" id="capacity" placeholder="輸入人數限制"></td>
      </tr>
      <tr>
        <td>難易分級</td>
        <td>
          <input type="radio" name="level" id="radio" value="1" checked>初學
          <input type="radio" name="level" id="radio" value="2">入門
          <input type="radio" name="level" id="radio" value="3">進階
        </td>
      </tr>
      <tr>
        <td>授課教師</td>
        <td><input name="teacher_id" type="text" id="teacher_id" placeholder="輸入授課教師"></td>
      </tr>
      <tr>
        <td>課程價格</td>
        <td><input name="price" type="text" id="price" placeholder="輸入課程價格"></td>
      </tr>
      <tr>
        <td>上課地點</td>
        <td><input name="location" type="text" id="location" placeholder="輸入上課地點"></td>
      </tr>
      <tr>
        <td>課程日期</td>
        <td><input name="startDate" type="date" id="startDate"> ~ <input name="endDate" type="date" id="endDate"></td>
      </tr>
      <tr>
        <td>上課時間</td>
        <td><input name="startTime" type="time" id="startTime"> ~ <input name="endTime" type="time" id="endTime"></td>
      </tr>
      <tr>
        <td>課程時數</td>
        <td><input name="hours" type="text" id="hours" placeholder="輸入課程時數"></td>
      </tr>
      <tr>
        <td>上傳圖片</td>
        <td><input name="image" type="file" id="image" accept="image/*" onchange="previewImage(event)"></td>
      </tr>
      <tr>
        <td>圖片預覽</td>
        <td><img id="imagePreview" width="200"></td>
      </tr>
      <tr>
        <td>課程敘述</td>
        <td><input name="description" type="text" id="description" placeholder="輸入課程敘述"></td>
      </tr>


      <tr>
        <td colspan="2" align="center">
          <input name="action" type="hidden" value="add">
          <input type="submit" name="button" id="button" value="新增資料">
          <input type="reset" name="button2" id="button2" value="重新填寫">
        </td>
      </tr>
    </table>
  </form>
</body>

</html>