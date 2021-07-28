<?php
include("db.php");
$result = mysqli_query($con,"SET NAMES utf8");
if (isset($_POST['testupdate']))
{
$chapter_id = $_POST['chapter_id'];
$sub_chapter_id = $_POST['sub_chapter_id'];
$question = $_POST['question'];
$opta = $_POST['opta'];
$optb = $_POST['optb'];
$optc = $_POST['optc'];
$optd = $_POST['optd'];
$exlink = $_POST['exlink'];
$sql = "INSERT INTO test_file (chapter_id,sub_chapter_id,question,opt_a,opt_b,opt_c,opt_d,ex_video_link) VALUES ('$chapter_id','$sub_chapter_id','$question','$opta','$optb','$optc','$optd','$exlink')";
mysqli_query($con,$sql);

header('location:admin_test_manual.php?val=S');
}
?>