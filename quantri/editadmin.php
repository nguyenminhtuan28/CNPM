<?php
$id = $_GET['id'];

require('../ketnoicsdl/conn.php');

// Lấy thông tin admin theo id
$sql_str = "SELECT * FROM admins WHERE id = $id";
$res = mysqli_query($conn, $sql_str);
$admin = mysqli_fetch_assoc($res);

// Nếu nhấn nút cập nhật
if (isset($_POST['btnUpdate'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $type = $_POST['type'];

    $sql_str = "UPDATE `admins` SET 
        `name` = '$name',
        `email` = '$email',
        `password` = '$password',
        `phone` = '$phone',
        `address` = '$address',
        `type` = '$type',
        `updated_at` = NOW()
        WHERE `id` = $id";

    mysqli_query($conn, $sql_str);

    header("Location: ./listusers.php");
} else {
    require('includes/header.php');
    if($_SESSION['user']['type'] != 'Admin'){
        echo"<h2>Bạn không có quyền truy cập</h2>";
        exit;
    }
    else{
    ?>

    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Cập nhật thông tin Admin</h1>
                            </div>
                            <form class="user" method="post" action="#">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"
                                        name="name" placeholder="Tên"
                                        value="<?= $admin['name'] ?>">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user"
                                        name="email" placeholder="Email"
                                        value="<?= $admin['email'] ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"
                                        name="password" placeholder="Mật khẩu"
                                        value="<?= $admin['password'] ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"
                                        name="phone" placeholder="Số điện thoại"
                                        value="<?= $admin['phone'] ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"
                                        name="address" placeholder="Địa chỉ"
                                        value="<?= $admin['address'] ?>">
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="type">
                                        <option value="Admin" <?= $admin['type'] == 'Admin' ? 'selected' : '' ?>>Admin</option>
                                        <option value="Staff" <?= $admin['type'] == 'Staff' ? 'selected' : '' ?>>Staff</option>
                                    </select>
                                </div>
                                <button class="btn btn-primary" name="btnUpdate">Cập nhật</button>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    }
    require('includes/footer.php');
}
?>
