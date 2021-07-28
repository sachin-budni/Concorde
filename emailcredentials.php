<?php	
require 'PHPMailer/PHPMailerAutoload.php';	
$mail = new PHPMailer;
if (isset($_POST['senddata']))
{
$name = $_POST['custname'];
$mobile =$_POST['mobile'];
$pickuplocation = $_POST['pickup'];
$pickupdate = $_POST['mycustomerpickupdate'];
$pickuptime = $_POST['pickuptime'];
$droplocation = $_POST['drop'];


$mail->Host = 'localhost';  
$mail->SMTPAuth = false;
$l_thanks = "";

	  $mail->Username = 'enquiryemail@successonewaydroptaxi.com';   
  	  $l_email = 'enquiryemail@successonewaydroptaxi.com';
  	  $l_email_name='Enquiry Email';
	  $mail->Password = 'Enquiry@1872';
	  $mail->addCC('matrixsoftechie@gmail.com');
	  $l_thanks = '<br><br><br><br>Thanks,<br>www.droptaxi,info email support';

                                    
$mail->SMTPSecure = 'tls';                         
$mail->Port = 25;                                 
$mail->setFrom($l_email, $l_email_name);


$to_name='Punitharaj';
$to_address='punitharaj20.12094@gmail.com';
//$to_address='mkmanikandan761@gmail.com';
$mail->addAddress($to_address, $to_name);

$mail->isHTML(true);
if($mail->IsError()) die($mail->ErrorInfo);

$mail->Subject = 'One Way www.droptaxi.info';
$mail->Body    = 'Hi Punitharaj  <br> Below are the enquiry details <br>Name :'.$name .'<br>Mobile :'.$mobile.'<br>Pickup Location :'.$pickuplocation .'<br>Pickup Date :'.$pickupdate.'<br>Pickup Time :'.$pickuptime.'<br>Drop Location :'.$droplocation.'<br> Trip Type: One Way';

$smsbody = 'One Way Name :'.$name .' Mobile :'.$mobile.' Pickup Location :'.$pickuplocation .' Pickup Date :'.$pickupdate.' Pickup Time :'.$pickuptime.' Drop Location :'.$droplocation;

//Sending details to site owner via sms
$api_key = '55E29D68E5D349';
//$contacts = '9710074927';
$contacts = '7358354570';
$from = 'DPTAXY';
$sms_text = urlencode($smsbody);
$api_url = "http://websms.textidea.com/app/smsapi/index.php?key=".$api_key."&campaign=7841&routeid=3&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text;
//Submit to server
$response = file_get_contents( $api_url);


	if(!$mail->send()) 
	{
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else 
	{
		header('location:index.php?success=yes');
	}
}
?>