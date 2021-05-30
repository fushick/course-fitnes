<?php
session_start();
require "connect_db.php";
$pswrd_auth = $_POST['auth_pswrd'];
$email_auth = $_POST['auth_email'];

if (isset($_POST['login_btn'])) {

  $query = "SELECT `pswrd`, `usertype` FROM `users` WHERE `email` = '$email_auth'";
  $query_run = mysqli_query($connect, $query);
  if ((mysqli_num_rows($query_run))>0) {
    $row = mysqli_fetch_assoc($query_run);
    $hash = $row['pswrd'];
    if ((password_verify($pswrd_auth, $hash)) && $row['usertype'] == "admin") {
      $_SESSION['auth_email'] = $email_auth;
      header("Location: index.php");
    }
  }
  else {
    header("Location: login.php?errorAuth=Пароль или email неверны");
  }
}



?>
