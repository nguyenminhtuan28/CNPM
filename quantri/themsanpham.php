<?php
require('includes/header.php');
?>
<div>
    <h3>THÊM SẢN PHẨM </h3>
</div>
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Thêm mới sản phẩm</h1>
                        </div>
                        <form class="user" method="post" action="addproduct.php" enctype="multipart/form-data">
                            <div class="form-group row">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="name" name="name"
                                    placeholder="Nhập tên sản phẩm">
                            </div>
                            <div class="form-group">
                                <label class="form-label">CÁC HÌNH ẢNH CHO SẢN PHẨM</label>
                                <input type="file" class="form-control form-control-user" id="anhs" name="anhs[]"
                                    multiple>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Tóm tắt sản phẩm:</label>
                                <textarea name="sumary" class="form-control" placeholder="Nhập ...."></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Mô tả sản phẩm:</label>
                                <textarea name="description" id="description" class="form-control" placeholder="Nhập ...."></textarea>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="stock" name="stock"
                                        placeholder="Số lượng nhập:" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="giagoc" name="giagoc"
                                        placeholder="Giá gốc:" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="giaban" name="giaban"
                                        placeholder="Giá bán:" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Danh mục:</label>
                                <select class="form-control" name="danhmuc">
                                    <option>Chọn danh mục</option>
                                    <?php
                                    require('../ketnoicsdl/conn.php');

                                    $sql_str = "SELECT * FROM categories ORDER BY name";
                                    $result = mysqli_query($conn, $sql_str);

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Thương Hiệu:</label>
                                <select class="form-control" name="thuonghieu">
                                    <option>Chọn thương hiệu</option>
                                    <?php
                                    require('../ketnoicsdl/conn.php');

                                    $sql_str = "SELECT * FROM brands ORDER BY name";
                                    $result = mysqli_query($conn, $sql_str);

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <button class="btn btn-primary">Tạo mới</button>
                        </form> <!-- Đóng thẻ form -->
                    </div> <!-- Đóng div p-5 -->
                </div> <!-- Đóng div col-lg-12 -->
            </div> <!-- Đóng div row -->
        </div> <!-- Đóng div card-body -->
    </div> <!-- Đóng div card -->
</div> <!-- Đóng div container -->
<?php
require('includes/footer.php');
?>
