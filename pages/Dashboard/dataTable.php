<?php
echo '<table id="data-table">
<thead>
<tr>
    <th>Description</th>
    <th>Amount</th>
    <th>Date</th>
    <th></th>
</tr>
</thead>';
require './conn.php';
$uname = $_SESSION['uname'];
$sql = "SELECT * FROM `transactions` WHERE `uname` = '$uname'";
echo '<tbody>';
$result = mysqli_query($conn, $sql);
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['description'] . "</td>";
            if ($row['type'] == 'income') {
                echo "<td class='income'>R$ " . $row['amount'] . "</td>";
            } else {
                echo "<td class='expense'>-R$ " . $row['amount'] . "</td>";
            }

            echo "<td>" . $row['date'] . "</td>";
            echo '<td><a href="./dataDelete.php?id=' . $row['transID'] . '"><img src="./assets/x-circle.svg" class="remove-transaction" alt="Remover transação"></a>
        </td>';
            echo "</tr>";
        }
    }
}
echo '</tbody>
</table>';
