<?php
include("db.php");

if(!empty($_POST["categoryid"])) 
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
						$category_id = $_POST['categoryid'];
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