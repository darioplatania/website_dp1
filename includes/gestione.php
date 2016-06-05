
<?php
session_start();
include ('config.php');

/*se non è attiva la sessione mi rimanda alla index*/
if(!$_SESSION['email'])
{
    header('Location: ../index.php');
}

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// define variables and set to empty values
$oraErr = $minutiErr = $durataErr = $macchinaErr = $prenotazioneErr = "";
$ora = $minuti = $durata = $macchina = $prenotazione = "";

/*define hours,minute and number of machine*/
$ora = date("H");
$minuti = date("i");
$macchina = (rand(1,4));

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $valid = true;

  //echo $a[$random_keys[3]];

  /*controllo ora*
  if (empty($_POST["ora"])) {
    $oraErr = "Inserirsci l'ora";
    $valid = false;
  } else {
    $ora = test_input($_POST["ora"]);
  }

  /*controllo minuti*
  if (empty($_POST["minuti"])) {
    $minutiErr = "Inserisci i Minuti";
    $valid = false;
  } else {
    $minuti = test_input($_POST["minuti"]);
  }
  */

  /*controllo durata*/
  if (empty($_POST["durata"])) {
    $durataErr = "Inserisci durata";
    $valid = false;
  } else {
    $durata = test_input($_POST["durata"]);
    if (!preg_match("/^^[0-9]{0,3}/",$durata)) {
      $durataErr = "Inserire solo numeri";
      $valid = false;
    }
  }

  /*controllo macchina*/
  /*
  if (empty($_POST["macchina"])) {
    $macchinaErr = "Inserisci numero Macchina";
    $valid = false;
  } else {
    $macchina = test_input($_POST['macchina']);
  }
  */
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

      if(($sql_ora == $ora) && ($sql_minuti == $minuti)){
        $imposs = "Oops abbiamo un errore!";
      }
      else{
      $sql = "INSERT INTO prenotazioni (ora, minuti, durata, macchina, prenotazione) VALUES ('$ora', '$minuti', '$durata', '$macchina', '$email')";
      if(mysqli_query($db, $sql))
       {
          $success = "Prenotazione inserita con successo";
          echo "
            <script type=\"text/javascript\">
            setTimeout(function () { location.reload(true); }, 250);
            </script>
        ";
       }
      else
       {
         $danger = "Oops abbiamo un errore!";
       }
       // close connection
       mysqli_close($db);
     }
  }
?>

<br><br>
<?php echo "<p class='text-success'>$success</p>";?>
<?php echo "<p class='text-danger'>$imposs</p>";?>
<div class="row">
    <div class="col-lg-12">
      <h4>Gestione Prenotazioni</h4>
      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal">
        Aggiungi Prenotazioni
      </button>

      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Aggiungi Prenotazione</h4>
              <?php echo "<p class='text-danger'>$danger</p>";?>
            </div>
            <div class="col-md-offset-2">
             <p class='text-danger'>La macchina verrà selezionata in maniera automatica dal sistema!</p>
           </div>
            <div class="modal-body">
              <div class="panel-body">
                <div class="row">
                  <div class="col-xs-4">
                    <form id="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" role="form" style="display: block;">
                      <!--<div class="form-group">
                        <p>Ora Corrente</p>
                        <input type="text" name="ora" id="ora"  tabindex="1" class="form-control" placeholder="Ora" value="<?php echo $ora;?>:<?php echo $minuti;?>">
                      </div>
                    -->
                      <div class="form-group">
                        <input type="email" name="prenotazione" id="prenotazione" tabindex="1" class="form-control" value="<?php echo $email;?>" disabled>
                      </div>
                      <div class="form-group">
                        <input type="number" name="durata" id="durata" min="0" max="999" tabindex="2" class="form-control" placeholder="Durata (in minuti)">
                        <?php echo "<p class='text-danger'>$durataErr</p>";?>
                      </div>
                      <!--
                      <div class="form-group">
                        <input type="number" name="macchina" id="macchina" tabindex="3" class="form-control" value="<?php echo $macchina;?>" disabled>
                      </div>
                    -->
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <a type="button" class="btn pull-left"  data-dismiss="modal">Close</a>
              <button type="submit" name="login-submit" id="login-submit" tabindex="6" class="btn btn-primary pull-left" value="Iscriviti">Inserisci Prenotazione</button>
            </div>
          </div>
        </div>
      </div>
      <br><br>
    </div>
</div>
