<?php
include ("usertop.php");
$user_id = $_SESSION['user_info']['user_id'];
$sql = "DELETE FROM test_processing WHERE  user_id = '$user_id' ";
mysqli_query($con,$sql);
?>
<ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="userdashboard.php">Home</a> <i class="fa fa-angle-right"></i></li>
</ol>
<!--four-grids here-->
<?php
if (isset($_SESSION['user_info']))
{
$user_id = $_SESSION['user_info']['user_id'];
$category_id = $_SESSION['user_info']['category_id'];
$sub_category_ids = $_SESSION['user_info']['sub_category_ids'];
}
?>
		<div class="four-grids">
					<div class="col-md-4 four-grid">
						<div class="four-agileits">
							<div class="icon">
								<i class="glyphicon glyphicon-user" aria-hidden="true"></i>							
							</div>
							<div class="four-text">
								<h3>Class</h3>
								<?php 
								$catquery = "SELECT c.* FROM `category` c WHERE c.category_id = '$category_id' ";
								$catresult=mysqli_query($con,$catquery);
								while($catrow=mysqli_fetch_array($catresult))
								{
									echo "<h4>".$catrow['category_name']."</h4>";
								}
								?>
							</div>
						</div>
					</div>
					<div class="col-md-4 four-grid">
						<div class="four-agileinfo">
							<div class="icon">
								<i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>							</div>
							<div class="four-text">
								<h3>Subjects</h3>
								<?php 
								$subcategory_name = "";
								$sub_category_ids=explode (",", $sub_category_ids);
								$total_subjects = 0;
								for ($i=0; $i<=sizeof($sub_category_ids); $i++)
								{
									$scat_id = $sub_category_ids[$i];
									$scatquery = "SELECT sc.* FROM sub_category sc WHERE sc.sub_category_id = '$scat_id'";
									$scatresult = mysqli_query($con,$scatquery);
									
									while($scatrow=mysqli_fetch_array($scatresult))
									{
										$subcategory_name = $subcategory_name.$scatrow['sub_category_name'].",";
									}	
									$total_subjects = $i;								
								}
								echo "<h4>".rtrim($subcategory_name,",")."</h4>";
								?>
							</div>
						</div>
					</div>
					<div class="col-md-4 four-grid">
						<div class="four-w3ls">
							<div class="icon">
								<i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i>							</div>
							<div class="four-text">
								<h3>Total Subjects</h3>
								<h4><?php echo $total_subjects-1; ?></h4>
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
include("userfooter.php");
?>