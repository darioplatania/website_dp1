<?php
include ('php/session.php');
session_start();

if (!(isset($_SESSION['login_user']) && $_SESSION['login_user'] != '')) {
 header ("location: index.html");
 else {
   header ("location: php/welcome.php");
 }
}
?>
