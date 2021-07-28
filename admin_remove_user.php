<?php
include("db.php");
$result = mysqli_query($con,"SET NAMES utf8");
if (isset($_GET['user_id']))
{
$user_id= $_GET['user_id'];
$sql = "DELETE FROM users WHERE  user_id = '$user_id' ";
mysqli_query($con,$sql);
	if (isset($_GET['return']))
	{
	header('location:admin_list_oldusers.php?val=D');	
	}
	else
	{
	header('location:admin_list_newusers.php?val=D');	
	}
}
?>