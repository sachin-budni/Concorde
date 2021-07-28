<?php
include ("usertop.php");
?>
<ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="userdashboard.php">Home</a><i class="fa fa-angle-right"></i>Listing Chapters</li>
</ol>

		<?php
		if (isset($_POST['sub_category_id']))
		{
		?>				
			<div class="agile-grids">
			<!-- tables -->		
			<a data-aos="fade-up" href="#" data-toggle="modal" data-target="#exampleModal" role="button">watch video <i class="fas fa-play-circle"></i></a>
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h2>Chapter Listing</h2>
					    <table id="table">
						<thead>
						  <tr>
						  	<th>Subject Name</th>
							<th>Chapter Name</th>
							<th>Sub Chapters</th>
							<th>Videos</th>
							<th>Test</th>
						  </tr>
						</thead>
						<tbody>
						<?php
						$sub_category_id = $_POST['sub_category_id'];
						//$query = "SELECT sc.*,ch.*,sch.* FROM sub_category sc,chapters ch, sub_chapters sch  WHERE sc.sub_category_id = ch.sub_category_id AND ch.chapter_id = sch.chapter_id AND sc.sub_category_id = '$sub_category_id' ";
						$query = "SELECT sc.*,ch.* FROM sub_category sc,chapters ch WHERE sc.sub_category_id = ch.sub_category_id AND sc.sub_category_id = '$sub_category_id' ";
						$result = mysqli_query($con,$query);
						$i=1;
						while($row=mysqli_fetch_array($result))
						{
						$chapter_id = $row['chapter_id'];
						?>
						  <tr>
							<td><?php echo $row['sub_category_name']; ?></td>
							<td><?php echo "<b>".$i.".".$row['chapter_name']."</b>"; ?></td>
							<td><a href="user_list_subchapters.php?chapter_id=<?php echo $row['chapter_id']; ?>&chapternumber=<?php echo $i; ?>" class="btn btn-primary">View Sub-Chapters</a></td>
						<?php
							$video_query = "SELECT vl.* FROM video_link vl WHERE vl.chapter_id = '$chapter_id' ";
							$video_result = mysqli_query($con,$video_query);
							if (mysqli_num_rows($video_result)==0)
							{
							echo "<td><a class='btn btn-primary' style='background:red;'>Video Not Found</a></td>";
							}
							else
							{	
								while($video_row=mysqli_fetch_array($video_result))
								{
						?>	
							<td><a data-aos="fade-up" href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">View Videos</a></td>
<!-- video Modal Popup -->
<div class="modal fade" id="exampleModal<?php echo $row['chapter_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document" >
		<div class="modal-content" >
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><?php echo "<b>".$row['chapter_name']."</b>"; ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><b>&times;</b></span>
				</button>	
			</div>
			<div class="modal-body video modal-lg">
				<video controls preload="none" poster="images/videothumbnail.jpg" class="modal-lg">
				  <source type="video/mp4" width="700" height="550">
				  Sorry, your browser doesn't support the video element.
				</video>
				<!--<iframe src="https://player.vimeo.com/video/43982091"></iframe>-->
			</div>
		</div>
	</div>
</div>
<!-- //video Model Popup -->							
							
						<?php
								}
							}
						?>	
						
						<?php
							$test_query = "SELECT tf.* FROM  test_file tf WHERE tf.chapter_id = '$chapter_id' AND tf.sub_chapter_id	 = '0' ";
							$test_result = mysqli_query($con,$test_query);
							if (mysqli_num_rows($test_result)==0)
							{
							echo "<td><a class='btn btn-primary' style='background:red;'>Test Not Uploaded</a></td>";
							}
							else
							{	
						?>	
							<td><a href="user_take_chapter_test.php?chapter_id=<?php echo $row['chapter_id']; ?>" class="btn btn-primary">Take Test</a></td>
						<?php
							}
						?>		
						  </tr>  				  
						<?php
    				    $i=$i+1;
						}
						?>  
						</tbody>
					  </table>
					</div>
				</div>
			<!-- //tables -->
			</div>
			<?php
			}
			?>
			

			
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