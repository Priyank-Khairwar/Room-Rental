<?php
if(isset($_POST['s1']))
{
include('../config.php');
session_start();
$id=$_REQUEST['id'];
$name=$_REQUEST['name'];
$username=$_REQUEST['username'];
$pass=$_REQUEST['pass'];
$mob=$_REQUEST['mob'];
$email=$_REQUEST['email'];
  //$con=mysql_connect("localhost","spctbgt","spctbgt@18");
    // mysql_select_db("spctbgt",$con);
		 $query =mysql_query("update admin set username='$username', pass='$pass',email='$email',mob='$mob',name='$name' where id=$id");     
				 echo '<script type="text/javascript">alert("Update Records");window.location=\'adm_profile.php\';</script>';
}
?>