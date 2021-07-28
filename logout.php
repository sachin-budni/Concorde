<?php
include("db.php");
session_destroy();
echo "<script language='javascript'>alert('Log out successfully...!')</script>";
echo "<script language='javascript'>window.location.href='login.php'</script>";
//header('location:main.php');
exit;
?>