<?php
include ("top.php");
?>
<ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="admindashboard.php">Home</a><i class="fa fa-angle-right"></i>New User Details</li>
</ol>
			<?php
			if (isset($_GET['user_id']))
			{
				$user_id  = $_GET['user_id'];
				$query = "SELECT u.* FROM users u WHERE u.user_id = '$user_id'";
				$result = mysqli_query($con,$query);
				while($row=mysqli_fetch_array($result))
				{
			?>	
				<div class="agile-grids">
				<!-- tables -->	
				<div class="panel-body">
					<form role="form" class="form-horizontal" method="get" action="admin_edit_user.php" enctype="multipart/form-data" >
						
						<input type="hidden" name="user_id" id="user_id" value="<?php echo $row['user_id']; ?>" />
						<div class="form-group">
							<label class="col-md-2 control-label">Student's Name</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<input type="text" disabled="disabled" class="form-control1" value="<?php echo $row['name']; ?>">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-2 control-label">Father's Name</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<input type="text" disabled="disabled" class="form-control1" value="<?php echo $row['father_name']; ?>">
								</div>
							</div>
						</div>
						
						
						<div class="form-group">
							<label class="col-md-2 control-label">Student's Education Qualification</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<input type="text" disabled="disabled" class="form-control1" value="<?php echo $row['education_qualification']; ?>">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-2 control-label">Student's Phone Number</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<input type="text" disabled="disabled" class="form-control1" value="<?php echo $row['phone_number']; ?>">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-2 control-label">Student's Email Id</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<input type="text" disabled="disabled" class="form-control1" value="<?php echo $row['email_id']; ?>">
								</div>
							</div>
						</div>
						<?php
							$categoryname = "";
							$category_id = $row['category_id'];
							$catquery = "SELECT c.* FROM category c WHERE c.category_id = '$category_id'";
							$catresult = mysqli_query($con,$catquery);
							while($catrow=mysqli_fetch_array($catresult))
							{
							$categoryname = $catrow['category_name'];
							}
						?>	
						<div class="form-group">
							<label class="col-md-2 control-label">Selected Class Name </label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<input type="text" disabled="disabled" class="form-control1" value="<?php echo $categoryname; ?>">
								</div>
							</div>
						</div>
						
						<?php
							$subcategory_name = "";
							$sub_category_ids=explode (",", $row['sub_category_ids']);
							for ($i=0; $i<=sizeof($sub_category_ids); $i++)
							{
								$scat_id = $sub_category_ids[$i];
								$scatquery = "SELECT sc.* FROM sub_category sc WHERE sc.sub_category_id = '$scat_id'";
								$scatresult = mysqli_query($con,$scatquery);
								
								while($scatrow=mysqli_fetch_array($scatresult))
								{
									$subcategory_name = $subcategory_name.$scatrow['sub_category_name'].",";
								}
								
							}
						?>
						<div class="form-group">
							<label class="col-md-2 control-label">Selected Subjects:</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<input type="text" disabled="disabled" class="form-control1" value="<?php echo rtrim($subcategory_name,","); ?>">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-2 control-label">Machine IP Address:</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<input type="text" disabled="disabled" class="form-control1" value="<?php echo $row['machine_id']; ?>">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-2 control-label">Machine OS:</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<input type="text" disabled="disabled" class="form-control1" value="<?php echo $row['os']; ?>">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-2 control-label">Browser Name:</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<input type="text" disabled="disabled" class="form-control1" value="<?php echo $row['browser']; ?>">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-2 control-label">Device Name:</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<input type="text" disabled="disabled" class="form-control1" value="<?php echo $row['device']; ?>">
								</div>
							</div>
						</div>
						
						<input class="btn btn-primary" type="submit" name="edituser" value="Edit User">
					</form>
				</div>
				<!-- //tables -->
				</div>
			<?php
				}
			}
			?>
<!--//four-grids here-->
<!--agileinfo-grap-->
	<!--//agileinfo-grap-->
<!--photoday-section-->
	<div class="clearfix"></div>
<!--//photoday-section-->	

<!--w3-agileits-pane-->	
<!--//w3-agileits-pane-->	

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
<div class="inner-block">

</div>
<!--inner block end here-->
</div>
</div>
  <!--//content-inner-->
<?php
include ("footer.php");
?>  