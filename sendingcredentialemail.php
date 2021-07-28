<?php	
require 'PHPMailer/PHPMailerAutoload.php';	
include ("db.php");
$mail = new PHPMailer;
//echo "outside if";
if (isset($_GET['userid']))
{
//echo "Inside if";
$userid = $_GET['userid'];
$query = "SELECT u.* FROM users u WHERE u.user_id = '$userid' ";
$result = mysqli_query($con,$query);
while($row=mysqli_fetch_array($result))
{
//echo "Inside while";
$mail->Host = 'localhost';  
$mail->SMTPAuth = false;
$l_thanks = "";

	  $mail->Username = 'enquiryemail@';   
  	  $l_email = 'enquiryemail@';
  	  $l_email_name='Credentials Email';
	  $mail->Password = '';
	  $mail->addCC('matrixsoftechie@gmail.com');
	  $l_thanks = '<br><br><br><br>Thanks,<br>E-Learning Online Study Center';

                                    
$mail->SMTPSecure = 'tls';                         
$mail->Port = 25;                                 
$mail->setFrom($l_email, $l_email_name);


$name = $row['name'];
$username = $row['username'];
$password = $row['password'];
$email_id = $row['email_id'];


$to_name=$name;
$to_address=$email_id;
//$to_name='Manikandan';
//$to_address='mkmanikandan761@gmail.com';
$mail->addAddress($to_address, $to_name);

$mail->isHTML(true);
if($mail->IsError()) die($mail->ErrorInfo);

$mail->Subject = 'Online learning user credentials';
$mail->Body    = 'Hi '.$name.'  <br> Below is your credentials to access your accut <br>Username :'.$username .'<br>Password :'.$password.'<br> Kindly use the same machine (through which you register) to access your account'.$l_thanks;

	if(!$mail->send()) 
	{
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else 
	{
		header('location:admindashboard.php?emailsuccess=Y');
	}
}	
}
?>