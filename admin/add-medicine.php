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
Add Records
</div>
<div class="panel-body">
<form role="form" method="post" enctype="multipart/form-data">

<div class="form-group">
<label>Medicine Name</label>
<input class="form-control" type="text" name="mname" required autocomplete="off" />
</div>
<div class="form-group">
<label>Medicine Photo</label>
<input class="form-control" type="file" name="mphoto" required autocomplete="off"  />
</div>
<div class="form-group">
<label>Medicine Type</label>
<input class="form-control" type="text" name="mtype" required autocomplete="off" />
</div>
<div class="form-group">
<label>Medicine Cost</label>
<input class="form-control" type="text" name="cost" required autocomplete="off" />
</div>
<div class="form-group">
<label>Medicine Exp. Date</label>
<input class="form-control" type="text" name="exp" required autocomplete="off" />
</div>
<div class="form-group">
<label>Medicine Purpose</label>
<input class="form-control" type="text" name="purpose" required autocomplete="off" />
</div>
<div class="form-group">
<label>Discription</label>
<textarea class="form-control" name="discrip" required autocomplete="off" /></textarea>
</div>
 <button type="submit" name="login" class="btn btn-info">Add Record </button>
</form>
 </div>
</div>
</div>
<?php 
if(isset($_POST['login']))
{
$mname=$_REQUEST['mname'];
$mtype=$_REQUEST['mtype'];
$cost=$_REQUEST['cost'];
$exp=$_REQUEST['exp'];
$purpose=$_REQUEST['purpose'];
$discrip=$_REQUEST['discrip'];
$pho=$_FILES['mphoto']['name'];
 $photo=$mname.$pho;
                $sourcePath = $_FILES['mphoto']['tmp_name'];
                $targetPath = "medicins/".$photo;
                move_uploaded_file($sourcePath,$targetPath) ;
date_default_timezone_set("Asia/Kolkata");
$apply=date("Y-m-d");
$status="pending";
$query =mysql_query("insert into medicins (mname,mtype,cost,exp,purpose,discrip,mphoto) values ('$mname','$mtype','$cost','$exp','$purpose','$discrip','$photo')");
 echo '<script type="text/javascript">alert("Add Records");window.location=\'add-medicine.php\';</script>';
}
?>
<div class="col-md-8 col-md-offset-0">
               <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           View Medicines
                        </div>
                        <div class="panel-body">
                        <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Medicine Name</th>
											<th>Photo</th>
											<th>Type</th>
											<th>Cost</th>
											<th>Exp.</th>
											<th>Purpose</th>
                                            <th>Discription</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
//require_once("../config.php");
$query =mysql_query("select * from medicins");
         $records = mysql_num_rows($query);
		 $i=1;
while($row = mysql_fetch_array($query))
{
             ?>                                      
                                        <form role="form" method="post" action="admin_user_update.php">
										<tr class="odd gradeX">
                                            <td class="center"><?php echo $i;?></td>
                                            <td class="center"><?php echo $row['mname'];?></td>
                                            <td class="center"><a href="medicins/<?php echo $row['midsem'];?>">Download</a></td>
                                            <td class="center"><?php echo $row['type'];?></td>
                                            <td class="center"><?php echo $row['cost'];?></td>
											<td class="center"><?php echo $row['exp'];?></td>
											<td class="center"><?php echo $row['purpose'];?></td>
											<td class="center"><?php echo $row['discrip'];?></td>
                                          </form>
										  <td><a href="medi_delete.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to delete?');"" >  <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button></td>
                                          
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
