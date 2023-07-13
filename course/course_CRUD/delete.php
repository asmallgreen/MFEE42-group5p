<?php 
	require_once("connMysql.php");

	if(isset($_POST["action"])&&($_POST["action"]=="delete")){	
		$sql_query = "DELETE FROM course WHERE id=?";
		$stmt = $db_link -> prepare($sql_query);
		$stmt -> bind_param("i", $_POST["id"]);
		$stmt -> execute();
		$stmt -> close();
		$db_link -> close();
		//重新導向回到主畫面
		header("Location: data_page.php");
	}
	$sql_select = "SELECT id, name ,capacity ,level ,price ,location ,date, time, hours, schedule, qualification, target, intro, image, description, valid, teacher_id, discount_id FROM course WHERE id = ?";
	$stmt = $db_link -> prepare($sql_select);
	$stmt -> bind_param("i", $_GET["id"]);
	$stmt -> execute();
	$stmt -> bind_result($id, $name ,$capacity ,$level ,$price ,$location ,$date, $time, $hours, $schedule, $qualification, $target, $intro, $image, $description, $valid, $teacher_id, $discount_id);
	$stmt -> fetch();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>課程管理系統</title>
</head>
<body>
<h1 align="center">課程管理系統 - 刪除資料</h1>
<p align="center"><a href="data_page.php">回主畫面</a></p>
<form action="" method="post" name="formDel" id="formDel">
  <table border="1" align="center" cellpadding="4">
    <tr>
      <th>欄位</th><th>資料</th>
    </tr>
    <tr>
      <td>課程編號</td><td><?php echo $id;?></td>
    </tr>
    <tr>
      <td>課程名稱</td><td><?php echo $name;?></td>
    </tr>
    <tr>
      <td>開課日期</td><td><?php echo $date;?></td>
    </tr>
    <tr>
      <td>授課教師</td><td><?php echo $teacher_id;?></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      <input name="id" type="hidden" value="<?php echo $id;?>">
      <input name="action" type="hidden" value="delete">
      <input type="submit" name="button" id="button" value="確定刪除這筆資料嗎？">
      </td>
    </tr>
  </table>
</form>
</body>
</html>
<?php 
	$stmt -> close();
	$db_link -> close();
?>