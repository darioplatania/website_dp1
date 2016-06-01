<?php

include ('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $nameErr = "Username richiesto";
  } else {
    $name = test_input($_POST["username"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email richiesta";
  } else {
    $email = test_input($_POST["email"]);
  }

  if (empty($_POST['password'])) {
    $passwordErr = "Password richiesta";
  } else {
    $password = test_input($_POST['password']);
  }
  //$query = "INSERT INTO users (username,password,email) VALUES ('$username','$password','$email')";
  //$data = mysql_query ($query)or die(mysql_error());
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
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
                <div class="col-xs-6">
                  <a href="signin.php" id="register-form-link">Accedi</a>
                </div>
                <div class="col-xs-6 col-md-4">
                  <a href="../index.html" id="register-form-link">Home</a>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-xs-8">
                  <a href="#" class="active" id="login-form-link">Registrati</a>
                </div>
              </div>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-12">
                  <form id="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" role="form" style="display: block;">
                    <div class="form-group">
                      <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                      <span class="error">* <?php echo $nameErr;?></span>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                      <span class="error">* <?php echo $passwordErr;?></span>
                    </div>
                    <div class="form-group">
                      <input type="email" name="email" id="email" tabindex="3" class="form-control" placeholder="Email">
                      <span class="error">* <?php echo $emailErr;?></span>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                          <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Iscriviti">
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
