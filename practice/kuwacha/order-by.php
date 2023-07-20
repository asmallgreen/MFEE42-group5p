<h2>自然排序</h2>
<?php
require_once("../project/db_connect.php");

$sql="SELECT * FROM teacher";

$result=$conn->query($sql);
$row=$result->fetch_all(MYSQLI_ASSOC);

?>
<ul>
    <?php foreach($row as $user): ?>
        <li><?=$user["id"]?>. <?=$user["name"]?></li>
    <?php endforeach; ?>
</ul>
<h2>依據 姓名 升冪</h2>
<?php
$sql="SELECT * FROM teacher ORDER BY name ASC";

$result=$conn->query($sql);
$row=$result->fetch_all(MYSQLI_ASSOC);
?>
<ul>
    <?php foreach($row as $user): ?>
        <li><?=$user["id"]?>. <?=$user["name"]?></li>
    <?php endforeach; ?>
</ul>
<h2>依據 id 降冪</h2>
<?php
$sql="SELECT * FROM teacher ORDER BY id DESC";

$result=$conn->query($sql);
$row=$result->fetch_all(MYSQLI_ASSOC);
?>
<ul>
    <?php foreach($row as $user): ?>
        <li><?=$user["id"]?>. <?=$user["name"]?></li>
    <?php endforeach; ?>
</ul>