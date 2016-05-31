<!-- Page Content -->
<?php
   include('session.php');
   $user = $_SESSION['login_user'];
?>

        <div class="row">
            <div class="col-lg-12">
              <h3>Le Prenotazioni di: <b><?php echo $user;?></b></h3>
            </div>
        </div>

<!-- /#page-content-wrapper -->
