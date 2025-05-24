<?php
require('includes/header.php');
function anhdaidien($arrstr, $height)
{
    $arr = explode(';', $arrstr);
    return "<img src='$arr[0]' height='$height' />";
}
?>


<div>
    <h3> Danh Sách Các Thương Hiệu</h3>
    
         <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Sản Phẩm</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tên sản phẩm</th>
                                            <th>Ảnh đại diện</th>
                                            <th>Danh mục</th>
                                            <th>Thương hiệu</th>
                                            <th>Trạng thái</th>
                                            <th>Hành động</th>
                                        
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Tên sản phẩm</th>
                                            <th>Ảnh đại diện</th>
                                            <th>Danh mục</th>
                                            <th>Thương hiệu</th>
                                            <th>Trạng thái</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
    <?php
    require('../ketnoicsdl/conn.php');

    $sql_str = "SELECT 
    products.name AS pname,
    products.images,
    products.id AS pid,
    categories.name AS cname,
    brands.name AS bname,
    products.status AS pstatus
FROM products
INNER JOIN categories ON products.category_id = categories.id
INNER JOIN brands ON products.brand_id = brands.id
ORDER BY products.name;
";



    $result = mysqli_query($conn, $sql_str);

    while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <tr>
                    <td><?= htmlspecialchars($row['pname']) ?></td>
                    <td><?= anhdaidien($row['images'], "100px") ?></td>

            
                    <td><?= htmlspecialchars($row['cname']) ?></td>
                    <td><?= htmlspecialchars($row['bname']) ?></td>
                    <td><?= htmlspecialchars($row['pstatus']) ?></td>


                    <td>
                    <a class="btn btn-warning" href="editproduct.php?id=<?= $row['pid'] ?>">Edit</a>

        
                    <a class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xoá sản phẩm này?')" href="deleteproduct.php?id=<?= $row['pid'] ?>">Delete</a>

                </td>
                </tr>
        <?php
    }
    ?>
</tbody>

                                </table>
                            </div>
                        </div>
                    </div>
</div>




<?php
require('includes/footer.php');
?>