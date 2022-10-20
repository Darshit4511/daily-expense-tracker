<?php
require './conn.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $uname = $_SESSION["uname"];
    $description = $_POST['descrip'];
    $amount = $_POST['amount'];
    $date = $_POST['exp_date'];
    $type = $_POST['type'];
    $sql = "INSERT INTO `transactions` (`uname`, `description`, `amount`, `date`, `type`) VALUES ('$uname', '$description', '$amount', '$date', '$type');";
    $result = mysqli_query($conn, $sql);
    header("Location: /Harval/pages/Dashboard/dashboard.php");
}
