<?php
include ("top.php");
?>
<ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="admindashboard.php">Home</a> <i class="fa fa-angle-right"></i></li>
</ol>
<?php
if ((isset($_GET['val']))&&($_GET['val']=='E'))
{
?>
<div class="alert alert-success" role="alert">
	User Edited <strong>Successfully.</strong>
</div>
<?php
}
?>	
<?php
if ((isset($_GET['emailsuccess']))&&($_GET['emailsuccess']=='Y'))
{
?>
<div class="alert alert-danger" role="alert">
	Credentials emailed <strong>Successfully.</strong>
</div>
<?php
}
?>
	
<!--four-grids here-->
		<div class="four-grids">
					<div class="col-md-3 four-grid">
						<div class="four-agileits">
							<div class="icon">
								<i class="glyphicon glyphicon-user" aria-hidden="true"></i>							</div>
							<div class="four-text">
								<h3>User</h3>
								<?php 
								$totalquery = "SELECT COUNT(1) cnt FROM `users` ";
								$countquery=mysqli_query($con,$totalquery);
								$tot_cnt=mysqli_fetch_array($countquery);
								?>
								<h4> <?php echo $tot_cnt['cnt']; ?>  </h4>
							</div>
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-agileinfo">
							<div class="icon">
								<i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>							</div>
							<div class="four-text">
								<h3>Classes</h3>
								<?php 
								$totalquery = "SELECT COUNT(1) cat_cnt FROM `category` ";
								$countquery=mysqli_query($con,$totalquery);
								$tot_cnt=mysqli_fetch_array($countquery);
								?>
								<h4><?php echo $tot_cnt['cat_cnt']; ?></h4>
							</div>
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-w3ls">
							<div class="icon">
								<i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i>							</div>
							<div class="four-text">
								<h3>Subjects</h3>
								<?php 
								$totalquery = "SELECT COUNT(1) scat_cnt FROM `sub_category` ";
								$countquery=mysqli_query($con,$totalquery);
								$tot_cnt=mysqli_fetch_array($countquery);
								?>
								<h4><?php echo $tot_cnt['scat_cnt']; ?></h4>
							</div>
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-wthree">
							<div class="icon">
								<i class="glyphicon glyphicon-briefcase" aria-hidden="true"></i>							</div>
							<div class="four-text">
								<h3>Videos</h3>
								<?php 
								$totalquery = "SELECT COUNT(1) video_cnt FROM `video_link` ";
								$countquery=mysqli_query($con,$totalquery);
								$tot_cnt=mysqli_fetch_array($countquery);
								?>
								<h4><?php echo $tot_cnt['video_cnt']; ?></h4>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
		 </div>
<!--//four-grids here-->

<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block"></div>
<!--inner block end here-->
</div>
</div>
  <!--//content-inner-->
<?php
include("footer.php");
?>