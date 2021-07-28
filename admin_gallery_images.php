<?php
include ("top.php");
if (isset($_GET['success']))
{
echo "<script language='javascript'>alert('Header image added successfully...!')</script>";
}
?>

				
				<div class="agile-grids">
				<!-- tables -->
				<div class="panel-body">
					<form role="form" class="form-horizontal" method="post" action="admin_gallery_images_db.php" enctype="multipart/form-data" >
						<div class="form-group">
							<label class="col-md-2 control-label">Enter Description</label>
							<div class="col-md-8">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<input type="text" class="form-control1" name="desc" id="desc">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label">Upload Photo</label>
							<input type="file" id="img" name="img">
					  	</div>
						
						
						<input class="btn btn-primary" type="submit" name="addimage" value="Add Image">
						
					</form>
	</div>
				
				<!-- //tables -->
			</div>
<!--//four-grids here-->
<!--agileinfo-grap-->
	<!--//agileinfo-grap-->
<!--photoday-section-->	
			
                        
            <div class="agile-grids">	
				<!-- tables -->
				<div class="panel-body">
					<h1>Existing Images</h1>
					<?php
					$query = "SELECT * FROM gallery_images ";
					$result = mysqli_query($con,$query);
					while($row=mysqli_fetch_array($result))
					{
					?>
					<div class="col-md-4">
					<img src="<?php echo $row['g_photoname']; ?>" style="width:600; height:300px;" alt=" " class="img-responsive" />
					<br/>
					<?php echo "<b>Description:</b> ".$row['g_desc'];?>
					<br/>			
					<?php echo "<a href='admin_gallery_image_remove.php?imgid=".$row['g_id']."'>Remove</a>";?>
					</div>
					<?php				
				    }
					?>	
					
				</div>
				
				<!-- //tables -->
			</div>
                        
                        
                    	
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