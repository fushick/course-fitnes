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
      if (isset($_POST['edit_btn_sel'])) {
        $id = $_POST['edit_id_sel'];

        $query = "SELECT * FROM `state` WHERE `id` = '$id'";
        $query_run = mysqli_query($connect, $query);

        foreach ($query_run as $row) {

          ?>
          <form action="code_selects.php" method="POST">

            <div class="form-group">
              <label>ID</label>
              <input type="text" name="edit_id_sel" class="form-control" value="<?php echo $row['id']; ?>">
            </div>

            <div class="form-group">
              <label>State name</label>
              <input type="text" name="state_name" class="form-control"  value="<?php echo $row['state_name']; ?>">
            </div>


            <a href="selects.php" class="btn">Закрыть</a>
            <button type="submit" name="updatebtn_sel" class="btn btn-primary">Обновить</button>
          </form>

          <?php
        }
      }
      ?>

    </div>






    <div class="card-body">
      <?php
      require "connect_db.php";
      if (isset($_POST['edit_btn_sel1'])) {
        $id = $_POST['edit_id_sel1'];

        $query1 = "SELECT * FROM `sport` WHERE `id` = '$id'";
        $query_run = mysqli_query($connect, $query1);

        foreach ($query_run as $row1) {

          ?>
          <form action="code_selects.php" method="POST">

            <div class="form-group">
              <label>ID</label>
              <input type="text" name="edit_id_sel1" class="form-control" value="<?php echo $row1['id']; ?>">
            </div>

            <div class="form-group">
              <label>State name</label>
              <input type="text" name="sport_name" class="form-control"  value="<?php echo $row1['sport_name']; ?>">
            </div>

            <div class="form-group">
              <label>ID зависимого списка</label>
              <input type="text" name="s_id" class="form-control"  value="<?php echo $row1['s_id']; ?>">
            </div>


            <a href="selects.php" class="btn">Закрыть</a>
            <button type="submit" name="updatebtn_sel1" class="btn btn-primary">Обновить</button>
          </form>

          <?php
        }
      }
      ?>

    </div>











    <div class="card-body">
      <?php
      require "connect_db.php";
      if (isset($_POST['edit_btn_sel11'])) {
        $id = $_POST['edit_id_sel11'];

        $query1 = "SELECT * FROM `hall` WHERE `id` = '$id'";
        $query_run = mysqli_query($connect, $query1);

        foreach ($query_run as $row11) {

          ?>
          <form action="code_selects.php" method="POST">

            <div class="form-group">
              <label>ID</label>
              <input type="text" name="edit_id_sel11" class="form-control" value="<?php echo $row11['id']; ?>">
            </div>

            <div class="form-group">
              <label>State name</label>
              <input type="text" name="hall_name" class="form-control"  value="<?php echo $row11['hall_name']; ?>">
            </div>

            <div class="form-group">
              <label>ID зависимого списка</label>
              <input type="text" name="c_id" class="form-control"  value="<?php echo $row11['c_id']; ?>">
            </div>


            <a href="selects.php" class="btn">Закрыть</a>
            <button type="submit" name="updatebtn_sel11" class="btn btn-primary">Обновить</button>
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
