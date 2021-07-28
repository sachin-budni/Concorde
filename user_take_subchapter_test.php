<?php
include ("usertop.php");
$user_id = $_SESSION['user_info']['user_id'];
?>

<ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="userdashboard.php">Home</a><i class="fa fa-angle-right"></i>Online Test</li>
</ol>

		<?php
		$subchapter_id = "";
		if (isset($_GET['subchapter_id']))
		{
		
		//$question_number = 1;
		?>
		<form method="get" action="processquestion.php" enctype="multipart/form-data" onsubmit="check_choices_selected();">
			<div class="agile-grids">
			<!-- tables -->		
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <?php echo "<h2> Question ".$pageno." of ".$tot_cnt['cnt']."</h2>"; ?>
					    <?php
						$query = "SELECT tf.* FROM test_file tf  WHERE tf.sub_chapter_id = '$subchapter_id' ORDER BY tf.test_id LIMIT $per_page OFFSET $offset";
						$result = mysqli_query($con,$query);
						$correct=1;
						while($row=mysqli_fetch_array($result))
						{
						$options = array($row['opt_a'],$row['opt_b'],$row['opt_c'],$row['opt_d']);
						shuffle($options);
						?>
							<div class="well">
							<?php echo "<b>".$pageno.".".$row['question']."</b>"; ?>
							
							<ol type="a">
							<?php
								for ($j=0;$j<4;$j++)
								{
									echo "<input type='radio' name='choices' value='".$options[$j]."'>  <b>".$options[$j]."</b><br>";
								}
							?>
							</ol>
							</div>
							<input type="hidden" name="testid" id="testid" value="<?php echo $row['test_id']; ?>" />
						<?php
						}
						?>
					</div>
					
					<input type="hidden" name="subchapter_id" id="subchapter_id" value="<?php echo $subchapter_id; ?>" />
					<input type="hidden" name="pageno" id="pageno" value="<?php echo $pageno; ?>" />
					<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_info']['user_id']; ?>" />
					<?php
			/*		 if ($pageno!=1)
					 {*/
					?>
				<!--	<a name="previousbtn" id="previousbtn" href="user_take_subchapter_test.php?subchapter_id=<?php //echo $subchapter_id; ?>&pageno=<?php // echo $pageno-1; ?>" class="btn btn-primary">Previous Question</a> -->
					<?php
					//}
					?>
					
					<?php
					if ($pageno!=$tot_cnt['cnt'])
					{
					?>
					<input class="btn btn-primary" type="submit" name="nextbtn" value="Next Question"/>
					<!--<a name="nextbtn" id="nextbtn" href="user_take_subchapter_test.php?subchapter_id=<?php //echo $subchapter_id; ?>&pageno=<?php //echo $pageno+1; ?>" class="btn btn-primary" >Next Question</a>-->
					<?php
					}
					?>
					
					<?php
					if ($pageno==$tot_cnt['cnt'])
					{
					?>
					<input class="btn btn-primary" type="submit" name="resultbtn" value="See Result"/>
					<!--<a name="nextbtn" id="nextbtn" href="user_take_subchapter_test.php?subchapter_id=<?php //echo $subchapter_id; ?>&pageno=<?php //echo $pageno+1; ?>" class="btn btn-primary" >Next Question</a>-->
					<?php
					}
					?>
					
				</div>
			<!-- //tables -->
			</div>
		</form>	
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
include ("userfooter.php");
?>  