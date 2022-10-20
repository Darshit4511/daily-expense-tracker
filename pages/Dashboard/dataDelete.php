<?php
if (isset($_GET['id'])) {
    require './conn.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM `transactions` WHERE `transactions`.`transID` = $id;";
    $result = mysqli_query($conn, $sql);
    header("Location: /Harval/pages/Dashboard/dashboard.php");
}
