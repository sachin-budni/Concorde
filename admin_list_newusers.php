<?php
include ("top.php");
?>
<ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="admindashboard.php">Home</a><i class="fa fa-angle-right"></i>Listing New Users</li>
</ol>
<?php
if ((isset($_GET['val']))&&($_GET['val']=='E'))
{
?>
<div class="alert alert-success" role="alert">
	User Edited <strong>Successfully.</strong>
</div>
<?php
}
?>	
<?php
if ((isset($_GET['val']))&&($_GET['val']=='D'))
{
?>
<div class="alert alert-danger" role="alert">
	User Removed <strong>Successfully.</strong>
</div>
<?php
}
?>
			
		<?php
		$totalquery = "SELECT COUNT(1) cnt FROM `users` WHERE new_user = 'Y' ";
		$countquery=mysqli_query($con,$totalquery);
		$tot_cnt=mysqli_fetch_array($countquery);
		$per_page = 25;
		$pageno = $_GET['pageno'];
			if (isset($pageno))
			{
				$pageno = $_GET['pageno'];
			}
			else
			{
				$pageno=1;
			}
		$offset = ($pageno*$per_page)-$per_page;

		
		$newusersql = "SELECT u.* FROM users u WHERE u.new_user = 'Y' ";
		$newuserresult = mysqli_query($con,$newusersql);
		if (mysqli_num_rows($newuserresult)==0)
		{
		?>
			<div class="alert alert-danger" role="alert">
				<strong>No Records Found!</strong>
			</div>
		<?php
		}
		else
		{
		?>				
			<div class="agile-grids">
			<!-- tables -->		
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h2>New Users</h2>
					  	<nav aria-label="...">
							  <ul class="pagination">
							<?php
								for ($i=1; $i<=ceil($tot_cnt['cnt']/$per_page); $i++)
								{
							?>
								<li class="page-item <?php if($pageno==$i){ echo"active"; }?>"><a class="page-link" href="admin_list_newusers.php?pageno=<?php echo $i;?>"><?php echo $i;?></a></li>
							<?php
								}
							?>
							  </ul>
						</nav>
					    <table id="table">
						<thead>
						  <tr>
							<th>Users Name</th>
							<th>Email</th>
							<th>Phone Number</th>
							<th>Class</th>
							<th>Subjects</th>
							<th>Action</th>
						  </tr>
						</thead>
						<tbody>
						<?php
						$query = "SELECT u.* FROM users u WHERE u.new_user = 'Y' ORDER BY u.name LIMIT $per_page OFFSET $offset";
						$result = mysqli_query($con,$query);
						while($row=mysqli_fetch_array($result))
						{
						?>
						  <tr>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row['email_id']; ?></td>
							<td><?php echo $row['phone_number']; ?></td>
							<?php
							$category_id = $row['category_id'];
							$catquery = "SELECT c.* FROM category c WHERE c.category_id = '$category_id'";
							$catresult = mysqli_query($con,$catquery);
							while($catrow=mysqli_fetch_array($catresult))
							{
							echo "<td>".$catrow['category_name']."</td>";
							}
							$subcategory_name = "";
							$sub_category_ids=explode (",", $row['sub_category_ids']);
							for ($i=0; $i<=sizeof($sub_category_ids); $i++)
							{
								$scat_id = $sub_category_ids[$i];
								$scatquery = "SELECT sc.* FROM sub_category sc WHERE sc.sub_category_id = '$scat_id'";
								$scatresult = mysqli_query($con,$scatquery);
								
								while($scatrow=mysqli_fetch_array($scatresult))
								{
									$subcategory_name = $subcategory_name.$scatrow['sub_category_name'].".";
								}
								
							}
							?>							
							
							<td><?php echo $subcategory_name; ?></td>
							<td><a href="admin_view_user.php?user_id=<?php echo $row['user_id']; ?>"><i class="fa fa-eye" title="View User Details"></i></a><span></span><a href="admin_edit_user.php?user_id=<?php echo $row['user_id']; ?>"><i class="fa fa-pencil-square-o" title="Edit User"></i></a><span></span><a href="admin_remove_user.php?user_id=<?php echo $row['user_id']; ?>"><i class="fa fa-trash" title="Remove User"></i></a></td>
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