<?php
session_start();
require "connect_db.php";
if (isset($_POST['registerbtn'])) {

  $name = $_POST['name'];
  $tel = $_POST['tel'];
  $email = $_POST['email'];
  $pswrd = $_POST['pswrd'];
  $hash = password_hash($_POST['pswrd'], PASSWORD_DEFAULT);
  $usertype = $_POST['usertype'];

  $query = "INSERT INTO `users` (`id`, `name`, `tel`, `email`, `pswrd`,`usertype`) VALUES (NULL, '$name', '$tel', '$email', '$hash','$usertype')";
  $query_run = mysqli_query($connect, $query);

  if ($query_run) {
    $_SESSION['success'] = "Пользователь добавлен";
    header('Location: register.php');
  }

  else {
    $_SESSION['status'] = "Пользователь не добавлен";
    header('Location: register.php');
  }
}










if (isset($_POST['updatebtn'])) {
  $id = $_POST['edit_id'];
  $name = $_POST['edit_name'];
  $tel = $_POST['edit_tel'];
  $email = $_POST['edit_email'];
  $pswrd = $_POST['edit_pswrd'];
  $usertypeupdate = $_POST['update_usertype'];

  $query = "UPDATE `users` SET `name` = '$name' , `tel` = '$tel' ,  `email` = '$email' , `pswrd` = '$pswrd', `usertype` = '$usertypeupdate' WHERE  `id` = '$id'";
  $query_run = mysqli_query($connect, $query);

  if ($query_run) {
    $_SESSION['success'] = "Данные о пользователе обновлены";
    header("Location: register.php");
  }

  else {
    $_SESSION['status'] = "Данные о пользователе не обновлены";
    header("Location: register.php");
  }
}










if (isset($_POST['delete_btn'])) {
  $id = $_POST['delete_id'];
  $query = "DELETE FROM `users` WHERE `id` = '$id'";
  $query_run = mysqli_query($connect, $query);

  if ($query_run) {
    $_SESSION['success'] = "Данные о пользователе удалены";
    header("Location: register.php");
  }

  else {
    $_SESSION['status'] = "Данные о пользователе не удалены";
    header("Location: register.php");
  }
}


?>
