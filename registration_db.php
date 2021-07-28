<?php
include("db_registration.php");
require('UserInfo.php');
$c_info = new UserInfo();

if (isset($_POST['register']))
{
$studentname  = $_POST['uname'];
$fathersname  = $_POST['fathersname'];
$education    = $_POST['education'];
$phone		  = $_POST['phone'];
$emailid      = $_POST['emailid'];
$classid      = $_POST['classid'];
$intrestedsub = "";
foreach ($_POST['subcategory_id'] as $selectedOption)
    $intrestedsub = $intrestedsub.$selectedOption.",";	
$current_date = date('Y-m-d');	
$machine_id	  = $c_info->get_ip();
$os 		  = $c_info->get_os();
$browser 	  = $c_info->get_browser();
$device 	  = $c_info->get_device();
	
	
$sql = "INSERT INTO users (name,father_name,education_qualification,phone_number,email_id,category_id,sub_category_ids,created_date,machine_id,os,browser,device,new_user) VALUES ('$studentname','$fathersname','$education','$phone','$emailid','$classid','$intrestedsub','$current_date','$machine_id','$os','$browser','$device','Y')";
mysqli_query($con,$sql);
header('location:registration.php?success=S');
}
?>