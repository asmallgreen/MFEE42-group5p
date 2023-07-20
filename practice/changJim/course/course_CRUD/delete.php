<?php 
require_once("/xampp/htdocs/practice/db_connect-test.php");

if (isset($_POST["action"]) && ($_POST["action"] == "delete")) {
    $sql_query = "UPDATE course SET is_deleted = 0 WHERE id = ?";
    $stmt = $conn->prepare($sql_query);
    $stmt->bind_param("i", $_POST["id"]);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    // 重新導向回到主畫面
    header("Location: data_page.php");
    exit; // Add exit to stop further execution
}

$sql_select = "SELECT id, name, capacity, level, price, location, startDate, endDate, startTime, endTime, hours, schedule, qualification, target, intro, image, description, valid, teacher_id, discount_id FROM course WHERE id = ?";
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
<link rel="stylesheet" href="/practice/dashboard-css.css">
    <style>
        .tab-content li:nth-child(4){
        display: block;
        }
    </style>
</head>
<body>
<?php include("/xampp/htdocs/practice/dashboard-admin-header-aside.php") ?>
<main class="main-content">
<h1 class="text-center">課程管理系統 - 刪除資料</h1>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <a href="javascript:history.go(-1)" class="btn btn-primary ">回上一頁</a>
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
              <td><?php echo $startDate; ?> — <?php echo $endDate; ?></td>
            </tr>
            <tr>
              <td>授課教師</td>
              <td><?php echo $teacher_id; ?></td>
            </tr>
            <tr>
              <td colspan="2" align="center">
                <input name="id" type="hidden" value="<?php echo $id; ?>">
                <input name="action" type="hidden" value="delete">
                <h4>此資料將被刪除</h4>
                <input type="submit" name="button" id="button" value="確定" class="btn btn-danger">
              </td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>
</main>
<?php include("/xampp/htdocs/practice/dashboard-js.php")?>
<script>
    // 使用 JavaScript 為 .tabs li a:nth-child() 元素添加 active class
    document.addEventListener("DOMContentLoaded", function() {
      const firstTabLink = document.querySelector(".tabs li:nth-child(4) a");
      firstTabLink.classList.add("active");
    });
  </script>
</body>
</html>

<?php 
$stmt->close();
$conn->close();
?>
