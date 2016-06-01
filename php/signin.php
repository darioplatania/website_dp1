<?php
   include("config.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,(md5($_POST['password'])));

      $sql = "SELECT id FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         header("location: welcome.php");
      }else {
         $error = "Si prega di inserire Username e Password";
      }
   }
?>
<html>
<head>

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <title>Print3d</title>
</head>
<body>
  <div class="container">
        <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="panel panel-login">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-12 col-md-8">
                  <a href="signup.php" id="register-form-link">Non sei ancora Registrato?</a>
                </div>
                <div class="col-xs-6 col-md-4">
                  <a href="../index.html" id="register-form-link">Home</a>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-xs-8">
                  <a href="#" class="active" id="login-form-link">Accedi</a>
                </div>
              </div>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-12">
                  <form id="login-form" action="" method="post" role="form" style="display: block;">
                    <div class="form-group">
                      <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                    </div>
                    <?php echo "<p class='text-danger'>$error</p>";?>
                    <div class="form-group text-center">
                      <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                      <label for="remember"> Remember Me</label>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                          <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>
