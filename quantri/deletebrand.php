<?php
require '../ketnoicsdl/conn.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $delid = intval($_GET['id']);

    $sql_str = "DELETE FROM brands WHERE id = ?";

    $stmt = mysqli_prepare($conn, $sql_str);
    mysqli_stmt_bind_param($stmt, "i", $delid);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("Location: listbrands.php");
        exit();
    } else {
        echo "Lỗi khi xóa thương hiệu: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
} else {
    echo "ID không hợp lệ!";
}
mysqli_close($conn);
?>
