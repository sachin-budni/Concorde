<?php
include ("top.php");
?>
<ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="admindashboard.php">Home</a><i class="fa fa-angle-right"></i>Edit User</li>
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
					<form role="form" class="form-horizontal" method="post" action="admin_edit_user_db.php" enctype="multipart/form-data" >
						
						<input type="hidden" name="userid" id="userid" value="<?php echo $row['user_id']; ?>" />
						<div class="form-group">
							<label class="col-md-2 control-label">Student's Name</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<input type="text" name="uname" id="uname" class="form-control1" value="<?php echo $row['name']; ?>">
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
									<input type="text" name="fathersname" id="fathersname" class="form-control1" value="<?php echo $row['father_name']; ?>">
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
									<input type="text" name="education" id="education" class="form-control1" value="<?php echo $row['education_qualification']; ?>">
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
									<input type="text" name="phone" id="phone" class="form-control1" value="<?php echo $row['phone_number']; ?>">
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
									<input type="text" name="email" id="email" class="form-control1" value="<?php echo $row['email_id']; ?>">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-2 control-label">Selected Class Name </label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<select name="classid" id="classid" class="name" onChange="getsubjects(this.value);">
									<option>Please Select Class</option>
									<?php
									$catquery = "SELECT * FROM category";
									$catresult = mysqli_query($con,$catquery);
									while($catrow=mysqli_fetch_array($catresult))
									{
									?>
									<option value="<?php echo $catrow['category_id']; ?>"><?php echo $catrow['category_name']; ?></option>
									<?php
									}
									?>					
									</select>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-2 control-label">Selected Subjects:</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<select multiple="" class="name" name="subcategory_id[]" id="subcategory_id">
									<option>Please Select Subjects</option>
									</select>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-2 control-label">Set Login Name</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<input type="text" name="login" id="login" class="form-control1" value="<?php echo $row['username']; ?>">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-2 control-label">Set Password:</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<input type="text" name="loginpassword" id="loginpassword" class="form-control1" value="<?php echo $row['password']; ?>">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-2 control-label">Set Expiration Date:</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<input type="date" name="expirationdate" id="expirationdate" class="form-control1 ng-invalid ng-invalid-required" ng-model="model.date" required="" value="<?php echo $row['expiration_date']; ?>">
								</div>
							</div>
						</div>
						<input class="btn btn-primary" type="submit" name="saveuser" value="Save and Send Email">
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