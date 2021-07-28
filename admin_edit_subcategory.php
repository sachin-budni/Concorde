<?php
include ("top.php");
?>
<ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="admindashboard.php">Home</a><i class="fa fa-angle-right"></i>Create Sub-Category</li>
</ol>
<?php
if ((isset($_GET['val']))&&($_GET['val']=='S'))
{
?>
<div class="alert alert-success" role="alert">
	Category created <strong>successfully.</strong>
</div>
<?php
}
?>
<?php
$sub_category_id= $_GET['sub_category_id'];
$query="SELECT * FROM `sub_category` WHERE `sub_category_id`='$sub_category_id'";
$result = mysqli_query($con,$query);
while($row=mysqli_fetch_array($result))
{
?>	
				<div class="agile-grids">
				<!-- tables -->	
				<div class="panel-body">
					<form role="form" class="form-horizontal" method="post" action="admin_edit_subcategory_db.php" enctype="multipart/form-data" >
					
						<div class="form-group">
							<label class="col-md-2 control-label">Select Category</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<select name="category_id" id="category_id" class="form-control1">
									<option>Please Select Category</option>	
									<?php
									$catquery = "SELECT * FROM category";
									$catresult = mysqli_query($con,$catquery);
									while($catrow=mysqli_fetch_array($catresult))
									{
									?>
									<option value="<?php echo $catrow['category_id']; ?>" <?php if ($catrow['category_id']==$row['category_id']) { echo "selected=select"; }?> ><?php echo $catrow['category_name']; ?></option>
									<?php
									}
									?>									
									</select>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-2 control-label">Edit Subject Name</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<input type="text" class="form-control1" name="subcategoryname" id="subcategoryname" value="<?php echo $row['sub_category_name'] ?>">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-2 control-label">Edit Subject Fees</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<input type="text" class="form-control1" name="subcategoryfees" id="subcategoryfees" value="<?php echo $row['sub_category_fee'] ?>">
								</div>
							</div>
						</div>
						
						
						<input type="hidden" name="sub_category_id" id="sub_category_id" value="<?php echo $row['sub_category_id'] ?>">
						<input class="btn btn-primary" type="submit" name="editsubcategory" value="Edit Subjects">
						
					</form>
	</div>
				
				<!-- //tables -->
			</div>
<?php
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