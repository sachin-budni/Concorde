<?php
include("db.php");
$result = mysqli_query($con,"SET NAMES utf8");
if (isset($_POST['saveuser']))
{
$userid = $_POST['userid'];
$uname = $_POST['uname'];
$fathersname = $_POST['fathersname'];
$education = $_POST['education'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$classid = $_POST['classid'];
foreach ($_POST['subcategory_id'] as $selectedOption)
    $intrestedsub = $intrestedsub.$selectedOption.",";
$expirationdate = $_POST['expirationdate'];
$login = $_POST['login'];
$loginpassword = $_POST['loginpassword'];

$sql = "UPDATE `users` SET `name` = '$uname' , `father_name` = '$fathersname' , `education_qualification` = '$education' , `phone_number` = '$phone' , `email_id` = '$email' , `category_id` = '$classid' , `sub_category_ids` = '$intrestedsub' , `expiration_date` = '$expirationdate' , `username` = '$login' , `password` = '$loginpassword' , `new_user` = 'N' WHERE `user_id` = '$userid' ";
mysqli_query($con,$sql);
header('location:sendingcredentialemail.php?userid='.$userid);
}
?>