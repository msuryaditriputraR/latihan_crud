<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// NOTE: Create Connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// NOTE: Check Connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
