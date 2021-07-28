<?php 

extract($_POST);
//print_r($_POST);

echo 'MerchantOrderID : '.$_POST['MerchantOrderID'].'<br>';

echo 'MSPReferenceID : '.$_POST['MSPReferenceID'].'<br>';

echo 'ResponseCode : '.$_POST['ResponseCode'].'<br>';

echo 'Message : '.$_POST['Message'].'<br>';

echo 'Payment Mode : '.$_POST['PaymentMode'].'<br>';

echo 'TransactionType : '.$_POST['TransactionType'].'<br>';

echo 'Amount : '.$_POST['Amount'].'<br>';

?>