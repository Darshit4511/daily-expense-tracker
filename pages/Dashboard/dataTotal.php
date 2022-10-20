<?php
require './conn.php';
session_start();
$uname = $_SESSION['uname'];
$sql = "SELECT * FROM `transactions` WHERE `uname` = '$uname'";
$totalincome = 0;
$totalexpense = 0;
$total = 0;
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        if ($row['type'] == 'income') {
            $totalincome = $totalincome + $row['amount'];
        } else {
            $totalexpense = $totalexpense + $row['amount'];
        }
    }
    $total = $totalincome - $totalexpense;
}
