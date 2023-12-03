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
Add Room
</div>
<div class="panel-body">
<form role="form" method="post" enctype="multipart/form-data">

<div class="form-group">
<label>Property Type</label>
<select name="ptype" class="contact_input" required="required">
									<option value="">Select</option>
									<option value="Room">Room</option>
                                    <option value="Apartment">Apartment</option>
									<option value="Flat">Flat</option>
									<option value="Hostel">Hostel</option>
									</select>
</div>
<div class="form-group">
<label>No of Room</label>
<input class="form-control" type="text" name="nom" required autocomplete="off"  />
</div>
<div class="form-group">
<label>Location</label>
<textarea class="form-control" name="location" required autocomplete="off" /></textarea>
</div>
<div class="form-group">
<label>Purpose</label>
<select name="purpose" class="contact_input" required="required">
									<option value="">Select</option>
									<option value="Rent">Rent</option>
                                    <option value="Sale">Sale</option>
									</select>
</div>
<div class="form-group">
<label>Room For</label>
<select name="mfor" class="contact_input" required="required">
									<option value="">Select</option>
									<option value="family">Family</option>
                                    <option value="Boys">Boys</option>
									 <option value="Girls">Girls</option>
									</select>
</div>
<div class="form-group">
<label>Size in ft</label>
<input class="form-control" type="text" name="sif" required autocomplete="off" />
</div>
<div class="form-group">
<label>Floor</label>
<input class="form-control" type="text" name="floor" required autocomplete="off" />
</div>
<div class="form-group">
<label>Rent</label>
<input class="form-control" type="text" name="rent" required autocomplete="off" />
</div>
<div class="form-group">
<label>Discription/Rules</label>
<textarea class="form-control" name="discrip" required autocomplete="off" /></textarea>
</div>
<div class="form-group">
<label>Photo</label>
<input class="form-control" type="file" name="mreport" required autocomplete="off" />
</div>
 <button type="submit" name="login" class="btn btn-info">Add Record </button>
</form>
 </div>
</div>
</div>
<?php 
if(isset($_POST['login']))
{
$user=$_SESSION['Id'];
$ptype=$_REQUEST['ptype'];
//$mreport=$_REQUEST['mreport'];
$nom=$_REQUEST['nom'];
$location=$_REQUEST['location'];
$purpose=$_REQUEST['purpose'];
$mfor=$_REQUEST['mfor'];
$sif=$_REQUEST['sif'];
$floor=$_REQUEST['floor'];
$rent=$_REQUEST['rent'];
$discrip=$_REQUEST['discrip'];
$pho=$_FILES['mreport']['name'];
 $photo=$user.$pho;
                $sourcePath = $_FILES['mreport']['tmp_name'];
                $targetPath = "record/".$photo;
                move_uploaded_file($sourcePath,$targetPath) ;
date_default_timezone_set("Asia/Kolkata");
$apply=date("Y-m-d");
$status="pending";
$query =mysql_query("insert into room (ptype,nom,location,purpose,mfor,sif,floor,rent,discrip,photo,uid,status,apply) values ('$ptype','$nom','$location','$purpose','$mfor','$sif','$floor','$rent','discrip','$photo','$user','$status','$apply')");
 echo '<script type="text/javascript">alert("Add Records");window.location=\'add_report.php\';</script>';
}
?>
<div class="col-md-8 col-md-offset-0">
               <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Check Rooms
                        </div>
                        <div class="panel-body">
                        <div class="table-responsive">
                                <div style="overflow-x:auto;">
								<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Photo</th>
											<th>Property Type</th>
											 <th>Rooms</th>
                                            <th>Location</th>
											 <th>Purpose</th>
											  <th>Room for</th>
											  <th>Size</th>
											  <th>Floor</th>
											  <th>Rent</th>
											   <th>Discription</th>
											   <th>Status</th>
											   <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
$user=$_SESSION['Id'];
//require_once("../config.php");
$query =mysql_query("select * from room where uid='$user'");
         $records = mysql_num_rows($query);
		 $i=1;
while($row = mysql_fetch_array($query))
{
             ?>                                      
                                        <form role="form" method="post" action="admin_user_update.php">
										<tr class="odd gradeX">
                                            <td class="center"><?php echo $i;?></td>
                                            <td class="center"><img src="record/<?php echo $row['photo'];?>" width="150px" height="150px"></td>
											<td class="center"><?php echo $row['ptype'];?></td>
                                            <td class="center"><?php echo $row['nom'];?></td>
                                            <td class="center"><?php echo $row['location'];?></td>
                                            <td class="center"><?php echo $row['purpose'];?></td>
											<td class="center"><?php echo $row['mfor'];?></td>
											<td class="center"><?php echo $row['sif'];?></td>
											<td class="center"><?php echo $row['floor'];?></td>
											<td class="center"><?php echo $row['rent'];?></td>
											<td class="center"><?php echo $row['discrip'];?></td>
											<td class="center"><?php echo $row['status'];?></td>
											<td class="center"><?php echo $row['apply'];?></td>
                                          </form>
										   <td><a href="report_delete.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to delete?');"" >  <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button></td>
                                          
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
