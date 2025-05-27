<?php
require('../ketnoicsdl/conn.php');

$id = $_GET['id'];

if (!empty($id)) {
    $sql_str = "DELETE FROM admins WHERE id = $id";

    mysqli_query($conn, $sql_str);
}

header("Location: ./listusers.php");
exit;
?>
