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
if ((isset($_GET['val']))&&($_GET['val']=='E'))
{
?>
<div class="alert alert-success" role="alert">
	Test question edited <strong>Successfully.</strong>
</div>
<?php
}
?>

<?php
if ((isset($_GET['val']))&&($_GET['val']=='D'))
{
?>
<div class="alert alert-danger" role="alert">
	Test question removed <strong>Successfully.</strong>
</div>
<?php
}
?>	
			
				<div class="agile-grids">
				<!-- tables -->	
				<div class="panel-body">
					<form role="form" class="form-horizontal" method="post" action="admin_test_manual_db.php"  >
					
						<div class="form-group">
							<label class="col-md-2 control-label">Select Category</label>
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
							<label class="col-md-2 control-label">Select Subjects</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<select name="subcategory_id" id="subcategory_id" class="form-control1" onchange="getchapters(this.value);">
									<option value="">Please Select Subjects</option>							
									</select>
								</div>
							</div>
						</div>
						
						
						<div class="form-group">
							<label class="col-md-2 control-label">Select Chapter Name</label>
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
							<label class="col-md-2 control-label">Select Sub-Chapter Name</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<select name="sub_chapter_id" id="sub_chapter_id" class="form-control1">
									<option value="0">Please Select Sub-Chapters</option>
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
									<input type="text" class="form-control1" name="question" id="question">
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
									<input type="text" class="form-control1" name="opta" id="opta">
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
									<input type="text" class="form-control1" name="optb" id="optb">
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
									<input type="text" class="form-control1" name="optc" id="optc">
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
									<input type="text" class="form-control1" name="optd" id="optd">
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
									<input type="text" class="form-control1" name="exlink" id="exlink">
								</div>
							</div>
						</div>
						
						<input class="btn btn-primary" type="submit" name="testupdate" value="Update Test Question">
						
					</form>
	</div>
				
				<!-- //tables -->
			</div>
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