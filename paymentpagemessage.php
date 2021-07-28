<?php
/*
100 Approved in test mode 
200 Approved 
201 Declined 
202 Bank Declined Transaction 
204 Expired Card 
205 Insufficient Funds
*/
if (isset($_GET['paymentcode']))
{
	if ($_GET['paymentcode']=='100')
	{
	$errormessage = "Success in Test mode";
	}
	else if ($_GET['paymentcode']=='200')
	{
	$errormessage = "Payment received successfully";
	}
	else if ($_GET['paymentcode']=='201')
	{
	$errormessage = "Transaction Declined";
	}
	else if ($_GET['paymentcode']=='202')
	{
	$errormessage = "Bank Declined Transaction";
	}
	else if ($_GET['paymentcode']=='204')
	{
	$errormessage = "Card expired. Payment failed";
	}
	else if ($_GET['paymentcode']=='205')
	{
	$errormessage = "Payment failed. Insufficient fund";
	}
	else
	{
	$errormessage = "Payment failed.";
	}
	
	echo $errormessage;
}
?>