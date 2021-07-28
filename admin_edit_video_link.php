<?php
include ("top.php");
?>
<ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="admindashboard.php">Home</a><i class="fa fa-angle-right"></i>Edit Video Link</li>
</ol>

<?php
$chapter_id = $_GET['chapter_id'];
$sub_chapter_id = $_GET['sub_chapter_id'];

$chapter_name="";
$sub_chapter_name="Chapter Level Video";
$link = "";

$query = "SELECT c.* FROM chapters c WHERE c.chapter_id = '$chapter_id' ";
$result = mysqli_query($con,$query);
while($row=mysqli_fetch_array($result))
{
$chapter_name=$row['chapter_name'];
}

if ($sub_chapter_id!='0')
{
$squery = "SELECT sc.* FROM sub_chapters sc WHERE sc.sub_chapter_id = '$sub_chapter_id' ";
$sresult = mysqli_query($con,$squery);
while($srow=mysqli_fetch_array($sresult))
{
$sub_chapter_name=$srow['sub_chaptername'];
}
}

$vquery = "SELECT vl.* FROM video_link vl WHERE vl.chapter_id = '$chapter_id' AND vl.sub_chapter_id = '$sub_chapter_id' ";
$vresult = mysqli_query($con,$vquery);
while($vrow=mysqli_fetch_array($vresult))
{
$link=$vrow['link'];
}

?>			
				<div class="agile-grids">
				<!-- tables -->	
				<div class="panel-body">
					<form role="form" class="form-horizontal" method="post" action="admin_edit_video_link_db.php"  >
					
						<div class="form-group">
							<label class="col-md-2 control-label">Select Chapter Name</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<input type="text" name="chapter" id="chapter" class="form-control1" value="<?php echo $chapter_name; ?>" disabled="disabled"/>
									
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
									<input type="text" name="subchapter" id="subchapter" class="form-control1" value="<?php echo $sub_chapter_name; ?>" disabled="disabled" />									
								</div>
							</div>
						</div>
						
						<input type="hidden" name="chapterid" id="chapterid" value="<?php echo $chapter_id; ?>" />
						<input type="hidden" name="subchapterid" id="subchapterid" value="<?php echo $sub_chapter_id; ?>" />
						
						<div class="form-group">
							<label class="col-md-2 control-label">Enter Video Link</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<input type="text" class="form-control1" name="videolink" id="videolink" value="<?php echo $link; ?>">
								</div>
							</div>
						</div>
						
						<input class="btn btn-primary" type="submit" name="linkupdate" value="Update Link">
						
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