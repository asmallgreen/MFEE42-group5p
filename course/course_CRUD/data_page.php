<?php
	require_once("connMysql.php");
	
	//預設每頁筆數
	$pageRow_records = 3;
	//預設頁數
	$num_pages = 1;
	//若已經有翻頁，將頁數更新
	if (isset($_GET['page'])) {
	  $num_pages = $_GET['page'];
	}
	//本頁開始記錄筆數 = (頁數-1)*每頁記錄筆數
	$startRow_records = ($num_pages -1) * $pageRow_records;

	// 檢查是否有欄位和關鍵字的查詢條件
	$search_field = isset($_GET['field']) ? $_GET['field'] : '';
	$search_keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

	// 產生查詢條件的 SQL 片段
	$whereClause = '';
	if ($search_field && $search_keyword) {
		$whereClause = "WHERE {$search_field} LIKE '%{$search_keyword}%'";
	}

	// 未加限制顯示筆數的 SQL 敘述句
	$sql_query = "SELECT * FROM course {$whereClause}";

	// 加上限制顯示筆數的 SQL 敘述句，由本頁開始記錄筆數開始，每頁顯示預設筆數
	$sql_query_limit = $sql_query." LIMIT {$startRow_records}, {$pageRow_records}";

	// 以加上限制顯示筆數的 SQL 敘述句查詢資料到 $result 中
	$result = $db_link->query($sql_query_limit);

	// 以未加上限制顯示筆數的 SQL 敘述句查詢資料到 $all_result 中
	$all_result = $db_link->query($sql_query);

	// 計算總筆數
	$total_records = $all_result->num_rows;

	// 計算總頁數=(總筆數/每頁筆數)後無條件進位。
	$total_pages = ceil($total_records/$pageRow_records);
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>課程管理系統</title>
</head>
<body>
<h1 align="center">課程管理系統</h1>
<p align="center"><a href="add.php">新增學生資料</a>。</p>

<!-- 搜尋表單 -->

<form align="center" method="GET" action="">
	<label for="field">選擇欄位：</label>
	<select name="field" id="field">
		<option value="">-- 全部 --</option>
		<option value="name">課程名稱</option>
		<option value="location">上課地點</option>
		<option value="teacher_id">教師</option>
	</select>
	<label for="keyword">關鍵字：</label>
	<input type="text" name="keyword" id="keyword" value="<?php echo $search_keyword; ?>">
	<input type="submit" value="搜尋">
</form>

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
<table border="0" align="center">
  <tr>
    <?php if ($num_pages > 1) { // 若不是第一頁則顯示 ?>
    <td><a href="data_page.php?page=1">第一頁</a></td>
    <td><a href="data_page.php?page=<?php echo $num_pages-1;?>">上一頁</a></td>
    <?php } ?>
    <?php if ($num_pages < $total_pages) { // 若不是最後一頁則顯示 ?>
    <td><a href="data_page.php?page=<?php echo $num_pages+1;?>">下一頁</a></td>
    <td><a href="data_page.php?page=<?php echo $total_pages;?>">最後頁</a></td>
    <?php } ?>
  </tr>
</table>
<table border="0" align="center">
  <tr>
  	<td>
  	  頁數：
  	  <?php
  	  for($i=1;$i<=$total_pages;$i++){
  	  	  if($i==$num_pages){
  	  	  	  echo $i." ";
  	  	  }else{
  	  	      echo "<a href=\"data_page.php?page={$i}\">{$i}</a> ";
  	  	  }
  	  }
  	  ?>
  	</td>
  </tr>
</table>

<p align="center">目前資料筆數：<?php echo $total_records;?></p>
</body>
</html>
