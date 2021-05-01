<?php
   session_start();
   session_regenerate_id(true);
   if(!isset($_SESSION["regState"])) $_SESSION["regState"] = 0;
   if(!isset($_SESSION["Authenticate"])) $_SESSION["Authenticate"] = 0;
   
   	if ($_SESSION["regState"] == 4) header("location: Dashboard.php");
   if (($_SESSION["regState"] < 1) &&
   		($_SESSION["regState"] != 2) &&
		($_SESSION["regState"] != 1) &&
   		($_SESSION["regState"] != 3) &&
   		($_SESSION["regState"] != 4) &&
   		($_SESSION["regState"] != 5) &&
   		($_SESSION["regState"] != 6) &&
   		($_SESSION["regState"] != 7) &&
   		($_SESSION["regState"] != 8)) $_SESSION["regState"] = 0;
   //Display Errors
   //error_reporting(E_ALL);
   //ini_set('display_errors',1);
   
   //Read Dropdown Data from a file
   $collegesFile = file('TextFiles/Colleges.txt', FILE_IGNORE_NEW_LINES);
   $collegeMajorsFile = file('TextFiles/CollegeMajors.txt', FILE_IGNORE_NEW_LINES);
   $courseNamesFile = file('TextFiles/CourseNames.txt', FILE_IGNORE_NEW_LINES);
   $courseIDFile = file('TextFiles/CourseID.txt', FILE_IGNORE_NEW_LINES);
   $professorsFile = file('TextFiles/Professors.txt', FILE_IGNORE_NEW_LINES);
   
   
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
      <title>Final Project</title>
      <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
      <link rel="stylesheet" href="assets/css/Login_Reset_Form.css">
      <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
      <link rel="stylesheet" href="assets/css/styles.css">
      <link rel="stylesheet" href="css/styles.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <!-- Latest compiled Bootstrap JS-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   </head>
   <body>
      <?php
         if ($_SESSION["regState"] <= 0) {
         
         ?>
      <div class="login-clean">
         <form action="php/Login.php" method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-navigate"></i></div>
            <div class="form-group">
               <input class="form-control" type="email" name="email" placeholder="Email"> 
            </div>
            <div class="form-group">
               <input class="form-control" type="password" name="password" placeholder="Password"> 
            </div>
            <div class="form-group">
               <button class="btn btn-primary btn-block" type="submit">Log In</button>
            </div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a style="color: rgb(163, 160, 160); font-size: 15px" href="php/Register.php">Register </a> | <a style="color: rgb(163, 160, 160); font-size: 15px" href="php/ResetPassword.php">Forgot Password</a>
            <p style="color: red;">
               <?php  
                  echo $_SESSION["Message"];
                  //	$_SESSION["Message"] = "";   
                       ?>
            </p>
         </form>
      </div>
      <script>
         sessionStorage.setItem("QID", 0); //Set a couple session variables
         sessionStorage.setItem("CurrentCourseID", 0);
      </script>
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      <?php
         } 
          if($_SESSION["regState"] == 1) {
         ?>
      <div class="register-photo">
         <div class="form-container">
            <div class="image-holder"></div>
            <form action="php/Register2.php" method="get">
               <h2 class="text-center"><strong>Create</strong> an account.</h2>
               <div class="form-group">
                  <input class="form-control" type="text" name="FirstName" placeholder="First Name"> 
               </div>
               <div class="form-group">
                  <input class="form-control" type="text" name="LastName" placeholder="Last Name"> 
               </div>
               <div class="form-group">
                  <input class="form-control" type="Username" name="Username" placeholder="Username"> 
               </div>
               <div class="form-group">
                  <input class="form-control" type="email" name="Email" placeholder="Email"> 
               </div>
               <div class="form-group">
                  <select style="width: 100%; height: 36px" id="value" name="Major">
                     <option selected value="base">Please Select Major</option>
                     <?php 
                        //Read file line by line into dropdown
                        foreach($collegeMajorsFile as $lines){ //add php code here
                        echo "<option value='".$lines."'>$lines</option>";
                        }
                        ?>
                  </select>
               </div>
               <div class="form-group">
                  <div class="form-check">
                     <label class="form-check-label">
                     <input class="form-check-input" type="checkbox">I agree to the license terms.</label>
                  </div>
               </div>
               <div class="form-group">
                  <button class="btn btn-primary btn-block" type="submit"> Sign Up </button>
               </div>
               <a class="already" href="index.php">
               You already have an account? Login here.
               <?php  
                  $_SESSION["regState"] = 0;   
                  ?>
               </a> 
            </form>
         </div>
      </div>
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      <?php
         } 
         ?>
      <?php
         if($_SESSION["regState"] == 2) {
          
         ?>
      <div class="ResetPassword">
         <form action="php/ResetPassword2.php" method="POST">
            <h2 class="sr-only">ResetPassword</h2>
            <div class="illustration"><i class="icon ion-ios-navigate"></i></div>
            <h1 class="" style="font-size: 15px; text-align: center;">Please enter a registered email</h1>
            <div class="form-group">
               <input class="form-control" type="email" name="email" placeholder="Email"> 
            </div>
            <div class="form-group">
               <button class="btn btn-primary btn-block" type="submit">Authenticate</button>
            </div>
            <p style="color: red;">
               <?php
                  echo $_SESSION["Message"];
                  $_SESSION["Message"] = "";
                  
                  ?>
            </p>
         </form>
      </div>
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      <?php
         } 
         ?>
      <?php
         if($_SESSION["regState"] == 3) {
         ?>
      <div class="SetPassword">
         <form action="php/SetPassword.php" method="POST">
            <h2 class="sr-only">SetPassword</h2>
            <div class="illustration"><i class="icon ion-ios-navigate"></i></div>
            <h1 class="" style="font-size: 15px; text-align: center; white-space: nowrap;">Enter New Password</h1>
            <div class="form-group">
               <input class="form-control" type="password" name="password1" placeholder="New Password"> 
            </div>
            <div class="form-group">
               <input class="form-control" type="password" name="password2" placeholder="Re-enter Password"> 
            </div>
            <div class="form-group">
               <button class="btn btn-primary btn-block" type="submit">Set Password</button>
            </div>
            <p style="color: red;">
               <?php
                  echo $_SESSION["Message"];
                  $_SESSION["Message"] = "";
                  ?>
            </p>
      </div>
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      <?php
         } 
         ?>
      <?php
         if($_SESSION["regState"] == 5) {
         ?>
      <div style="text-align: left;" class="alert alert-success" role="alert"><span>Verification Link Sent</span></div>
      <div class="login-clean">
      <form>
         <h2 class="sr-only">Login Form</h2>
         <div class="illustration"><i class="icon ion-ios-navigate"></i></div>
         <span> A verification link was sent to <b style ="color : rgb(3, 156, 153);"><i><?php echo $_SESSION["Email"]; ?></i></b> &nbsp;</span>
         <a target= "_blank" href="https://accounts.google.com/signin/v2/identifier?service=mail&passive=true&rm=false&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&ss=1&scc=1&ltmpl=default&ltmplcache=2&emr=1&osid=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin" class="btn btn-primary btn-block">Gmail</a> <a target= "_blank" href="https://www.icloud.com/mail" class="btn btn-primary btn-block">icloud</a> <a target= "_blank" href="https://login.yahoo.com/" class="btn btn-primary btn-block">Yahoo</a>
         <br>
         <div style="text-align:center;"> <a href="php/Login.php" style="color: rgb(163, 160, 160); font-size: 15px">Not your Email? Go back</a> </div>
      </form>
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      <?php
         } 
         ?>
      <?php
         if($_SESSION["regState"] == 6) { //Add Courses Page
         ?>
      <div class="login-clean">
         <form action="php/addCourse.php" method="GET">
            <h2 class="sr-only">Please add all course information</h2>
            <div class="form-group">
               <input class="form-control" type="text" name="CourseName" placeholder="Course Name"> 
            </div>
            <div class="form-group">
               <input class="form-control" type="text" name="CourseID" placeholder="Course ID. Ex. CIS 3296, CIS 111"> 
            </div>
            <div class="form-group">
               <input class="form-control" type="text" name="InstructorName" placeholder="InstructorName"> 
            </div>
            <div class="form-group">
               <input class="form-control" type="text" name="Category" placeholder="Assignment Category. Ex. Homework, Quizzes, In-class problems"> 
            </div>
            <div class="form-group">
               <input class="form-control" type="text" name="classSection" placeholder="Class Section. Ex. 1, 2, 3"> 
            </div>
            <div class="form-group">
               <button class="btn btn-primary btn-block" type="submit">Add Course</button>
            </div>
            <p style="color: red;">
               <?php
                  echo $_SESSION["Message"];
                  $_SESSION["Message"] = "";
                  ?>
            </p>
      </div>
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      <?php
         } 
         ?>
      <?php
         if($_SESSION["regState"] == 7) {   //AddProblem Page
          
         ?>
      <div style="">
      <form action="php/addQuestion.php" style=" height: 100vh; width:100vw;" method="get">
      <div>
      <p class="fancytitle"><strong>Fill in the question details below</strong></p>
      <div class="form-row">
      <div class="form-group col-md-6">
      <label for="CourseName">Course Name</label>
      <input type="name" class="form-control" id="courseName" name="courseName"> </div>
      <div class="form-group col-md-6">
      <label for="CourseID">Course ID</label>
      <input type="name" name="courseID" class="form-control" id="courseID" placeholder="Ex. CIS 3296"> </div>
      </div>
      <div class="form-group">
      <label> Assignment Category </label>
      <input type="aCategory" name="Category" class="form-control" id="aCategory" placeholder="Ex. Homework, Quiz, in-class problem"> </div>
      <div class="form-row">
      <div class="form-group col-md-6">
      <label for="InstructorName">Instructor's Name</label>
      <input type="name" name="InstructorName" class="form-control" id="instructorName"> </div>
      <div class="form-group col-md-6">
      <label for="classSection">Class Section</label>
      <input type="name" name="classSection" class="form-control" id="classSection"> </div>
      </div>
      <div class="form-row">
      <div class="form-group col-md-6">
      <label for="dueDate">Due Date</label>
      <input type="date" name="dueDate" class="form-control" id="dueDate"> </div>
      <div class="form-group col-md-6">
      <label>Attach File</label>
      <input type="file" name="inputFile" class="form-control" id="Afile"> </div>
      </div>
      <div class="form-group">
      <label>Caption attached file or type question in text area below</label>
      <textarea name="Caption_question" style="height: 30vh;width: 100vw" class="form-control"></textarea>
      </div>
      <div style="text-align: center;" class="form-group">
      <button class="btn btn-primary " style="background: rgb(129, 134, 138)" type="submit">Post Question</button>
      <form action="Dashboard.php">
      <input class="btn  btn-primary btn-block" type="submit" value="Home" /> </form>
      </div>
      </div>
      </form>
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      <!---Fancy TextArea -->
      <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
      <script type="text/javascript">
         bkLib.onDomLoaded(nicEditors.allTextAreas);
      </script>
      </div>
      <?php
         } 
         ?>
      <?php
         if($_SESSION["regState"] == 8) {   //Add Course Page
          
         ?>
      <div style="">
         <form action="php/addCourse.php" style=" width:100vw;" method="POST">
            <div>
               <p class="fancytitle"><strong>Fill in the question details below</strong></p>
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label for="CourseName">Course Name</label>
                     <select style="width: 100%; height: 36px" id="CNvalue" name="CourseName">
                        <option selected value="base">Select Course Name</option>
                        <?php 
                           //Read file line by line into dropdown
                           foreach($courseNamesFile as $lines){ //add php code here
                           echo "<option CNvalue='".$lines."'>$lines</option>";
                           }
                           ?>
                     </select>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="CourseID">Course ID</label>
                     <select style="width: 100%; height: 36px" id="CIDvalue" name="CourseID">
                        <option selected value="base">Select Course ID</option>
                        <?php 
                           //Read file line by line into dropdown
                           foreach($courseIDFile as $lines){ //add php code here
                           echo "<option CIDvalue='".$lines."'>$lines</option>";
                           }
                           ?>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label> Assignment Category </label>
                  <input type="aCategory" name="Category" class="form-control" id="aCategory" placeholder="Ex. Homework, Quiz, in-class problem"> 
               </div>
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label for="InstructorName">Instructor's Name</label>
                     <select style="width: 100%; height: 36px" id="ProfID" name="InstructorName">
                        <option selected value="base">Select Instructor</option>
                        <?php 
                           //Read file line by line into dropdown
                           foreach($professorsFile as $lines){ //add php code here
                           echo "<option ProfID='".$lines."'>$lines</option>";
                           }
                           ?>
                     </select>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="classSection">Class Section</label>
                     <input type="name" name="classSection" class="form-control" id="classSection"> 
                  </div>
               </div>
            </div>
         </form>
         <div style="display: flex; justify-content: center;">
            <button type="submit" id="ACButton" onclick="AddRowFunction()" class="btn btn-primary ">Add Course</button> <span style="padding-left: 35px;"></span>
            <button id="PButton" class="btn btn-primary ">Proceed</button>
         </div>
         <script>
            // use ajax to access php file with database instructions without altering the page
            $(document).ready(function() {
            	$("#ACButton").click(function() {
            		var cn = $("#CNvalue").val();
            		var cid = $("#CIDvalue").val();
            		var p = $("#ProfID").val();
            		var cs = $("#classSection").val();
            		var ac = $("#aCategory").val();
            		$.ajax({
            			url: 'php/addCourse.php',
            			method: 'POST',
            			data: {
            				cn: cn,
            				cid: cid,
            				p: p,
            				cs: cs,
            				ac: ac
            			},
            			success: function(response) {
            				// alert(response);
            			}
            		});
            	});
            });
         </script>
         <div class="table-responsive">
            <table id="myTable" class="table table-hover table-striped">
               <thead>
                  <tr id="mythead">
                     <th>Course Name </th>
                     <th>Course ID </th>
                     <th> Assignment Category</th>
                     <th>Instructor Name</th>
                     <th> Class Section</th>
                  </tr>
               </thead>
               <tbody> </tbody>
            </table>
            <div style="display: flex; justify-content: center;">
               <button id="ECButton" onclick="EditRowFunction()" class="btn btn-primary ">Edit Courses</button> <span style="padding-left: 35px;"></span>
               <button id="DCButton" class="btn btn-primary ">Delete Courses</button>
            </div>
            <!--Script to add course to table-->
            <script>
               var rowIndexNum;
               var previousRow = document.getElementById("myTable");;
               
               function AddRowFunction() {
               	var CourseName = document.getElementById("CNvalue").value;
               	var CourseID = document.getElementById("CIDvalue").value;
               	var InstructorName = document.getElementById("ProfID").value;
               	var ACategory = document.getElementById("aCategory").value;
               	var ClassSection = document.getElementById("classSection").value;
               	var table = document.getElementById("myTable");
               	var row = table.insertRow(1);
               	row.setAttribute('onclick', 'highlightFunction(this)');
               	var cell1 = row.insertCell(0);
               	var cell2 = row.insertCell(1);
               	var cell3 = row.insertCell(2);
               	var cell4 = row.insertCell(3);
               	var cell5 = row.insertCell(4);
               	cell1.innerHTML = CourseName;
               	cell2.innerHTML = CourseID
               	cell3.innerHTML = ACategory;
               	cell4.innerHTML = InstructorName;
               	cell5.innerHTML = ClassSection;
               	// Add stuff to database via php
               }
               
               function highlightFunction(oRow) {
               	previousRow.style.backgroundColor = "white";
               	previousRow = oRow;
               	var empTab = document.getElementById('myTable');
               	rowIndexNum = oRow.rowIndex; // Keep track of changing index
               	document.getElementById("DCButton").setAttribute('onclick', 'DeleteRowFunction()');
               	oRow.style.backgroundColor = "rgb(200, 218, 247)";
               }
               
               function DeleteRowFunction() {
               	if(rowIndexNum != -1) {
               		var empTab = document.getElementById('myTable').deleteRow(rowIndexNum);
               		rowIndexNum = -1; //Make sure it does not delete unselected rows
               	}
               }
               
               function EditRowFunction() {
               	//table.contentEditable = true;
               	document.getElementById("myTable").contentEditable = true;
               	document.getElementById("mythead").contentEditable = false;
               }
               
               function saveFunction() {
               	document.getElementById("myTable").contentEditable = false;
               }
            </script>
         </div>
         <script src="assets/js/jquery.min.js"></script>
         <script src="assets/bootstrap/js/bootstrap.min.js"></script>
         <!---Fancy TextArea -->
         <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
         <script type="text/javascript">
            bkLib.onDomLoaded(nicEditors.allTextAreas);
         </script>
      </div>
      <?php
         } 
         ?>
   </body>
</html>