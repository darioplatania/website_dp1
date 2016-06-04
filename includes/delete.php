<?php
mysql_connect("localhost","root","california");
mysql_select_db("print3D");
if(isset($_GET['delete_id']))
{
 $sql_query="DELETE FROM prenotazioni WHERE id=".$_GET['delete_id'];
 mysql_query($sql_query);
 header("Location: ../php/prenotazioni.php");
}
?>
