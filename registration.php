<?php
include ("db_registration.php");	
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Online Learning System Designed By Matrix Software Technologies</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Online Learning System Designed By Matrix Software Technologies" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="css/jquery-ui.css"> 
<!-- jQuery -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<script>
function getsubjects(val) {
var cat_array = val.split('-');
document.getElementById('display_fees').innerHTML = "Course Fees"+cat_array[1];
document.getElementById('classfees').value = cat_array[1];
	$.ajax({
	type: "POST",
	url: "registration_get_subject.php",
	data:'category_id='+val,
	success: function(data){
		$("#subcategory_id").html(data);
	}
	});
}

function getindividualfees(selectd)
{
var values = $('#subcategory_id').val();
//console.log(values);
//var individualsubject = values.split(',');
var individualfees=0;
	for (var i=0; i<values.length; i++)
	{
		del = values[i].split('-');
		individualfees = individualfees+parseInt(del[1]);
	}
	document.getElementById('display_fees').innerHTML = "Individual subject Fees"+individualfees;
}

</script>
</head> 
<body oncontextmenu="return false;">
	<div class="main-wthree">
	<div class="container">
	<div class="sin-w3-agile">
		<h2>Sign Up</h2>
		<?php
		if (isset($_GET['success']))
		{
			if ($_GET['success']=='I')
			{
		?>
				<div class="alert alert-success" role="alert">
					You will <strong>get your username and password </strong>via registered email.
				</div>
		<?php
			}
			if ($_GET['success']=='D')
			{
		?>
				<div class="alert alert-danger" role="alert">
					Please<strong> Try Again</strong>.
				</div>
		<?php
			}
			
		}
		?>
		<form action="registration_db.php" method="post">
			<div class="username">
				<span class="username">Name:</span>
				<input type="text" name="uname" id="uname" class="name" placeholder="" required="">
				<div class="clearfix"></div>
			</div>
			<div class="password-agileits">
				<span class="username">Father's Name:</span>
				<input type="text" name="fathersname" id="fathersname" class="name" placeholder="" required="">
				<div class="clearfix"></div>
			</div>
			<div class="password-agileits">
				<span class="username">Education:</span>
				<input type="text" name="education" id="education" class="name" placeholder="" required="">
				<div class="clearfix"></div>
			</div>
			<div class="password-agileits">
				<span class="username">Phone Number:</span>
				<input type="text" name="phone" id="phone" class="name" placeholder="" required="">
				<div class="clearfix"></div>
			</div>
			<div class="password-agileits">
				<span class="username">Email Id:</span>
				<input type="text" name="emailid" id="emailid" class="name" placeholder="" required="">
				<div class="clearfix"></div>
			</div>
			<div class="password-agileits">
				<span class="username">Select Class:</span>
				<select name="classid" id="classid" class="name" onChange="getsubjects(this.value);" >
				<option>Please Select Class</option>
				<?php
				$query = "SELECT * FROM category";
				$result = mysqli_query($con,$query);
				while($row=mysqli_fetch_array($result))
				{
				?>
				<option value="<?php echo $row['category_id']."-".$row['package_fees']; ?>"><?php echo $row['category_name']; ?></option>
				<?php
				}
				?>					
				</select>
				
			</div>
			<br>
			<div class="password-agileits">
				<span class="username">Select Subjects:</span>
				
				<select multiple="" class="name" name="subcategory_id[]" id="subcategory_id" onBlur="getindividualfees(this.value);" >
				<option>Please Select Subjects</option>
				</select>
				<div class="clearfix"></div>
			</div>
			<input type="hidden" name="classfees" id="classfees" value="" />
			<div class="display_fees" id="display_fees" style="height:100px; overflow:auto;">
			</div>
			
			<div class="login-w3">
					<input type="submit" class="login" value="Sign Up" name="register" id="register">
			</div>
			<div class="clearfix"></div>
		</form>
				<div class="back">
					<a href="index.html">Back to home</a>
				</div>
	</div>
	</div>
	</div>
</body>
</html>