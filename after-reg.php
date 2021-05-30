<?php
session_start();
require "connect_db.php";
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <script type="js/jquery-3.6.0.min.js"  type="text/javascript"></script>
  <script src="js/main.js" type="text/javascript"></script>
</head>
<body>
  <div class="First-block">
    <div class="FB-leftpic">
      <img src="pic/After-block-leftpic.png" width="650px" alt="">
    </div>

    <div class="FB-rightblock">
      <ul class="FB-menu">
        <li><a href="#tarif">Наши тарифы</a></li>
        <li><a href="#services">Услуги</a></li>
        <li><a href="profile.php"><div class="btn-Reg">Мой профиль</div></a></li>
      </ul>

      <div class="RB-title">
        <p>Добро пожаловать</p>
        <p>в наш клуб</p>
      </div>

      <div class="RB-text">
        <p>Приветствуем вас в нашем фитнес клубе!
          Выберите тариф, удовлетворяющий вашим желаниям и потребностям.
          Мы рады, что вы с нами!
        </p>
        <p>Чтобы узнать всю интересующую вас информацию, вы можете либо позвонить по нашему номеру телефона,
          либо зайти в свой профиль.
        </p>
        <p>Выберите желаемые вами тариф, перейдите в личный кабинет, оформите карту и вы с нами!
        </p>
      </div>
    </div>
  </div>

  <div class="service-block" id="services">
    <div class="center">
      <p>Посмотрите своими глазами</p>
    </div>
    <div class="carusel">
      <div class="carusel-container">
        <div class="carusel-slide">
          <img src="pic/carusel-fitnes/second_fit.png" alt="" class="carusel-pic">
          <img src="pic/carusel-fitnes/third_fit.png" alt="" class="carusel-pic">
          <img src="pic/carusel-fitnes/fourth_fit.png" alt="" class="carusel-pic">
          <img src="pic/carusel-fitnes/fifth_fit.png" alt="" class="carusel-pic">
          <img src="pic/carusel-fitnes/first_fit.png" alt="" class="carusel-pic">
        </div>
      </div>
    </div>
    <div class="btn-carusel">
      <button class="btn-carusel-left"><img class="pic-btn-carusel" src="pic/carusel-fitnes/left.png" alt=""></button>
      <button class="btn-carusel-right"><img class="pic-btn-carusel" src="pic/carusel-fitnes/right.png" alt=""></button>
    </div>

  </div>

  <?php



  ?>

  <div class="Fourth-block">
    <div class="RB-title-second">
      <p>Тренируйтесь в ритме
        <br>вашей жизни</p>
      </div>
      <?php  if (isset($_GET['success_message']) ?? "") {
        ?>
        <div class="success-message">
          <?php echo $_GET['success_message']; ?>
        </div>
      <?php } ?>

      <?php
      $query = "SELECT * FROM `departments`";
      $query_run = mysqli_query($connect, $query);
      while ($result = mysqli_fetch_assoc($query_run)) {?>
        <div class="Abonement-block">
          <form class="" action="edit_profile.php?action=add&id=<?= $result["id"] ?>" method="post">
            <div class="Abonements" id="tarif">
              <div class="AB-text">
                <h2>Абонемент
                  <br> <?= $result["label"]?></h2>

                  <ul>
                    <li> <?= $result["about1"]?></li>
                    <li> <?= $result["about2"]?></li>
                    <li> <?= $result["about3"]?></li>
                  </ul>

                  <h3> <?= $result["price"]?> рублей/год</h3>
                  <input type="hidden" name="label" value="<?= $result["label"]?>" />
                  <input type="hidden" name="price" value="<?= $result["price"]?>" />
                </div>
                <input type="submit" name="add_to_cart" value="В корзину" class="buybtn_after">
              </div>
            </form>
          </div>
          <?php
        }
        ?>




      </div>



    </body>
    </html>
