<?php
require_once("../db_connect.php");

if (isset($_POST["action"]) && ($_POST["action"] == "delete")) {
  $sql_query = "DELETE FROM course WHERE id=?";
  $stmt = $conn->prepare($sql_query);
  $stmt->bind_param("i", $_POST["id"]);
  $stmt->execute();
  $stmt->close();
  $conn->close();
  //重新導向回到主畫面
  header("Location: deleted_data_page.php");
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
  <title>課程管理系統</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <h1 class="text-center">課程管理系統 - 永久刪除</h1>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <a href="deleted_data_page.php" class="btn btn-primary">回上一頁</a>
        <br><br>
        <form action="" method="post" name="formDel" id="formDel">
          <table class="table table-bordered">
            <tr>
              <th>欄位</th>
              <th>資料</th>
            </tr>
            <tr>
              <td>課程編號</td>
              <td><?php echo $id; ?></td>
            </tr>
            <tr>
              <td>課程名稱</td>
              <td><?php echo $name; ?></td>
            </tr>
            <tr>
              <td>課程日期</td>
              <td><?php echo $startDate; ?> ~ <?php echo $endDate; ?></td>
            </tr>
            <tr>
              <td>授課教師</td>
              <td><?php echo $teacher_id; ?></td>
            </tr>
            <tr>
              <td colspan="2" align="center">
                <input name="id" type="hidden" value="<?php echo $id; ?>">
                <input name="action" type="hidden" value="delete">
                <h4>您確定要永久刪除這個檔案嗎？</h4>
                <button type="submit" class="btn btn-danger">確定刪除</button>
              </td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>
</body>

</html>

<?php
$stmt->close();
$conn->close();
?>