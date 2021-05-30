<?php
session_start();
include('includes/header.php');
?>

<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-6 col-lg-6 col-md-6">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-12">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Добро пожаловать</h1>
                </div>

                <form class="user" action="code_login.php" method="post">
                  <?php if ($_GET['errorAuth'] ?? "") {
                    ?>
                    <div class="error-message">
                      <?php echo $_GET['errorAuth']; ?>
                    </div>

                  <?php } ?>
                  <div class="form-group">
                    <input type="email" name="auth_email" class="form-control form-control-user"
                    id="exampleInputEmail" aria-describedby="emailHelp"
                    placeholder="Введите Email">
                  </div>
                  <div class="form-group">
                    <input type="password" name="auth_pswrd" class="form-control form-control-user"
                    id="exampleInputPassword" placeholder="Введите пароль">
                  </div>
                  <button type="submit" class="btn btn-primary btn-user btn-block" name="login_btn">Войти</button>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>
<?php
include('includes/scripts.php');
?>
