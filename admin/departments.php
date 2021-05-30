<?php
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Добавить новый тариф</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code_departments.php" method="POST">

        <div class="modal-body">

          <div class="form-group">
            <label> Название тарифа </label>
            <input type="text" name="label" class="form-control" placeholder="Введите название тарифа">
          </div>
          <div class="form-group">
            <label>Основные положения</label>
            <input type="text" placeholder="Введите положение 1" name="about1" class="form-control">
            <input type="text" placeholder="Введите положение 2" name="about2" class="form-control">
            <input type="text" placeholder="Введите положение 3" name="about3" class="form-control">
          </div>
          <div class="form-group">
            <label>Цена</label>
            <input type="text" name="price" class="form-control" placeholder="Введите цену">
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" name="dptbtn" class="btn btn-primary">Добавить</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Тарифы
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
          Добавить тариф
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
        $query = "SELECT * FROM `departments`";
        $query_run = mysqli_query($connect, $query);

        ?>
        <table  id="dataTable" width="100%" cellpadding="10">
          <thead>
            <tr>
              <th> ID </th>
              <th>Название тарифа</th>
              <th>Основные положения</th>
              <th>Цена</th>
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
                  <td><?php echo $row['label']; ?></td>
                  <td><?php echo $row['about1']; ?>
                  <br><?php echo $row['about2']; ?>
                  <br><?php echo $row['about3']; ?>
                  </td>
                  <td><?php echo $row['price']; ?></td>
                  <td>
                    <form action="departments_edit.php" method="post">
                      <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                      <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                    </form>
                  </td>
                  <td>
                    <form action="code_departments.php" method="post">
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



<?php
include('includes/scripts.php');
?>
