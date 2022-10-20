<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" href="./Dashboard/styles/lstyle.css">
</head>

<body>
  <div class="center">
    <h1>Login</h1>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="txt_field">
        <input type="text" name="uname" required>
        <span></span>
        <label>Username</label>
      </div>
      <div class="txt_field">
        <input type="password" name="pwd" required>
        <span></span>
        <label>Password</label>
      </div>
      <div class="pass">Forgot Password?</div>
      <input type="submit" value="login" name="login">
      <div class="signup_link">
        Not a member? <a href="signup.php">Signup</a>
      </div>
    </form>

    <?php
    if (isset($_POST['login'])) {
      require "./Dashboard/conn.php";
      $uname = $_POST['uname'];
      $pass = $_POST['pwd'];
      $sql = "SELECT uname,pwd FROM register WHERE uname='{$uname}' and pwd='{$pass}'";
      $result = mysqli_query($conn, $sql) or die("Query failed...!!");
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          session_start();
          $_SESSION["uname"] = $uname;
          $_SESSION["pwd"] = $pass;
          header("Location: /Harval/pages/Dashboard/dashboard.php");
        }
      } else {
        echo "<h1>Username and password are not match..</h1>";
      }
    }

    ?>
  </div>

</body>

</html>