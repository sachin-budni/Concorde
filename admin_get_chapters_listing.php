<?php
include("db.php");

if(!empty($_POST["subcategory_id"])) 
{
?>
	<div class="agile-grids">
			<!-- tables -->		
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h2>Chapter Listing</h2>
					    <table id="table">
						<thead>
						  <tr>
							<th>Chapter Name</th>
						  	<th>Category Name</th>
							<th>Subject Name</th>
							<th>Action</th>
						  </tr>
						</thead>
						<tbody>
						<?php
						$subcategory_id = $_POST['subcategory_id'];
						$query = "SELECT sc.*,c.*,ch.* FROM category c ,sub_category sc,chapters ch  WHERE c.category_id = sc.category_id AND sc.sub_category_id = ch.sub_category_id AND ch.sub_category_id = '$subcategory_id' ";
						$result = mysqli_query($con,$query);
						while($row=mysqli_fetch_array($result))
						{
						?>
						  <tr>
							<td><?php echo $row['chapter_name']; ?></td>
							<td><?php echo $row['category_name']; ?></td>
							<td><?php echo $row['sub_category_name']; ?></td>							
							<td><a href="admin_list_subchapters.php?chapter_id=<?php echo $row['chapter_id']; ?>"><i class="fa fa-eye" title="View Subjects"></i></a><span></span><a href="admin_edit_chapter.php?chapter_id=<?php echo $row['chapter_id']; ?>"><i class="fa fa-pencil-square-o" title="Edit Category"></i></a><span></span><a href="admin_remove_chapter.php?chapter_id=<?php echo $row['chapter_id']; ?>"><i class="fa fa-trash" title="Remove Category"></i></a></td>
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