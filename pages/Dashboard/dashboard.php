<?php
$ele = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require './conn.php';
  require '../signup.php';

  $descrip = $_POST["descrip"];
  $amount = $_POST["amount"];
  $exp_date = $_POST["exp_date"];


  if ($pwd == $cpwd) {
    $sql = "INSERT INTO `$uname` (`descrip`,`amount`, `exp_date`) VALUES ('{$descrip}', '{$amount}','{$exp_date}');";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $ele = true;
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./styles/global.css" />
  <link rel="stylesheet" href="./styles/style.css" />
  <link rel="stylesheet" href="./styles/modal.css" />
  <link rel="stylesheet" href="./styles/media.css" />
  <link rel="shortcut icon" href="assets/hs.png" type="image/x-icon" />

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

  <title>Harval</title>
</head>

<body>
  <div class="container">
    <aside>
      <div class="top">
        <div class="logo">
          <a href="../../index.html">
            <img src="assets/hs.png" alt="Logo Harval" />
          </a>
          <a href="../../index.html">
            <h3>Harval</h3>
          </a>
        </div>
        <div class="close" id="close-btn">
          <span class="material-icons" onclick="MobileMenu.close()">close</span>
        </div>
      </div>
      <div class="sidebar">
        <a href="./dashboard.html" class="active">
          <span class="material-icons">grid_view</span>
          <p>Dashboard</p>
        </a>
        <a href="contactus.html">
          <span class="material-icons">contact_page</span>
          <p>Contact</p>
        </a>
        <a href="../../index.html">
          <span class="material-icons">logout</span>
          <p>Exit</p>
        </a>
      </div>
    </aside>
    <main>
      <div class="topMenu">
        <h2 id="date-display"></h2>
      </div>

      <?php
      require './dataTotal.php';

      $data = array(array("type" => "Income", "amount" => $totalincome), array("type" => "Expense", "amount" => $totalexpense));
      echo '<section id="balance">
        <h2 class="sr-only">Balance</h2>

        <div class="card">
          <h3>
            <span>Incomes</span>
            <img src="assets/incomes.svg" alt="Imagem de entradas" />
          </h3>
          <p id="incomeDisplay">R$ ' . $totalincome . '</p>
          <p id="dateDisplay"></p>
        </div>

        <div class="card">
          <h3>
            <span>Expenses</span>
            <img src="assets/expenses.svg" alt="Imagem de saídas" />
          </h3>
          <p id="expenseDisplay">-R$ ' . $totalexpense . '</p>
        </div>

        <div class="card total">
          <h3>
            <span>Total</span>
            <img class="total" src="assets/total.svg" alt="Imagem de total" />
          </h3>
          <p id="totalDisplay">R$ ' . $total . '</p>
        </div>
      </section>';
      ?>

      <section id="transaction">
        <h2 class="sr-only">Transactions</h2>

        <div class="last-transactions">
          <div class="table-top">
            <h2>Last Transactions</h2>

            <button href="#" id="newTransaction" class="button new" onclick="Modal.open()">
              + New Transaction
            </button>
          </div>

          <div class="table-container">
            <?php require './dataTable.php' ?>
          </div>

        </div>
      </section>

      <div class="addTransactionMobileButton">
        <button href="#" id="newTransactionMobile" onclick="Modal.open()">
          <span class="material-icons">add</span>
        </button>
      </div>
    </main>

    <div class="right">
      <div class="top">
        <button id="menu-btn">
          <span class="material-icons" id="mobile-menu" onclick="MobileMenu.open()">menu</span>
        </button>

        <div class="theme-toggler">
          <span class="material-icons active" id="toggle-light" onclick="ThemeToggler.Light()">light_mode</span>
          <span class="material-icons" id="toggle-dark" onclick="ThemeToggler.Dark()">dark_mode</span>
        </div>
      </div>


    </div>
  </div>

  <div class="modal-overlay" id="modalOverlay">
    <div class="modal">
      <div id="form">
        <div class="modalTop">
          <h2>New Transaction</h2>
          <span class="material-icons" id="close-modal-btn" onclick="Modal.close()">close</span>
        </div>
        <form action="./dataPut.php" method="post">
          <div class="input-group">
            <label class="sr-only" for="description">Description</label>
            <input type="text" id="description" name="descrip" placeholder="Description" required />
          </div>

          <div class="input-group">
            <label class="sr-only" for="amount">Amount</label>
            <input type="number" id="amount" name="amount" step="0.01" placeholder="0.00" required />
            <small class="help">Select "Income" to incomes and "Expense" to expenses</small>
            <label for="incomeRadio"><input type="radio" name="type" id="incomeRadio" value="income">Income</label>
            <label for="incomeRadio"><input type="radio" name="type" id="incomeRadio" value="expense">Expense</label>

          </div>

          <!-- <div class="buttons-income-expense">
            <button id="incomeButton" onclick="Form.setIncome();  return false;">
              Income
            </button>
            <button id="expenseButton" onclick="Form.setExpense(); return false;">
              Expense
            </button>
          </div> -->

          <div class="input-group">
            <label class="sr-only" for="date">Date</label>
            <input type="date" id="date" name="exp_date" required />
          </div>

          <div class="actions">
            <button class="save">Confirm</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- <script src="methodes.php"></script> -->
  <script src="./scripts/theme.js"></script>
  <script src="./scripts/menuAndModal.js"></script>

</body>

</html>