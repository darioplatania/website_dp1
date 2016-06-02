<?php
include ('config.php');

// Check connection
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["nome"])) {
    $nomeErr = "Nome richiesto";
  } else {
    $nome = mysqli_real_escape_string($db, $_POST['nome']);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$nome)) {
      $nomeErr2 = "Inserire solo lettere o spazi bianchi";
    }
  }

  if (empty($_POST["cognome"])) {
    $cognomeErr = "Cognome richiesto";
  } else {
    $cognome = mysqli_real_escape_string($db, $_POST['cognome']);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$cognome)) {
      $cognomeErr2 = "Inserire solo lettere o spazi bianchi";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email richiesta";
  } else {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErrFormat = "Inserire l'email nel formato admin@example.com";
    }
  }

  if (empty($_POST['password'])) {
    $passwordErr = "Password richiesta";
  } else {
    $password = mysqli_real_escape_string($db, (md5($_POST['password'])));
  }

}

// attempt insert query execution
$sql = "INSERT INTO users (nome, cognome, email, password) VALUES ('$nome', '$cognome', '$email', '$password')";
if(mysqli_query($db, $sql)){
    echo "Registrazione avvenuta con successo";
    header("location: signin.php");
} else{
    echo "Oops abbiamo un errore! $sql. " . mysqli_error($db);
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
                      <input type="text" name="nome" id="nome" tabindex="1" class="form-control" placeholder="Nome" value="">
                      <?php echo "<p class='text-danger'>$nomeErr</p>";?>
                      <?php echo "<p class='text-danger'>$nomeErr2</p>";?>
                    </div>
                    <div class="form-group">
                      <input type="text" name="cognome" id="cognome" tabindex="2" class="form-control" placeholder="Cognome" value="">
                      <?php echo "<p class='text-danger'>$cognomeErr</p>";?>
                      <?php echo "<p class='text-danger'>$cognomeErr2</p>";?>
                    </div>
                    <div class="form-group">
                      <input type="email" name="email" id="email" tabindex="4" class="form-control" placeholder="Email">
                      <?php echo "<p class='text-danger'>$emailErr</p>";?>
                      <?php echo "<p class='text-danger'>$emailErrFormat</p>";?>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" id="password" tabindex="3" class="form-control" placeholder="Password">
                      <?php echo "<p class='text-danger'>$passwordErr</p>";?>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                          <input type="submit" name="login-submit" id="login-submit" tabindex="5" class="form-control btn btn-login" value="Iscriviti">
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
