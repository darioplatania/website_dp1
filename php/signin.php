<?php
   session_start();
?>

<html>
<head>

  <!-- Bootstrap Core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="../css/simple-sidebar.css" rel="stylesheet">

  <!-- Bootstrap JS -->
  <link href="../js/bootstrap.min.js" rel="stylesheet">

  <!-- Jquery -->
  <link href="../js/jquery.js" rel="stylesheet">

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
                  <a href="../index.php" id="register-form-link">Home</a>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-xs-8">
                  <a href="#" class="active" id="login-form-link">Accedi</a>
                </div>
              </div>
              <?php echo "<p class='text-danger'>$expiration</p>";?>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-12">
                  <form id="login-form" action="signin.php" method="post" role="form" style="display: block;">
                    <div class="form-group">
                      <input type="text" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" value="">
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

<?php
   include("config.php");

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $email = mysqli_real_escape_string($db,$_POST['email']);
      $password = mysqli_real_escape_string($db,(md5($_POST['password'])));

      $sql = "SELECT id FROM users WHERE email = '$email' and password = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);

      // If result matched $email and $password, table row must be 1 row
      if($count == 1) {
        $_SESSION['email']=$email;//here session is used and value of $email store in $_SESSION.
         header("location: ../index.php");
      }else {
         $error = "Si prega di inserire Email e Password";
         echo "<p align='center' class='text-danger'>$error</p>";
      }
   }

   //if(isset($_GET['Message'])){
    //$expiration = $_GET['Message'];
   //}
?>
