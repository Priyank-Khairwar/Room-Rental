<?php 
session_start();
include('../config.php');
error_reporting(0);
//require_once("config.php");
// Start up the session...

// Check for the status of the current session...
//if(!isset($_SESSION['Id']))
{
	// if session is not active it will redirect the page to index page....

	//<script language="javascript" type="text/javascript">
	//window.location="../lke_admin.php?msg=expire";
	//</script>
	?>
<?php
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
<?php 
$user=$_SESSION['Id']; 
//require_once("../config.php");
$query =mysql_query("select * from user where id='$user'");
         $records = mysql_num_rows($query);
$row = mysql_fetch_array($query);

             ?>
<div class="panel-heading">
Welcome Mr/Mrs/Ms <?php echo $row['name'];?>
</div>
<div class="panel-body">
<form role="form" method="post">

<div class="form-group">
<label>Username</label>
<?php echo $row['username'];?>
</div>
<div class="form-group">
<label>DOB</label>
<?php echo $row['dob'];?>
</div>
<div class="form-group">
<label>Email</label>
<?php echo $row['username'];?>
</div>
<div class="form-group">
<label>Mobile No</label>
<?php echo $row['mob'];?>
</div>
<div class="form-group">
<label>Gender</label>
<?php echo $row['mob'];?>
</div>
</form>
 </div>
</div>
</div>
<div class="col-md-8 col-md-offset-0">
               <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Profile
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <form name="signup" method="post" enctype="multipart/form-data">
<div class="form-group">
<div class="row">
<div class="col-md-6">
<label>Enter Full Name</label>
<input class="form-control" type="text" name="name" value="<?php echo $row['name'];?>" autocomplete="off" required />
</div>
 
<div class="col-md-3">                                      
<label>Enter Gender</label>
<select class="form-control" type="text" name="gender" autocomplete="off" required />
<option value="<?php echo $row['gender'];?>"><?php echo $row['gender'];?></option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</div>
<div class="col-md-3">                                      
<label>Enter DOB</label>
<input class="form-control" type="date" name="dob" value="<?php echo $row['dob'];?>" autocomplete="off" required />
</div>
</div>
</div>

<div class="form-group">
<div class="row">
<div class="col-md-3">
<label>Mobile Number :</label>
<input class="form-control" type="text" name="mob" value="<?php echo $row['mob'];?>" autocomplete="off" required />
</div>
 
<div class="col-md-6">                                      
<label>Enter Email</label>
<input class="form-control" type="email" name="email" id="emailid" value="<?php echo $row['username'];?>" onBlur="checkAvailability()"  autocomplete="off" required  />
   <span id="user-availability-status" style="font-size:12px;"></span> 
</div>
</div>
</div>

 <div class="form-group">
<label>Enter Address</label>
<textarea class="form-control" name="addr" required autocomplete="off" /><?php echo $row['addr'];?></textarea>
</div>
                              
<button type="submit" id="s33" name="s33" class="btn btn-info" id="submit">Update Now </button>

                                    </form>
<?php 
if(isset($_POST['s33']))
{
$id=$_SESSION['Id']; 
$name=$_REQUEST['name'];
$gender=$_REQUEST['gender'];
$dob=$_REQUEST['dob'];
$desig=$_REQUEST['desig'];
$mob=$_REQUEST['mob'];
$email=$_REQUEST['email'];
$enroll=$_REQUEST['enroll'];
$addr=$_REQUEST['addr'];
       date_default_timezone_set("Asia/Kolkata");
$apply=date("d-m-Y H:i:s");
$status="confirm";
$query =mysql_query("update teacher set usename='$enroll',email='$email',mob='$mob',gender='$gender',dob='$dob',desig='$desig',name='$name' where id=$id");
 echo '<script type="text/javascript">alert("Add Records");window.location=\'teacher_profile.php\';</script>';
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
