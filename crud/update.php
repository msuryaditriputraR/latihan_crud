<?php
require_once('../connect.php');
require_once('../var.php');

if (isset($_POST)) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];

    $sql = "UPDATE mhs SET name='$name', age='$age' WHERE id=$id";

    $message = '';
    $color = '';
    if (mysqli_query($conn, $sql)) {
        header("Location: " . $base_url . "?status=1&aksi=edit");
    } else {
        header("Location: " . $base_url . "?status=0&aksi=edit");
    }
}
