<?php
include("db.php");
?>
<option value="">Please Select Chapters</option>
<?php
if(!empty($_POST["subcategory_id"])) 
{
	$subcategory_id=$_POST["subcategory_id"];
	$sql ="SELECT c.* FROM `chapters` c WHERE c.sub_category_id = '$subcategory_id'";
	$selquery=mysqli_query($con,$sql);
	while ($rec=mysqli_fetch_array($selquery))
	{
	?>
	<option value="<?php echo $rec['chapter_id']; ?>"><?php echo $rec['chapter_name']; ?></option>
	<?php
	}
}
?>