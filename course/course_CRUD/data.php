<?php
	require_once("connMysql.php");
	$sql_query = "SELECT * FROM course ORDER BY id ASC";
	$result = $db_link->query($sql_query);
	$total_records = $result->num_rows;
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>課程管理系統</title>
</head>
<body>
<h1 align="center">課程管理系統</h1>
<p align="center">目前資料筆數：<?php echo $total_records;?>，<a href="add.php">新增課程資料</a>。</p>
<table border="1" align="center">
  <!-- 表格表頭 -->
  <tr>
    <th>課程編號</th>
    <th>課程名稱</th>
    <th>人數限制</th>
    <th>難易分級</th>
    <th>課程價格</th>
    <th>上課地點</th>
    <th>開課日期</th>
    <th>上課時間</th>
	<th>課程時數</th>
	<th>課程綱要</th>
	<th>報名資格</th>
	<th>課程目標</th>
	<th>課程介紹</th>
	<th>相關影音</th>
	<th>課程敘述</th>
	<th>開放報名</th>
	<th>教師</th>
	<th>適用優惠</th>
  </tr>
  <!-- 資料內容 -->
<?php
	while($row_result=$result->fetch_assoc()){
		echo "<tr>";
		echo "<td>".$row_result["id"]."</td>";
		echo "<td>".$row_result["name"]."</td>";
		echo "<td>".$row_result["capacity"]."</td>";
		echo "<td>".$row_result["level"]."</td>";
		echo "<td>".$row_result["price"]."</td>";
		echo "<td>".$row_result["location"]."</td>";
		echo "<td>".$row_result["date"]."</td>";
		echo "<td>".$row_result["time"]."</td>";
		echo "<td>".$row_result["hours"]."</td>";
		echo "<td>".$row_result["schedule"]."</td>";
		echo "<td>".$row_result["qualification"]."</td>";
		echo "<td>".$row_result["target"]."</td>";
		echo "<td>".$row_result["intro"]."</td>";
		echo "<td>".$row_result["image"]."</td>";
		echo "<td>".$row_result["description"]."</td>";
		echo "<td>".$row_result["valid"]."</td>";
		echo "<td>".$row_result["teacher_id"]."</td>";
		echo "<td>".$row_result["discount_id"]."</td>";
		echo "<td><a href='update.php?id=".$row_result["id"]."'>修改</a> ";
		echo "<a href='delete.php?id=".$row_result["id"]."'>刪除</a></td>";
		echo "</tr>";
	}
?>
</table>
</body>
</html>