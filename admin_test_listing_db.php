<?php
include ("top.php");
?>
<ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="admindashboard.php">Home</a><i class="fa fa-angle-right"></i>View Questions</li>
</ol>
<?php
if ((isset($_GET['val']))&&($_GET['val']=='E'))
{
?>
<div class="alert alert-success" role="alert">
	Sub Chapter Edited <strong>successfully.</strong>
</div>
<?php
}
?>	
<?php
if ((isset($_GET['val']))&&($_GET['val']=='D'))
{
?>
<div class="alert alert-danger" role="alert">
	Chapter removed <strong>successfully.</strong>
</div>
<?php
}
?>
				
		<?php
		if (isset($_POST['viewtest']))
		{
			if ((is_null($_POST['chapter_id']))||(empty($_POST['chapter_id'])))
			{
			 $chapter_id = 0;
			}
			else
			{
			 $chapter_id = $_POST['chapter_id'];
			 $query_chapter = "SELECT * FROM chapters WHERE chapter_id = '$chapter_id' ";
			 $result_chapter = mysqli_query($con,$query_chapter);
			 while($row_chapter=mysqli_fetch_array($result_chapter))
			 {
			 	$chaptername = $row_chapter['chapter_name'];
			 }
			
			}
			
			if ((is_null($_POST['sub_chapter_id']))||(empty($_POST['sub_chapter_id'])))
			{
			 $sub_chapter_id = 0;
			}
			else
			{
			 $sub_chapter_id = $_POST['sub_chapter_id'];
			 $query_schapter = "SELECT * FROM sub_chapters WHERE sub_chapter_id = '$sub_chapter_id' ";
			 $result_schapter = mysqli_query($con,$query_schapter);
			 while($row_schapter=mysqli_fetch_array($result_schapter))
			 {
			 	$subchaptername = $row_schapter['sub_chaptername'];
			 }
			}
		?>				
			<div class="agile-grids">
			<!-- tables -->		
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h2><?php echo $chaptername.'-'.$subchaptername ?>Test Questions</h2>
					    <table id="table">
						<thead>
						  <tr>
						  	<th>Chapter Name</th>
							<th>Sub_chapter Name</th>
						  	<th>Questions</th>
							<th>Option A</th>
							<th>Option B</th>
							<th>Option C</th>
							<th>Option D</th>
							<th>Action</th>
						  </tr>
						</thead>
						<tbody>
						<?php
						$query = "SELECT tf.* FROM test_file tf  WHERE tf.chapter_id = '$chapter_id' AND tf.sub_chapter_id = '$sub_chapter_id' ";
						$result = mysqli_query($con,$query);
						while($row=mysqli_fetch_array($result))
						{
						?>
						  <tr>
							<td><?php echo $chaptername; ?></td>
							<td><?php echo $subchaptername; ?></td>
							<td><?php echo $row['question']; ?></td>
							<td><?php echo $row['opt_a']; ?></td>
							<td><?php echo $row['opt_b']; ?></td>
							<td><?php echo $row['opt_c']; ?></td>
							<td><?php echo $row['opt_d']; ?></td>																				
							<td><a href="admin_edit_test.php?test_id=<?php echo $row['test_id']; ?>"><i class="fa fa-pencil-square-o" title="Edit Question"></i></a><span></span><a href="admin_remove_test.php?test_id=<?php echo $row['test_id']; ?>"><i class="fa fa-trash" title="Remove Question"></i></a></td>
						  </tr>
						<?php
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
include ("footer.php");
?>  