<?php

$title = $_POST["title"];

if ($_FILES["file"]["error"] == 0) {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], "../upload/" . $_FILES["file"]["name"])) {
        echo "上傳成功, 檔名為：" . $_FILES["file"]["name"];
    } else {
        echo "上傳失敗";
    }
} else {
    var_dump($_FILES["file"]["error"]);
}
