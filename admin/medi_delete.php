<?php
include('../config.php');
session_start();
$id=$_REQUEST['id'];
		 $query =mysql_query("delete from medicins where id=$id");     
				 echo '<script type="text/javascript">alert("delete Records");window.location=\'add-medicine.php\';</script>';
?>