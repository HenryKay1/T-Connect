<?php
   session_start();
   require_once("config.php");
   
   $Email = $_GET["Email"];
   $Acode = $_GET["Acode"];
   
   
   
   $con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE); 
   
   if(!$con){
   $_SESSION["Message"] = "Cannot connect to Database.  ".mysqli_error($con)."";
   $_SESSION["regState"] = -1;
   header("location:../index.php");
   exit();
   
   }
   print "Database Connected";
   
   
   
   $query = "select * from Users_AH where Email = '$Email' and Acode = '$Acode';";
   
   $result = mysqli_query($con,$query);
   
   if(!result){
   	$_SESSION["Message"] = "Select Query Failed. ".mysqli_error($con)."";
   	$_SESSION["regState"] = -2;
   	header("location: ../index.php");
   	exit();
   }
   if(mysqli_num_rows($result) != 1){
   	$_SESSION["Message"] = "Authentication failed. $Email | $Acode ".mysqli_error($con)."";
   	$_SESSION["regState"] = -3;
   	header("location: ../index.php");
   	exit();
   }
   
   $_SESSION["regState"]= 3;
   $_SESSION["Email"]= $Email;
   header("location: ../index.php");
   exit();
   
   
   ?>