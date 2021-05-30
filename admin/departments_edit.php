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
      if (isset($_POST['edit_btn'])) {
        $id = $_POST['edit_id'];

        $query = "SELECT * FROM `departments` WHERE `id` = '$id'";
        $query_run = mysqli_query($connect, $query);

        foreach ($query_run as $row) {

          ?>
          <form action="code_departments.php" method="POST">

            <input type="text" name="edit_id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
              <label> Label</label>
              <input type="text" name="label" class="form-control" value="<?php echo $row['label']; ?>">
            </div>

            <div class="form-group">
              <label>About</label>
              <input type="text" name="about1" class="form-control" value="<?php echo $row['about1']; ?>">
              <input type="text" name="about2" class="form-control" value="<?php echo $row['about2']; ?>">
              <input type="text" name="about3" class="form-control" value="<?php echo $row['about3']; ?>">
            </div>
            <div class="form-group">
              <label>Price</label>
              <input type="text" name="price" class="form-control" value="<?php echo $row['price']; ?>">
            </div>

            <a href="departments.php" class="btn">Закрыть</a>
            <button type="submit" name="updatebtn_dep" class="btn btn-primary">Обновить</button>
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
