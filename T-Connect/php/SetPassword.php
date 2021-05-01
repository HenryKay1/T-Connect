<?php
   session_start();
   require_once("config.php");
   
   $Email = $_SESSION["Email"];
   $Password1 = md5($_POST["password1"]);
   $Password2 = md5($_POST["password2"]);
   
   
   
   //Verify both passwords match
   if (strcmp($Password1, $Password2) != 0){
   	$_SESSION["Message"] = "Passwords do not match. Try Again.";
   	$_SESSION["regState"] = 3;
   	
   	header("location: ../index.php");
   	exit();
   }
   
   
   $Acode = rand();
   $Adatetime = date("Y-m-d h:i:s");
   
   
   //Establish DB connection
   $con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE); 
   
   if(!$con){
   $_SESSION["Message"] = "Cannot connect to Database. ".mysqli_error($con)."";
   $_SESSION["regState"] = -1;
   header("location:../index.php");
   exit();
   
   }
   print "Database Connected";
   print "\n";
   
   
   $query = "update  Users_AH set Password = '$Password1',Acode = '$Acode',Adatetime = '$Adatetime' where Email = '$Email';";
   

   
   $result = mysqli_query($con,$query);
   
   if(!result){
   	$_SESSION["Message"] = "Update Query failed. ".mysqli_error($con)."";
   	$_SESSION["regState"] = -2;
   	header("location: ../index.php");
   	exit();
   }
   else{
	print $query;

	}
   $_SESSION["regState"]= 0;
   
   header("location: ../index.php");
   exit();
   
 ?>