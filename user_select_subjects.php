<?php
include ("usertop.php");
$user_id = $_SESSION['user_info']['user_id'];
$sql = "DELETE FROM test_processing WHERE  user_id = '$user_id' ";
mysqli_query($con,$sql);
?>
<ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="userdashboard.php">Home</a><i class="fa fa-angle-right"></i>Learning</li>
</ol>
<?php
if (isset($_SESSION['user_info']))
{
$sub_category_ids = rtrim($_SESSION['user_info']['sub_category_ids'],",");
}
?>			
				<div class="agile-grids">
				<!-- tables -->	
				<div class="panel-body">
					<form role="form" class="form-horizontal" method="post" action="user_list_chapters.php"  >
					
						<div class="form-group">
							<label class="col-md-2 control-label">Select Subjects</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<select name="sub_category_id" id="sub_category_id" class="form-control1">
									<option>Please Select Subject</option>	
									<?php 
									$sub_category_ids=explode (",", $sub_category_ids);
									for ($i=0; $i<=sizeof($sub_category_ids); $i++)
									{
										$scat_id = $sub_category_ids[$i];
										$scatquery = "SELECT sc.* FROM sub_category sc WHERE sc.sub_category_id = '$scat_id'";
										$scatresult = mysqli_query($con,$scatquery);
										
										while($scatrow=mysqli_fetch_array($scatresult))
										{
									?>
									<option value="<?php echo $scatrow['sub_category_id']; ?>"><?php echo $scatrow['sub_category_name']; ?></option>
									<?php		
										}	
										$total_subjects = $i;								
									}
									echo "<h4>".rtrim($subcategory_name,",")."</h4>";
									?>							
									</select>
								</div>
							</div>
						</div>
						
						
						<input class="btn btn-primary" type="submit" name="selectsubject" value="Proceed">
						
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
include ("userfooter.php");
?>  