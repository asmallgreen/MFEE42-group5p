<?php
require_once("connMysql.php");

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
$whereClause = 'WHERE is_deleted = 0';
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




// 未加限制顯示筆數的 SQL 敘述句
$sql_query = "SELECT * FROM course {$whereClause}";

// 加上限制顯示筆數的 SQL 敘述句，由本頁開始記錄筆數開始，每頁顯示預設筆數
$sql_query_limit = $sql_query . " LIMIT {$startRow_records}, {$pageRow_records}";

// 以加上限制顯示筆數的 SQL 敘述句查詢資料到 $result 中
$result = $db_link->query($sql_query_limit);

// 以未加上限制顯示筆數的 SQL 敘述句查詢資料到 $all_result 中
$all_result = $db_link->query($sql_query);

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
    <title>已刪除課程管理</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/practice/dashboard-css.css">
    <style>
        /* Truncate table cell text with ellipsis (...) */
        .table-responsive td,
        .table-responsive th {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .tab-content li:nth-child(4){
        display: block;
        }
    </style>
</head>
<script>
    // 檢查總記錄數是否為零
    var totalRecords = <?php echo $total_records; ?>;
    if (totalRecords === 0) {
        // 顯示一個帶有說明的彈出式視窗
        window.addEventListener('DOMContentLoaded', function() {
            alert('找不到符合搜尋條件的結果。');
        });
    }
</script>

<body>
<header class="text-bg-dark d-flex shadow fixed-top justify-content-between align-items-center">
        <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
            <div class="container-fluid">
                <!-- <a class="navbar-brand" href="#">
      <img src="/images/bow_icon.jpg" alt="Bootstrap" width="30" height="24">
    </a> -->
                <a class="navbar-brand" href="#">管理者後臺介面</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav tabs">
                        <li class="nav-item px-2">
                            <a class="nav-link" aria-current="page" href="#">會員</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link" href="#">產品</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link" href="#">庫存</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link  active" href="#">課程</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link " href="#">師資</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link " href="#">行銷</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- <a class="bg-black py-3 px-3 text-decoration-none link-light brand-name" href="dashboard-admin-test.php">管理者後臺介面</a>
        <div class="d-flex align-items-center">
            <div class="me-3">
                hi, 慕朵
            </div> -->

    </header>
    <aside class="main-aside position-fixed bg-light vh-100 border-end">
        <nav class="">
            <ul class="list-unstyled tab-content">
                <li class="p-3">
                    <h2 class="" id="">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            會員
                        </button>
                    </h2>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="admin-member.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>會員資料
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="sign-up-test.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>會員註冊
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="sign-in-test.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>會員登入
                        </a>
                    </div>
                </li>

                <!-- <li>
                    <a class="d-block py-2 px-3 text-decoration-none memberaside" id="memberaside" href="admin-member.php">
                        <i class="fa-solid fa-users fa-fw me-2"></i>會員資料
                    </a>
                </li> -->
                <li class="p-3">
                    <h2 class="" id="">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            產品
                        </button>
                    </h2>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="admin-member.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>欄位一
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="sign-up-test.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>欄位二
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="sign-in-test.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>欄位三
                        </a>
                    </div>
                </li>
                <li class="p-3">
                    <h2 class="" id="">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            庫存
                        </button>
                    </h2>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none " id="memberaside" href="/practice/Kuan/inventory-list.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>庫存列表
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none " id="memberaside" href="/practice/Kuan/create-inventory.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>新增庫存
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="/practice/Kuan/search-inventory.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>庫存搜尋
                        </a>
                    </div>
                </li>
                <li class="p-3">
                    <h2 class="" id="">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            課程
                        </button>
                    </h2>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="data_page.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>課程列表
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="add.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>新增課程
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="update.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>課程修改
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="deleted_data_page.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>已下架課程列表
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="restore.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>已下架課程管理
                        </a>
                    </div>
                </li>
                <li class="p-3">
                    <h2 class="" id="">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            師資
                        </button>
                    </h2>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="admin-member.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>欄位一
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="sign-up-test.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>欄位二
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="sign-in-test.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>欄位三
                        </a>
                    </div>
                </li>
                <li class="p-3">
                    <h2 class="" id="">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            行銷
                        </button>
                    </h2>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="admin-member.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>欄位一
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="sign-up-test.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>欄位二
                        </a>
                    </div>
                    <div class="">
                        <a class="d-block py-2 px-3 text-decoration-none" id="memberaside" href="sign-in-test.php">
                            <i class="fa-solid fa-users fa-fw me-2"></i>欄位三
                        </a>
                    </div>
                </li>

            </ul>

            <hr>
   
        </nav>
    </aside>


    <div class="container-fluid main-content">
        <h1 class="text-center">已刪除課程管理</h1>


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
                    <th>課程編號</th>
                    <th>課程名稱</th>
                    <th>人數限制</th>
                    <th>難易分級</th>
                    <th>課程價格</th>
                    <th>上課地點</th>
                    <th>課程日期</th>
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
                    <th>操作</th>
                </tr>
                <!-- 資料內容 -->
                <?php while ($row_result = $result->fetch_assoc()) : ?>
                    <tr>
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
                        <td><?php echo $row_result["schedule"]; ?></td>
                        <td><?php echo $row_result["qualification"]; ?></td>
                        <td><?php echo $row_result["target"]; ?></td>
                        <td><?php echo $row_result["intro"]; ?></td>
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
                        <td><?php echo $row_result["discount_id"]; ?></td>
                        <td>
                            <a href="restore.php?id=<?php echo $row_result["id"]; ?>" class="btn btn-sm btn-info">還原</a>
                            <a href="hard_delete.php?id=<?php echo $row_result["id"]; ?>" class="btn btn-sm btn-danger">刪除</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>

        <div class="row justify-content-center">
            <?php if ($num_pages > 1) : ?>
                <div class="col-auto">
                    <a href="data_page.php?page=1&field=<?php echo urlencode($search_field); ?>&keyword=<?php echo urlencode($search_keyword); ?>&recordPerPage=<?php echo $pageRow_records; ?>&search=true" class="btn btn-primary">第一頁</a>
                    <a href="data_page.php?page=<?php echo $num_pages - 1; ?>&field=<?php echo urlencode($search_field); ?>&keyword=<?php echo urlencode($search_keyword); ?>&recordPerPage=<?php echo $pageRow_records; ?>&search=true" class="btn btn-primary">上一頁</a>
                </div>
            <?php endif; ?>
            <?php if ($num_pages < $total_pages) : ?>
                <div class="col-auto">
                    <a href="data_page.php?page=<?php echo $num_pages + 1; ?>&field=<?php echo urlencode($search_field); ?>&keyword=<?php echo urlencode($search_keyword); ?>&recordPerPage=<?php echo $pageRow_records; ?>&search=true" class="btn btn-primary">下一頁</a>
                    <a href="data_page.php?page=<?php echo $total_pages; ?>&field=<?php echo urlencode($search_field); ?>&keyword=<?php echo urlencode($search_keyword); ?>&recordPerPage=<?php echo $pageRow_records; ?>&search=true" class="btn btn-primary">最後頁</a>
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
<?php include("/xampp/htdocs/practice/dashboard-js.php")?>
</body>

</html>