<?php
include ("top.php");
?>
<ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="admindashboard.php">Home</a><i class="fa fa-angle-right"></i>Listing Categories</li>
</ol>
<?php
if ((isset($_GET['val']))&&($_GET['val']=='E'))
{
?>
<div class="alert alert-success" role="alert">
	Subject Edited <strong>successfully.</strong>
</div>
<?php
}
?>	
<?php
if ((isset($_GET['val']))&&($_GET['val']=='D'))
{
?>
<div class="alert alert-danger" role="alert">
	Subject removed <strong>successfully.</strong>
</div>
<?php
}
?>
				<?php
				if (!isset($_GET['category_id']))
				{
				?>	
					<div class="panel-body">	
						<div class="form-group">
							<label class="col-md-2 control-label">Select Category</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-smile-o"></i>
									</span>
									<select name="category_id" id="category_id" class="form-control1"  onchange="getsubcategorylisting(this.value);">
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
					</div>	
					
					<div class="display_subject" id="display_subject" style="height:600px; overflow:auto;">
					</div>
				<?php
				}
				?>
		
		<?php
		if (isset($_GET['category_id']))
		{
		?>				
			<div class="agile-grids">
			<!-- tables -->		
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h2>Subject Listing</h2>
					    <table id="table">
						<thead>
						  <tr>
							<th>Subject Name</th>
							<th>Subject Fees</th>
							<th>Category Name</th>
							<th>Action</th>
						  </tr>
						</thead>
						<tbody>
						<?php
						$category_id = $_GET['category_id'];
						$query = "SELECT sc.*,c.* FROM sub_category sc, category c WHERE sc.category_id = c.category_id AND c.category_id = '$category_id' ";
						$result = mysqli_query($con,$query);
						while($row=mysqli_fetch_array($result))
						{
						?>
						  <tr>
							<td><?php echo $row['sub_category_name']; ?></td>
							<td><?php echo $row['sub_category_fee']; ?></td>
							<td><?php echo $row['category_name']; ?></td>
							<td><a href="admin_list_chapters.php?sub_category_id=<?php echo $row['sub_category_id']; ?>"><i class="fa fa-eye" title="View Subjects"></i></a><span></span><a href="admin_edit_subcategory.php?sub_category_id=<?php echo $row['sub_category_id']; ?>"><i class="fa fa-pencil-square-o" title="Edit Subject"></i></a><span></span><a href="admin_remove_subcategory.php?sub_category_id=<?php echo $row['sub_category_id']; ?>"><i class="fa fa-trash" title="Remove Subject"></i></a></td>
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