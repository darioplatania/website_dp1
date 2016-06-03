<?php
   include('config.php');
   session_start();

   $user_check = $_SESSION['login_user'];

   $ses_sql = mysqli_query($db,"select email from user where email = '$user_check' ");

   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_session = $row['email'];

   /*funzione che mi rimanda al login dopo 120 secondi*/
   if (!isset($_SESSION['CREATED'])) {
    $_SESSION['CREATED'] = time();
   }
   else if (time() - $_SESSION['CREATED'] > 120)
   {
        // session started more than 2 minutes ago
        session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
        $_SESSION['CREATED'] = time();  // update creation time
        $Message = "Sessione scaduta si prega di loggarsi nuovamente";
        header("Location:signin.php"); //?Message=".$Message
   }
/*
   if(!isset($_SESSION['login_user'])){
      header("location:signin.php");
   }
*/
?>
