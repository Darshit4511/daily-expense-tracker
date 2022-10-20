<?php
$ele = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require './Dashboard/conn.php';

  $fname = $_POST["fname"];

  $uname = $_POST["uname"];

  $pwd = $_POST["pwd"];
  $cpwd = $_POST["cpwd"];

  if ($pwd == $cpwd) {
    $sql = "INSERT INTO `register` (`fname`,`uname`, `pwd`, `cpwd`) VALUES ('{$fname}', '{$uname}','{$pwd}', '{$cpwd}');";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $ele = true;
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Signup</title>
  <link rel="stylesheet" href="./Dashboard/styles/lstyle.css">
</head>

<body>
  <div class="center">
    <h1>Signup</h1>
    <form method="post">
      <div class="txt_field">
        <input type="text" name="uname" required>
        <span></span>
        <label>Username</label>
      </div>
      <div class="txt_field">
        <input type="text" name="fname" required>
        <span></span>
        <label>Firstname</label>
      </div>
      <div class="txt_field">
        <input type="password" name="pwd" required>
        <span></span>
        <label>Password</label>
      </div>
      <div class="txt_field">
        <input type="password" name="cpwd" required>
        <span></span>
        <label>Confirm Password</label>
      </div>
      <input type="submit" value="Register">
      <div class="signup_link">
        Already a member? <a href="#">login</a>
      </div>
    </form>
  </div>
  <?php
  if ($ele) {

    header("Location: ./login.php");
  }
  ?>


</body>

</html>