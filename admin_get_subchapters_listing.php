<?php
include("db.php");

if(!empty($_POST["chapter_id"])) 
{
?>
	<div class="agile-grids">
			<!-- tables -->		
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h2>SubChapter Listing</h2>
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
						$chapter_id = $_POST['chapter_id'];
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