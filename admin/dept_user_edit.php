<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
?>


<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">EDIT</h6>
    </div>

    <div class="card-body">



      <?php
      require "connect_db.php";

      if (isset($_POST['edit_btn_user_dept'])) {

        $order_id = $_POST['edit_id_user_dept'];

        $query1 = "SELECT * FROM `user_orders` WHERE `order_id` = '$order_id'";
        $query_run1 = mysqli_query($connect, $query1);

        foreach ($query_run1 as $row1) {

          ?>
          <form action="code_user_dept.php" method="POST">
            <div class="form-group">
              <label>Имя</label>
              <input type="text" name="request_name" class="form-control" value="<?php echo $row1['name']; ?>">

            </div>

            <div class="form-group">
              <label>Статус заявки</label>

              <input type="text" name="request_edit" class="form-control" value="<?php echo $row1['request']; ?>">
            </div>


            <a href="dept_users_cart.php" class="btn">Закрыть</a>
            <button type="submit" name="updatebtn_user_dept" class="btn btn-primary">Обновить</button>
          </form>

          <?php
        }
      }
      ?>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->


<?php
include('includes/scripts.php');
?>
