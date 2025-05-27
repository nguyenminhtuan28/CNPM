
<?php



require("../ketnoicsdl/conn.php");

$name = $_POST['name'];
$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
$sumary = $_POST['sumary'];
$description = $_POST['description'];

$danhmuc = $_POST['danhmuc'];


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


$sql_str = "INSERT INTO `news` (`title`, `avatar`, `slug`, `sumary`, `description`, `newscategory_id`, `created_at`, `updated_at`) VALUES 
    ('$name', 
    '$location',
    '$slug', 
    '$sumary',
    '$description',  
    $danhmuc,  NOW(), NOW());";


mysqli_query($conn, $sql_str);

header("location: ./listnews.php");
?>