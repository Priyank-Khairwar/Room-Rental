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

</div>

<div class="col-md-8 col-md-offset-0">
               <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Change Password
                        </div>
                        <div class="panel-body">
                           <div class="my-form">
						   <form role="form" method="post" enctype="multipart/form-data">

<div class="form-group">
<label>Current Password</label>
<input class='form-control' type="password" name="cpass" id="cpass"  required>
</div>
<div class="form-group">
<label>New Password</label>
<input class='form-control' type="password" name="password" id="password"  required>
<input type="checkbox" onclick="myFunction()">Show Password
<script>
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</div>
<div class="form-group">
<label>Confirm Password</label>
<input class='form-control' type="password" name="confirm_password" id="confirm_password"  required>
</div>
 <button class="btn btn-danger" type='submit' id="submit" name="submit" style="font-size:12px;">Change Password</button>
</form> 
<script>
    var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
  </script>
  <?php
if(isset($_POST['submit']))
{
$cpass=$_POST['cpass'];
$npass=$_POST['password'];
$user=$_SESSION['Id'];  
$query =mysql_query("select * from admin where id='$user'");
         $records = mysql_num_rows($query);
while($row = mysql_fetch_array($query)) 
{
$pass=$row['pass'];

if($pass==$cpass)    
{
$sql =mysql_query("Update admin set pass='".$npass."' where id='$user'");

echo '<script type="text/javascript">alert("Password Updated Succesfully");window.location=\'adm_profile.php\';</script>';
}else
{
echo '<script type="text/javascript">alert("wrong current password ");window.location=\'change_pass.php\';</script>';
}
}
}
?>
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