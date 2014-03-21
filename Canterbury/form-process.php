<?php 

if ($_REQUEST) {
	
	$toEmail = $_REQUEST['toEmail'];
	$returnURL = $_REQUEST['returnURL'];
	$fromEmail = $_REQUEST['fromEmail'];
	$fromName = $_REQUEST['fromName'];
	$message = $_REQUEST['message'];

	mail($toEmail,'Website Contact Form Submission',$message,"From: $fromEmail\n");
	header('Location:'.$returnURL);
}

?>