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

<div class="col-md-12 col-md-offset-0">
               <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           View Users
                        </div>
                        <div class="panel-body">
                        <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
											<th>Username</th>
											<th>gender</th>
											<th>dob</th>
											
											<th>mob</th>
                                            <th>address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
//require_once("../config.php");
$query =mysql_query("select * from user");
         $records = mysql_num_rows($query);
		 $i=1;
while($row = mysql_fetch_array($query))
{
             ?>                                      
                                        <form role="form" method="post" action="admin_user_update.php">
										<tr class="odd gradeX">
                                            <td class="center"><?php echo $i;?></td>
                                            <td class="center"><?php echo $row['name'];?></td>
                                            <td class="center"><?php echo $row['username'];?></td>
                                            <td class="center"><?php echo $row['gender'];?></td>
											<td class="center"><?php echo $row['dob'];?></td>
										
											<td class="center"><?php echo $row['mob'];?></td>
											<td class="center"><?php echo $row['addr'];?></td>
                                          </form>
										  <td><a href="user_delete.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to delete?');"" >  <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button></td>
                                          
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
