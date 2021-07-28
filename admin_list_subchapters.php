<?php
include ("top.php");
?>
<ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="admindashboard.php">Home</a><i class="fa fa-angle-right"></i>Listing Sub Chapters</li>
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
									<select name="chapter_id" id="chapter_id" class="form-control1" onchange="getsubchapterslisting(this.value);">
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
		<div class="display_subchapters" id="display_subchapters" style="height:600px; overflow:auto;">
		</div>
		<?php
		if (isset($_GET['chapter_id']))
		{
		?>				
			<div class="agile-grids">
			<!-- tables -->		
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h2>Sub Chapter Listing</h2>
					    <table id="table">
						<thead>
						  <tr>
							<th>Sub-Chapter Name</th>
							<th>Chapter Name</th>
						  	<th>Category Name</th>
							<th>Subject Name</th>
							<th>Action</th>
						  </tr>
						</thead>
						<tbody>
						<?php
						$chapter_id = $_GET['chapter_id'];
						$query = "SELECT sc.*,c.*,ch.*,sch.* FROM category c ,sub_category sc,chapters ch,sub_chapters sch  WHERE c.category_id = sc.category_id AND sc.sub_category_id = ch.sub_category_id AND ch.chapter_id = sch.chapter_id AND sch.chapter_id = '$chapter_id' ";
						$result = mysqli_query($con,$query);
						while($row=mysqli_fetch_array($result))
						{
						?>
						  <tr>
							<td><?php echo $row['sub_chaptername']; ?></td>
							<td><?php echo $row['chapter_name']; ?></td>
							<td><?php echo $row['category_name']; ?></td>
							<td><?php echo $row['sub_category_name']; ?></td>							
							<td><a href="admin_edit_subchapter.php?sub_chapter_id=<?php echo $row['sub_chapter_id']; ?>"><i class="fa fa-pencil-square-o" title="Edit Sub-Chapter"></i></a><span></span><a href="admin_remove_subchapter.php?sub_chapter_id=<?php echo $row['sub_chapter_id']; ?>"><i class="fa fa-trash" title="Remove Sub-Chapter"></i></a></td>
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