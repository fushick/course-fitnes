<?php
session_start();
require "connect_db.php";



if (isset($_POST['updatebtn_user_dept'])) {
  $request_edit = $_POST['request_edit'];
  $request_name = $_POST['request_name'];

  $query = "UPDATE `user_orders` SET `request` = '$request_edit'  WHERE  `name` = '$request_name'";
  $query_run = mysqli_query($connect, $query);

  if ($query_run) {
    $_SESSION['success'] = "Статус заявки обновлен";
    header("Location: dept_users_cart.php");
  }

  else {
    $_SESSION['status'] = "Статус заявки не обновлен";
    header("Location: dept_users_cart.php");
  }
}






if (isset($_POST['delete_btn_dept_user'])) {
  $id = $_POST['delete_id_dept_user'];
  $query = "DELETE FROM `user_orders` WHERE `name` = '$request_name'";
  $query_run = mysqli_query($connect, $query);

  if ($query_run) {
    $_SESSION['success'] = "Пользователь удален";
    header("Location: dept_users_cart.php");
  }

  else {
    $_SESSION['status'] = "Пользователь не удален";
    header("Location: dept_users_cart.php");
  }
}


 ?>
