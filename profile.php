<?php
session_start();
require "connect_db.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Личный кабинет</title>
  <link rel="stylesheet" href="css/style_profile.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/profile.js"></script>
</head>
<body>
  <header>
    <div class="header_img" id="abonements_close">
      <img src="pic/profile/header_logo.png" alt="">
    </div>
    <div class="header_text">
      <?php echo "Здравствуйте, "    .$_SESSION['user_name'] ?>
    </div>
  </header>

  <div class="main">

    <div class="main_left">

      <?php  if (isset($_GET['success']) ?? "") {
        ?>
        <div class="success-message">
          <?php echo $_GET['success']; ?>
        </div>
      <?php } ?>

      <?php if (isset($_GET['alert']) ?? "") {
        ?>
        <div class="error-message">
          <?php echo $_GET['alert']; ?>
        </div>
      <?php } ?>

      <div class="main_text">
        Ваши данные:
      </div>

      <?php
      $currentUser = $_SESSION['user_name'];
      $sql = "SELECT * FROM `users` WHERE  `name` = '$currentUser'";

      $gotResults = mysqli_query($connect, $sql);

      if ($gotResults) {
        if (mysqli_num_rows($gotResults)>0) {
          while ($row = mysqli_fetch_array($gotResults)) {
            ?>
            <form class="" action="edit_profile.php" method="post" enctype="multipart/form-data">
              <div class="form_profile">
                <div class="form-text">
                  Имя:
                </div>
                <div class="form-input-name">
                  <input type="text" name="updateName" value="<?php echo $row['name']; ?>">
                </div>
              </div>

              <div class="form_profile">
                <div class="form-text">
                  Номер телефона:
                </div>
                <div class="form-input-tel">
                  <input type="tel" name="updateTel" value="<?php echo $row['tel'];  ?>">
                </div>
              </div>


              <div class="form_profile">
                <div class="form-text">
                  Email:
                </div>
                <div class="form-input">
                  <input type="email" name="updateEmail" value="<?php echo $row['email']; ?>">
                </div>
              </div>
              <input type="submit" name="edit_profile" class="edit_profile" value="Обновить данные">
            </form>
            <?php
          }
        }
      }
      ?>
    </div>



    <div class="main_right">
      <div class="main_text_right">
        Дополнительная информация:
      </div>
      <p>Для лучшего обслуживания, пройдите, пожалуйста, опрос.</p>
      <?php
      $query = "SELECT * FROM state ORDER BY state_name";
      $result = mysqli_query($connect, $query);
      ?>
      <form class="" action="course-fitnes/ajax/a_profile.php" method="post">

        <div class="form_profile">
          <div class="form-text">
            Занимались ли вы до этого спортом?
          </div>
          <select name="state" id="state" onchange="FetchSport(this.value)" required >
            <option value="">Выберите вариант ответа</option>
            <?php
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value = '.$row['id'].'>'.$row['state_name'].'</option>';
              }
            }
            ?>
          </select>
        </div>

        <div class="form_profile">
          <div class="form-text">
            Ваше физическое состояние:
          </div>

          <select name="sport" id="sport"  onchange="FetchHall(this.value)" required>
            <option value="">Выберите вариант ответа</option>
          </select>
        </div>


        <div class="form_profile">
          <div class="form-text">
            Приемлимый для вас вид деятельности:
          </div>
          <select name="hall" id="hall"  required>
            <option value="">Выберите вариант ответа</option>
          </select>
        </div>
      </form>
      <div class="btn_load">
        <button type="submit" name="save_profile" class="edit_profile"><a href="#popup" class="price">Ответить</a></button>

      </div>
    </div>
  </div>

  <div class="popup" id="popup">
    <div class="popup_body">
      <div class="popup_content">
        <a href="#abonements_close" class="popup_close">x</a>
        <div class="popup_title">Дорогой пользователь</div>
        <div class="popup_text">Спасибо, что прошли опрос. Ваше мнение очень важно для нас. </div>
      </div>
    </div>
  </div>


  <div class="RB-title">
    <p>Ваши заказы</p>
  </div>



  <div class="cart">
    <?php  if (isset($_GET['success-message-cart']) ?? "") {
      ?>
      <div class="success-message-delete">
        <?php echo $_GET['success-message-cart']; ?>
      </div>
    <?php } ?>


    <?php  if (isset($_GET['success-message-delete']) ?? "") {
      ?>
      <div class="success-message-delete">
        <?php echo $_GET['success-message-delete']; ?>
      </div>
    <?php } ?>

    <div class="cart-check" id="cart-check">

      <table>
        <tr>
          <th>Название Абонемента</th>
          <th>Цена</th>
          <th>Статус заявки</th>
          <th></th>
        </tr>

        <?php
        if (!empty($_SESSION["shooping-cart"])) {
          $total = 0;
          foreach ($_SESSION["shooping-cart"] as $keys => $values) {?>
            <tr>
              <td><?= $values['item_label'] ?></td>
              <td><?= $values['item_price'] ?></td>

              <?php
              $name = $_SESSION['user_name'];
              $query = "SELECT * FROM `user_orders` WHERE `name` = '$name'";
              $query_run = mysqli_query($connect, $query);
              $row = mysqli_fetch_assoc($query_run);
              ?>
                  <td><?= (!empty($row['request']))?$row['request']:'' ?></td>
              <td> <a href="edit_profile.php?action=delete&id=<?= $values['item_id'] ?>"> <span>Убрать</span> </a> </td>
            </tr>
            <?php
          }
        }
        ?>
      </table>




    </div>
    <br> <br><br><br><form class="" action="edit_profile.php" method="post">
      <div class="btn-cart">
        <button type="submit" name="save_cart" class="edit_profile"><a  class="price">Отправить заявку</a></button>
      </div>
    </form>
  </div>




</body>
</html>
