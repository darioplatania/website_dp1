
<?php
session_start();
if(!$_SESSION['email'])
{
    include('../includes/prenotazioni_nolog.php');
}
else {
   include('../includes/prenotazioni_log.php');
}
?>
