<?php
//include("db.php"); 
session_start();
require('UserInfo.php');
$c_info = new UserInfo();
$machine_id	  = $c_info->get_ip();
$os 		  = $c_info->get_os();
$device 	  = $c_info->get_device();
$currentdate = date('Y-m-d H:i:s');

$con = mysqli_connect("localhost","root","","elearning");
//$con = mysqli_connect("localhost","manilearning","mypassword","maniel");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  } 


//$currentdate = date('Y-m-d H:i:s');
//echo $currentdate;
		$un=$_POST['adminusername'];
		$pass=$_POST['adminpassword'];
		
if ($un!="" && $pass!="")
{
	$adminquery = "SELECT * FROM admin WHERE BINARY `admin_username`='$un' AND BINARY `adin_password`='$pass' ";
	$adminresult = mysqli_query($con,$adminquery);
		if(mysqli_num_rows($adminresult))
		{
			$adminrow=mysqli_fetch_array($adminresult);
		    $_SESSION['admin_info']=$adminrow;
			header('location:admindashboard.php');
			exit;
		}
		else  
		{
			$userquery = "SELECT * FROM users WHERE BINARY `username`='$un' AND BINARY `password`='$pass' AND `machine_id` = '$machine_id' AND `os` = '$os' AND `device` = '$device' AND `expiration_date` >= '$currentdate' ";
			$userresult = mysqli_query($con,$userquery);
				if(mysqli_num_rows($userresult))
				{
					$userrow=mysqli_fetch_array($userresult);
					$_SESSION['user_info']=$userrow;
					header('location:userdashboard.php');
					exit;
				}
				else  
				{
					header('location:login.php?success=I');
				}
			//header('location:login.php?success=I');
		}
}
else
{
	header('location:login.php?success=B');
}
?>