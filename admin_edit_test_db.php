<?php
include("db.php");
$result = mysqli_query($con,"SET NAMES utf8");
if (isset($_POST['edittestquestion']))
{
$test_id = $_POST['test_id'];

$chapter_id = $_POST['chapter_id'];
$sub_chapter_id =$_POST['sub_chapter_id'];
$question = $_POST['question'];
$opta = $_POST['opta'];
$optb = $_POST['optb'];
$optc = $_POST['optc'];
$optd = $_POST['optd'];
$exlink = $_POST['exlink'];

$sql = "UPDATE `test_file` SET `chapter_id` = '$chapter_id' ,  `sub_chapter_id` = '$sub_chapter_id' , `question` = '$question' , `opt_a` = '$opta' , `opt_b` = '$optb' , `opt_c` = '$optc' , `opt_d` = '$optd' , `ex_video_link` = '$exlink' WHERE `test_id` = '$test_id' ";
mysqli_query($con,$sql);
header('location:admin_test_manual.php?val=E');
}
?>