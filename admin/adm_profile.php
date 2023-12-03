<?php 
session_start();
include('../config.php');
error_reporting(0);
if($_SESSION['login']!=''){
$_SESSION['login']='';
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title></title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<script type="text/javascript">
function valid()
{
if(document.signup.password.value!= document.signup.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.signup.confirmpassword.focus();
return false;
}
return true;
}
</script>
<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>    

</head>
<body>
    <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
             <div class="row">         
<div class="col-md-4 col-sm-4 col-md-offset-0" >
<div class="panel panel-info">
<div class="panel-heading">
 ADD ADMIN
</div>
<div class="panel-body">
<form role="form" method="post">

<div class="form-group">
<label>Enter Username</label>
<input class="form-control" type="text" name="username" required autocomplete="off" />
</div>
<div class="form-group">
<label>Password</label>
<input class="form-control" type="password" name="pass" required autocomplete="off"  />
</div>
<div class="form-group">
<label>Enter Name</label>
<input class="form-control" type="text" name="name" required autocomplete="off" />
</div>
<div class="form-group">
<label>Enter Email id</label>
<input class="form-control" type="text" name="email" required autocomplete="off" />
</div>
<div class="form-group">
<label>Enter Mobile</label>
<input class="form-control" type="text" name="mob" required autocomplete="off" />
</div>
 <button type="submit" name="login" class="btn btn-info">Register </button>
</form>
 </div>
</div>
</div>
<?php 
if(isset($_POST['login']))
{
$name=$_REQUEST['name'];
$username=$_REQUEST['username'];
$pass=$_REQUEST['pass'];
$mob=$_REQUEST['mob'];
$email=$_REQUEST['email'];
$query =mysql_query("insert into admin (username,pass,name,email,mob,status) values ('$username','$pass','$name','$email','$mob','active')");
 echo '<script type="text/javascript">alert("Add Records");window.location=\'adm_profile.php\';</script>';
}
?>
<div class="col-md-8 col-md-offset-0">
               <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Admin Listing
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
//require_once("../config.php");
$query =mysql_query("select * from admin");
         $records = mysql_num_rows($query);
		 $i=1;
while($row = mysql_fetch_array($query))
{
             ?>                                      
                                        <form role="form" method="post" action="admin_user_update.php">
										<tr class="odd gradeX">
                                            <td class="center"><input class="form-control" type="hidden" name="id" value="<?php echo $row['id'];?>"><?php echo $i;?></td>
                                            <td class="center"><input class="form-control" type="text" name="name" value="<?php echo $row['name'];?>"></td>
                                            <td class="center"><input class="form-control" type="text" name="email" value="<?php echo $row['email'];?>"></td>
                                            <td class="center"><input class="form-control" type="text" name="mob" value="<?php echo $row['mob'];?>"></td>
                                            <td class="center"><input class="form-control" type="text" name="username" value="<?php echo $row['username'];?>"></td>
                                            <td class="center"><input class="form-control" type="text" name="pass" value="<?php echo $row['pass'];?>"></td>
                                            <td class="center">

                                            <button class="btn btn-primary" name="s1"><i class="fa fa-edit "></i> Edit</button> 
                                          </form>
										  <a href="admin_user_delete.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to delete?');"" >  <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
                                            </td>
                                        </tr>
<?php
$i++;
} 
?>                                      
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                            </div>
        </div>
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
