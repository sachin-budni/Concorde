<?php
include("db_registration.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Qpay India</title>
</head>
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700&amp;subset=all' rel='stylesheet' type='text/css'>

<!--
Single Link-- >https://bit.ly/3f6lgQp


<link href="assets/plugins/socicon/socicon.css" rel="stylesheet" type="text/css"/>-->
<!--<link href="assets/plugins/bootstrap-social/bootstrap-social.css" rel="stylesheet" type="text/css"/>-->
<!--<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>-->
<!--<link href="assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>-->
<!--<link href="assets/plugins/animate/animate.min.css" rel="stylesheet" type="text/css"/>-->
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

<!--<link href="assets/base/css/dataTable.bootstrap.responsive.min.css" rel="stylesheet" type="text/css"/>-->
<!--<link href="assets/base/css/plugins.css" rel="stylesheet" type="text/css"/>-->
<link href="assets/base/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<!--<link href="assets/base/css/themes/default.css" rel="stylesheet" id="style_theme" type="text/css"/>-->
<link href="assets/base/css/custom.css" rel="stylesheet" type="text/css"/>

<body>
<style>
.error, .mandatory
{
	color:#F00;
}
.text-label, .error
{
	 font-weight: normal !important;
}
</style>
<?php
$orderid = $_GET['orderid'];
$userid = $_GET['userid'];

$query = "SELECT u.*,o.* FROM users u ,orders o WHERE u.user_id = o.user_id AND o.order_id = '$orderid' AND u.user_id = '$userid' ";
$result = mysqli_query($con,$query);
while($row=mysqli_fetch_array($result))
{
$amount = $row['amount'];
$orderid = $row['order_id'];
$testorlive = $row['testorlive'];
$name = $row['name'];
$email_id = $row['email_id'];
$phone_number = $row['phone_number'];
$address = $row['address'];
$city = $row['city'];
$state = $row['state'];
$country = $row['country'];
$postal_code = $row['postal_code'];
}
					

$amt = $amount;
$famt=base64_encode($amt);
?>

<div class="c-layout-page" style="display:none">
	<div class="c-content-box qp-top-nobottom c-bg-white">
		<div class="container">
			<div class="c-content-product-1 c-opt-1  db-table qp-form">
				<div class="c-content-title-1">
					<h3 class="c-center c-font-uppercase c-font-bold font-25">Sample Order Form - Merchant Using Qpay Payment Page To Get Credit/Debit Card Or Net banking Details From Customer</h3>
				</div>
				<div class="row">
					<form id="qpay_form" name="qpay_form" action="https://pg.qpayindia.com/wwws/Payment/PaymentDetails.aspx" method="POST" enctype="multipart/form-data">
						<div class="col-lg-3"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="text-label" for="firstname">ResponseURL </label>
								<input type="hidden" class="validation form-control" name="ResponseURL" id="ResponseURL" value="http://localhost/E_learning_website/qpayresponse.php" />
							</div>
							<div class="form-group">
								<label class="text-label" for="firstname">QPayID </label>
								<input type="hidden" class="validation form-control" name="QPayID" id="QPayID" value="concoapiacc`<?php echo $famt;?>" />
							</div>
							<div class="form-group">
								<label class="text-label" for="firstname">QPayPWD </label>
								<input type="hidden" class="validation form-control" name="QPayPWD" id="QPayPWD" value="conco!123" />
							</div>
							<div class="form-group">
								<label class="text-label" for="firstname">TransactionType </label>
								<input type="hidden" class="validation form-control" name="TransactionType" id="TransactionType" value="PURCHASE" />
							</div>
							<div class="form-group">
								<label class="text-label" for="firstname">OrderID </label>
								<input type="hidden" class="validation form-control" name="OrderID" id="OrderID" value="<?php echo $orderid; ?>" />
							</div>
							<div class="form-group">
								<label class="text-label" for="firstname">Currency </label>
								<input type="hidden" class="validation form-control" name="Currency" id="Currency" value="INR" />
							</div>
							<div class="form-group">
								<label class="text-label" for="firstname">Mode </label>
								<input type="hidden" class="validation form-control" name="Mode" id="Mode" value="<?php echo $testorlive; ?>" />
							</div>
							<div class="form-group">
								<label class="text-label" for="firstname">PaymentPageRequired </label>
								<input type="hidden" class="validation form-control" name="PaymentPageRequired" id="PaymentPageRequired" value="Y" />
							</div>
							<div class="form-group">
								<label class="text-label" for="firstname">Paymentoption </label>
								<input type="hidden" class="validation form-control" name="Paymentoption" id="Paymentoption" value="C,D,U,N" />
							 <?php 

							
           $merchant_id='concoapiacc`'.$famt;
		   $password='conco!123';
		   $order_id=$orderid;
		   $first_name=$name;
		   $email=$email_id;
		   $phone=$phone_number;
		   $mode=$testorlive;
			$secretKey = 'iO5KTGIYZyk/Onk7rAQ36XG9CsUAtdHRoxLKgqLH10pBuYZwog==';
		  $inputValues=
                $secretKey
                ."|http://localhost/E_learning_website/qpayresponse.php"
                ."|".$merchant_id
                ."|".$password
                ."|PURCHASE"
                ."|".$order_id
                ."|INR"
                ."|".$mode
                ."|".$first_name
                ."|".$email
                ."|".$phone;
                
             // echo $inputValues; exit();
        $secure_hash = strtoupper(hash('sha512', $inputValues));
								
							?>		
						
							<input type="hidden" class="validation form-control" name="secure_hash" id="secure_hash" value='<?php echo $secure_hash; ?>' />
								
							</div>

							
	
							
							
							<label>Additional mandatory parameters required for net banking transactions</label>
							<div class="form-group">
								<label class="text-label" for="firstname">Name <span class="mandatory">*</span> </label>
								<input type="hidden" class="validation form-control" name="name" id="name" value="<?php echo $first_name; ?>" />
							</div>
							<div class="form-group">
								<label class="text-label" for="firstname">Address <span class="mandatory">*</span> </label>
								<input type="hidden" class="validation form-control" name="address" id="address" value="<?php echo $address; ?>" />
							</div>
							<div class="form-group">
								<label class="text-label" for="firstname">City <span class="mandatory">*</span> </label>
								<input type="hidden" class="validation form-control" name="city" id="city" value="<?php echo $city; ?>" />
							</div>
							<div class="form-group">
								<label class="text-label" for="firstname">State <span class="mandatory">*</span> </label>
								<input type="hidden" class="validation form-control" name="state" id="state" value="<?php echo $state; ?>" />
							</div>
							<div class="form-group">
								<label class="text-label" for="firstname">Country <span class="mandatory">*</span> </label>
								<input type="hidden" class="validation form-control" name="country" id="country" value="<?php echo $country; ?>" />
							</div>
							<div class="form-group">
								<label class="text-label" for="firstname">Postal Code <span class="mandatory">*</span> </label>
								<input type="hidden" class="validation form-control" name="postal_code" id="postal_code" value="<?php echo $postal_code; ?>" />
							</div>
							<div class="form-group">
								<label class="text-label" for="firstname">Phone <span class="mandatory">*</span> </label>
								<input type="hidden" class="validation form-control" name="phone" id="phone" value="<?php echo $phone; ?>" />
							</div>
							<div class="form-group">
								<label class="text-label" for="firstname">Email <span class="mandatory">*</span> </label>
								<input type="hidden" class="validation form-control" name="email" id="email" value="<?php echo $email; ?>" />
							</div>
							<div class="form-group text-center">
								<input type="submit" name="btn_submit" id="btn_submit" value="Make Payment">
								<input type="button" name="reset_btn" id="reset_btn" value="Reset">
							</div>
						</div>
						<div class="col-lg-3"></div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
<script>
window.onload = function(){
  document.forms['qpay_form'].submit();
}
</script>