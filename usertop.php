<?php
include ("db_user.php");
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
<!-- jQuery -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<!-- tables -->
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<link rel="stylesheet" type="text/css" href="css/basictable.css" />
<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('#table').basictable();

      $('#table-breakpoint').basictable({
        breakpoint: 768
      });

      $('#table-swap-axis').basictable({
        swapAxis: true
      });

      $('#table-force-off').basictable({
        forceResponsive: false
      });

      $('#table-no-resize').basictable({
        noResize: true
      });

      $('#table-two-axis').basictable();

      $('#table-max-height').basictable({
        tableWrapper: true
      });
    });
</script>
<script type="text/javascript">
function check_choices_selected()
{
var choices = document.getElementsByName('choices');
var ischecked_method = false;
for ( var i = 0; i < choices.length; i++) {
    if(choices[i].checked) {
        ischecked_method = true;
        return true;
    }
}
if(!ischecked_method)   { //payment method button is not checked
    alert("Please select an answer");
	event.preventDefault();
}
}
</script>
<!-- //tables -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->

</head> 
<body oncontextmenu="return false;">
   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
               <!--header start here-->
				<div class="header-main">
					<div class="logo-w3-agile">
								<h1><a href="userdashboard.php">Learning</a></h1>
				  </div>
					<div class="w3layouts-left" style="background:none;">
							<div class="clearfix"> </div>
				  	</div>
						 <div class="w3layouts-right">
							<div class="profile_details_left"><!--notifications of menu start -->
								<ul class="nofitications-dropdown">
									<li class="dropdown head-dpdn">
									<?php 
										$totalquery = "SELECT COUNT(1) cnt FROM `users` ";
										$countquery=mysqli_query($con,$totalquery);
										$tot_cnt=mysqli_fetch_array($countquery);
									?>
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-user"></i><span class="badge"><?php echo $tot_cnt['cnt']; ?></span></a>
										<ul class="dropdown-menu">
											<li>
												<div class="notification_header">
													<h3><?php echo $tot_cnt['cnt']; ?> - Students</h3>
												</div>
											</li>
										</ul>
									</li>
									
									<li class="dropdown head-dpdn">
									<?php 
										$totalquery = "SELECT COUNT(1) video_cnt FROM `video_link` ";
										$countquery=mysqli_query($con,$totalquery);
										$tot_cnt=mysqli_fetch_array($countquery);
									?>
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-file-video-o"></i><span class="badge blue1"><?php echo $tot_cnt['video_cnt']; ?></span></a>
										<ul class="dropdown-menu">
											<li>
												<div class="notification_header">
													<h3><?php echo $tot_cnt['video_cnt']; ?> - Educational Videos</h3>
												</div>
											</li>
										</ul>
									</li>	
									
									<li class="dropdown head-dpdn">
									<?php 
										$totalquery = "SELECT COUNT(1) test_cnt FROM `test_file` GROUP BY sub_chapter_id ";
										$countquery=mysqli_query($con,$totalquery);
										$tot_cnt=mysqli_fetch_array($countquery);
									?>
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-pencil-square-o"></i><span class="badge blue"><?php echo $tot_cnt['test_cnt']; ?></span></a>
										<ul class="dropdown-menu">
											<li>
												<div class="notification_header">
													<h3><?php echo $tot_cnt['test_cnt']; ?> - Online Test</h3>
												</div>
											</li>
										</ul>
									</li>	
									
									<div class="clearfix"> </div>
								</ul>
								<div class="clearfix"> </div>
							</div>
							<!--notification menu end -->
							
							<div class="clearfix"> </div>				
						</div>
						<div class="profile_details w3l">		
								<ul>
									<li class="dropdown profile_details_drop">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<div class="profile_img">	
												<span class="prfil-img"><img src="images/defaultuser.jpg" alt=""> </span> 
												<div class="user-name">
												<?php
													if (isset($_SESSION['user_info']))
													{
														$user_id = $_SESSION['user_info']['user_id'];
														$query = "SELECT u.* FROM users u WHERE u.user_id = '$user_id'";
														$result = mysqli_query($con,$query);
														while($row=mysqli_fetch_array($result))
														{
														echo "<p>".$row['name']."</p>";
														echo "<span>".$row['education_qualification']."</span>";
														}
													}	
												?>												
												</div>
												<i class="fa fa-angle-down"></i>
												<i class="fa fa-angle-up"></i>
												<div class="clearfix"></div>	
											</div>	
										</a>
										<ul class="dropdown-menu drp-mnu">
											<li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> 
											<li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li> 
											<li> <a href="#"><i class="fa fa-sign-out"></i> Logout</a> </li>
										</ul>
									</li>
								</ul>
				  </div>
							
				     <div class="clearfix"> </div>	
				</div>
<!--heder end here-->