<?php
   session_start();
   require_once("config.php");
   	use PHPMailer\PHPMailer\PHPMailer;
   	use PHPMailer\PHPMailer\Exception;
   	use PHPMailer\PHPMailer\SMTP;
   	require '../PHPMailer-master/src/Exception.php';
   	require '../PHPMailer-master/src/PHPMailer.php';
   	require '../PHPMailer-master/src/SMTP.php';
   //Add all php mailer stuff
   $FirstName=$_GET["FirstName"];
   $LastName=$_GET["LastName"];
   $Email=$_GET["Email"];
   $_SESSION["Email"]= $Email;
   
   print "Web Data [$FirstName] [$LastName] [$Email] <br>";
    $con = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);
   if(!$con){
   	$_SESSION["Message"] = "Query failed.  ".mysqli_error($con)."";
   	$_SESSION["regState"] = -1;
   	header("location: ../index.php");
   	exit();
   }
   
   //Login Data Items
   $Acode = rand();
   $Rdatetime = date("Y-m-d h:i:s");
   $query = "INSERT INTO Users(FirstName, LastName, Email,Acode, Rdatetime, Status) values ('$FirstName', '$LastName', '$Email', '$Acode','$Rdatetime',1);";
   //Prepare email with a hot link
   $result = mysqli_query($con, $query);
   if(!$result){
   	$_SESSION["Message"] = "Database cannot connect. ".mysqli_error($con)."";
   	$_SESSION["regState"] = -2;
   	header("location: ../index.php");
   	exit();
   	
   }
   
   
   print "<p> A verification Link was sent to '$Email'</p>";
   //Authenticate E-mail
   	
   //print "Mail send failed: ".$e->errorMessage;		
   	// Build the PHPMailer object:
   	$mail= new PHPMailer(true);
   	try { 
   		$mail->SMTPDebug = 0; // Wants to see all errors
   		$mail->IsSMTP();
   		$mail->Host="smtp.gmail.com";
   		$mail->SMTPAuth=true;
   		$mail->Username="markdezlaw@gmail.com";
   		$mail->Password = "markdezlaw419";
   		$mail->SMTPSecure = "ssl";
   		$mail->Port=465;
   		$mail->SMTPKeepAlive = true;
   		$mail->Mailer = "smtp";
   		$mail->setFrom("tul46491@temple.edu", "Henry Kombem");
   		$mail->addReplyTo("tul46491@temple.edu","Henry Kombem");
   		$mail->isHTML(true);
   		$msg = "Please click the "
   				."<a href = 'https://cis-linux2.temple.edu/~tul46491/3296-softwareDesign/newLab3/php/Authenticate.php?Email=$Email&Acode=$Acode'"
   				.">link</a> to complete your registration process.";
   		$mail->addAddress($Email,"$FirstName $LastName ");
   		$mail->Subject = "Welcome to my CIS329 Lab";
   		$mail->Body = $msg;
   		$mail->send();
   		print "Email sent ... <br>";
   		$_SESSION["regState"] = 0;
   		//$_SESSION["Message"] = "Email Verified";
   		
   	} catch (phpmailerException $e) {
   		$_SESSION["Message"] = "Mailer error: ".$e->errorMessage();
   		$_SESSION["regState"] = -3;
   		print "Mail send failed: ".$e->errorMessage;		
   	}
       $_SESSION["regState"] = 5;
   	header("location:../index.php");
   exit();
   ?>