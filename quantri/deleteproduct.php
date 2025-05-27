<?php
require '../ketnoicsdl/conn.php';

$delid = $_GET['id'];
$sql1 = "select images from products where id=$delid";
$rs = mysqli_query($conn, $sql1);
$row = mysqli_fetch_assoc(($rs));
$images_arr = explode(";", $row["images"]);
foreach ($images_arr as $img) {
    unlink($img);
}
$sql_str = " delete from products where id=$delid";
mysqli_query($conn, $sql_str);
header("location:listsanpham.php");
?>
 