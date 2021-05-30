<?php
session_start();
require "connect_db.php";
$name = $_POST['name'];
$pswrd_auth = $_POST['pswrd'];

if (isset($_POST['authbtn'])) {

  $query = "SELECT `pswrd` FROM `users` WHERE `name` = '$name'";
  $query_run = mysqli_query($connect, $query);
  if ((mysqli_num_rows($query_run))>0) {
    $row = mysqli_fetch_assoc($query_run);
    if (password_verify($pswrd_auth, $row['pswrd'])) {
      $_SESSION['user_name'] = $name;

      header("Location: after-reg.php");
    }
  }
  else {
    header("Location: main.php?errorAuth=Пароль или логин неверны");
  }

}

?>
