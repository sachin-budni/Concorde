<?php
include ("db_user.php");

	if (isset($_GET['nextbtn']))
	{	
 		$user_id 	   = $_GET['user_id'];
		$testid 	   = $_GET['testid'];
		$choices 	   = $_GET['choices'];
		$pageno  	   = $_GET['pageno'];
		$subchapter_id = $_GET['subchapter_id'];
		$pageno = $pageno+1;
		
		$query = "SELECT * FROM test_processing WHERE test_id = '$testid' AND user_id = '$user_id' ";
		$result = mysqli_query($con,$query);
		if (mysqli_num_rows($result)==0)
		{														
			$sql = "INSERT INTO test_processing (test_id,selected_answer,user_id) VALUES ('$testid','$choices','$user_id')";
			mysqli_query($con,$sql);
		}
		else
		{
			$sql = "UPDATE `test_processing` SET `selected_answer` = '$choices'  WHERE `test_id` = '$testid' AND `user_id` = '$user_id' ";
			mysqli_query($con,$sql);
		}
		header('location:user_take_subchapter_test.php?subchapter_id='.$subchapter_id.'&pageno='.$pageno);
	}
	
	if (isset($_GET['resultbtn']))
	{
		$user_id 	   = $_GET['user_id'];
		$testid 	   = $_GET['testid'];
		$choices 	   = $_GET['choices'];
		$query = "SELECT * FROM test_processing WHERE test_id = '$testid' AND user_id = '$user_id' ";
		$result = mysqli_query($con,$query);
		if (mysqli_num_rows($result)==0)
		{														
			$sql = "INSERT INTO test_processing (test_id,selected_answer,user_id) VALUES ('$testid','$choices','$user_id')";
			mysqli_query($con,$sql);
		}
		else
		{
			$sql = "UPDATE `test_processing` SET `selected_answer` = '$choices'  WHERE `test_id` = '$testid' AND `user_id` = '$user_id' ";
			mysqli_query($con,$sql);
		}
		//header('location:user_test_result.php?subchapter_id='.$subchapter_id.'&user_id='.$user_id);
		header('location:user_test_result.php?user_id='.$user_id);
	}
?>