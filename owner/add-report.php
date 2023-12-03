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
<form role="form" method="post">

<div class="form-group">
<label>Enter Checkup Date</label>
<input class="form-control" type="date" name="cdate" required autocomplete="off" />
</div>
<div class="form-group">
<label>Medical Report</label>
<input class="form-control" type="file" name="mreport" required autocomplete="off"  />
</div>
<div class="form-group">
<label>Enter Hospital Name</label>
<input class="form-control" type="text" name="hname" required autocomplete="off" />
</div>
<div class="form-group">
<label>Enter Patient Age</label>
<input class="form-control" type="text" name="age" required autocomplete="off" />
</div>
<div class="form-group">
<label>Enter Doctor's Name</label>
<input class="form-control" type="text" name="dname" required autocomplete="off" />
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
$user=$_SESSION['Id'];
$cdate=$_REQUEST['cdate'];
//$mreport=$_REQUEST['mreport'];
$hname=$_REQUEST['hname'];
$age=$_REQUEST['age'];
$dname=$_REQUEST['dname'];
$discrip=$_REQUEST['discrip'];
$pho=$_FILES['mreport']['name'];
 $photo=$cdate.$pho;
                $sourcePath = $_FILES['mreport']['tmp_name'];
                $targetPath = "record/".$photo;
                move_uploaded_file($sourcePath,$targetPath) ;
date_default_timezone_set("Asia/Kolkata");
$apply=date("Y-m-d");
$status="pending";
$query =mysql_query("insert into mrecord (cdate,mreport,hname,age,dname,discrip,uid) values ('$cdate','$photo','$hname','$age','$dname','discrip','$user')");
 echo '<script type="text/javascript">alert("Add Records");window.location=\'add_report.php\';</script>';
}
?>
<div class="col-md-8 col-md-offset-0">
               <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Check Records
                        </div>
                        <div class="panel-body">
                        <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Checkup Date</th>
											 <th>Medical Report</th>
                                            <th>Hospital</th>
											 <th>Age</th>
											  <th>Doctor</th>
											   <th>Discription</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
$user=$_SESSION['Id'];
//require_once("../config.php");
$query =mysql_query("select * from mrecord where uid='$user'");
         $records = mysql_num_rows($query);
		 $i=1;
while($row = mysql_fetch_array($query))
{
             ?>                                      
                                        <form role="form" method="post" action="admin_user_update.php">
										<tr class="odd gradeX">
                                            <td class="center"><?php echo $i;?></td>
                                            <td class="center"><?php echo $row['cdate'];?></td>
                                            <td class="center"><a href="report/<?php echo $row['mreport'];?>">Download</a></td>
                                            <td class="center"><?php echo $row['hname'];?></td>
                                            <td class="center"><?php echo $row['age'];?></td>
											<td class="center"><?php echo $row['dname'];?></td>
											<td class="center"><?php echo $row['discrip'];?></td>
                                          </form>
										   <td><a href="midsem_delete.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to delete?');"" >  <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button></td>
                                          
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
