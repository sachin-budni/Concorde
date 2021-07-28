<?php
include("db.php");
?>
<option>Please Select Subjects</option>
<?php
if(!empty($_POST["category_id"])) 
{
	$category_id=$_POST["category_id"];
	$sql ="SELECT sc.* FROM `sub_category` sc WHERE sc.category_id = '$category_id'";
	$selquery=mysqli_query($con,$sql);
	while ($rec=mysqli_fetch_array($selquery))
	{
	?>
	<option value="<?php echo $rec['sub_category_id']; ?>"><?php echo $rec['sub_category_name']; ?></option>
	<?php
	}
}
?>	