<?php
echo "xin chao";

require("../ketnoicsdl/conn.php");

$name = $_POST['name'];
$summary = isset($_POST['summary']) ? $_POST['summary'] : ''; 

$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
$description = mysqli_real_escape_string($conn, $_POST['description']);

$stock = $_POST['stock'];
$giagoc = $_POST['giagoc'];
$giaban = $_POST['giaban'];
$danhmuc = $_POST['danhmuc'];
$thuonghieu = $_POST['thuonghieu'];
$countfiles = count($_FILES['anhs']['name']);
$imgs = '';

$uploadDir = "uploads/";
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$valid_extensions = array("jpg", "jpeg", "png", "pdf", "docx");

for ($i = 0; $i < $countfiles; $i++) {
    $filename = $_FILES['anhs']['name'][$i];
    $location = $uploadDir . uniqid() . "_" . basename($filename);
    $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    if ($_FILES["anhs"]["error"][$i] === 0 && in_array($extension, $valid_extensions)) {
        if (move_uploaded_file($_FILES["anhs"]["tmp_name"][$i], $location)) {
            $imgs .= $location . ";";
        }
    }
}

$imgs = rtrim($imgs, ";");

$imgs_sql = !empty($imgs) ? "'$imgs'" : "NULL";

$sql_str = "INSERT INTO `products` (`id`, `name`, `slug`, `description`, `summary`, `stock`, `price`, `disscounted_price`, `images`, `category_id`, `brand_id`, `status`, `created_at`, `updated_at`) 
VALUES (NULL, '$name', '$slug', '$description', '$sumary', $stock, $giagoc, $giaban, $imgs_sql, $danhmuc, $thuonghieu, 'Active', NULL, NULL);";

echo $sql_str;

if (mysqli_query($conn, $sql_str)) {
    echo "Thêm sản phẩm thành công!";
    header("location: ./listsanpham.php");
    exit();
} else {
    echo "Lỗi: " . mysqli_error($conn);
}
?>
