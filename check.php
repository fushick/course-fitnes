<?php
session_start();
require "connect_db.php";

$name = $_POST['name'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$pswrd = $_POST['pswrd'];

if (isset($_POST['rgstr_btn'])) {

  if (preg_match('/((8|\+7)-?)?\(?\d{3,5}\)?-?\d{1}-?\d{1}-?\d{1}-?\d{1}-?\d{1}((-?\d{1})?-?\d{1})?/', $tel)) {
    $_SESSION['user_name'] = $name;
    $hash = password_hash($_POST['pswrd'], PASSWORD_DEFAULT);
    $query = "INSERT INTO `users` (`id`, `name`, `tel`, `email`, `pswrd`) VALUES (NULL, '$name', '$tel', '$email', '$hash')";
    $query_run = mysqli_query($connect, $query);
    header('Location: after-reg.php');
  }

  else {
    header('Location: main.php?error=Ошибка при вводе номера телефона');
  }
}

?>
