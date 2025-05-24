<?php

$delid = $_GET['id'];

require('../ketnoicsdl/conn.php');

$sql1 = "select avatar from news where id=$delid";
$rs = mysqli_query($conn, $sql1);
$row = mysqli_fetch_assoc($rs);

$img = $row['avatar'];
unlink($img);


$sql_str = "delete from news where id=$delid";
mysqli_query($conn, $sql_str);

header("location: listnews.php");

