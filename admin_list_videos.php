<?php
include ("top.php");
?>
<ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="admindashboard.php">Home</a><i class="fa fa-angle-right"></i>Listing Videos</li>
</ol>
<?php
if ((isset($_GET['val']))&&($_GET['val']=='E'))
{
?>
<div class="alert alert-success" role="alert">
	Video link updated <strong>successfully.</strong>
</div>
<?php
}
?>	
<?php
if ((isset($_GET['val']))&&($_GET['val']=='D'))
{
?>
<div class="alert alert-danger" role="alert">
	Video link removed <strong>successfully.</strong>
</div>
<?php
}
?>
				<?php
				if (!isset($_GET['chapter_id']))
				{
				?>	
				<div class="panel-body">	
					<form role="form" class="form-horizontal" method="post" action="#" enctype="multipart/form-data" >
						<div class="form-group">
							<label class="col-md-2 control-label">Select Category</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<select name="category_id" id="category_id" class="form-control1"  onchange="getsubjects(this.value);">
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
									<option>Please Select Subjects</option>							
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
									<select name="chapter_id" id="chapter_id" class="form-control1" onchange="getvideolinks(this.value);">
									<option>Please Select Chapters</option>							
									</select>
								</div>
							</div>
						</div>
						
					</form>
				</div>	
				<?php
				}
				?>
		<div class="display_video_links" id="display_video_links" style="height:600px; overflow:auto;">
		
		
		</div>
		
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