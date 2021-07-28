<?php
include("db.php");

if(!empty($_POST["chapterid"])) 
{
?>
	<div class="agile-grids">
			<!-- tables -->		
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h2>Chapter Video</h2>
					    <table id="table">
						<thead>
						  <tr>
							<th>Chapter Name</th>
							<th>Video Link</th>
						  	<th>Action</th>
						  </tr>
						</thead>
						<tbody>
						
						<?php
						$chapter_id = $_POST['chapterid'];
						$query = "SELECT c.chapter_name, vl.* FROM chapters c ,video_link vl  WHERE c.chapter_id = vl.chapter_id AND c.chapter_id = '$chapter_id' AND vl.sub_chapter_id = '0' ";
						$result = mysqli_query($con,$query);
						while($row=mysqli_fetch_array($result))
						{
						?>
						  <tr>
							<td><?php echo $row['chapter_name']; ?></td>
							<td><?php echo $row['link']; ?></td>
							<td><a href="admin_edit_video_link.php?chapter_id=<?php echo $row['chapter_id']; ?>&sub_chapter_id=0"><i class="fa fa-pencil-square-o" title="Edit Chapter Link"></i></a><span></span><a href="admin_remove_link.php?chapter_id=<?php echo $row['chapter_id']; ?>&sub_chapter_id=0"><i class="fa fa-trash" title="Remove Chapter Link"></i></a></td>
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

<?php
if(!empty($_POST["chapterid"])) 
{
?>
	<div class="agile-grids">
			<!-- tables -->		
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h2>Sub-Chapter Videos</h2>
					    <table id="table">
						<thead>
						  <tr>
							<th>Sub Chapter Name</th>
							<th>Video Link</th>
						  	<th>Action</th>
						  </tr>
						</thead>
						<tbody>
						
						<?php
						$chapter_id = $_POST['chapterid'];
						$query = "SELECT sc.sub_chaptername, vl.* FROM chapters c ,sub_chapters sc, video_link vl  WHERE  c.chapter_id = sc.chapter_id AND sc.chapter_id = vl.chapter_id AND sc.sub_chapter_id = vl.sub_chapter_id AND  c.chapter_id = '$chapter_id' AND vl.sub_chapter_id <> '0' ORDER BY vl.sub_chapter_id";
						$result = mysqli_query($con,$query);
						while($row=mysqli_fetch_array($result))
						{
						?>
						  <tr>
							<td><?php echo $row['sub_chaptername']; ?></td>
							<td><?php echo $row['link']; ?></td>
							<td><a href="admin_edit_video_link.php?chapter_id=<?php echo $row['chapter_id']; ?>&sub_chapter_id=<?php echo $row['sub_chapter_id']; ?>"><i class="fa fa-pencil-square-o" title="Edit Sub-Chapter Link"></i></a><span></span><a href="admin_remove_link.php?chapter_id=<?php echo $row['chapter_id']; ?>&sub_chapter_id=<?php echo $row['sub_chapter_id']; ?>"><i class="fa fa-trash" title="Remove Sub-Chapter Link"></i></a></td>
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