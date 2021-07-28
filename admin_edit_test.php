<?php
include ("top.php");
?>
<ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="admindashboard.php">Home</a><i class="fa fa-angle-right"></i>Upload Test File</li>
</ol>
<?php
if ((isset($_GET['val']))&&($_GET['val']=='S'))
{
?>
<div class="alert alert-success" role="alert">
	Test question updated <strong>Successfully.</strong>
</div>
<?php
}
?>		
<?php
$test_id= $_GET['test_id'];
$testquery="SELECT * FROM `test_file` WHERE `test_id`='$test_id'";
$testresult = mysqli_query($con,$testquery);
while($testrow=mysqli_fetch_array($testresult))
{
?>			
				<div class="agile-grids">
				<!-- tables -->	
				<div class="panel-body">
					<form role="form" class="form-horizontal" method="post" action="admin_edit_test_db.php"  >
						<input type="hidden" name="test_id" id="test_id" value="<?php echo $test_id; ?>">
						<div class="form-group">
							<label class="col-md-2 control-label">Reselect Category</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<select name="category_id" id="category_id" class="form-control1" onchange="getsubjects(this.value);">
									<option>Please Select Category</option>	
									<?php
									$query = "SELECT * FROM category";
									$result = mysqli_query($con,$query);
									while($row=mysqli_fetch_array($result))
									{
									?>
									<option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
									<?php
									}
									?>									
									</select>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-2 control-label">Reselect Subjects</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<select name="subcategory_id" id="subcategory_id" class="form-control1" onchange="getchapters(this.value);">
									<option>Please Select Subjects</option>							
									</select>
								</div>
							</div>
						</div>
						
						
						<div class="form-group">
							<label class="col-md-2 control-label">Reselect Chapter Name</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<select name="chapter_id" id="chapter_id" class="form-control1" onchange="getsubchapters(this.value);">
									<option value="">Please Select Chapters</option>
									</select>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-2 control-label">Reselect Sub-Chapter Name</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<select name="sub_chapter_id" id="sub_chapter_id" class="form-control1">
									<option value="">Please Select Sub-Chapters</option>
									</select>
								</div>
							</div>
						</div>
						
						
						<div class="form-group">
							<label class="col-md-2 control-label">Enter Question</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<input type="text" class="form-control1" name="question" id="question" value="<?php echo $testrow['question']; ?>">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-2 control-label">Enter Option A (This should be the correct answer)</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<input type="text" class="form-control1" name="opta" id="opta" value="<?php echo $testrow['opt_a']; ?>">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-2 control-label">Enter Option B</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<input type="text" class="form-control1" name="optb" id="optb" value="<?php echo $testrow['opt_b']; ?>">
								</div>
							</div>
						</div>
						
						
						<div class="form-group">
							<label class="col-md-2 control-label">Enter Option C</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<input type="text" class="form-control1" name="optc" id="optc" value="<?php echo $testrow['opt_c']; ?>">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-2 control-label">Enter Option D</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<input type="text" class="form-control1" name="optd" id="optd" value="<?php echo $testrow['opt_d']; ?>">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-2 control-label">Enter example link</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<input type="text" class="form-control1" name="exlink" id="exlink" value="<?php echo $testrow['ex_video_link']; ?>">
								</div>
							</div>
						</div>
						
						<input class="btn btn-primary" type="submit" name="edittestquestion" value="Save Changes">
						
					</form>
	</div>
				
				<!-- //tables -->
			</div>
<!--//four-grids here-->
<?php
}
?>
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