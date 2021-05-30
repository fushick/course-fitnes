<?php
session_start();
require "connect_db.php";


if (isset($_POST['dptbtn'])) {

  $label = $_POST['label'];
  $about1 = $_POST['about1'];
  $about2 = $_POST['about2'];
  $about3 = $_POST['about3'];
  $price = $_POST['price'];


  $query = "INSERT INTO `departments`(`id`, `label`, `about1`, `about2`, `about3`, `price`) VALUES (NULL, '$label', '$about1', '$about2', '$about3','$price')";
  $query_run = mysqli_query($connect, $query);

  if ($query_run) {
    $_SESSION['success'] = "Тариф добавлен";
    header('Location: departments.php');
  }

  else {
    $_SESSION['status'] = "Тариф не добавлен";
    header('Location: departments.php');
  }
}







if (isset($_POST['updatebtn_dep'])) {
  $id = $_POST['edit_id'];
  $label = $_POST['label'];
  $about1 = $_POST['about1'];
  $about2 = $_POST['about2'];
  $about3 = $_POST['about3'];
  $price = $_POST['price'];

  $query = "UPDATE `departments` SET `label` = '$label' , `about1` = '$about1' , `about2` = '$about2' , `about3` = '$about3' , `price` = '$price' WHERE  `id` = '$id'";
  $query_run = mysqli_query($connect, $query);

  if ($query_run) {
    $_SESSION['success'] = "Тариф обновлен";
    header("Location: departments.php");
  }

  else {
    $_SESSION['status'] = "Тариф не обновлен";
    header("Location: departments.php");
  }
}






if (isset($_POST['delete_btn'])) {
  $id = $_POST['delete_id'];
  $query = "DELETE FROM `departments` WHERE `id` = '$id'";
  $query_run = mysqli_query($connect, $query);

  if ($query_run) {
    $_SESSION['success'] = "Тариф удален";
    header("Location: departments.php");
  }

  else {
    $_SESSION['status'] = "Тариф не удален";
    header("Location: departments.php");
  }
}


 ?>
