<?php
include ('config.php');
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// define variables and set to empty values
$nomeErr = $cognomeErr = $emailErr = $passwordErr = "";
$nome = $cognome = $email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $valid = true;

  /*controllo nome*/
  if (empty($_POST["nome"])) {
    $nomeErr = "Inserirsci il Nome";
    $valid = false;
  } else {
    $nome = test_input($_POST["nome"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$nome)) {
      $nomeErr = "Solo lettere o spazi bianchi";
      $valid = false;

    }
  }

  /*controllo cognome*/
  if (empty($_POST["cognome"])) {
    $cognomeErr = "Inserisci il Cognome";
    $valid = false;
  } else {
    $cognome = test_input($_POST["cognome"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$cognome)) {
      $cognomeErr = "Solo lettere o spazi bianchi";
      $valid = false;
    }
  }

  /*controllo email*/
  if (empty($_POST["email"])) {
    $emailErr = "Inserirsci l'Email";
    $valid = false;
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Formato Email non valido! (admin@example.com)";
      $valid = false;
    }
  }

  /*controllo password*/
  if (empty($_POST["password"])) {
    $passwordErr = "Inserisci la Password";
    $valid = false;
  } else {
    $password = test_input((md5($_POST['password'])));
  }
}

/*Sanitize data*/
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//if valid then redirect
  if($valid)
  {
    $sql = "INSERT INTO users (nome, cognome, email, password) VALUES ('$nome', '$cognome', '$email', '$password')";
    if(mysqli_query($db, $sql))
     {
        $success = "Registrazione avvenuta con successo";
        //header("refresh:5;location: signin.php");
        echo "<script>window.open('signin.php','_self')</script>";
     }
    else
     {
       $danger = "Oops abbiamo un errore! $sql. " . mysqli_error($db);
     }
     // close connection
     mysqli_close($db);
  }
  //else
  //{
    //echo "no";
  //}
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
                  <a href="../index.php" id="register-form-link">Home</a>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-xs-8">
                  <a href="#" class="active" id="login-form-link">Registrati</a>
                </div>
              </div>
            </div>
            <?php echo "<p class='text-success'>$success</p>";?>
            <?php echo "<p class='text-danger'>$danger</p>";?>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-12">
                  <form id="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" role="form" style="display: block;">
                    <div class="form-group">
                      <input type="text" name="nome" id="nome" tabindex="1" class="form-control" placeholder="Nome">
                      <?php echo "<p class='text-danger'>$nomeErr</p>";?>

                    </div>
                    <div class="form-group">
                      <input type="text" name="cognome" id="cognome" tabindex="2" class="form-control" placeholder="Cognome">
                      <?php echo "<p class='text-danger'>$cognomeErr</p>";?>

                    </div>
                    <div class="form-group">
                      <input type="email" name="email" id="email" tabindex="3" class="form-control" placeholder="Email">
                      <?php echo "<p class='text-danger'>$emailErr</p>";?>

                    </div>
                    <div class="form-group">
                      <input type="password" name="password" id="password" tabindex="4" class="form-control" placeholder="Password">
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
