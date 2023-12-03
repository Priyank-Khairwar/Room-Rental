<?php
include('../config.php');
session_start();
$id=$_REQUEST['id'];
		 $query =mysql_query("delete from room where id=$id");     
				 echo '<script type="text/javascript">alert("delete Records");window.location=\'add_report.php\';</script>';
?>