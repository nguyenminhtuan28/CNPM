<?php
echo "xin chao";

require("../ketnoicsdl/conn.php");

$name = $_POST['name'];
$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));





$sql_str = "INSERT INTO `categories` (`name`, `slug`, `status`) 
VALUES ('$name', '$slug', 'Active');";

echo $sql_str;

if (mysqli_query($conn, $sql_str)) {
    echo "Thêm sản phẩm thành công!";
    header("location: listcats.php");
    exit();
} else {
    echo "Lỗi: " . mysqli_error($conn);
}
?>
