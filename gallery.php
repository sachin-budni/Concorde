<?php
include('site_top.php');
?>
	<!-- breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="index.php">Home</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Gallery</li>
		</ol>
	</nav>
	<!-- breadcrumb -->
	<!-- //banner -->

	<!-- gallery -->
	<section class="gallery py-5">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title text-capitalize font-weight-light text-dark font-weight-bold text-center mb-5">our
				<span class="font-weight-bold">gallery</span>
			</h3>
			<div class="inner-sec pt-md-4">
				<!--<div class="row proj_gallery_grid">-->
				<?php
				$query = "SELECT * FROM gallery_images ";
				$result = mysqli_query($con,$query);
				$i=1;
				$j=0;
				while($row=mysqli_fetch_array($result))
				{
					if ($i==4)
					{
						$i=1;
					}
					
					if ($i==1)
					{
						echo "<div class='row proj_gallery_grid'>";
					}
					
				?>
					<div class="col-sm-4 section_1_gallery_grid">
						<a href="<?php echo $row['g_photoname']; ?>">
							<div class="section_1_gallery_grid1">
								<img src="<?php echo $row['g_photoname']; ?>" alt=" " class="img-fluid" />
								<div class="proj_gallery_grid1_pos">
									<p><?php echo $row['g_desc']; ?></p>
								</div>
							</div>
						</a>
					</div>
				<?php
					if ($i==3)
					{
						echo "</div>";
					}
				$i++;
				$j++;
				}
				if (($j%3)!=0)
				{
				echo "</div>";
				}
				?>	
				<!--</div>-->
			</div>
		</div>
	</section>
	<!--//gallery-->
<?php
include('site_footer.php');
?>	