<?php
   session_start();
   require_once("config.php");
   
   $Email = $_POST["email"];
   $Password = md5($_POST["password"]);
   
   
   $con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE); 
   
   if(!$con){
   $_SESSION["Message"] = "Cannot connect to Database. ".mysqli_error($con)."";
   $_SESSION["regState"] = -1;
   header("location:../index.php");
   exit();
   
   }
   print "Database Connected";
   
   
   $query = "select * from Users where Email = '$Email' and Password = '$Password';";
   $result = mysqli_query($con,$query);
   
   if(!result){
   	$_SESSION["Message"] = "Login Query Failed. ".mysqli_error($con)."";
   	$_SESSION["regState"] = -2;
   	header("location: ../index.php");
   	exit();
   }
   
   if(mysqli_num_rows($result) != 1){
   	$_SESSION["Message"] = "Invalid Username or Password. ".mysqli_error($con)."";
   	$_SESSION["regState"] = -3;
   	header("location: ../index.php");
   	exit();
   }
   $Ldatetime = date("Y-m-d h:i:s");
   $query = "update  Users set Ldatetime = '$Ldatetime' where Email = '$Email';";
   
   $result = mysqli_query($con,$query);
   
   if(!result){
   	$_SESSION["Message"] = "Login Date/Time Query Failed. ".mysqli_error($con)."";
   	$_SESSION["regState"] = -2;
   	header("location: ../index.php");
   	exit();
   }
   
   $_SESSION["regState"]= 4;
   header("location: ../Lab2.php");
   exit();
   
   ?>