<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "harval";

$conn = mysqli_connect($server, $user, $password, $database);
if (!$conn) {
    die("Databse not connected...!! ");
}
