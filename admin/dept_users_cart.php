<?php
include('includes/header.php');
include('includes/navbar.php');
include('includes/scripts.php');
session_start();
require "connect_db.php";
?>

<script type="text/javascript">
$(document).ready(function(){

$(".product_check").click(function(){
  var action = 'data';
  var label = get_filter_text('label');
  var price = get_filter_text('price');

  $.ajax ({
    url: 'action.php',
    method: 'POST',
    data: {action:action, label:label, price:price},
    success:function(response){
      $("#result").html(response);
    }
  });

});

function get_filter_text(text_id){
  var filterData = [];
  $('#'+text_id+':checked').each(function(){
    filterData.push($(this).val());
  });
  return filterData;
}

});
</script>
<div class="container-fluid">
  <div class="card shadow mb-1">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Заказы пользователей

      </h6>
    </div>

    <div class="card-body">

      <?php
      if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
        echo '<h3>'.$_SESSION['success'].'</h3>';
        unset($_SESSION['success']);
      }

      if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
        echo '<h3>'.$_SESSION['status'].'</h3>';
        unset($_SESSION['status']);
      }
      ?>


      <div class="row">
        <div class="col-2 mt-2" >
          <table>
            <tr>
              <th>Фильтр</th>
            </tr>

            <tr>
              <td>
                <ul class="list-group mt-4">
                  <?php
                  $sql = "SELECT DISTINCT label FROM user_orders ORDER BY label";
                  $result = $connect->query($sql);
                  while ($row=$result->fetch_assoc()) {?>
                    <li class="list-group-item">
                      <div class="form-check">
                        <label for="" class="form-check-label"></label>
                        <input type="checkbox" class="form-check-input product_check" id="label" name="" value="<?= $row['label'];?>">
                        <?= $row['label'];?>
                      </div>
                    </li>
                    <?php
                  }
                  ?>
                </ul>


                <ul class="list-group mt-4">
                  <?php
                  $sql = "SELECT DISTINCT price FROM user_orders ORDER BY price";
                  $result = $connect->query($sql);
                  while ($row=$result->fetch_assoc()) {?>
                    <li class="list-group-item">
                      <div class="form-check">
                        <label for="" class="form-check-label"></label>
                        <input type="checkbox" class="form-check-input product_check" id="price" name="" value="<?= $row['price'];?>">
                        <?= $row['price'];?>
                      </div>
                    </li>
                    <?php
                  }
                  ?>
                </ul>



              </td>
            </tr>

          </table>
        </div>


        <div class="col-" id="result">
          <table  id="dataTable"  cellpadding="15">

            <tr>
              <th>Имя пользователя</th>
              <th>Тариф</th>
              <th>Цена</th>
              <th>Статус заявки</th>
              <th>EDIT </th>

            </tr>


            <?php
            $query = "SELECT * FROM `user_orders`";
            $query_run = mysqli_query($connect, $query);
            while ($row = mysqli_fetch_assoc($query_run)) {?>

              <tr>

                <td><?php echo $row['name']; ?></td>


                    <td><?php echo $row['label']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['request']; ?></td>

                <td>
                  <form action="dept_user_edit.php" method="post">
                    <input type="hidden" name="edit_id_user_dept" value="<?php echo $row['order_id']; ?>">
                    <button  type="submit" name="edit_btn_user_dept" class="btn btn-success"> EDIT</button>
                  </form>
                </td>

                <?php
              }
              ?>

            </tr>

          </table>
        </div>

      </div>
    </div>
  </div>

</div>
