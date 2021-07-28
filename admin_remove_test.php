<?php
include("db.php");
$result = mysqli_query($con,"SET NAMES utf8");
if (isset($_GET['test_id']))
{
$test_id= $_GET['test_id'];
$sql = "DELETE FROM test_file WHERE test_id = '$test_id' ";
mysqli_query($con,$sql);
header('location:admin_test_manual.php?val=D');
}
?>