<?php
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
                            <h1 class="h4 text-gray-900 mb-4">Thêm mới danh mục sản phẩm</h1>
                        </div>
                        <form class="user" method="post" action="addcategory.php" >
                            <div class="form-group row">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="name" name="name"
                                    placeholder="Tên danh mục">
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
