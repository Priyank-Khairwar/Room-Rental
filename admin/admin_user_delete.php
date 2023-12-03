<?php
include('../config.php');
session_start();
$id=$_REQUEST['id'];
		 $query =mysql_query("delete from admin where id=$id");     
				 echo '<script type="text/javascript">alert("delete Records");window.location=\'adm_profile.php\';</script>';
?>