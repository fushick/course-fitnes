<?php
include('includes/header.php');
include('includes/navbar.php');
?>





<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Списки в профиле пользователя
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

        <table  id="dataTable" width="100%" cellpadding="10" >
          <thead>
            <tr>
              <th class="text-center"><h3>Динамические списки</h3></th>
            </tr>
          </thead>



          <tbody>
            <tr>
              <table width="100%" cellpadding="10">
                <tr>
                  <th><h5>State</h5></th>




                </tr>
                <tr>
                  <th>ID</th>
                  <th>state_name</th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>


                </tr>
                <tr>
                  <?php
                  require "connect_db.php";
                  $query = "SELECT * FROM `state`";
                  $query_run = mysqli_query($connect, $query);
                  while ($row = mysqli_fetch_assoc($query_run)) {
                    ?>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['state_name']; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

                    <th>
                      <form action="selects_edit.php" method="post">
                        <input type="hidden" name="edit_id_sel" value="<?php echo $row['id']; ?>">
                        <button  type="submit" name="edit_btn_sel2" class="btn btn-success"> EDIT</button>
                      </form>
                    </th>
                    <th>
                      <form action="code_selects.php" method="post">
                        <input type="hidden" name="delete_id_sel" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="delete_btn_sel" class="btn btn-danger"> DELETE</button>
                      </form>
                    </th>

                  </tr>
                  <?php
                }
                ?>
              </table>
              <hr>
              <table width="100%" cellpadding="10">
                <tr>

                  <th><h5>Sport</h5></th>

                </tr>
                <tr>
                  <th>ID</th>
                  <th>sport_name</th>
                  <th>state_id</th>
                </tr>
                <tr>
                  <?php
                  require "connect_db.php";
                  $query1 = "SELECT * FROM `sport`";
                  $query_run1 = mysqli_query($connect, $query1);
                  while ($row1 = mysqli_fetch_assoc($query_run1)) {
                    ?>
                    <td><?php echo $row1['id']; ?></td>
                    <td><?php echo $row1['sport_name']; ?></td>
                    <td><?php echo $row1['s_id']; ?></td>
                    <th>
                      <form action="selects_edit.php" method="post">
                        <input type="hidden" name="edit_id_sel1" value="<?php echo $row1['id']; ?>">
                        <button  type="submit" name="edit_btn_sel1" class="btn btn-success"> EDIT</button>
                      </form>
                    </th>
                    <th>
                      <form action="code_selects.php" method="post">
                        <input type="hidden" name="delete_id_sel1" value="<?php echo $row1['id']; ?>">
                        <button type="submit" name="delete_btn_sel1" class="btn btn-danger"> DELETE</button>
                      </form>
                    </th>
                  </tr>
                  <?php
                }
                ?>
              </table>

              <hr>
              <table width="100%" cellpadding="10">
                <tr>
                  <th><h5>Halls</h5></th>

                </tr>
                <tr>
                  <th>ID</th>
                  <th>halls_name</th>
                  <th>sport_id</th>
                </tr>
                <tr>
                  <?php
                  require "connect_db.php";
                  $query11 = "SELECT * FROM `hall`";
                  $query_run11 = mysqli_query($connect, $query11);
                  while ($row11 = mysqli_fetch_assoc($query_run11)) {
                    ?>
                    <td><?php echo $row11['id']; ?></td>
                    <td><?php echo $row11['hall_name']; ?></td>
                    <td><?php echo $row11['c_id']; ?></td>
                    <th>
                      <form action="selects_edit.php" method="post">
                        <input type="hidden" name="edit_id_sel11" value="<?php echo $row11['id']; ?>">
                        <button  type="submit" name="edit_btn_sel11" class="btn btn-success"> EDIT</button>
                      </form>
                    </th>
                    <th>
                      <form action="code_selects.php" method="post">
                        <input type="hidden" name="delete_id_sel11" value="<?php echo $row11['id']; ?>">
                        <button type="submit" name="delete_btn_sel11" class="btn btn-danger"> DELETE</button>
                      </form>
                    </th>
                  </tr>
                  <?php
                }
                ?>
              </table>
            </tr>
          </tbody>
        </table>

      </div>
    </div>
  </div>

</div>



<?php
include('includes/scripts.php');
?>
