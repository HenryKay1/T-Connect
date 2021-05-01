<?php
   session_start();
   
   
   $_SESSION ["regState"] = 2;
   
   header("location: ../index.php");
   require_once("config.php");
   
   $Email = $_POST["email"];
   $_SESSION["Email"] = $Email;
   
   print $Email;
   
   
   //Establish DB connection
   $con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE); 
   
   if(!$con){
   $_SESSION["Message"] = "Cannot connect to Database. ".mysqli_error($con)."]";
   $_SESSION["regState"] = -1;
   header("location:../index.php");
   exit();
   
   }
   print "Database Connected";
   
   
   $query = "select * from Users_AH where Email = '$Email';";
   $result = mysqli_query($con,$query);
   
   if(!result){
   $_SESSION["Message"] = "Email Query Failed. ".mysqli_error($con)."]";
   $_SESSION["regState"] = -2;
   header("location: ../index.php");
   exit();
   }
   
   if(mysqli_num_rows($result) != 1 ){
   
   //Make sure it doesn't Validate on first run
   if($_SESSION["Authenticate"] > 0){
   	//$_SESSION["Message"] = "Email doesn't exist.Try again. ".mysqli_error($con)."";
   
   }
   $_SESSION["Authenticate"]++;
   exit();
   }
   $_SESSION["Authenticate"]=0;
   $_SESSION["regState"] = 5;
   header("location: ../index.php");
   exit();
   
   
   
   ?>