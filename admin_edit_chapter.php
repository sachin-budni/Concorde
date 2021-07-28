<?php
include ("top.php");
?>
<ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="admindashboard.php">Home</a><i class="fa fa-angle-right"></i>Create Sub-Category</li>
</ol>
<?php
if ((isset($_GET['val']))&&($_GET['val']=='E'))
{
?>
<div class="alert alert-success" role="alert">
	Chapter edited <strong>successfully.</strong>
</div>
<?php
}
?>	
<?php
$chapter_id= $_GET['chapter_id'];
$chapterquery="SELECT * FROM `chapters` WHERE `chapter_id`='$chapter_id'";
$chapterresult = mysqli_query($con,$chapterquery);
while($chapterrow=mysqli_fetch_array($chapterresult))
{
?>				
				<div class="agile-grids">
				<!-- tables -->	
				<div class="panel-body">
					<form role="form" class="form-horizontal" method="post" action="admin_edit_chapter_db.php" enctype="multipart/form-data" >
						<input type="hidden" name="chapter_id" id="chapter_id" value="<?php echo $chapter_id; ?>">
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
									<option value="<?php echo $row['category_id']; ?>" <?php if ($chapterrow['category_id']==$row['category_id']) { echo "selected=select"; }?>><?php echo $row['category_name']; ?></option>
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
									<select name="subcategory_id" id="subcategory_id" class="form-control1">
									<option>Please Select Subjects</option>							
									</select>
								</div>
							</div>
						</div>
						
						
						<div class="form-group">
							<label class="col-md-2 control-label">Enter Chapter Name</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<input type="text" class="form-control1" name="chaptername" id="chaptername">
								</div>
							</div>
						</div>
						
						<input class="btn btn-primary" type="submit" name="editchapter" value="Edit Chapter">
						
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