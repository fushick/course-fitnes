<?php
session_start();
require "../connect_db.php";



if ($_POST['state_id']) {
  $query = "SELECT * FROM sport WHERE s_id=".$_POST['state_id'];
  $result = mysqli_query($connect, $query);
  if (mysqli_num_rows($result) > 0) {
    echo '<option value = "">Выберите вариант ответа</option>';
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<option value = '.$row['id'].'>'.$row['sport_name'].'</option>';
    }
  }
  else {
    echo '<option>не найден</option>';
  }
} else if (($_POST['sport_id'])) {
  $query = "SELECT * FROM hall WHERE c_id=".$_POST['sport_id'];
  $result = mysqli_query($connect, $query);
  if (mysqli_num_rows($result) > 0) {
    echo '<option value = "">Выберите вариант ответа</option>';
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<option value = '.$row['id'].'>'.$row['hall_name'].'</option>';
    }
  }
}



 ?>
