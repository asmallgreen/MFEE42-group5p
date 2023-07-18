<?php

require_once("../project/db_connect.php");

$sql="SELECT * FROM teacher LIMIT 4";

$result = $conn->query($sql);
$row=$result->fetch_all(MYSQLI_ASSOC);
?>
<ul>
    <?php foreach($rows as $user): ?>
        <li><?=$user["name"]?></li>
    <?php endforeach; ?>
</ul>