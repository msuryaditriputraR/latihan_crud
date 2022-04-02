<?php
require_once('./connect.php');

$query = "SELECT * FROM mhs";

$result = mysqli_query($conn, $query);

$mahasiswa = [];
if (mysqli_num_rows($result) > 0) {
    $mahasiswa = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $mahasiswa =  "No Data Entries";
}
