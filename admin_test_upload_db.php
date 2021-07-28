<?php
include("db.php");
include("excel/reader.php");
$result = mysqli_query($con,"SET NAMES utf8");
if (isset($_POST['testupload']))
{
	if ((is_null($_POST['chapter_id']))||(empty($_POST['chapter_id'])))
	{
	 $chapter_id = 0;
	}
	else
	{
	 $chapter_id = $_POST['chapter_id'];
	}
	
	if ((is_null($_POST['sub_chapter_id']))||(empty($_POST['sub_chapter_id'])))
	{
	 $sub_chapter_id = 0;
	}
	else
	{
	 $sub_chapter_id = $_POST['sub_chapter_id'];
	}

$data = new Spreadsheet_Excel_Reader();
$data->setOutputEncoding('CP1251');
$data->read($_POST['testfile']);
for ($x = 1; $x <= count($data->sheets[0]["cells"]); $x++)
{
$question = mysqli_real_escape_string($con,$data->sheets[0]["cells"][$x][1]);
$option_A = $data->sheets[0]["cells"][$x][2];
$option_B = $data->sheets[0]["cells"][$x][3];
$option_C = $data->sheets[0]["cells"][$x][4];
$option_D = $data->sheets[0]["cells"][$x][5];
$option_link = $data->sheets[0]["cells"][$x][6];

$sql = "INSERT INTO test_file (chapter_id,sub_chapter_id,question,opt_a,opt_b,opt_c,opt_d,ex_video_link) VALUES ('$chapter_id','$sub_chapter_id','$question','$option_A','$option_B','$option_C','$option_D','$option_link')";
mysqli_query($con,$sql);
}
header('location:admin_test_upload.php?val=S');
}
?>