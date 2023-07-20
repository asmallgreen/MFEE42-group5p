<?php

require_once("../project/db_connect.php");

$sql="SELECT * FROM teacher WHERE name='Tom'";

$result = $conn->query($sql);

$row=$result->fetch_all(MYSQLI_ASSOC);

?>