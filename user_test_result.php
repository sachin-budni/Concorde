<?php
include ("usertop.php");
$user_id = $_SESSION['user_info']['user_id'];
?>

<ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="userdashboard.php">Home</a><i class="fa fa-angle-right"></i>Test Result</li>
</ol>

			<div class="agile-grids">
			<!-- tables -->		
				<div class="agile-tables">
					<div class="w3l-table-info">
					 <center><h2> Test Result </h2></center>
					 <?php
					 if (isset($_GET['user_id']))
					 {
					 	$user_id = $_GET['user_id'];
						
						$totalquery = "SELECT COUNT(1) cnt FROM `test_processing` WHERE user_id = '$user_id' ";
						$countquery=mysqli_query($con,$totalquery);
						$tot_cnt=mysqli_fetch_array($countquery);
						$total_questions = $tot_cnt['cnt'];
								
								
						$corrquery = "SELECT COUNT(DISTINCT tp.test_id) tot_correct_ans FROM test_processing tp , test_file tf WHERE tp.test_id = tf.test_id AND tp.user_id = '$user_id' AND tp.selected_answer = tf.opt_a ";
						$corrresult = mysqli_query($con,$corrquery);
						$tot_corr_cnt=mysqli_fetch_array($corrresult);
						$total_correct_answers = $tot_corr_cnt['tot_correct_ans'];
					 ?>
						<div class="alert alert-info" role="alert">
							You have scored <strong><?php echo $total_correct_answers." Out of ".$total_questions."."; ?></strong>
						</div>
					<?php
						$incorrquery = "SELECT tf.* FROM test_processing tp , test_file tf WHERE tp.test_id = tf.test_id AND tp.user_id = '$user_id' AND tp.selected_answer <> tf.opt_a ";
						$incorrresult = mysqli_query($con,$incorrquery);
						$i=1;
						if (mysqli_num_rows($incorrresult)<>0)
						{	
							echo "<div class='alert alert-danger' role='alert'>";
							echo "<strong>Below are incorrectly answered questions and referrence videos</strong>";
							echo "</div>";
							while($incorrrow=mysqli_fetch_array($incorrresult))
							{
					?>	
							<div class="well">
								<?php echo "<b>".$i.".".$incorrrow['question']."</b><br>"; ?>
								<?php echo "Correct answer:<b>".$incorrrow['opt_a']."</b><br>"; ?>
								<video controls preload="none" poster="images/videothumbnail.jpg" width="700" height="550">
								  <source src="<?php echo $incorrrow['ex_video_link']; ?>" type="video/mp4">
								  Sorry, your browser doesn't support the video element.
								</video>
							</div>
					<?php			
							}
						}	
					}
					?>	
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
include ("userfooter.php");
?>  