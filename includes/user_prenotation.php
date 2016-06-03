<!-- Page Content -->
<?php
  include ('config.php');
  $email = $_SESSION['email'];

  /*query per vedere se ci sono prenotazioni*/
  $sql = "SELECT * FROM prenotazioni WHERE prenotazione = '$email'";
  $result = mysqli_query($db,$sql);
  //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $active = $row['active'];
  $count = mysqli_num_rows($result);
  mysqli_close($db);
?>

        <div class="row">
            <div class="col-lg-12">
              <p><b><?php echo $email;?></b> hai <?php echo $count; ?> prenotazioni attive!</p>
            </div>
        </div>

<!-- /#page-content-wrapper -->
