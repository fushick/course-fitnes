<?php
require "../connect_db.php";

if (isset($_POST['action'])) {
  $sql = "SELECT * FROM user_orders WHERE label !=''";
  if (isset($_POST['label'])) {
    $label = implode("'.'", $_POST['label']);
    $sql .= "AND label IN('".$label."')";
  }
  if (isset($_POST['price'])) {
    $price = implode("'.'", $_POST['price']);
    $sql .= "AND price IN('".$price."')";
  }


  $result = $connect -> query($sql);
  $output = '';
  if($result->num_rows > 0){
    while ($row1=$result->fetch_assoc()) {

      $output .= '<div class="col-">
      <table  id="dataTable"  cellpadding="15">

      <tr>
      <th>Тариф</th>
      <th>Цена</th>
      </tr>
      <tr>
      <td>'.$row1['label'].'</td>
      <td> '.$row1['price'].'</td>
      </tr>
      </table>

      </td>

      </table>
      </div>';
    }
  }
  else {
    $output = "<h3>Результатов не найдено</h3>";
  }
  echo $output;
}

?>
