<?php
include("db.php");
?>
<option value="0">Please Select Sub-Chapters</option>
<?php
if(!empty($_POST["chapter_id"])) 
{
	$chapter_id=$_POST["chapter_id"];
	$sql ="SELECT sc.* FROM `sub_chapters` sc WHERE sc.chapter_id = '$chapter_id'";
	$selquery=mysqli_query($con,$sql);
	while ($rec=mysqli_fetch_array($selquery))
	{
	?>
	<option value="<?php echo $rec['sub_chapter_id']; ?>"><?php echo $rec['sub_chaptername']; ?></option>
	<?php
	}
}
?>