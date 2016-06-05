<?php
session_start();
/*se non è attiva la sessione mi rimanda alla index*/
if(!$_SESSION['email'])
{
    header('Location: ../index.php');
}
/*se è attiva la sessione, ma non si conosce il row_id mi rimanda alla index*/
elseif(!isset($_GET['delete_id'])){
    header('Location: ../index.php');
}
/*se è attiva la sessione e si conosce il row_id mi elimina la prenotazione*/
else{
 mysql_connect("localhost","root","california");
 mysql_select_db("print3D");
    if(isset($_GET['delete_id']))
    {
     $sql_query="DELETE FROM prenotazioni WHERE id=".$_GET['delete_id'];
     mysql_query($sql_query);
     header("Location: ../php/prenotazioni.php");
     }
}
?>
