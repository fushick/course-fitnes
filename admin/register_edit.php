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

        $query = "SELECT * FROM `users` WHERE `id` = '$id'";
        $query_run = mysqli_query($connect, $query);

        foreach ($query_run as $row) {

          ?>
          <form action="code/code.php" method="POST">

            <input type="text" name="edit_id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
              <label> Имя </label>
              <input type="text" name="edit_name" class="form-control" value="<?php echo $row['name']; ?>">
            </div>

            <div class="form-group">
              <label> Номер телефона </label>
              <input type="text" name="edit_tel" class="form-control" value="<?php echo $row['tel']; ?>">
            </div>

            <div class="form-group">
              <label>Email</label>
              <input type="email" name="edit_email" class="form-control" value="<?php echo $row['email']; ?>">
            </div>
            <div class="form-group">
              <label>Пароль</label>
              <input type="password" name="edit_pswrd" class="form-control" value="<?php echo $row['pswrd']; ?>">
            </div>

            <div class="form-group">
              <label>Статус пользователя</label>
              <select class="form-control" name="update_usertype">
                <option value="admin">Admin</option>
                <option value="">User</option>
              </select>
            </div>

            <a href="register.php" class="btn">Закрыть</a>
            <button type="submit" name="updatebtn" class="btn btn-primary">Обновить</button>
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

<form action="code.php" method="POST">

  <div class="modal-body">

  </div>
</form>

<?php
include('includes/scripts.php');
?>
