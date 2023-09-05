<?php
$connection = mysqli_connect("localhost", "root", "", "crud_app");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
