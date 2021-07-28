<?php
include ("db_registration.php");
include('site_top.php');
?>
<!-- breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="index.html">Home</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Admission Form</li>
		</ol>
	</nav>
	<!-- breadcrumb -->
	<!-- //banner -->

	<!-- admission form -->
	<div class="form-w3l py-5">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title text-capitalize font-weight-light text-dark font-weight-bold text-center mb-5">Admission
				<span class="font-weight-bold">form</span>
			</h3>
			<div class="register-form pt-md-4">
				<form action="joinus_db.php" method="post">
					<div class="styled-input form-group">
						<input type="text" name="uname" id="uname" class="form-control" placeholder="Your Name" required="">
					</div>
					
					
					<div class="styled-input form-group">
						<input type="text" name="fathersname" id="fathersname" class="form-control" placeholder="Father's Name" required="">
					</div>
					
					<div class="styled-input form-group">
						<input type="text" name="address" id="address" class="form-control" placeholder="Enter Address" required="">
					</div>
					
					<div class="styled-input form-group">
						<input type="text" name="city" id="city" class="form-control" placeholder="Enter City" required="">
					</div>
					
					<div class="styled-input form-group">
						<input type="text" name="state" id="state" class="form-control" placeholder="Enter State" required="">
					</div>
					
					<div class="styled-input form-group">
						<input type="text" name="country" id="country" class="form-control" placeholder="Enter Country" required="">
					</div>
					
					<div class="styled-input form-group">
						<input type="text" name="postalcode" id="postalcode" class="form-control" placeholder="Enter Postal Code" required="">
					</div>
					
					<div class="styled-input form-group">
						<input type="text" name="education" id="education" class="form-control"  placeholder="Current Education" required="">
					</div>
					
					<div class="styled-input form-group">
						<input type="text" name="phone" id="phone" class="form-control"  placeholder="Phone Number"  required="">
					</div>

					<div class="styled-input form-group">
						<input type="text" name="emailid" id="emailid" class="form-control"  placeholder="Email Id"  required="">
					</div>
					
					<!--<div class="styled-input form-group">
						<input id="datepicker" class="form-control" placeholder="Birth Date" name="Text" type="text" value="" onFocus="this.value = '';"
						 onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
					</div>-->
					
					<div class="styled-input agile-styled-input-top form-group">
						<select class="category2" id="classid" name="classid" onChange="getsubjects(this.value);" required="">
							<option value="">Select Class:</option>
							<?php
							$query = "SELECT * FROM category";
							$result = mysqli_query($con,$query);
							while($row=mysqli_fetch_array($result))
							{
							?>
							<option value="<?php echo $row['category_id']."-".$row['package_fees']; ?>"><?php echo $row['category_name']; ?></option>
							<?php
							}
							?>
						</select>
					</div>
					
					<div class="styled-input agile-styled-input-top form-group">
						<select class="category2" name="subcategory_id[]" id="subcategory_id" onChange="getindividualfees(this.value);" multiple="" >
							<option value="">Please Select Subjects (You can select multiple subjects)</option>
						</select>
					</div>
					
					
					<input type="hidden" name="classfees" id="classfees" value="" />
					<input type="hidden" name="individualsubjectfees" id="individualsubjectfees" value="0" />
					<div class="header-admin-form font-weight-bold text-dark my-3" id="display_fees" style="height:100px; overflow:auto;">
					</div>
			
					<input type="submit" value="Submit" name="register" id="register">
				</form>
			</div>
		</div>
	</div>
	<!-- admission form -->


	<!-- brands -->
	<div class="brands-w3ls py-md-5 py-4">
		<div class="container py-xl-3">
			<ul class="list-unstyled">
				<li>
					<i class="fab fa-supple"></i>
				</li>
				<li>
					<i class="fab fa-angrycreative"></i>
				</li>
				<li>
					<i class="fab fa-aviato"></i>
				</li>
				<li>
					<i class="fab fa-aws"></i>
				</li>
				<li>
					<i class="fab fa-cpanel"></i>
				</li>
				<li>
					<i class="fab fa-hooli"></i>
				</li>
				<li>
					<i class="fab fa-node"></i>
				</li>
			</ul>
		</div>
	</div>
	<!-- //brands -->
<?php
include('site_footer.php');
?>