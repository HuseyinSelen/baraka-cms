<?php
session_start();
if (isset($_SESSION['admins'])) {
  header("Location:index.php");
  exit;
}
require_once 'netting/class.crud.php';

$db = new crud();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HÜSEYİN SELEN CMS</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <base href="https://localhost/admin/nedmin/">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <style>
    .login-page {
      background: url(dmg/admins/wallpaper1.jpg) no-repeat center center fixed;
      background-size: cover;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
    }

    body {
      overflow: hidden;
    }

    .login-logo a {
      color: #ff6600;
    }
  </style>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="index2.html"><b>Hüseyin</b>CMS</a>
    </div>
    <div class="login-box-body">
      <p class="login-box-msg">Giriş yapmak için bilgilerinizi girin.</p>

      <?php


      if (isset($_COOKIE['adminsLogin'])) {
        $login = json_decode($_COOKIE['adminsLogin']);
      }

      if (isset($_POST['admins_login'])) {
        // Kullanıcı giriş fonksiyonu
        $sonuc = $db->adminsLogin(
          htmlspecialchars($_POST['admins_username']),
          htmlspecialchars($_POST['admins_pass']),
          @$_POST['remember_me']
        );

        if ($sonuc['status']) {


          header("Location:index.php");
          exit;
        } else { ?>
          <div class="alert alert-danger">
            Bilgilerinizi kontrol edin...
          </div>
      <?php
        }
      }

      ?>
      <form action="" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control"
            <?php
            if (isset($_COOKIE['adminsLogin'])) {
              echo 'value="' . $login->admins_username . '"';
            } else {
              echo 'placeholder="Kullanıcı Adı"';
            }
            ?>
            name="admins_username">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control"
            <?php
            if (isset($_COOKIE['adminsLogin'])) {
              echo 'value="' . $login->admins_pass . '"';
            } else {
              echo 'placeholder="Şifre"';
            }
            ?>
            name="admins_pass">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"
                  <?php
                  if (isset($_COOKIE['adminsLogin'])) {
                    echo 'checked';
                  }
                  ?>
                  name='remember_me'> Beni Hatırla
              </label>
            </div>
          </div>
          <div class="col-xs-4">
            <button type="submit" name="admins_login" class="btn btn-primary btn-block btn-flat">Giriş Yapın</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%'
      });
    });
  </script>
</body>

</html>