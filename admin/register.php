<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Добавить нового пользователя</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code/code.php" method="POST">

        <div class="modal-body">

          <div class="form-group">
            <label> Имя </label>
            <input type="text" name="name" class="form-control" placeholder="Введите имя">
          </div>
          <div class="form-group">
            <label>Номер телефона</label>
            <input type="tel" placeholder="Номер телефона" name="tel" class="form-control">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Введите Email">
          </div>
          <div class="form-group">
            <label>Пароль</label>
            <input type="password" name="pswrd" class="form-control" placeholder="Введите пароль">
          </div>

          <div class="form-group">
            <label>Статус пользователя</label>
            <select class="form-control" name="update_usertype">
              <option value="admin">Admin</option>
              <option value="">User</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="registerbtn" class="btn btn-primary">Добавить</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Профиль администратора
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
          Добавить пользователя
        </button>
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


      <div class="table-responsive">
        <?php
        require "connect_db.php";
        $query = "SELECT * FROM `users`";
        $query_run = mysqli_query($connect, $query);

        ?>
        <table  id="dataTable" width="100%" cellpadding="10">
          <thead>
            <tr>
              <th> ID </th>
              <th> Name </th>
              <th>Telephone</th>
              <th>Email </th>
              <th>Password</th>
              <th>Usertype</th>
              <th>EDIT </th>
              <th>DELETE </th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (mysqli_num_rows($query_run)>0) {
              while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td> <?php echo $row['name']; ?></td>
                  <td> <?php echo $row['tel']; ?></td>
                  <td> <?php echo $row['email']; ?></td>
                  <td> <?php echo $row['pswrd']; ?> </td>
                  <td> <?php echo $row['usertype']; ?> </td>
                  <td>
                    <form action="register_edit.php" method="post">
                      <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                      <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                    </form>
                  </td>
                  <td>
                    <form action="code.php" method="post">
                      <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                      <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                    </form>
                  </td>
                </tr>
                <?php
              }
            }
            ?>
          </tbody>
        </table>

      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
?>
