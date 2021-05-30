<?php
session_start();
require "connect_db.php";


if (isset($_POST['updatebtn_sel'])) {
  $id = $_POST['edit_id_sel'];
  $state_name = $_POST['state_name'];

  $query = "UPDATE `state` SET `state_name` = '$state_name'  WHERE  `id` = '$id'";
  $query_run = mysqli_query($connect, $query);

  if ($query_run) {
    $_SESSION['success'] = "Тариф обновлен";
    header("Location: selects.php");
  }

  else {
    $_SESSION['status'] = "Тариф не обновлен";
    header("Location: selects.php");
  }
}






if (isset($_POST['delete_btn_sel'])) {
  $id = $_POST['delete_id_sel'];
  $query = "DELETE FROM `state` WHERE `id` = '$id'";
  $query_run = mysqli_query($connect, $query);

  if ($query_run) {
    $_SESSION['success'] = "Тариф удален";
    header("Location: selects.php");
  }

  else {
    $_SESSION['status'] = "Тариф не удален";
    header("Location: selects.php");
  }
}


















if (isset($_POST['updatebtn_sel1'])) {
  $id = $_POST['edit_id_sel1'];
  $sport_name = $_POST['sport_name'];
  $s_id = $_POST['s_id'];


  $query = "UPDATE `sport` SET `sport_name` = '$sport_name', `s_id` = '$s_id'  WHERE  `id` = '$id'";
  $query_run = mysqli_query($connect, $query);

  if ($query_run) {
    $_SESSION['success'] = "Тариф обновлен";
    header("Location: selects.php");
  }

  else {
    $_SESSION['status'] = "Тариф не обновлен";
    header("Location: selects.php");
  }
}






if (isset($_POST['delete_btn_sel1'])) {
  $id = $_POST['delete_id_sel1'];
  $query = "DELETE FROM `sport` WHERE `id` = '$id'";
  $query_run = mysqli_query($connect, $query);

  if ($query_run) {
    $_SESSION['success'] = "Тариф удален";
    header("Location: selects.php");
  }

  else {
    $_SESSION['status'] = "Тариф не удален";
    header("Location: selects.php");
  }
}
















if (isset($_POST['updatebtn_sel11'])) {
  $id = $_POST['edit_id_sel11'];
  $hall_name = $_POST['hall_name'];
  $c_id = $_POST['c_id'];


  $query = "UPDATE `hall` SET `hall_name` = '$hall_name', `c_id` = '$c_id'  WHERE  `id` = '$id'";
  $query_run = mysqli_query($connect, $query);

  if ($query_run) {
    $_SESSION['success'] = "Тариф обновлен";
    header("Location: selects.php");
  }

  else {
    $_SESSION['status'] = "Тариф не обновлен";
    header("Location: selects.php");
  }
}






if (isset($_POST['delete_btn_sel11'])) {
  $id = $_POST['delete_id_sel11'];
  $query = "DELETE FROM `hall` WHERE `id` = '$id'";
  $query_run = mysqli_query($connect, $query);

  if ($query_run) {
    $_SESSION['success'] = "Тариф удален";
    header("Location: selects.php");
  }

  else {
    $_SESSION['status'] = "Тариф не удален";
    header("Location: selects.php");
  }
}


 ?>
