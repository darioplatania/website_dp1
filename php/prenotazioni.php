<?php
include('config.php');
include('session.php');

if(!isset($_SESSION['login_user'])){
   include('../includes/prenotazioni_nolog.php');
}
else {
   include('../includes/prenotazioni_log.php');
} ?>
