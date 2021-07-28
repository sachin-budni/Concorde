<?php
include('site_top.php');
?>
	<!-- breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="index.html">Home</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Courses Offered</li>
		</ol>
	</nav>
	<!-- breadcrumb -->
	<!-- //banner -->

	<!-- course details -->
	<div class="details-w3l py-5">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title text-capitalize font-weight-light text-dark font-weight-bold text-center mb-5">courses
				<span class="font-weight-bold"> we offer</span>
			</h3>

			<div class="row inner_sec_info pt-md-4">
				<!-- left side -->
				<div class="col-lg-8 single-left">
					<div class="single-left1">
						<img src="images/banner1.jpg" alt=" " class="img-fluid" />
						<h6 class="details-heading font-italic my-4">CBSC</h6>
						<p>CBSE Class XI and XII Syllabus 2019-20. You can download CBSE Syllabus for Class XI and XII Syllabus 2019-20 in PDF format.</p>
						<br>
						<h5 class="card-title">
							<a href="#" class="text-dark">Click Here to Download Biology Syllabus</a> <br> 
							<a href="#" class="text-dark">Click Here to Download Chemistry Syllabus</a> <br>
							<a href="#" class="text-dark">Click Here to Download Physics Syllabus</a> <br>
						</h5>
					</div>
				</div>
				<!-- //left side -->
				<!-- right side -->
				<div class="col-lg-4 event-right mt-lg-0 mt-sm-5 mt-4">
					<div class="event-right1">
						<div class="categories my-4 p-4 border">
							<h3 class="blog-title text-dark">Courses Offered</h3>
							<ul>
								<li class="mt-3">
									<i class="fas fa-check mr-2"></i>
									<a href="course_offered_cbsc.php">CBSC</a>
								</li>
								<li class="mt-3">
									<i class="fas fa-check mr-2"></i>
									<a href="course_offered_neet.php">NEET</a>
								</li>
								<li class="mt-3">
									<i class="fas fa-check mr-2"></i>
									<a href="course_offered_iit.php">IIT-JEE MAINS</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- //right side -->
			</div>
		</div>
	</div>
	<!-- //course details -->
<?php
include('site_footer.php');
?>	