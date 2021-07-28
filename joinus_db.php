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
$classidarray = explode('-', $_POST['classid']);
$classid      = $classidarray[0];
$intrestedsub = "";
if (isset($_POST['subcategory_id']))
{
foreach ($_POST['subcategory_id'] as $selectedOption)
$intrestedsub = $intrestedsub.$selectedOption.",";
}
$current_date = date('Y-m-d');	
$machine_id	  = $c_info->get_ip();
$os 		  = $c_info->get_os();
$browser 	  = $c_info->get_browser();
$device 	  = $c_info->get_device();


$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$postalcode = $_POST['postalcode'];

$classfees = $_POST['classfees'];
$individualsubjectfees = $_POST['individualsubjectfees'];
$feesamount ="";
if ($individualsubjectfees>0)
{
$feesamount = $individualsubjectfees;
}
else
{
$feesamount = $classfees;
}

/*new_user flag is set to P now. once we received responce from qpay after successfull payment it will be changed to Y*/	
$sql = "INSERT INTO users (name,father_name,education_qualification,phone_number,email_id,category_id,sub_category_ids,created_date,machine_id,os,browser,device,new_user) VALUES ('$studentname','$fathersname','$education','$phone','$emailid','$classid','$intrestedsub','$current_date','$machine_id','$os','$browser','$device','P')";
mysqli_query($con,$sql);

$last_insert_uid = mysqli_insert_id($con);

$ordersql = "INSERT INTO orders (user_id,testorlive,custname,address,city,state,country,postal_code,phone,email,mspreferenceid,responsecode,message,paymentmode,secure_hash,amount) VALUES ('$last_insert_uid','LIVE','$studentname','$address','$city','$state','$country','$postalcode','$phone','$emailid','0','0','0','0','0','$feesamount')";
mysqli_query($con,$ordersql);
$last_insert_oid = mysqli_insert_id($con);

header('location:paymentpage.php?orderid='.$last_insert_oid.'&userid='.$last_insert_uid);
}
?>