<?php
include("db_registration.php");
extract($_POST);
//print_r($_POST);
$orderid = $_POST['MerchantOrderID'];
$MSPReferenceID = $_POST['MSPReferenceID'];
$ResponseCode = $_POST['ResponseCode'];
$Message = $_POST['Message'];
$PaymentMode = $_POST['PaymentMode'];
$TransactionType = $_POST['TransactionType'];

$sql = "UPDATE `orders` SET  `mspreferenceid` = '$MSPReferenceID' , `responsecode` = '$ResponseCode' , `message` = '$Message' , `paymentmode` = '$PaymentMode' WHERE `order_id` = '$orderid' ";
mysqli_query($con,$sql);

// If the payment is success then display success message or else display error message
header('location:paymentpagemessage.php?paymentcode='.$ResponseCode);
?>