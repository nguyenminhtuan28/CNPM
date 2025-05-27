<?php
require('includes/header.php');

?>


<div>
    <h3> Danh Sách Các Thương Hiệu</h3>
    
         <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh Mục Sản Phẩm</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Status</th>
                                            <th>Operation</th>
                                        
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Name</th>
                                            <th>Slug</th>
                                            <th>Status</th>
                                            <th>Operation</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
    <?php
    require('../ketnoicsdl/conn.php');

    $sql_str = "SELECT * FROM categories ORDER BY name";
    $result = mysqli_query($conn, $sql_str);

    while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <tr>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['slug']) ?></td>
                    <td><?= htmlspecialchars($row['status']) ?></td>
                    <td>
                    <a class="btn btn-warning" href="editcategory.php?id=<?= $row['id'] ?>">Edit</a>

        
                    <a class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xoá?')" href="deletecategory.php?id=<?= $row['id'] ?>">Delete</a>

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