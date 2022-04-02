<?php
require_once('../connect.php');
require_once('../var.php');

if (isset($_POST)) {
    $name = $_POST['name'];
    $age = $_POST['age'];

    $sql = "INSERT INTO mhs (id,name,age) VALUES ('', '$name', '$age')";

    $message = '';
    $color = '';
    if (mysqli_query($conn, $sql)) {
        header("Location: " . $base_url . "?status=1&aksi=tambah");
    } else {
        header("Location: " . $base_url . "?status=0&aksi=tambah");
    }
}
