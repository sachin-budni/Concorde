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
	Category Edited <strong>successfully.</strong>
</div>
<?php
}
?>	
<?php
if ((isset($_GET['val']))&&($_GET['val']=='D'))
{
?>
<div class="alert alert-danger" role="alert">
	Category removed <strong>successfully.</strong>
</div>
<?php
}
?>		
<div class="agile-grids">
				<!-- tables -->
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h2>Category Listing</h2>
					    <table id="table">
						<thead>
						  <tr>
							<th>Category Name</th>
							<th>Package Fees</th>
							<th>Action</th>
						  </tr>
						</thead>
						<tbody>
						<?php
						$query = "SELECT * FROM category";
						$result = mysqli_query($con,$query);
						while($row=mysqli_fetch_array($result))
						{
						?>
						  <tr>
							<td><?php echo $row['category_name']; ?></td>
							<td><?php echo $row['package_fees']; ?></td>
							<td><a href="admin_list_subcategory.php?category_id=<?php echo $row['category_id']; ?>"><i class="fa fa-eye" title="View Subjects"></i></a><span></span><a href="admin_edit_category.php?category_id=<?php echo $row['category_id']; ?>"><i class="fa fa-pencil-square-o" title="Edit Category"></i></a><span></span><a href="admin_remove_category.php?category_id=<?php echo $row['category_id']; ?>"><i class="fa fa-trash" title="Remove Category"></i></a></td>
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