<?php


$id = $_GET['id'];
require('../ketnoicsdl/conn.php');
$sql_str = "select * from brands where id=$id";
$res = mysqli_query($conn, $sql_str);
$brand = mysqli_fetch_array($res);
if (isset($_POST["btnUpdate"])) {
    $name = $_POST['name'];
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));

    $sql_str2 = "update brands set name='$name',slug='$slug' where id=$id";
    mysqli_query($conn, $sql_str2);
    header("location: listbrands.php");
} else {
    require('includes/header.php');


    ?>
        <div>
        </div>
        <div class="container">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Cập nhật thương hiệu(brand)</h1>
                                </div>
                                <form class="user" method="post" action="#" >
                                    <div class="form-group row">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="name" name="name"
                                            placeholder="Nhập tên thương hiệu"
                                            value=<?php echo $brand['name'] ?>>
                                    </div>
                            
                                    <button class="btn btn-primary" name="btnUpdate">Cập nhật</button>
                                </form> <!-- Đóng thẻ form -->
                            </div> <!-- Đóng div p-5 -->
                        </div> <!-- Đóng div col-lg-12 -->
                    </div> <!-- Đóng div row -->
                </div> <!-- Đóng div card-body -->
            </div> <!-- Đóng div card -->
        </div> <!-- Đóng div container -->
        <?php
        require('includes/footer.php');
}
?>
