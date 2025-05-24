<?php


$id = $_GET['id'];

require('../ketnoicsdl/conn.php');

$sql_str = "select 
* from news where id=$id";

$res = mysqli_query($conn, $sql_str);

$news = mysqli_fetch_assoc($res);

if (isset($_POST['btnUpdate'])) {
    $name = $_POST['title'];
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
    $summary = $_POST['summary'];
    $description = $_POST['description'];

    $danhmuc = $_POST['danhmuc'];



    if (!empty($_FILES['anh']['name'])) {

        unlink($news['avatar']);


        $filename = $_FILES['anh']['name'];

        $location = "uploads/news/" . uniqid() . $filename;
        $extension = pathinfo($location, PATHINFO_EXTENSION);
        $extension = strtolower($extension);

        $valid_extensions = array("jpg", "jpeg", "png");

        $response = 0;
        if (in_array(strtolower($extension), $valid_extensions)) {

            if (move_uploaded_file($_FILES['anh']['tmp_name'], $location)) {

            }
        }



        $sql_str = "UPDATE `news` 
        SET `title`='$name', 
        `slug`='$slug', 
        `description`='$description', 
        `sumary`='$summary', 
        `avatar`='$location', 
        `newscategory_id`=$danhmuc, 
        `updated_at`=now()
        WHERE `id`=$id
        ";
    } else {
        $sql_str = "UPDATE `news` 
        SET `title`='$name', 
        `slug`='$slug', 
        `description`='$description', 
        `sumary`='$summary', 
        `newscategory_id`=$danhmuc, 
        `updated_at`=now()
        WHERE `id`=$id
        ";
    }



    mysqli_query($conn, $sql_str);

    header("location: ./listnews.php");
} else {
    require('includes/header.php');
    ?>

        <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Cập nhật tin tức</h1>
                            </div>
                            <form class="user" method="post" action="#" enctype="multipart/form-data">                        
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user"
                                    id="title" name="title" aria-describedby="emailHelp"
                                    placeholder="Tên sản phẩm"
                                    value="<?= $news['title'] ?>">
                            </div>
                    
                            <div class="form-group">
                                <label class="form-label">Ảnh đại diện</label>
                                <input type="file" class="form-control form-control-user"
                                    id="anh" name="anh" 
                                    >
                                <br>
                                Ảnh hiện tại:
                                <?php $avatar = $news['avatar']; ?>
                                <img src='<?= $avatar ?>' height='100px' />
                       
                            </div>
                            <div class="form-group">
                                <label class="form-label">Tóm tắt tin:</label>
                                <textarea name="summary" class="form-control" placeholder="Nhập...">
                                <?= $news['sumary'] ?>
                                </textarea>
                            </div>
                            <div class="form-group">
                            <label class="form-label">Nội dung tin:</label>
                                <textarea name="description" class="form-control" placeholder="Nhập...">
                                <?= $news['description'] ?>
                                </textarea>
                            </div>
                    
                   
                   
                   
                            <div class="form-group">
                                <label class="form-label">Danh mục tin tức:</label>
                                <select class="form-control" name="danhmuc">
                                    <option>Chọn danh mục</option>
                                    <?php
                                    $sql_str = "select * from newscategories order by name";
                                    $result = mysqli_query($conn, $sql_str);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                        <option value="<?php echo $row['id']; ?>"
                            <?php
                            if ($row['id'] == $news['newscategory_id'])
                                echo "selected";

                            ?>
                        ><?php echo $row['name']; ?></option>
                <?php } ?>
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
        require('includes/footer.php');
}
?>