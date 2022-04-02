<?php
require_once('../connect.php');
require_once('../var.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM mhs WHERE id=$id";

    $message = '';
    $color = '';
    if (mysqli_query($conn, $sql)) {
        header("Location: " . $base_url . "?status=1&aksi=hapus");
    } else {
        header("Location: " . $base_url . "?status=0&aksi=hapus");
    }
}
