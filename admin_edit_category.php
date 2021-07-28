<?php
include ("top.php");
?>
<ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="admindashboard.php">Home</a><i class="fa fa-angle-right"></i>Create Category</li>
</ol>
<?php
if ((isset($_GET['val']))&&($_GET['val']=='S'))
{
?>
<div class="alert alert-success" role="alert">
	Category edited <strong>successfully.</strong>
</div>
<?php
}
?>	

<?php
$category_id= $_GET['category_id'];
$query="SELECT * FROM `category` WHERE `category_id`='$category_id'";
$result = mysqli_query($con,$query);
while($row=mysqli_fetch_array($result))
{
?>
			<div class="agile-grids">
				<!-- tables -->	
				<div class="panel-body">
					<form role="form" class="form-horizontal" method="post" action="admin_edit_category_db.php" enctype="multipart/form-data" >
						<div class="form-group">
							<label class="col-md-2 control-label">Edit Category Name</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<input type="text" class="form-control1" name="categoryname" id="categoryname" value="<?php echo $row['category_name'] ?>">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Edit Package Fees</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<input type="text" class="form-control1" name="packagefees" id="packagefees" value="<?php echo $row['package_fees'] ?>">
								</div>
							</div>
						</div>
						
						<input type="hidden" name="categoryid" id="categoryid" value="<?php echo $row['category_id'] ?>">
						<input class="btn btn-primary" type="submit" name="editcategory" value="Edit Category">		
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