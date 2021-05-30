<?php
session_start();
require "connect_db.php";


if (isset($_POST["add_to_cart"])) {
  if(isset($_SESSION["shooping-cart"])) {
    $item_array_id = array_column($_SESSION["shooping-cart"], "item_id");
    if (!in_array( $_GET["id"], $item_array_id)) {
      $count = count($_SESSION["shooping-cart"]);
      $item_array = array(
        'item_id' => $_GET["id"],
        'item_label' => $_POST["label"],
        'item_price' => $_POST["price"]
      );
      $_SESSION["shooping-cart"][$count] = $item_array;
    }
    else {
      header("Location: after-reg.php?success_message=Тариф успешно добавлен в ваш профиль");
    }
  }
  else {
    $item_array = array (
      'item_id' => $_GET["id"],
      'item_label' => $_POST["label"],
      'item_price' => $_POST["price"]
    );
    $_SESSION["shooping-cart"][0] = $item_array;

  }
}

if (isset($_GET['action'])) {
  if ($_GET['action'] == "delete") {
    foreach ($_SESSION["shooping-cart"] as $keys => $values) {
      if ($values["item_id"] == $_GET["id"]) {
        unset($_SESSION["shooping-cart"][$keys]);
        header("Location: profile.php?success-message-delete=Тариф успешно удален из вашего профиля");
      }
    }
  }
}





if (isset($_POST['save_cart'])) {
  $name = $_SESSION['user_name'];
  $query1 = "SELECT * FROM `users` WHERE `name` = '$name'";
  $query_run = mysqli_query($connect, $query1);
  $row = mysqli_fetch_assoc($query_run);
  if ($query_run) {
    $order_id = mysqli_insert_id($connect);
    $query2 = "INSERT INTO `user_orders`(`order_id`, `name`, `label`, `price`, `request`) VALUES (?,?,?,?,?)";
    $stmt = mysqli_prepare($connect,$query2);
    if ($stmt) {
      mysqli_stmt_bind_param($stmt, "issis", $order_id,$name_order,$label,$price,$request);
      foreach ($_SESSION["shooping-cart"] as $key => $values) {
        $label = $values['item_label'];
        $price = $values['item_price'];
        $request = $row['request'];
        $name_order = $name;
        mysqli_stmt_execute($stmt);
      }
      header("Location: profile.php?success-message-cart=Ваша заявка принята, дождитесь звонка, либо смены статуса заявки");
    }
  }
}


?>
