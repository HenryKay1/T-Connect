<?php
   session_start();
   $AjaxID = $_POST["AjaxID"];
   
   /*----------------------------------------------------------------------------------------------------*/  
   
   
   if($AjaxID == "PostComment"){
   
   require_once("config.php");
   
   $comment = $_POST["Comment"];
   $SID = $_POST["SID"];
   $Email = $_SESSION["Email"];
   
   $con = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);
   if(!$con){
   	$_SESSION["Message"] = "Query failed.  ".mysqli_error($con)."";
   	$_SESSION["regState"] = -1;
   
   	header("location: ../index.php");
   	exit();
   }
   $query = "INSERT INTO FA20_3296_tul46491.Comments (UID, SID, Content) VALUES ((select ID from Users_AH where Email = '$Email'), '$SID', '$comment');";
   
   $result = mysqli_query($con, $query);
   
   if(!$result){
   $_SESSION["Message"] = "Database cannot connect1. ".mysqli_error($con)."";
   echo $_SESSION["Message"];
   $_SESSION["regState"] = -2;
   header("location: ../index.php");
   exit();
   	
   }
   
   mysql_close($con);
   } 
   
   /*----------------------------------------------------------------------------------------------------*/  
   
   
   if($AjaxID == "IncrementReactions"){ //Add Likes or Dislikes
   
   require_once("config.php");
   
   $ID = $_POST["ID"];
   $tag = $_POST["tag"];
   
   $con = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);
   if(!$con){
   	$_SESSION["Message"] = "Query failed.  ".mysqli_error($con)."";
   	$_SESSION["regState"] = -1;
   
   	header("location: ../index.php");
   	exit();
   }
   
   if($tag == 10){ //Solution Like
   $query = "UPDATE FA20_3296_tul46491.Solutions_AH SET Likes = Likes+1 WHERE (SID = '$ID');"	;
   $result = mysqli_query($con, $query);
   
   if(!$result){
   $_SESSION["Message"] = "Database cannot connect1. ".mysqli_error($con)."";
   echo $_SESSION["Message"];
   $_SESSION["regState"] = -2;
   header("location: ../index.php");
   exit();
   	
   }
   
   mysql_close($con);	
   
   }
   
   if($tag == 20){//Solution Dislike
   $query = "UPDATE FA20_3296_tul46491.Solutions_AH SET Dislikes = Dislikes+1 WHERE (SID = '$ID');"	;
   $result = mysqli_query($con, $query);
   
   if(!$result){
   $_SESSION["Message"] = "Database cannot connect1. ".mysqli_error($con)."";
   echo $_SESSION["Message"];
   $_SESSION["regState"] = -2;
   header("location: ../index.php");
   exit();
   	
   }
   
   mysql_close($con);	
   }
   
   if($tag == 30){ //Comment Like
   $query = "UPDATE FA20_3296_tul46491.Comments SET Likes = Likes+1 WHERE (CommentID = '$ID');"	;
   $result = mysqli_query($con, $query);
   
   if(!$result){
   $_SESSION["Message"] = "Database cannot connect1. ".mysqli_error($con)."";
   echo $_SESSION["Message"];
   $_SESSION["regState"] = -2;
   header("location: ../index.php");
   exit();
   	
   }
   
   mysql_close($con);	
   }
   
   if($tag == 40){ //Comment Disike
   $query = "UPDATE FA20_3296_tul46491.Comments SET Dislikes = Dislikes+1 WHERE (CommentID = '$ID');"	;
   $result = mysqli_query($con, $query);
   
   if(!$result){
   $_SESSION["Message"] = "Database cannot connect1. ".mysqli_error($con)."";
   echo $_SESSION["Message"];
   $_SESSION["regState"] = -2;
   header("location: ../index.php");
   exit();
   	
   }
   
   mysql_close($con);	
   }
   
   
   }
   
   /*----------------------------------------------------------------------------------------------------*/ 
   
   
   
   if($AjaxID == "DecrementReactions"){ //Subtract Likes or Dislikes
   
   require_once("config.php");
   
   $ID = $_POST["ID"];
   $tag = $_POST["tag"];
   
   $con = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);
   if(!$con){
   	$_SESSION["Message"] = "Query failed.  ".mysqli_error($con)."";
   	$_SESSION["regState"] = -1;
   
   	header("location: ../index.php");
   	exit();
   }
   
   if($tag == 10){ //Solution Like
   $query = "UPDATE FA20_3296_tul46491.Solutions_AH SET Likes = Likes-1 WHERE (SID = '$ID');"	;
   $result = mysqli_query($con, $query);
   
   if(!$result){
   $_SESSION["Message"] = "Database cannot connect1. ".mysqli_error($con)."";
   echo $_SESSION["Message"];
   $_SESSION["regState"] = -2;
   header("location: ../index.php");
   exit();
   	
   }
   
   mysql_close($con);	
   
   }
   
   if($tag == 20){//Solution Dislike
   $query = "UPDATE FA20_3296_tul46491.Solutions_AH SET Dislikes = Dislikes-1 WHERE (SID = '$ID');"	;
   $result = mysqli_query($con, $query);
   
   if(!$result){
   $_SESSION["Message"] = "Database cannot connect1. ".mysqli_error($con)."";
   echo $_SESSION["Message"];
   $_SESSION["regState"] = -2;
   header("location: ../index.php");
   exit();
   	
   }
   
   mysql_close($con);	
   }
   
   if($tag == 30){ //Comment Like
   $query = "UPDATE FA20_3296_tul46491.Comments SET Likes = Likes-1 WHERE (CommentID = '$ID');"	;
   $result = mysqli_query($con, $query);
   
   if(!$result){
   $_SESSION["Message"] = "Database cannot connect1. ".mysqli_error($con)."";
   echo $_SESSION["Message"];
   $_SESSION["regState"] = -2;
   header("location: ../index.php");
   exit();
   	
   }
   
   mysql_close($con);	
   }
   
   if($tag == 40){ //Comment Disike
   $query = "UPDATE FA20_3296_tul46491.Comments SET Dislikes = Dislikes-1 WHERE (CommentID = '$ID');"	;
   $result = mysqli_query($con, $query);
   
   if(!$result){
   $_SESSION["Message"] = "Database cannot connect1. ".mysqli_error($con)."";
   echo $_SESSION["Message"];
   $_SESSION["regState"] = -2;
   header("location: ../index.php");
   exit();
   	
   }
   
   mysql_close($con);	
   }
   
   
   }
   
   /*----------------------------------------------------------------------------------------------------*/ 
   
   if($AjaxID == "ShowSolution"){     //php to show a question
   require_once("config.php");
   
   $QID = $_POST["QID"];
   
   
   
   
    $con = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);
   if(!$con){
   	$_SESSION["Message"] = "Query failed.  ".mysqli_error($con)."";
   	$_SESSION["regState"] = -1;
   
   	header("location: ../index.php");
   	exit();
   }
   
   
   
   
   
   
   $query1 = "select t1.CourseID, t1.Instructor, ACategory, DueDate, Topic, Content
     from Questions_AH as t2
     inner join (select * from Courses_AH where CID = (select CID from Questions_AH where QID = '$QID') ) as t1 where QID = '$QID';
     "; //Question Data
   
   $query2 = "select t1.Username, t1.SolvedQuestions,SID, Likes, Dislikes , CommentID, Solution
     from Solutions_AH as t2
     inner join Users_AH as t1 on t1.ID = t2.SolverID  where t2.QID = '$QID'
     "; //All Solutions for question
   
   
     
   $result1 = mysqli_query($con, $query1);
   $result2 = mysqli_query($con, $query2);
   
   if(!$result1 || !$result2){
   	$_SESSION["Message"] = "Database cannot connect1. ".mysqli_error($con)."";
   echo $_SESSION["Message"];
   	$_SESSION["regState"] = -2;
   	header("location: ../index.php");
   	exit();
   	
   }
   
   $QuestionData = array();
   
   
   $row1 = mysqli_fetch_array($result1); //Always going to be 1.
   
   
    $QuestionData[0] = $row1['CourseID'];
   $QuestionData[1] = $row1['Instructor'];
   $QuestionData[2] = $row1['ACategory'];
   $QuestionData[3] = $row1['DueDate'];
   $QuestionData[4] = $row1['Topic'];
   $QuestionData[5] = $row1['Content'];
   
   $sUsername = array(); 
   $sSolvedQuestions = array(); 
   $sLikes = array(); 
   $sDislikes = array();
   $SID = array();
   $Solutions = array();
   //$sCommentID = array(); 
   
   $row2Index =0;
   
   while( $row2 = mysqli_fetch_array($result2))
    {
        $sUsername[$row2Index] = $row2['Username'];
   $sSolvedQuestions[$row2Index] = $row2['SolvedQuestions'];
   $sLikes[$row2Index] = $row2['Likes'];
   $sDislikes[$row2Index] = $row2['Dislikes'];
   $SID[$row2Index] = $row2['SID'];
        $Solutions[$row2Index] = $row2['Solution'];
   
   //Get Comments for each Solution
   
   
    
   
   
   $row2Index++;	
    }
   
   $dataOb2->sUsername =   $sUsername;
   $dataOb2->sSolvedQuestions =   $sSolvedQuestions;
   $dataOb2->sLikes =   $sLikes;
   $dataOb2->sDislikes =   $sDislikes;
   $dataOb2->Qdata =   $QuestionData;
   $dataOb2->Solutions =   $Solutions;
   $dataOb2->SID =   $SID;
   
   
   echo json_encode($dataOb2);
   
   
   mysql_close($con);	
   
   
   
   
   }
   
   /*----------------------------------------------------------------------------------------------------*/   
   
   
   
   
   if($AjaxID == "ShowComments"){
   
   require_once("config.php");
   
   $SID = $_POST["SID"];
   
   
   
   
    $con = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);
   if(!$con){
   	$_SESSION["Message"] = "Query failed.  ".mysqli_error($con)."";
   	$_SESSION["regState"] = -1;
   
   	header("location: ../index.php");
   	exit();
   }
   
   $query3 = "select t1.Username, Likes, Dislikes,Content,CommentID
   	  from Comments as t2
   	  inner join Users_AH as t1 on t2.UID = t1.ID
   	  where SID = '$SID';
     "; //All Comments for solution
   $result3 = mysqli_query($con, $query3);
   
   if(!$result3 ){
   $_SESSION["Message"] = "Database cannot connect2. ".mysqli_error($con)."";
   echo $_SESSION["Message"];
   $_SESSION["regState"] = -2;
   header("location: ../index.php");
   exit();
   
     }
     
    $cUsername = array();
    $cLikes= array();
    $cDislikes = array();
    $cContent= array();
    $commentID= array();
     
    $row3Index =0;
    
    while($row3 = mysqli_fetch_array($result3))
    { 
        $cUsername[$row3Index] = $row3['Username'];
     $cLikes[$row3Index] = $row3['Likes'];
     $cDislikes[$row3Index] = $row3['Dislikes'];;
     $cContent[$row3Index]= $row3['Content'];
     $commentID[$row3Index]= $row3['CommentID'];
    
   	
     $row3Index++;
    }
   $dataOb2->cUsername =   $cUsername;
   $dataOb2->cLikes =   $cLikes;
   $dataOb2->cDislikes =   $cDislikes;
   $dataOb2->Comment =   $cContent;
   $dataOb2->commentID =   $commentID;
   
   
   echo json_encode($dataOb2);
   
   
   mysql_close($con);
    
   }
   
   
   /*----------------------------------------------------------------------------------------------------*/   
   
   if($AjaxID == "SearchQuestion"){     //php to search question
   require_once("config.php");
   
   $Question = $_POST["Question"];
   
   
   
   
    $con = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);
   if(!$con){
   	$_SESSION["Message"] = "Query failed.  ".mysqli_error($con)."";
   	$_SESSION["regState"] = -1;
   
   	header("location: ../index.php");
   	exit();
   }
   
   $searchWords = explode(" ",$Question);
   $numWords =  count($searchWords);
   $numGroup = intval(count($searchWords)/2) ;
   $searchGroup = array();
   $position = 0;
   //$difference = $numWords-$position;
   
   if ($searchWords[0] ==""){
   $searchGroup[] = "sdvsdbfdsv,mdmnvsnv324t543ktn34"; 
   }
   else if ($numWords ==1){
   $searchGroup[] = $searchWords[0]; 
   }
   
   
   else if( (count($searchWords)%2) !=0){ // odd numbers
   for ($x = 0; $x < $numGroup; $x++) {
   $difference = $numWords-$position;
   
   if($difference != 3){
   $searchGroup[] = $searchWords[$position]." ".$searchWords[$position + 1];
      $position = $position+2;	
   }
   else{
   $searchGroup[] = $searchWords[$position]." ".$searchWords[$position + 1]." ".$searchWords[$position + 2];
   }
   
   
   } 
   }
   else{ //even number
   for ($x = 0; $x < $numGroup; $x++) {
   $searchGroup[] = $searchWords[$position]." ".$searchWords[$position + 1];
     $position = $position+2;	
   }   
   
   }
   
   
   $query = "select t1.QID, t1.Content ,CourseName, CourseID,Instructor from Courses_AH
   inner  join (SELECT QID, Content,CID,Solved FROM FA20_3296_tul46491.Questions_AH where Content like '%".$searchGroup[0]."%'" ;
   
   
   for ($x = 1; $x < $numGroup; $x++) { // Query that groups search results in 2s or 2s and a  3s
   
   $query.= "OR Content like'%".$searchGroup[$x]."%' " ;	
   
   }
   $query.= ")as t1 where t1.CID  = Courses_AH.CID and t1.Solved =1" ;
   
   
   
   
   
   $result = mysqli_query($con, $query);
   
   
   
   if(!$result){
   	$_SESSION["Message"] = "Database cannot connect. ".mysqli_error($con)."";
   echo $_SESSION["Message"];
   	$_SESSION["regState"] = -2;
   	header("location: ../index.php");
   	exit();
   	
   }
   
   $QList = array();
   $QID = array();
   $CourseID = array();
   $Instructor = array();
    while($row = mysqli_fetch_array($result))
    {
        $QList[] = $row['Content'];
   $QID[] = $row['QID'];
   $CourseID[] = $row['CourseID'];
   $Instructor[] = $row['Instructor'];
    }
   
   // echo $Qlist[0];
   //Put arrays in an onject to return to caller
   $dataOb1 ->QID =   		$QID;
   $dataOb1 -> Question = $QList;
   $dataOb1 ->group =        $searchGroup;
   $dataOb1 -> CourseID = $CourseID;
   $dataOb1 ->Instructor =        $Instructor;
   
   
   	echo json_encode($dataOb1);
   
   
   mysql_close($con);
   
   
   
   }
   /*----------------------------------------------------------------------------------------------------*/   
   
   if($AjaxID =="AddCourse"){
   
   require_once("config.php");
   	
   
   //Add all php mailer stuff
   $CourseName=$_POST["cn"];
   $CourseID=$_POST["cid"];
   $ClassSection=$_POST["cs"];
   $InstructorName=$_POST["p"];
   
   //$_SESSION["Email"] = "henrykombem@gmail";
   
   $Email = $_SESSION["Email"];
   
   //$test = "henrykombem@gmail.com";
   
   
   
   
    $con = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);
   if(!$con){
   	$_SESSION["Message"] = "Query failed.  ".mysqli_error($con)."";
   	$_SESSION["regState"] = -1;
   
   	header("location: ../index.php");
   	exit();
   }
   
   
   
   //Insert Courses
   $query = "INSERT INTO Courses_AH(UID,CourseName, CourseID,Instructor,Section) values ((SELECT ID FROM FA20_3296_tul46491.Users_AH where Email = '$Email' ),'$CourseName', '$CourseID',  '$InstructorName','$ClassSection');";
   
   //Make sure info was inserted
   
   $result = mysqli_query($con, $query);
   
   
   
   if(!$result){
   	$_SESSION["Message"] = "Database cannot connectghghg. ".mysqli_error($con)."";
   	$_SESSION["regState"] = -2;
   	header("location: ../index.php");
   	exit();
   	
   }
   
    
   
   //	header("location: ../addCourse.php");
   mysql_close($con);
   echo "$course added";
   }
   
   /*----------------------------------------------------------------------------------------------------*/   
   
   if($AjaxID == "DeleteCourse"){
   
   
   require_once("config.php");
   	 
   
   
   // Add all php mailer stuff
   
   $CourseID=$_POST["courseID"];
   
   
   $Email = $_SESSION["Email"];
    echo "$CourseID";
   //$test = "henrykombem@gmail.com";
   
   
   
   
    $con = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);
     if(!$con){
   	$_SESSION["Message"] = "Query failed.  ".mysqli_error($con)."";
   	$_SESSION["regState"] = -1;
   
   	header("location: ../index.php");
   	exit();
   }
   
   
   //$Squery = "SELECT ID FROM FA20_3296_tul46491.Users_AH where Email = 'henrykombem@gmail.com';";
    $query = "DELETE FROM `FA20_3296_tul46491`.`Courses_AH` WHERE (`CourseID` = '$CourseID') AND (UID = (SELECT ID FROM FA20_3296_tul46491.Users_AH where Email = '$Email' )) ;";
   $Sresult = mysqli_query($con, $Squery);
   
   
   
   //Make sure info was inserted
   
   $result = mysqli_query($con, $query);
   
   
   
   if(!$result){
   	$_SESSION["Message"] = "Database cannot connect. ".mysqli_error($con)."";
   	$_SESSION["regState"] = -2;
   	header("location: ../index.php");
   	exit();
   	
   }
   
    
   
   // 	header("location: ../addCourse.php");
   	mysql_close($con);
   }
   
   
   /*----------------------------------------------------------------------------------------------------*/   
   
   if($AjaxID == "AutoCompleteFieldAC"){     //php for auto complete field on add course page
   require_once("config.php");
   
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
   
    	mysql_close($con);
   
   }
   
   /*----------------------------------------------------------------------------------------------------*/   
   
   if($AjaxID == "PostQuestion"){     //php for auto complete field
   
   //Pull Users Course Data
   		   require_once("config.php");
   
   $CourseName=$_POST["cn"];
     $CourseID=$_POST["cid"];
     $Question=($_POST["ta"]);
     $DueDate=$_POST["dd"];
     $ACategory=$_POST["ac"];
     $Topic=$_POST["topic"];
   		   $Email = $_SESSION["Email"];
   		   
   // Format text area for unwanted html tags
   
   
   
   		   
   		  
   		   
   		   
   		   
   		
   		   
   		   
   		   
   			
   			$con = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);
   		   if(!$con){
   			$_SESSION["Message"] = "Query failed.  ".mysqli_error($con)."";
   			$_SESSION["regState"] = -1;
   			
   			header("location: ../index.php");
   			exit();
   		   }
   		   
   	
   		  
   		   
   		   $query = "INSERT INTO Questions_AH(UID,CID,Content,DueDate,ACategory,Topic) values ((SELECT DISTINCT ID FROM FA20_3296_tul46491.Users_AH where Email = '$Email' ),(SELECT DISTINCT CID FROM FA20_3296_tul46491.Courses_AH where CourseID = '$CourseID' AND UID = (SELECT DISTINCT ID FROM FA20_3296_tul46491.Users_AH where Email = '$Email')), '$Question', '$DueDate','$ACategory','$Topic')";
   		 
   		    $query1 ="UPDATE Users_AH SET AskedQuestions = AskedQuestions + 1 where Email =  '$Email'";
   		  
   		 	
   			
   		   $result = mysqli_query($con, $query);
   		    $result1 = mysqli_query($con, $query1);
   		   
   		   
   		  
   if(!$result ||!$result1 ){
   	$_SESSION["Message"] = "Database cannot connect. ".mysqli_error($con)."";
   echo $_SESSION["Message"];
   	$_SESSION["regState"] = -2;
   	header("location: ../index.php");
   	exit();
   	
   }
   
   echo "Question Posted. Check Course feed later for updates";
   mysql_close($con); 
   
   }
   
   /*----------------------------------------------------------------------------------------------------*/   
   
   
   if($AjaxID == "AutoCompleteFieldAQ"){     //php for auto complete field on ask question page
   require_once("config.php");
   
   $Category = $_POST["Cat"];
   $search = mysqli_real_escape_string($con,$_POST['Cat']);
   
   
   
    $con = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);
   if(!$con){
   	$_SESSION["Message"] = "Query failed.  ".mysqli_error($con)."";
   	$_SESSION["regState"] = -1;
   
   	header("location: ../index.php");
   	exit();
   }
   
   
   // $query = "SELECT Instructor FROM FA20_3296_tul46491.Courses_AH ;";
   $query = "SELECT DISTINCT ACategory FROM FA20_3296_tul46491.Questions_AH WHERE ACategory like'%".$Category."%'";
   //$query = "SELECT * FROM users WHERE name like'%".$search."%'";
   
   
   $result = mysqli_query($con, $query);
   
   
   
   if(!$result){
   	$_SESSION["Message"] = "Database cannot connect. ".mysqli_error($con)."";
   echo $_SESSION["Message"];
   	$_SESSION["regState"] = -2;
   	header("location: ../index.php");
   	exit();
   	
   }
   
   $Prof_list = array();
    while($row = mysqli_fetch_array($result))
    {
        $Prof_list[] = $row['ACategory'];
    }
    echo json_encode($Prof_list);
    
   
   	
   
   
   mysql_close($con); 
   
   
   
   }
   
   /*----------------------------------------------------------------------------------------------------*/
   
   if($AjaxID == "DisplayCourseData"){     //php for getiing quuestion data in object and sending
   require_once("config.php");
   $CourseName = $_POST["cn"];
   $Email = $_SESSION["Email"];
   
   $_SESSION["test"] = 8;  
   
    $con = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);
   //$con1 = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);
   if(!$con){
   	$_SESSION["Message"] = "Query failed.  ".mysqli_error($con)."";
   	$_SESSION["regState"] = -1;
   
   	header("location: ../index.php");
   	exit();
   }
   
   
   
   $query1 = "SELECT * FROM FA20_3296_tul46491.Questions_AH WHERE CID IN 
   	(SELECT DISTINCT CID FROM FA20_3296_tul46491.Courses_AH where CourseName = '$CourseName' ) 
   	AND Solved = 0 ;";
   	////To get all Question table Data
   	// IN keyword avoids the duplicate rows in subquery error
   
   $query2 ="SELECT * FROM FA20_3296_tul46491.Users_AH  WHERE ID IN
   	(SELECT  UID FROM FA20_3296_tul46491.Questions_AH where CID IN 
   		(SELECT  CID FROM FA20_3296_tul46491.Courses_AH where CourseName = '$CourseName')
   	AND Solved = 0) ;"; 		//To get all User table Data
   
   $query3 ="SELECT * FROM FA20_3296_tul46491.Courses_AH  WHERE CID IN
   	(SELECT  CID FROM FA20_3296_tul46491.Questions_AH where CID IN 
   		(SELECT  CID FROM FA20_3296_tul46491.Courses_AH where CourseName = '$CourseName')
   	AND Solved = 0) ;";        //To get all Course table  Data
   $query4 ="SELECT * FROM FA20_3296_tul46491.Users_AH  WHERE Email = '$Email' ;"; //To get Owners Usertable Data
   
   $query5  = "SELECT * FROM FA20_3296_tul46491.Solutions_AH  WHERE QID IN
   	(SELECT  QID FROM FA20_3296_tul46491.Questions_AH where CID IN 
   		(SELECT  CID FROM FA20_3296_tul46491.Courses_AH where CourseName = '$CourseName'));"; // Solutions Data
   
   $query6  = "select t2.SID, Count1 from (select count(Content) as Count1, SID from Comments group by SID) as t1
   	inner join  (SELECT * FROM FA20_3296_tul46491.Solutions_AH  WHERE QID IN
   	(SELECT  QID FROM FA20_3296_tul46491.Questions_AH where CID IN 
   		(SELECT  CID FROM FA20_3296_tul46491.Courses_AH where CourseName = '$CourseName'))) as t2 on t1.SID = t2.SID;"; // Get comments Data
   
   $query7 ="SELECT Users_AH.Username
   	FROM Users_AH
   	INNER JOIN Solutions_AH ON  Solutions_AH.SolverID    =  Users_AH.ID
   	WHERE Solutions_AH.QID  IN (SELECT  QID FROM FA20_3296_tul46491.Questions_AH where CID IN 
   						(SELECT  CID FROM FA20_3296_tul46491.Courses_AH where CourseName = '$CourseName'))";//To get all Solver Usernames
    $query8 ="SELECT Users_AH.Username
   	FROM Users_AH
   	INNER JOIN Solutions_AH ON  Solutions_AH.SolveeID    =  Users_AH.ID
   	WHERE Solutions_AH.QID  IN (SELECT  QID FROM FA20_3296_tul46491.Questions_AH where CID IN 
   						(SELECT  CID FROM FA20_3296_tul46491.Courses_AH where CourseName = '$CourseName'))";//To get all Solvee Usernames
   
   $query9 ="SELECT Questions_AH.Topic
   	FROM Questions_AH
   	INNER JOIN Solutions_AH ON  Solutions_AH.QID    =  Questions_AH.QID
   	WHERE Solutions_AH.QID  IN (SELECT  QID FROM FA20_3296_tul46491.Questions_AH where CID IN 
   						(SELECT  CID FROM FA20_3296_tul46491.Courses_AH where CourseName = '$CourseName'))";//Get Topics for each Solution								
   
   
   $result1 = mysqli_query($con, $query1);
   $result2 = mysqli_query($con, $query2);
   $result3 = mysqli_query($con, $query3);
   $result4 = mysqli_query($con, $query4);
   $result5 = mysqli_query($con, $query5);
   $result6 = mysqli_query($con, $query6);
   $result7 = mysqli_query($con, $query7);
   $result8 = mysqli_query($con, $query8);
   $result9 = mysqli_query($con, $query9);
   
   //First Result start  
   if(!$result1){
   	$_SESSION["Message"] = "Database cannot connect. ".mysqli_error($con)."";
   echo $_SESSION["Message"];
   	$_SESSION["regState"] = -2;
   	header("location: ../index.php");
   	exit();
   	
   }
   
   $NumResults1 = 0; 
   $Topic = array();
   $DueDate = array();
   $Category = array();
   $Result1CID= array();
   $Result1UID= array();
   $QID= array();
   $Content= array();
   
   
   
   
   while($row1 = mysqli_fetch_array($result1))
    {
    $NumResults1++;
    
        $Topic[] = $row1['Topic'];
   $DueDate[] = $row1['DueDate'];
   $Category[] = $row1['ACategory'];
   $Result1CID[] = $row1['CID'];
   $Result1UID[]= $row1['UID'];
   $QID[]= $row1['QID'];
   $Content[] = $row1['Content'];
    }
   //First Result End 	  
   
   //Second Result Start
   
   if(!$result2){
   	$_SESSION["Message"] = "Database cannot connect. ".mysqli_error($con)."";
   echo $_SESSION["Message"];
   	$_SESSION["regState"] = -1;
   	header("location: ../index.php");
   	exit();
   
   
   	
   }
   $Result2UID= array();
   
   $FullNameTemp= array();
   $FullName= array();
   $UsernameTemp= array();
   $Username= array();
   
   $NumResults2 = 0;
   
   
   while($row2 = mysqli_fetch_array($result2))
    {
    $NumResults2++;
    $Result2UID[] = $row2['ID'];
    $UsernameTemp[] = $row2['Username'];
    $FullNameTemp[] = $row2['FirstName'].' '.$row2['LastName']; 
   
    //Found out i will just need the username instead of fullname for privacy  but i'll just keep it incase we need it
    }
   $index1 = $NumResults1;
   $index2 = $NumResults2;
   
   
   for ($x = 0; $x < $index1; $x++) {  // We do this under the assumption that result3 set  could never be bigger than result1 set
   
   for ($y = 0; $y < $index2; $y++) {
   if ($Result1UID[$x]== $Result2UID[$y]){
   	$FullName[] = $FullNameTemp[$y];
   	$Username[] = $UsernameTemp[$y];
   }
   
   }
   }
   
   
   //Third Result Start
   if(!$result3){
   	$_SESSION["Message"] = "Database cannot connect. ".mysqli_error($con)."";
   echo $_SESSION["Message"];
   	$_SESSION["regState"] = -1;
   	header("location: ../index.php");
   	exit();
   	
   }
   
    $Result3CID= array();
   $InstructorsTemp= array();
   $Instructors= array();
   $NumResults3 = 0;
   
   
   while($row3 = mysqli_fetch_array($result3))
    {
    $NumResults3++;
   $Result3CID[] = $row3['CID'];
   $InstructorsTemp[] = $row3['Instructor'];
   
    }	
   
   
   $index1 = $NumResults1;
   $index3 = $NumResults3;
   
   
   for ($x = 0; $x < $index1; $x++) {  // We do this under the assumption that result3 set  could never be bigger than result1 set
   
   for ($y = 0; $y < $index3; $y++) {
   if ($Result1CID[$x]== $Result3CID[$y]){
   	$Instructors[] = $InstructorsTemp[$y];
   }
   
   }
   
   }
   
   //Third Result eEnd
   
   //Fourth Result Start
   
   if(!$result4){
   	$_SESSION["Message"] = "Database cannot connect. ".mysqli_error($con)."";
   echo $_SESSION["Message"];
   	$_SESSION["regState"] = -1;
   	header("location: ../index.php");
   	exit();
   	
   }
   
   $row4 = mysqli_fetch_array($result4);
   
   $OwnersUsername = $row4['Username']; 
   $OwnersID = $row4['ID'];
   // $_SESSION["OwnersId"] = $OwnersID;	
   $NumOwnerResults =0;
   
   for ($y = 0; $y < $NumResults1; $y++) {
   
   if($OwnersUsername == $Username[$y]){
   
   $NumOwnerResults++;             //My returning object handles two sinilar tables so this difference is needed
     
     }
   
   }
   
   
   //Fourth Result eEnd
   
   //5th , 6th , 7th, 8th, and 9th Result Start
   if(!$result5 || !$result6 || !$result7 || !$result8){
   	$_SESSION["Message"] = "Database cannot connect. ".mysqli_error($con)."";
   echo $_SESSION["Message"];
   	$_SESSION["regState"] = -1;
   	header("location: ../index.php");
   	exit();
   	
   }
   
    $SID= array();
   $Solver1ID= array();
   $Solvee1ID= array();
   $Solutions = array();
   $S_QID= array();
   $NumLikes= array();
   $NumDislikes= array();
   //$NumComments =   mysqli_num_rows($result6);
   $NumSolverResults = 0;
   $NumSolveeResults = 0;
   $Solver1Username= array();
   $Solvee1Username= array();
   $SolutionTopics = array();
   $NumComments = array();
   
   
    
   
   while($row7 = mysqli_fetch_array($result7)){
   $Solver1Username[] = $row7['Username'];
   
   }
   while($row8 = mysqli_fetch_array($result8)){
   $Solvee1Username[] = $row8['Username'];
   
   }
   
   while($row9 = mysqli_fetch_array($result9)){
   $SolutionTopics[] = $row9['Topic'];
   
   }
   
   $tempId = array();
   $tempCount = array();
   
   
   while($row6 = mysqli_fetch_array($result6))
    {
        $tempId[] = $row6['SID'];
   $tempCount[] = $row6['Count1'];
    }
   
   $index =0;
   
   
   while($row5 = mysqli_fetch_array($result5))
   
    {
    if( $row5['SolverID'] == $OwnersID ){
   $NumSolverResults++; 
    }
    else{
    $NumSolveeResults++;  
    }
   $tagfind =0; 
   $tagNfind =0;  	
   for ($z = 0; $z < count($tempCount); $z++) {
   
   if($tagfind == 0){
   if($row5['SID'] == $tempId[$z]){
   	$NumComments[$index] = $tempCount[$z] ;
   	$tagfind =1;
   }
   else{
   	$tagNfind++;
   	
   }	
   	
   }
     if($tagNfind == count($tempCount))	{
   $NumComments[$index] =0; 
   
   }	
   }
   
      
   
     
    
   
     $SID[] = $row5['SID'];
   $Solver1ID[] = $row5['SolverID'];
   $Solvee1ID[] = $row5['SolveeID'];
   $Solutions[] = $row5['Solution'];
   $S_QID[] = $row5['QID'];
   $NumLikes[] = $row5['Likes'];
   $NumDislikes[] = $row5['Dislikes'];
   
   
   
   
   
   $index++;	
   
    }	
   
   
   
   
   
   
   
   //5th , 6th , 7th, 8th, and 9th Result End
   
   
   
   	 //Put arrays in an onject to return to caller
   $dataOb ->NumResults =   		$NumResults1;
   $dataOb ->Topic =        		$Topic;
   $dataOb ->DueDate =      		$DueDate;
   $dataOb ->Category =     		$Category;
   $dataOb ->FullName =     		$FullName;
   $dataOb ->Instructors =  		$Instructors;
   $dataOb ->QID =          		$QID;
   $dataOb ->OUsername = 	  		$OwnersUsername;
   $dataOb ->OwnersID = 	  		$OwnersID;
   $dataOb ->Username = 	  		$Username;
   $dataOb ->NumOwnerResults = 	$NumOwnerResults;
   $dataOb ->Content = 			$Content;
   $dataOb ->UserID = 			$Result1UID;
   $dataOb ->SolverID = 			$Solver1ID;
   $dataOb ->SolveeID = 			$Solvee1ID;
   $dataOb ->NumLikes = 			$NumLikes;
   $dataOb ->NumDislikes = 	    $NumDislikes;
   $dataOb ->NumComments = 	    $NumComments;
   $dataOb ->Solutions = 	    	$Solutions;
   $dataOb ->S_QID = 	            $S_QID;
   $dataOb ->SolverUsername = 	$Solver1Username;
   $dataOb ->SolveeUsername = 	$Solvee1Username;
   $dataOb ->NumSolverResults = 	$NumSolverResults;
   $dataOb ->NumSolveeResults = 	$NumSolveeResults;
   $dataOb ->SolutionTopics = 	$SolutionTopics;
   $dataOb ->SID            = 	$SID;
   
   
   
   
   
    echo json_encode($dataOb);
     
   // exit();
   mysql_close($con);
   
   
   }
   
   /*----------------------------------------------------------------------------------------------------*/
   
   if($AjaxID == "SaveSolution"){     //php for inserting  Solution 
   
   require_once("config.php");
   
   
   $QuestionId = $_POST["QuestionId"];
   $SolverId = $_POST["SolverId"];
   $SolveeId = $_POST["SolveeId"];
   $Solution= $_POST["Solution"];
   $Email = $_SESSION["Email"];
   
   
   
   
   $con = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);
   
   //Validate Connection;
   if(!$con){
   	$_SESSION["Message"] = "Query failed.  ".mysqli_error($con)."";
   	$_SESSION["regState"] = -1;
   
   	header("location: ../index.php");
   	exit();
   }
   
   $query ="INSERT INTO Solutions_AH(Solution,SolverID, SolveeID,QID) 
     values ('$Solution','$SolverId', '$SolveeId',  '$QuestionId');"; //To Insert Solutiojn data
   
   $query1 ="UPDATE FA20_3296_tul46491.Questions_AH 
   SET Solved = '1' 
   WHERE (QID = '$QuestionId');"; //To Set question to solved
   
   $query2="UPDATE Users_AH SET SolvedQuestions = SolvedQuestions + 1 where ID = '$SolverId'";
   $result = mysqli_query($con, $query);
   $result1 = mysqli_query($con, $query1);
   $result2 = mysqli_query($con, $query2);
   
   //Validate Result;
   if(!$result || !$result1 || !$result2 ){
   	$_SESSION["Message"] = "Database cannot connect. ".mysqli_error($con)."";
   echo $_SESSION["Message"];
   	$_SESSION["regState"] = -1;
   	header("location: ../index.php");
   	exit();
   	
   }
   
   echo "Solution posted. Good Looking Out!";
   mysql_close($con);
   }
   
   
   /*----------------------------------------------------------------------------------------------------*/
   
   if($AjaxID == "DeleteQuestion"){     
   require_once("config.php");
   
   
   $QuestionId = $_POST["QuestionId"];
   
   
   
   
   
   $con = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);
   
   //Validate Connection;
   if(!$con){
   	$_SESSION["Message"] = "Query failed.  ".mysqli_error($con)."";
   	$_SESSION["regState"] = -1;
   
   	header("location: ../index.php");
   	exit();
   }
   
   $query ="DELETE FROM FA20_3296_tul46491.Questions_AH WHERE (QID = '$QuestionId');"; //To Delete Questions in Questions Table
   $result = mysqli_query($con, $query);
   
   //Validate Result;
   if(!$result){
   	$_SESSION["Message"] = "Database cannot connect. ".mysqli_error($con)."";
   echo $_SESSION["Message"];
   	$_SESSION["regState"] = -1;
   	header("location: ../index.php");
   	exit();
   	
   }
   mysql_close($con);
   
   }
   
   /*----------------------------------------------------------------------------------------------------*/
   
   if ($AjaxID == "ChangeDropdown"){
   
   require_once("config.php");
   
   if(isset($_POST['request'])){
   $request = $_POST['request'];
   }
   
   if($request == 1){
   
   $courseTag = $_POST['ct'];
   
   $con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
   $query = "SELECT CourseNumber FROM CoursesList WHERE CourseTag = '".$courseTag."';";
   $coursesNum = mysqli_query($con, $query);
   
   $coursesArray = array();
   while ($row = mysqli_fetch_array($coursesNum)) {
   $tempstring = $row['CourseNumber'];
   $coursesArray[] = array("number" => $tempstring);
   }
   echo json_encode($coursesArray);
   exit;
   }
   
   
   if($request == 2){
   
   $courseTag = $_POST['ct'];
   $courseID = $_POST['cid'];
   
   $con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
   $query = "SELECT CourseName FROM CoursesList WHERE CourseNumber = '".$courseID."' AND CourseTag = '".$courseTag."';";
   $coursesName = mysqli_query($con, $query);
   
   $coursesArray = array();
   while ($row = mysqli_fetch_array($coursesName)) {
   $tempstring = $row['CourseName'];
   $coursesArray[] = array("name" => $tempstring);
   }
   echo json_encode($coursesArray);
   exit;
   }
   mysql_close($con);
   
   }
   
   ?>