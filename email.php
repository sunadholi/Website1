<?php
if(isset($_POST['submit']))
{
	$name = $_POST['username'];
	$email= $_POST['emailadd'];
	$phone= $_POST['phoneno'];
	$pageName = $_POST['pagename'];
	$fromID="harish.dermsurg@gmail.com";
	$toID = "harish.dermsurg@gmail.com";
	//$toID = "chaitra.bejai11@gmail.com";
	if(($_POST['phoneno'] == "")||($_POST['username'] == "")||($_POST['emailadd'] == ""))
	{
	    echo  "<script>alert('Kindly fill all the fields');window.history.go(-1);</script>";
	}
	else if(!preg_match("/^[a-zA-Z ]*$/",$_POST['username'])) {
		echo  "<script>alert('Kindly enter a valid name');window.history.go(-1);</script>";
	}
	else if(!preg_match("/^([A-z0-9]{1,})([\.|\_]{1})?([A-z0-9]{1,})\@([A-z]{2,7})(\.)([A-z]{3,4})$/",$_POST['emailadd'])) {
		echo  "<script>alert('Kindly enter a valid email ID');window.history.go(-1);</script>";
		header("Location: home.html");exit;
	}
	else if(!preg_match("/^\d{10}$/",$_POST['phoneno'])) {
		echo  "<script>alert('Kindly enter a valid Phone number');window.history.go(-1);</script>";
		header("Location: index.html");exit;
	}
	else{
		
	$subject= "New Lead from Vitals Klinic".$pageName." Page";
	$headers = "From: ".$fromID."\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	//$headers = 'From: support@bigappcompany.com' . "\r\n" . 'Reply-To: support@spotsoon.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion(); 
	$message = "<html><body>Name : $name<br>
Email ID: $email<br>
Phone number: $phone</body></html>";
	$result = mail($toID,  $subject, $message, $headers);
	}
	if(!$result){
		echo "<script>alert('Failed due to server error. Please try again later');location.href=\"index.html\"</script>";
	}
	else{
		echo "<script>location.href=\"thank-you.html\"</script>";	
	}
}
?>
