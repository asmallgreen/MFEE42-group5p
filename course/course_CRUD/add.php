<?php 
require_once("connMysql.php");

if(isset($_POST["action"])&&($_POST["action"]=="add")){
	$sql_query = "INSERT INTO course (name ,capacity ,level ,price ,location ,date, time, hours, schedule, qualification, target, intro, image, description, valid, teacher_id, discount_id) VALUES (?, ?, ?, ? ,? ,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	$stmt = $db_link -> prepare($sql_query);
	$stmt -> bind_param("sssssssssssssssss", $_POST["name"], $_POST["capacity"], $_POST["level"], $_POST["price"], $_POST["location"], $_POST["date"], $_POST["time"], $_POST["hours"], $_POST["schedule"], $_POST["qualification"], $_POST["target"], $_POST["intro"], $_POST["image"], $_POST["description"], $_POST["valid"], $_POST["teacher_id"], $_POST["discount_id"]);
	$stmt -> execute();
	$stmt -> close();
	$db_link -> close();
	//重新導向回到主畫面
	header("Location: data_page.php");
}	
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>課程管理系統</title>
</head>
<body>
<h1 align="center">課程管理系統 - 新增課程</h1>
<p align="center"><a href="data_page.php">回主畫面</a></p>
<form action="" method="post" name="formAdd" id="formAdd">
  <table border="1" align="center" cellpadding="4">
    <tr>
      <th>欄位</th><th>資料</th>
    </tr>
    <tr>
      <td>課程名稱</td><td><input type="text" name="name" id="name"></td>
    </tr>
    <tr>
      <td>人數限制</td><td><input type="text" name="capacity" id="capacity"></td>
    </tr>
    <tr>
      <td>難易分級</td><td>
      <input type="radio" name="level" id="radio" value="1" checked>簡易
      <input type="radio" name="level" id="radio" value="2">入門
      <input type="radio" name="level" id="radio" value="3">進階
      </td>
    </tr>
    <tr>
      <td>課程價格</td><td><input name="price" type="text" id="price"></td>
    </tr>
    <tr>
      <td>上課地點</td><td><input name="location" type="text" id="location"></td>
    </tr>
    <tr>
      <td>開課日期</td><td><input name="date" type="date" id="date"></td>
    </tr>
    <tr>
      <td>上課時間</td><td><input name="time" type="time" id="time"></td>
    </tr>
    <tr>
      <td>課程時數</td><td><input name="hours" type="text" id="hours"></td>
    </tr>
    <tr>
      <td>課程綱要</td><td><input name="schedule" type="text" id="schedule"></td>
    </tr>
    <tr>
      <td>報名資格</td><td><input name="qualification" type="text" id="qualification"></td>
    </tr>
    <tr>
      <td>課程目標</td><td><input name="target" type="text" id="target"></td>
    </tr>
    <tr>
      <td>課程介紹</td><td><input name="intro" type="text" id="intro"></td>
    </tr>
    <tr>
      <td>上傳圖片</td><td><input name="image" type="text" id="image"></td>
    </tr>
    <tr>
      <td>課程敘述</td><td><input name="description" type="text" id="description"></td>
    </tr>
    <tr>
      <td>開放報名</td><td><input name="valid" type="text" id="valid"></td>
    </tr>
    <tr>
      <td>授課教師</td><td><input name="teacher_id" type="text" id="teacher_id"></td>
    </tr>
    <tr>
      <td>適用優惠</td><td><input name="discount_id" type="text" id="discount_id"></td>
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