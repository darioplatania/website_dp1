<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include ('config.php');
//$link = mysqli_connect("localhost", "root", "california", "print3D");

// Check connection
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $usernameErr = "Username richiesto";
  } else {
    $username = mysqli_real_escape_string($db, $_POST['username']);

  }

  if (empty($_POST["email"])) {
    $emailErr = "Email richiesta";
  } else {
    $email = mysqli_real_escape_string($db, $_POST['email']);


  }

  if (empty($_POST['password'])) {
    $passwordErr = "Password richiesta";
  } else {
    $password = mysqli_real_escape_string($db, (md5($_POST['password'])));
  }
  //$query = "INSERT INTO users (username,password,email) VALUES ('$username','$password','$email')";
  //$data = mysql_query ($query)or die(mysql_error());
}

// Escape user inputs for security
//$username = mysqli_real_escape_string($db, $_POST['username']);
//$password = mysqli_real_escape_string($db, $_POST['password']);
//$email = mysqli_real_escape_string($db, $_POST['email']);

// attempt insert query execution
$sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
if(mysqli_query($db, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}

// close connection
mysqli_close($db);
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
                      <?php echo "<p class='text-danger'>$usernameErr</p>";?>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                      <?php echo "<p class='text-danger'>$passwordErr</p>";?>
                    </div>
                    <div class="form-group">
                      <input type="email" name="email" id="email" tabindex="3" class="form-control" placeholder="Email">
                      <?php echo "<p class='text-danger'>$emailErr</p>";?>
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
