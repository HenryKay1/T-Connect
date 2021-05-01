<?php
   require_once("config.php");
   if(isset($_POST['search'])){
   $Instructor = $_POST["Prof"];
   $search = mysqli_real_escape_string($con,$_POST['Prof']);
   // echo('$Instructor');
   
   //print ("hey");
   
   //echo "Hello,This is a display string example!"; 
   
   //$_SESSION["Email"] = "henrykombem@gmail";
   
   
   
   //$test = "henrykombem@gmail.com";
   
   //echo $Instructor
   
   
    $con = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);
   if(!$con){
   	$_SESSION["Message"] = "Query failed.  ".mysqli_error($con)."";
   	$_SESSION["regState"] = -1;
   
   	header("location: ../index.php");
   	exit();
   }
   
   
   // $query = "SELECT Instructor FROM FA20_3296_tul46491.Courses_AH ;";
   $query = "SELECT DISTINCT Instructor FROM FA20_3296_tul46491.Courses_AH WHERE Instructor like'%".$Instructor."%'";
   //$query = "SELECT * FROM users WHERE name like'%".$search."%'";
   
   
   $result = mysqli_query($con, $query);
   
   
   
   if(!$result){
   	$_SESSION["Message"] = "Database cannot connect. ".mysqli_error($con)."";
   	$_SESSION["regState"] = -2;
   	header("location: ../index.php");
   	exit();
   	
   }
   $Prof_list = array();
    while($row = mysqli_fetch_array($result))
    {
        $Prof_list[] = $row['Instructor'];
    }
    echo json_encode($Prof_list);
   
    
   
   	
   
   }
      ?>