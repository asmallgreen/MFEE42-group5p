<?php
require_once("../db_connect.php");

// 預設每頁筆數
$pageRow_records = isset($_GET['recordPerPage']) ? $_GET['recordPerPage'] : 5;
//預設頁數
$num_pages = 1;
//若已經有翻頁，將頁數更新
if (isset($_GET['page'])) {
  $num_pages = $_GET['page'];
}
//本頁開始記錄筆數 = (頁數-1)*每頁記錄筆數
$startRow_records = ($num_pages - 1) * $pageRow_records;

// 檢查是否有欄位和關鍵字的查詢條件
$search_field = isset($_GET['field']) ? $_GET['field'] : '';
$search_keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// 產生查詢條件的 SQL 片段
$whereClause = 'WHERE is_deleted = 1';
if ($search_keyword) {
  if ($search_field === '') {
    $fields = ['name', 'location', 'schedule', 'qualification', 'target', 'intro', 'description']; // 需要納入搜尋範圍的欄位必須填入(以文字型別為主，數值類交由篩選處理)
    $fieldConditions = [];
    foreach ($fields as $field) {
      $fieldConditions[] = "{$field} LIKE '%{$search_keyword}%'";
    }
    $whereClause = "WHERE " . implode(" OR ", $fieldConditions);
  } else {
    $whereClause = "WHERE {$search_field} LIKE '%{$search_keyword}%'";
  }
}

// 排序方式
$sortField = isset($_GET['sortField']) ? $_GET['sortField'] : '';
$sortOrder = isset($_GET['sortOrder']) ? $_GET['sortOrder'] : 'ASC';

// 未加限制顯示筆數的 SQL 敘述句
$sql_query = "SELECT * FROM course {$whereClause}";

// 加上排序條件
if ($sortField) {
  $sql_query .= " ORDER BY {$sortField} {$sortOrder}";
}

// 加上限制顯示筆數的 SQL 敘述句，由本頁開始記錄筆數開始，每頁顯示預設筆數
$sql_query_limit = $sql_query . " LIMIT {$startRow_records}, {$pageRow_records}";

// 以加上限制顯示筆數的 SQL 敘述句查詢資料到 $result 中
$result = $conn->query($sql_query_limit);

// 以未加上限制顯示筆數的 SQL 敘述句查詢資料到 $all_result 中
$all_result = $conn->query($sql_query);

// 計算總筆數
$total_records = $all_result->num_rows;

// 計算總頁數=(總筆數/每頁筆數)後無條件進位。
$total_pages = ceil($total_records / $pageRow_records);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>課程管理系統</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    /* Truncate table cell text with ellipsis (...) */
    .table-responsive td,
    .table-responsive th {
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    .table-responsive table tr th a{
      color: black;
      text-decoration: none;
    }
  </style>
</head>

<body>
  <div class="container">
    <a class="text-decoration-none" href="data_page.php">
      <h1 class="text-center">課程管理系統</h1>
    </a>
    <div class="text-center mb-3">
      <a href="add.php" class="btn btn-primary">新增課程資料</a>
    </div>


    <!-- 搜尋表單 -->
    <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div class="text-center mb-3 row">
        <div class="text-center mb-3 col-1">
          <label for="recordPerPage" class="form-label">每頁顯示筆數：</label>
          <select name="recordPerPage" id="recordPerPage" class="form-select" onchange="updateRecordPerPage('<?php echo $search_field; ?>', '<?php echo $search_keyword; ?>')">
            <option value="5" <?php if ($pageRow_records == 5) echo 'selected'; ?>>5</option>
            <option value="10" <?php if ($pageRow_records == 10) echo 'selected'; ?>>10</option>
            <option value="20" <?php if ($pageRow_records == 20) echo 'selected'; ?>>20</option>
            <option value="50" <?php if ($pageRow_records == 50) echo 'selected'; ?>>50</option>
            <option value="100" <?php if ($pageRow_records == 100) echo 'selected'; ?>>100</option>
          </select>
        </div>

        <div class="d-flex justify-content-center col-10">
          <div class="mx-2">
            <label for="keyword" class="form-label">關鍵字：</label>
            <input type="text" name="keyword" id="keyword" class="form-control" value="<?php echo $search_keyword; ?>">
          </div>
          <div class="mx-2 d-flex">
            <input type="hidden" name="search" value="true">
            <button type="submit" class="btn btn-primary align-self-center">搜尋</button>
          </div>
        </div>
        <div class="col-1"></div>
      </div>
    </form>


    <div class="table-responsive">
      <table class="table table-bordered table-striped align-middle">
        <!-- 表格表頭 -->
        <tr align="center">
          <th>
            <a href="data_page.php?<?php echo http_build_query(array_merge($_GET, ['sortField' => 'id', 'sortOrder' => $sortField === 'id' && $sortOrder === 'ASC' ? 'DESC' : 'ASC'])); ?>">
              課程編號 <?php if ($sortField === 'id') echo $sortOrder === 'ASC' ? '▲' : '▼'; ?>
            </a>
          </th>
          <th>
            <a href="data_page.php?<?php echo http_build_query(array_merge($_GET, ['sortField' => 'name', 'sortOrder' => $sortField === 'name' && $sortOrder === 'ASC' ? 'DESC' : 'ASC'])); ?>">
              課程名稱 <?php if ($sortField === 'name') echo $sortOrder === 'ASC' ? '▲' : '▼'; ?>
            </a>
          </th>
          <th>
            <a href="data_page.php?<?php echo http_build_query(array_merge($_GET, ['sortField' => 'capacity', 'sortOrder' => $sortField === 'capacity' && $sortOrder === 'ASC' ? 'DESC' : 'ASC'])); ?>">
              人數限制 <?php if ($sortField === 'capacity') echo $sortOrder === 'ASC' ? '▲' : '▼'; ?>
            </a>
          </th>
          <th>
            <a href="data_page.php?<?php echo http_build_query(array_merge($_GET, ['sortField' => 'level', 'sortOrder' => $sortField === 'level' && $sortOrder === 'ASC' ? 'DESC' : 'ASC'])); ?>">
              難易分級 <?php if ($sortField === 'level') echo $sortOrder === 'ASC' ? '▲' : '▼'; ?>
            </a>
          </th>
          <th>
            <a href="data_page.php?<?php echo http_build_query(array_merge($_GET, ['sortField' => 'price', 'sortOrder' => $sortField === 'price' && $sortOrder === 'ASC' ? 'DESC' : 'ASC'])); ?>">
              課程價格 <?php if ($sortField === 'price') echo $sortOrder === 'ASC' ? '▲' : '▼'; ?>
            </a>
          </th>
          <th>
            <a href="data_page.php?<?php echo http_build_query(array_merge($_GET, ['sortField' => 'location', 'sortOrder' => $sortField === 'location' && $sortOrder === 'ASC' ? 'DESC' : 'ASC'])); ?>">
              上課地點 <?php if ($sortField === 'location') echo $sortOrder === 'ASC' ? '▲' : '▼'; ?>
            </a>
          </th>
          <th>
            <a href="data_page.php?<?php echo http_build_query(array_merge($_GET, ['sortField' => 'startDate', 'sortOrder' => $sortField === 'startDate' && $sortOrder === 'ASC' ? 'DESC' : 'ASC'])); ?>">
              課程日期 <?php if ($sortField === 'startDate') echo $sortOrder === 'ASC' ? '▲' : '▼'; ?>
            </a>
          </th>
          <th>
            <a href="data_page.php?<?php echo http_build_query(array_merge($_GET, ['sortField' => 'startTime', 'sortOrder' => $sortField === 'startTime' && $sortOrder === 'ASC' ? 'DESC' : 'ASC'])); ?>">
              上課時間 <?php if ($sortField === 'startTime') echo $sortOrder === 'ASC' ? '▲' : '▼'; ?>
            </a>
          </th>
          <th>
            <a href="data_page.php?<?php echo http_build_query(array_merge($_GET, ['sortField' => 'hours', 'sortOrder' => $sortField === 'hours' && $sortOrder === 'ASC' ? 'DESC' : 'ASC'])); ?>">
              課程時數 <?php if ($sortField === 'hours') echo $sortOrder === 'ASC' ? '▲' : '▼'; ?>
            </a>
          </th>
          <th>
            <a href="data_page.php?<?php echo http_build_query(array_merge($_GET, ['sortField' => 'image', 'sortOrder' => $sortField === 'image' && $sortOrder === 'ASC' ? 'DESC' : 'ASC'])); ?>">
              相關影音 <?php if ($sortField === 'image') echo $sortOrder === 'ASC' ? '▲' : '▼'; ?>
            </a>
          </th>
          <th>
            <a href="data_page.php?<?php echo http_build_query(array_merge($_GET, ['sortField' => 'description', 'sortOrder' => $sortField === 'description' && $sortOrder === 'ASC' ? 'DESC' : 'ASC'])); ?>">
              課程敘述 <?php if ($sortField === 'description') echo $sortOrder === 'ASC' ? '▲' : '▼'; ?>
            </a>
          </th>
          <th>
            <a href="data_page.php?<?php echo http_build_query(array_merge($_GET, ['sortField' => 'valid', 'sortOrder' => $sortField === 'valid' && $sortOrder === 'ASC' ? 'DESC' : 'ASC'])); ?>">
              開放報名 <?php if ($sortField === 'valid') echo $sortOrder === 'ASC' ? '▲' : '▼'; ?>
            </a>
          </th>
          <th>
            <a href="data_page.php?<?php echo http_build_query(array_merge($_GET, ['sortField' => 'teacher_id', 'sortOrder' => $sortField === 'teacher_id' && $sortOrder === 'ASC' ? 'DESC' : 'ASC'])); ?>">
              授課教師 <?php if ($sortField === 'teacher_id') echo $sortOrder === 'ASC' ? '▲' : '▼'; ?>
            </a>
          </th>
          <th>操作</th>
        </tr>

        <!-- 資料內容 -->
        <?php if ($result->num_rows > 0) : ?>
          <?php while ($row_result = $result->fetch_assoc()) : ?>
            <tr align="center">
              <td><?php echo $row_result["id"]; ?></td>
              <td><?php echo $row_result["name"]; ?></td>
              <td><?php echo $row_result["capacity"]; ?></td>
              <td>
                <?php
                $level = $row_result["level"];
                $level_text = '';
                switch ($level) {
                  case 1:
                    $level_text = '初學';
                    break;
                  case 2:
                    $level_text = '入門';
                    break;
                  case 3:
                    $level_text = '進階';
                    break;
                  default:
                    $level_text = '未定義';
                    break;
                }
                echo $level_text;
                ?>
              </td>
              <td><?php echo $row_result["price"]; ?></td>
              <td><?php echo $row_result["location"]; ?></td>
              <td>
                <div><?php echo $row_result["startDate"]; ?></div>
                <div><?php echo $row_result["endDate"]; ?></div>
              </td>
              <td>
                <div><?php echo $row_result["startTime"]; ?></div>
                <div><?php echo $row_result["endTime"]; ?></div>
              </td>
              <td><?php echo $row_result["hours"]; ?></td>
              <td><?php echo $row_result["image"]; ?></td>
              <td><?php echo $row_result["description"]; ?></td>
              <td>
                <?php
                $valid = $row_result["valid"];
                $valid_text = ($valid == 1) ? '已開放' : '未開放';
                echo $valid_text;
                ?>
              </td>
              <td><?php echo $row_result["teacher_id"]; ?></td>
              <td align="center">
                <a href="update.php?id=<?php echo $row_result["id"]; ?>" class="btn btn-sm btn-primary">修改</a>
                <a href="delete.php?id=<?php echo $row_result["id"]; ?>" class="btn btn-sm btn-danger">刪除</a>
              </td>
            </tr>
          <?php endwhile; ?>
        <?php else : ?>
          <tr>
            <td colspan="14" align="center">查無符合條件的資料</td>
          </tr>
        <?php endif; ?>
      </table>
    </div>

    <div class="row justify-content-center">
      <?php if ($num_pages > 1) : ?>
        <div class="col-auto">
          <a href="data_page.php?page=1&field=<?php echo urlencode($search_field); ?>&keyword=<?php echo urlencode($search_keyword); ?>&recordPerPage=<?php echo $pageRow_records; ?>&sortField=<?php echo $sortField; ?>&sortOrder=<?php echo $sortOrder; ?>&search=true" class="btn btn-primary">第一頁</a>
          <a href="data_page.php?page=<?php echo $num_pages - 1; ?>&field=<?php echo urlencode($search_field); ?>&keyword=<?php echo urlencode($search_keyword); ?>&recordPerPage=<?php echo $pageRow_records; ?>&sortField=<?php echo $sortField; ?>&sortOrder=<?php echo $sortOrder; ?>&search=true" class="btn btn-primary">上一頁</a>
        </div>
      <?php endif; ?>
      <?php if ($num_pages < $total_pages) : ?>
        <div class="col-auto">
          <a href="data_page.php?page=<?php echo $num_pages + 1; ?>&field=<?php echo urlencode($search_field); ?>&keyword=<?php echo urlencode($search_keyword); ?>&recordPerPage=<?php echo $pageRow_records; ?>&sortField=<?php echo $sortField; ?>&sortOrder=<?php echo $sortOrder; ?>&search=true" class="btn btn-primary">下一頁</a>
          <a href="data_page.php?page=<?php echo $total_pages; ?>&field=<?php echo urlencode($search_field); ?>&keyword=<?php echo urlencode($search_keyword); ?>&recordPerPage=<?php echo $pageRow_records; ?>&sortField=<?php echo $sortField; ?>&sortOrder=<?php echo $sortOrder; ?>&search=true" class="btn btn-primary">最後頁</a>
        </div>
      <?php endif; ?>
    </div>

    <div class="row justify-content-center mt-3">
      <div class="col-auto">
        <p>目前資料筆數：<?php echo $total_records; ?></p>
      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function updateRecordPerPage(field, keyword) {
      var recordPerPage = document.getElementById('recordPerPage').value;
      location.href = 'data_page.php?page=1&recordPerPage=' + recordPerPage + '&field=' + field + '&keyword=' + keyword;
    }
  </script>

</body>

</html>
