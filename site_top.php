<?php
include("db_registration.php");
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>NEET, IIT-JEE coaching centres in Chennai - Concorde Academy</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="description" content="Concorde Academy is one of the Best NEET Coaching Centres in Chennai offers best coaching with the intentions of according training to students appearing for the NEET and IIT-JEE examinations"/>
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--// Meta tag Keywords -->

	<!-- Custom-Files -->
	<!-- Bootstrap-Core-Css -->
	<link rel="stylesheet" href="website_css/bootstrap.css">
	<!-- Testimonials-Css -->
	<link href="website_css/mislider.css" rel="stylesheet" type="text/css" />
	<link href="website_css/mislider-custom.css" rel="stylesheet" type="text/css" />
	<!-- Style-Css -->
	<link rel="stylesheet" href="website_css/style.css" type="text/css" media="all" />
	<!-- Font-Awesome-Icons-Css -->
	<link rel="stylesheet" href="website_css/fontawesome-all.css">
	<!-- //Custom-Files -->

	<!-- Web-Fonts -->
	<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	 rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<!-- //Web-Fonts -->
	
<script>
function getsubjects(val) {
var cat_array = val.split('-');
document.getElementById('display_fees').innerHTML = "Course Fees Rs."+cat_array[1];
document.getElementById('classfees').value = cat_array[1];
	$.ajax({
	type: "POST",
	url: "registration_get_subject.php",
	data:'category_id='+val,
	success: function(data){
		$("#subcategory_id").html(data);
	}
	});
}

function getindividualfees(selectd)
{
var values = $('#subcategory_id').val();
//console.log(values);
//var individualsubject = values.split(',');
var individualfees=0;
	for (var i=0; i<values.length; i++)
	{
		del = values[i].split('-');
		individualfees = individualfees+parseInt(del[1]);
	}
	document.getElementById('individualsubjectfees').value = individualfees;
	document.getElementById('display_fees').innerHTML = "Selected Subject Fees Rs."+individualfees;
}
</script>


</head>

<body>
	<!-- header -->
	<header>
		<!-- top header -->
		<div class="top-head-w3ls py-2 bg-dark">
			<div class="container">
				<div class="row">
					<h1 class="text-capitalize text-white col-7">
						<i class="fas fa-book text-dark bg-white p-2 rounded-circle mr-3"></i>Welcome to Concorde Academy</h1>
					<!-- social icons -->
					<div class="social-icons text-right col-5">
						<ul class="list-unstyled">
							<li>
								<a href="#" class="fab fa-facebook-f icon-border facebook rounded-circle"> </a>
							</li>
							<li class="mx-2">
								<a href="#" class="fab fa-twitter icon-border twitter rounded-circle"> </a>
							</li>
							<li>
								<a href="#" class="fab fa-google-plus-g icon-border googleplus rounded-circle"> </a>
							</li>
							<li class="ml-2">
								<a href="#" class="fas fa-rss icon-border rss rounded-circle"> </a>
							</li>
						</ul>
					</div>
					<!-- //social icons -->
				</div>
			</div>
		</div>
		<!-- //top header -->
		<!-- middle header -->
		<div class="middle-w3ls-nav py-2">
			<div class="container">
				<div class="row">
					<a class="logo font-italic font-weight-bold col-lg-3 text-lg-left text-center" href="index.html"><img src="images/logo.jpg"></a>
					<div class="col-lg-9 right-info-agiles mt-lg-0 mt-sm-3 mt-1">
						<div class="row">
							<div class="col-sm-4 nav-middle">
								<i class="far fa-envelope-open text-center mr-md-4 mr-sm-2 mr-4"></i>
								<div class="agile-addresmk">
									<p>
										<span class="font-weight-bold text-dark">Mail Us</span>
										<a href="mailto:concordeeducate@gmail.com">concordeeducate@gmail.com</a>
									</p>
								</div>
							</div>
							<div class="col-sm-4 col-6 nav-middle mt-sm-0 mt-2">
								<i class="fas fa-phone-volume text-center mr-md-4 mr-sm-2 mr-4"></i>
								<div class="agile-addresmk">
									<p>
										<span class="font-weight-bold text-dark">Call Us</span>
										+91 73582 82437 | 044 4857 9617 / 9917
									</p>
								</div>
							</div>
							<div class="col-sm-4 col-6 top-login-butt text-right mt-sm-2">
								<a href="login.php" class="button-head-mow3 text-white">Login</a> &nbsp;
								<a href="joinus.php" class="button-head-mow3 text-white">Join Now</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- //middle header -->
	</header>
	<!-- //header -->

	<!-- banner -->
	<div class="banner-agile-2">
		<!-- navigation -->
		<div class="navigation-w3ls">
			<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-nav">
				<button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				 aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
					<ul class="navbar-nav justify-content-center">
						<li class="nav-item active">
							<a class="nav-link text-white" href="index.php">Home
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="about.php">About Us</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Courses Offered
							</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="course_offered_cbsc.php">CBSE</a>
								<a class="dropdown-item" href="course_offered_neet.php">NEET</a>
								<a class="dropdown-item" href="course_offered_iit.php">IIT-JEE MAINS</a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Batch Timings
							</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="new_batch.php">New Batches</a>
								<a class="dropdown-item" href="batch_crashcourse.php">Crash Course</a>
								<a class="dropdown-item" href="batch_regularcourse.php">Regular Classes</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="admission_process.php">Admission Process</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="online.php">Online Curriculum</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="fees_structure.php">Fee Structure</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="gallery.php">Gallery</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="contact.php">Contact Us</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
		<!-- //navigation -->
	</div>