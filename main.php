<?php session_start(); ?>
<?php
require "connect_db.php";
$query = "SELECT * FROM `departments`";
$query_run = mysqli_query($connect, $query);
?>


<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
  <div class="First-block">
    <div class="FB-leftpic">
      <img src="pic/First-block-leftpic.png" width="550px" alt="">
    </div>

    <div class="FB-rightblock">
      <ul class="FB-menu">
        <li><a href="#" class="RB-del">О нас</a></li>
        <li><a href="#abonements">Наши тарифы</a></li>
        <li><a href="#auth" href="#auto">Авторизация</a></li>
        <li><a href="#reg" href="#reg"><div class="btn-Reg">Регистрация</div></a></li>
      </ul>

      <div class="RB-title">
        <p>Здоровье</p>
        <p>активность</p>
        <p>совершенство</p>
      </div>

      <div class="RB-text">
        <p>Вы и ваше здоровье только в ваших руках.
          Мы поможем вам в этом!
          Занимайтесь с нами, будьте в ритме жизни.
          Мы берем во внимание особенности вашего организма, телосложения и желаний.
        </p>
      </div>
    </div>
  </div>


  <div class="Second-block" id="auth">
    <div class="RB-title-second">
      <p>Будьте в темпе</p>
    </div>
    <div class="SB-main">
      <div class="RB-left-reg">
        <form class="" action="auth.php" method="post">
          <input type="text" placeholder="Имя" name="name" required>
          <input type="password" placeholder="Пароль" name="pswrd" required>
          <?php if ($_GET['errorAuth'] ?? "") {
            ?>
            <div class="error-message">
              <?php echo $_GET['errorAuth']; ?>
            </div>

          <?php } ?>



          <p> <a href="#reg" class="link-reg">У меня нет аккаунта</a> </p>

          <button type="submit" class="autobtn" name="authbtn">Авторизироваться</button>

        </form>
      </div>


      <div class="RB-right-pic">
        <img src="pic/girl3.png" width="470px" alt="">
      </div>
    </div>
  </div>


  <div class="Third-block" id="reg">
    <div class="RB-title-third">
      <p>Занимайтесь с нами</p>

    </div>

    <div class="TB-left-pic">
      <img src="pic/girl2.png"  alt="">
    </div>
    <div class="TB-right-reg">

      <form class="" action="check.php" method="post">

        <input type="text" placeholder="Имя и Фамилия" name="name" required>
        <input type="tel" placeholder="Номер телефона" name="tel" required>
        <?php if ($_GET['error'] ?? "") {
          ?>
          <div class="error-message">
            <?php echo $_GET['error']; ?>
          </div>

        <?php } else if (isset($_GET['errorEmpty']) ?? "") {
          ?>
          <div class="error-message">
            <?php echo $_GET['errorEmpty']; ?>
          </div>

        <?php } else if (isset($_GET['errorExtension']) ?? "") {
          ?>
          <div class="error-message">
            <?php echo $_GET['errorExtension']; ?>
          </div>

        <?php } else  if (isset($_GET['errorData']) ?? "") {
          ?>
          <div class="error-message">
            <?php echo $_GET['errorData']; ?>
          </div>
        <?php } ?>

        <input type="email" placeholder="Электронная почта" name="email" required>
        <input type="password" placeholder="Пароль" name="pswrd" required>

        <button type="submit" class="rgstrbtn" name="rgstr_btn">Зарегистрироваться</button>
      </form>

    </div>
  </div>

  <div class="Fourth-block">
    <div class="RB-title-second">
      <p>Тренируйтесь в ритме
        <br>вашей жизни</p>
      </div>

      <div class="Abonements" id="abonements">
        <?php
        while ($result = mysqli_fetch_assoc($query_run)) {

          echo ' <div class="Abonement-block">
          <div class="AB-text">
          <h2>Абонемент
          <br> '.$result["label"].'</h2>

          <ul>
          <li>'.$result["about1"].'</li>
          <li>'.$result["about2"].'</li>
          <li>'.$result["about3"].'</li>
          </ul>

          <h3>'.$result["price"].' рублей/год</h3>
          </div>

          <button type="submit" name="button" class="buybtn"><a href="#popup" class="link-buy">Купить</a></button>

          </div>';
        }
        ?>
      </div>
    </div>


    <div class="popup" id="popup">
      <div class="popup_body">
        <div class="popup_content">
          <a href="#abonements_close" class="popup_close">x</a>
          <div class="popup_title">Дорогой пользователь</div>
          <div class="popup_text">Чтобы купить тариф, вам стоит <a href="#auth">авторизироваться</a> или <a href="#reg">зарегистрироваться</a>.  </div>
        </div>
      </div>
    </div>

    <footer>
      <a href="admin/login.php">Панель администратора</a>
    </footer>
  </body>
  </html>
