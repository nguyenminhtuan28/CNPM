<?php

$id = $_GET['id'];
require('../ketnoicsdl/conn.php');

$sql_str = "SELECT 
    products.id AS pid,
    products.name AS pname,
    images,
    summary,
    description,
    disscounted_price,
    stock,
    price,
    category_id,
    brand_id,
    categories.name AS cname,
    brands.name AS bname,
    products.status AS pstatus
FROM products
JOIN categories ON products.category_id = categories.id
JOIN brands ON products.brand_id = brands.id
WHERE products.id = $id";

$res = mysqli_query($conn, $sql_str);
$product = mysqli_fetch_array($res);

if (isset($_POST["btnUpdate"])) {
    $name = $_POST['name'];
    $summary = $_POST['summary'];
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
    $description = $_POST['description'];
    $stock = $_POST['stock'];
    $giagoc = $_POST['giagoc'];
    $giaban = $_POST['giaban'];
    $danhmuc = $_POST['danhmuc'];
    $thuonghieu = $_POST['thuonghieu'];
    $imgs = '';

    if (!empty($_FILES['anhs']['name'][0])) {
        $images_arr = explode(';', $product['images']);
        foreach ($images_arr as $img) {
            if (file_exists($img)) {
                unlink($img);
            }
        }
    }

    $uploadDir = "uploads/";
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $valid_extensions = array("jpg", "jpeg", "png");

    $countfiles = count($_FILES['anhs']['name']);
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

    $images_sql = !empty($imgs) ? "'$imgs'" : "'{$product['images']}'";

    $sql_update = "UPDATE `products` 
        SET `name` = '$name',
            `slug` = '$slug',
            `description` = '$description',
            `summary` = '$summary',
            `stock` = $stock,
            `price` = $giagoc,
            `disscounted_price` = $giaban,
            `images` = $images_sql,
            `category_id` = $danhmuc,
            `brand_id` = $thuonghieu
        WHERE `id` = $id";

    if (mysqli_query($conn, $sql_update)) {
        header("location: index.php");
        exit();
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
}

require('includes/header.php');

?>

<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Cập nhật sản phẩm</h1>
                        </div>
                        <form class="user" method="post" action="#" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="name" name="name"
                                    placeholder="Tên sản phẩm" value="<?= $product['pname'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">CÁC HÌNH ẢNH CHO SẢN PHẨM</label>
                                <input type="file" class="form-control form-control-user" id="anhs" name="anhs[]" multiple>
                                <br>
                                Các ảnh hiện tại:
                                <?php
                                $arr = explode(';', $product['images']);
                                foreach ($arr as $img) {
                                    echo "<img src='$img' height='100px' style='margin-right: 10px'/>";
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Tóm tắt sản phẩm:</label>
                                <textarea name="summary" class="form-control" placeholder="Nhập ...." required><?= $product['summary'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Mô tả sản phẩm:</label>
                                <textarea name="description" id="description" class="form-control" placeholder="Nhập ...." required><?= $product['description'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control form-control-user" id="stock" name="stock"
                                    placeholder="Số lượng nhập:" value="<?= $product['stock'] ?>" required>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control form-control-user" id="giagoc" name="giagoc"
                                    placeholder="Giá gốc:" value="<?= $product['price'] ?>" required>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control form-control-user" id="giaban" name="giaban"
                                    placeholder="Giá bán:" value="<?= $product['disscounted_price'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Danh mục:</label>
                                <select class="form-control" name="danhmuc" required>
                                    <option value="">Chọn danh mục</option>
                                    <?php
                                    $result = mysqli_query($conn, "SELECT * FROM categories ORDER BY name");
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $selected = ($row['id'] == $product['category_id']) ? "selected" : "";
                                        echo "<option value='{$row['id']}' $selected>{$row['name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Thương Hiệu:</label>
                                <select class="form-control" name="thuonghieu" required>
                                    <option value="">Chọn thương hiệu</option>
                                    <?php
                                    $result = mysqli_query($conn, "SELECT * FROM brands ORDER BY name");
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $selected = ($row['id'] == $product['brand_id']) ? "selected" : "";
                                        echo "<option value='{$row['id']}' $selected>{$row['name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <button class="btn btn-primary" name="btnUpdate">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require('includes/footer.php'); ?>
