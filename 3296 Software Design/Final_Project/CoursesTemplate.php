<?php
   session_start();
   if ($_SESSION["regState"] != 4) header("location: index.php");
   
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
      <title>Dashboard - Brand</title>
      <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
      <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
      <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
      <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
      <link rel="stylesheet" href="css/styles.css">
      <script
         src="https://code.jquery.com/jquery-1.12.4.min.js"
         integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
         crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" 
         integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" 
         crossorigin="anonymous" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
         integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" 
         crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> <!-- Better and custom alerrts-->  
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> <!-- Better and custom alerrts-->
      <!---Fancy TextArea -->
      <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
      <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
   </head>
   <body id="page-top">
      <div id="wrapper">
         <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
               <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                  <div class="sidebar-brand-icon rotate-n-15"><i class='fab fa-studiovinari' style='font-size:48px;color:rgb(250, 178, 90);'></i></div>
                  <div class="sidebar-brand-text mx-3"><span style = "font-family: Times New Roman;Cursive;">T-Connect</span></div>
               </a>
               <hr class="sidebar-divider my-0">
               <ul class="nav navbar-nav text-light" id="accordionSidebar">
                  <li class="nav-item"><a class="nav-link " href="Dashboard.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                  <li class="nav-item"><a class="nav-link" href="addCourse.php"><i class="fas fa-user"></i><span>Manage Courses</span>
                     </a>
                  </li>
                  <li class="nav-item"><a class="nav-link " href="askQuestion.php"><i class="fas fa-table"></i><span>Post Question</span></a></li>
                  <li  class="nav-item"><a onclick ="toggleCourses()" class="nav-link active" href="CoursesTemplate.php"><i class="far fa-user-circle"></i><span    >Course Feed</span></a></li>
                  <li class="nav-item"><a class="nav-link" href="php/Logout.php"><i class="fas fa-user-circle"></i><span>Logout</span></a></li>
               </ul>
            </div>
         </nav>
         <?php
            //Connect to dba_close
             require_once("php/config.php");
              	
              //Get session Email
              $Email = $_SESSION["Email"];
              $index = 0;  //to give different IDs for links in while loop
              $_SESSION["NumCourses"] = 0;
               $_SESSION["CourseIDS"];
               $_SESSION["index"] = 0;
            
            $courseIDS = array();
               $con = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);
              if(!$con){
              	$_SESSION["Message"] = "Query failed.  ".mysqli_error($con)."";	
            	echo $_SESSION["Message"];
              }
              
            
              $query = "SELECT * FROM FA20_3296_tul46491.Courses_AH where UID = (SELECT ID FROM FA20_3296_tul46491.Users_AH where Email = '$Email' );";
              
              $result = mysqli_query($con, $query);
              
              if(!$result){
              	$_SESSION["Message"] = "Database cannot connect. ".mysqli_error($con)."";
              	echo $_SESSION["Message"];
              	
              }
             
              //Create list
            $html = '
            <ul style = "display:;" class= "popupnav scrollmenu  " id = "mcList">
            	<div style= "height: 14px" class = "d-flex align-items-start">
            	&nbsp;<p style= "  font-style: oblique;  font-weight: bold;" class = "text-center border-bottom-0">Your Courses  </p> &nbsp;&nbsp;&nbsp;
            	<button style = "background: red; width: 20px;" onclick= "toggleCourses()" type="button" class="btn btn-warning close border border-dark" aria-label="Close">
            		<span aria-hidden="true">&times;</span>
            	</button>
            	
            	
            	</div><hr style="height:1px;border:none;color:#333;background-color:#333;">
            	';
            	
              //Insert CourseNames in list Item
            
                  while($row = mysqli_fetch_array($result))
               {  
                $courseIDS[$index] = $row['CourseID'];
                   
            	$_SESSION["NumCourses"]++;
                   $html.= '   <li style = "font-size:14px;" class= "popupnav"><a  id = "cName'.$index.'" onclick="displayData('.$index.')" href="#home" class= "popupnav ">'.$row['CourseName'].'</a></li> <hr>  ';
            	$index =$index +1;
               }
            
             
            $html.= '</ul>';
            $_SESSION['CourseIDS'] = $courseIDS;
            //echo  $_SESSION['CourseIDS'];
            echo $html;
	
            mysql_close($con);
            ?> 
         <div class="d-flex flex-column" id="content-wrapper" style ="padding-left: 5px; margin-left: 0px;" >
            <div>
               <p class= "fancytitle"   ><strong>Add at least one to update  Course Information and possibly fill tables.<a href = "addCourse.php" style = "color: rgb(250, 178, 90);"> Click here to add a course</a> </td> </strong></p>
               <table id = "myTable1"class="table table-hover table-striped">
                  <thead >
                     <tr id="mythead">
                        <th>ID</th>
                        <th>User</th>
                        <th>Question Topic</th>
                        <th>Due Date</th>
                        <th>Instructor</th>
                        <th>Category</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody id = "tb1">
                  </tbody>
               </table>
            </div>
            <div>
               <p class= "fancytitle"   ><strong></strong></p>
               <table id = "myTable2" class="table table-hover table-striped">
                  <thead >
                     <tr id="mythead">
                        <th>ID</th>
                        <th>Solvee</th>
                        <th>Question Topic</th>
                        <th>Likes </th>
                        <th>Dislikes</th>
                        <th>Total Comments</th>
                        <th>Action</th>
                     </tr>
                  <tbody id = "tb2">
                  </tbody>
                  </thead>
                  <?php
                     //echo file_get_contents('php/AjaxActions.php');
                     
                     ?>
               </table>
            </div>
            <div>
               <p class= "fancytitle"   ><strong></strong></p>
               <table id = "myTable3"class="table table-hover table-striped">
                  <thead >
                     <tr id="mythead">
                        <th>ID</th>
                        <th>Question Topic</th>
                        <th>Due Date</th>
                        <th>Instructor</th>
                        <th>Category</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody id = "tb3">
                  </tbody>
               </table>
            </div>
            <div>
               <p class= "fancytitle"   ><strong></strong></p>
               <table id = "myTable4"class="table table-hover table-striped">
                  <thead >
                     <tr id="mythead">
                        <th>ID</th>
                        <th>Solver</th>
                        <th>Question Topic</th>
                        <th>Likes</th>
                        <th>Dislikes</th>
                        <th>Total Comments</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody id = "tb4">
                  </tbody>
               </table>
            </div>
            <!--Hidden divs to Communicate  courses session variable with javaScript via text content"-->
            <div style = " display:none;" id = "sessionV" value = "dummy"><?php echo $_SESSION["NumCourses"]; ?></div>
         </div>
         <!--Bootstrap 4 Modal-->
         <div class="modal" id="myModal">
            <div class="modal-dialog modal-xl" >
               <div class="modal-content">
                  <!-- Modal Header -->
                  <!-- Modal body -->
                  <div id = "mb" class="modal-body">
                     <p>Modal Content</p>
                  </div>
                  <!-- Modal footer -->
                  <div class=" text-center" style = "">
                     <button id ="saveQ" type="button" class="btn btn-primary" data-dismiss="modal" >Save</button>
                     &nbsp;&nbsp;
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
                  <br>
               </div>
            </div>
         </div>
      </div>
      <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
      <script>
         $("document").ready(function(){ //default look is the first course
         sessionStorage.setItem("QID", 0);
         
         //$("#cName"+ sessionStorage.getItem("CurrentCourseID")).trigger("click");
         $("#cName0").trigger("click");
         
         });
      </script>
      <script>
         function toggleCourses(i){
         	
         	$("#mcList").toggle();
         	event.preventDefault(); //prevent refresh effect
         }
         function displayData(i){
         
         sessionStorage.setItem("CurrentCourseID", i); // This it to avoid the default click on the first course
         	 
         
         
         //var dataObject;
         //$("a#trigger").trigger('mouseenter');
         //$("#cName0").mouseover();	
         
         
         
         
         
         
         	var AjaxID = "DisplayCourseData"; // AJAX  function identifier for php file using ajax variables
         			//Get the required ajax data
         	var cn = $("#cName"+i).text();
         	
         	
         	$.ajax({
         				url: "php/AjaxActions.php",
         				type: 'post',
         				method: 'POST',
         				async: false,
         				dataType: "json",
         				data: {
         				 cn: cn,
         				 AjaxID:AjaxID
         				},
         				encode: true
         		  }).always(function(data){
         			 var obj = <?php echo json_encode($_SESSION["CourseIDS"]); ?>; 
					 
					 
         			$('.fancytitle')[0].innerHTML = "<b>Questions posted by  other ["+obj[i]+"] students </b>";
         			$('.fancytitle')[1].innerHTML = "<b>Questions you answered for ["+obj[i]+"]</b>";
         			$('.fancytitle')[2].innerHTML = "<b>Your pending ["+obj[i]+"] questions</b>";
         			$('.fancytitle')[3].innerHTML = "<b>Your questions solved by other  ["+obj[i]+"] students</b>";
         			//$('.fancytitle')[2].innerHTML = "<b>3333</b>"	
         			//$('.fancytitle')[3].innerHTML = "<b>4444</b>"	
         			  
         			 console.log(data);// see data for debugging
         			 //alert(data.NumResults);
         			//Reset Variables id's are just to name the table rows for the user
         			$id1 = 0;
         			$id3 = 0;
         			$id2 = 0;
         			$id4 = 0;
         			$("#tb1").empty();
         			$("#tb3").empty();
         			$("#tb2").empty();
         			$("#tb4").empty();
         			
         			//Empty Tables and add empty cells upon new buttton click for table 1
         
         			  if((data.NumResults-data.NumOwnerResults)  == 0){
         				
         				
         				$('#myTable1').append(
         					'<tr>'+
         				'<td colspan ="7" style="text-align:center">Hmm, looks like your peers dont have any questions. Click <a href = "askQuestion.php">here to post a question</a> </td>'+
         
         
         					'</tr>' 
         									 );
         				}
         			  
         			  //Empty Tables and add empty cells upon new buttton click for table 3
         			  
         			  if( data.NumOwnerResults == 0){
         				
         			    //alert($NumOwnerResults);
         				$('#myTable3').append(
         					'<tr>'+
         					'<td colspan ="7" style="text-align:center">No pending  questions Check the table below for answered solutions  or click <a href = "askQuestion.php">here to post a question</a> </td>'+
         
         					'</tr>' 
         									 );
         				}
         				
         				if( data.NumSolveeResults == 0){
         				
         			    //alert($NumOwnerResults);
         				$('#myTable4').append(
         					'<tr>'+
         						'<td colspan ="7" style="text-align:center">Please exercise some patience you are still wainting.If not,browse other courses or help your peers  </td>'+
         					'</tr>' 
         									 );
         				}
         				if( data.NumSolverResults == 0){
         				
         			    //alert($NumOwnerResults);
         				$('#myTable2').append(
         					'<tr>'+
         					'<td colspan ="7" style="text-align:center">No questions answered. Help your peers and run those answers  up  </td>'+
         
         					'</tr>' 
         									 );
         				}
         			
         				
         				
         			  //var rowIndexNum1;
         			 // var previousRow1 = document.getElementById("myTable1");
         			 // var table1 = document.getElementById("myTable1");
         	
         			  var CurrentButton1A;  
         			  var CurrentButton2A;
         			  var CurrentButton3A;
         			  var CurrentButton4A;
         			  var CurrentButton1B;
         			  var CurrentButton2B; 					  
         			  var CurrentButton3B;
         			  var CurrentButton4B;
         			  
         			  var index_1_3 =0;
         			  var index_2_4 =0;
         			  
         			  var currentButtonID_1_3A;
         			  var currentButtonID_1_3B;
         			  var currentButtonID_2_4A;
         			  var currentButtonID_2_4B;
         			  
         			  for (var counter = 0; counter < data.SolverUsername.length; counter++) { // fill tables 2 and 4
         				  if(data.SolverUsername[counter] == data.OUsername ){  //Owner Solved a question
         				  
         						  $id2++;
         						  $('#myTable2').append(
         							'<tr  id = "row' + $id2 + '">'+
         								'<td>'+$id2+'</td>'+
         								'<td>'+data.SolveeUsername[counter]+'</td>'+
         								'<td>'+data.SolutionTopics[counter]+'</td>'+
         								'<td>'+data.NumLikes[counter]+'</td>'+
         								'<td>'+data.NumDislikes[counter]+'</td>'+
         								'<td>'+data.NumComments[counter]+'</td>'+
         								'<td>'+
         									'<button class = "btn " id = "vr'+index_2_4+'">View Activity</button>'+
         									
         								'</td>'+
         							'</tr>'
         						   );
         						   CurrentButton2A = document.getElementById("vr"+index_2_4);
         						   CurrentButton2A.onclick = function() {
         								
         									currentButtonID_2_4A = this.id.replace(/[^0-9\.]+/g, ""); // remove non digits form string
         									MakeCorrection(data,currentButtonID_2_4A,event );
         									};;
         						  index_2_4++;
         				  }
         				  else{     						//Owner's question was solved
         							$id4++;
         							$('#myTable4').append(
         							'<tr  id = "row' + $id4 + '">'+
         								'<td>'+$id4+'</td>'+
         								'<td>'+data.SolverUsername[counter]+'</td>'+
         								'<td>'+data.SolutionTopics[counter]+'</td>'+
         								'<td>'+data.NumLikes[counter]+'</td>'+
         								'<td>'+data.NumDislikes[counter]+'</td>'+
         								'<td>'+data.NumComments[counter]+'</td>'+
         								'<td>'+
         									'<a><button class = "btn " id = "vs'+index_2_4+'">View Solution</button></a>'+
         									
         								'</td>'+
         							'</tr>'
         						   );
         						   CurrentButton4A = document.getElementById("vs"+index_2_4);
         						   CurrentButton4A.onclick = function() {
         								
         									currentButtonID_2_4B = this.id.replace(/[^0-9\.]+/g, ""); // remove non digits form string
         									ViewSolution(data,currentButtonID_2_4B,event );
         									};;
         						  index_2_4++;
         				  
         				  
         				  }
         			  }
         			  
         			  for (var counter = 0; counter < data.NumResults; counter++) {  // fill tables 1 and 3
         				    
         				    if(data.Username[counter] != data.OUsername ){ // Non-Owner Data
         				    $id1++;
         					
         					//$index_1_3 = $id1 - 1;
         					//alert($index);
         				    $('#myTable1').append(
         					'<tr  id = "row' + $id1 + '">'+
         						'<td>'+$id1+'</td>'+
         						'<td>'+data.Username[counter]+'</td>'+
         						'<td>'+data.Topic[counter]+'</td>'+
         						'<td>'+data.DueDate[counter]+'</td>'+
         						'<td>'+data.Instructors[counter]+'</td>'+
         						'<td>'+data.Category[counter]+'</td>'+
         						'<td>'+
         							'<button class = "btn " id = "peek'+index_1_3+'">Peek</button>'+
         							'&nbsp;&nbsp;'+
         							'<button  id = "solve'+index_1_3+'" type = "button" class = "btn " data-toggle="modal" data-target="#myModal">Solve</button>'+
         						'</td>'+
         					'</tr>'
         					
         					
         				   );
         				   
         				  
         				//Set listener using javaScript because jquery string parsing is crazy and not recommended
         						CurrentButton1A = document.getElementById("peek"+index_1_3);
         						CurrentButton1A.onclick = function() {
         						
         						    currentButtonID_1_3A = this.id.replace(/[^0-9\.]+/g, ""); // remove non digits form string
         							peekQuestion(data.Topic[currentButtonID_1_3A],data.Content[currentButtonID_1_3A]);
         							};;
         					
         					
         					
         					CurrentButton1B = document.getElementById("solve"+index_1_3);
         					CurrentButton1B.onclick = function() {
         						
         						    currentButtonID_1_3B = this.id.replace(/[^0-9\.]+/g, ""); // remove non digits form string
         							SolveQuestion(data,currentButtonID_1_3B,event);
         							};;
         					
         					index_1_3++;
         						
         					}
         					else{
         						 
         					    $id3++;
         						$('#myTable3').append(
         						'<tr>'+
         							'<td>'+$id3+'</td>'+
         							'<td>'+data.Topic[counter]+'</td>'+
         							'<td>'+data.DueDate[counter]+'</td>'+
         							'<td>'+data.Instructors[counter]+'</td>'+
         							'<td>'+data.Category[counter]+'</td>'+
         							'<td>'+
         								'<button class = "btn " id = "peek'+index_1_3+'">Peek</button>'+
         								'&nbsp;&nbsp;'+
         								'<button class = "btn" id = "delete'+index_1_3+'">Delete</button>'+'</td>'+
         						'</tr>'
         						
         						);
         						//Set listener using javaScript because jquery string parsing is crazy and not recommended
         							CurrentButton3A = document.getElementById("peek"+index_1_3);
         							CurrentButton3A.onclick = function() {
         								
         								currentButtonID_1_3A = this.id.replace(/[^0-9\.]+/g, ""); // remove non digits form string
         								peekQuestion(data.Topic[currentButtonID_1_3A],data.Content[currentButtonID_1_3A]);;
         							};
         							
         							//IMplement delete function
         							CurrentButton3B = document.getElementById("delete"+index_1_3);
         							CurrentButton3B.onclick = function() {
         								
         								currentButtonID_1_3B = this.id.replace(/[^0-9\.]+/g, ""); // remove non digits form string
         								DeleteQuestion(data, currentButtonID_1_3B);
         							};;
         						
         					index_1_3++;
         						
         						
         						
         				   
         					}
         			  } 
         		
         		
         			  
         		  })
         	
         	// Loop to induce hovering effect Note: number like string are automatically parsed
             for (var counter = 0; counter < $('#sessionV').text() ; counter++) {
         			if(counter == i){
         			
         			$("#cName"+counter).css({"color": "white", "background-color": "#555"});
         			}
         		else{
         		$("#cName"+counter).css({"color": "black", "background-color": "#f1f1f1"});		  
         		}				
         			 }
         			  
         		  
         	
         	//Edit table with javascript
         	//Edit table 1 and 3 first cuz they demand almost the same data
         	
         	
         
         	
         	
         	/*
         	  var row1 = table1.insertRow(1);
         	  row1.setAttribute('onclick', 'highlightFunction(this)');
         	  var cell1_1 = row1.insertCell(0);
         	  var cell2_1 = row1.insertCell(1);
         	  var cell3_1 = row1.insertCell(2);
         	  var cell4_1 = row1.insertCell(3);
         	  var cell5_1 = row1.insertCell(4);
         	  var cell6_1 = row1.insertCell(5);
         	  var cell7_1 = row1.insertCell(6);
         	  
         	  
         	  
         	  cell1_1.innerHTML = "<b> hey</b>";
         	  cell2_1.innerHTML = "hey";
         	  cell3_1.innerHTML = "hey";
         	  cell4_1.innerHTML = "hey";
         	  cell5_1.innerHTML = "<b> hey</b>";
         	  cell6_1.innerHTML = "hey";
         	  cell7_1.innerHTML = "hey";
         */	  
         
         }
         
         function ViewSolution(dataObj,i ){
         	sessionStorage.setItem("QID", dataObj.S_QID[i]);
         	location.replace("Dashboard.php")
         	
         }
         
         function MakeCorrection(dataObj,i ){
         	
         	sessionStorage.setItem("QID", dataObj.S_QID[i]);
         	location.replace("Dashboard.php")
         	//alert(dataObj.S_QID[i]);
         }
         function DeleteQuestion(dataObj,i ){
         	 Swal.fire({
         						  titleText: 'Confirmation',
         						  text: "Are you sure you want to delete question "+i+" ?",
         						  icon: 'error',
         						  showDenyButton: true,
         						  confirmButtonText: 'Yes',
         						  denyButtonText: 'No'
         						  
         
         						 
         				}).then((result) => {
         				  //Action listener for comfirmation button
         				  if (result.isConfirmed) {
         							
         							var AjaxID = "DeleteQuestion"; // AJAX  function identifier for php file using ajax variables
         								
         							$.ajax({
         							url: "php/AjaxActions.php",
         							type: 'post',
         							method: 'POST',
         							async: false,
         							data: {
         							QuestionId: dataObj.QID[i],
         							AjaxID:AjaxID
         							},
         							
         					  }).always(function(data){  
         					  
         							location.reload(true);// reload page
         					  })							
         				  }
         				})
         	
         }
         
         function peekQuestion(Topic,Question){
         						//alert(Question);
         							swal({
         									  title: Topic, 
         									  text: Question,  
         									  icon: "info",
         									  
         									});
         				
         
         
         				
         						}
         
         function SolveQuestion(dataObj,i){
         	//alert((dataObj.Content[i]));  // Fix outputed content
         	//  event.preventDefault();
         	$('#mb').html('<p class= "fancytitle"   ><strong id = "qt"></strong></p>'+
         	             						  
         				  '<p><strong>Question </strong></p>'+
         				  '<div  style = "white-space: pre;"class = "border border-info" id = "qc"> </div>'+
         				  '<br>'+
         	              '<p class= "fancytitle"   ><strong>Please enter solution below</strong></p>'+
         				  
         				  '<textarea wrap = "hard" id = "StArea" name = "Question Solution" style="height: 25vh;"'+
         				  'class="form-control"></textarea>'
         				  
                          );
         	// Doint this to avoid html injection
         	$('#qt').text("Topic:   "+dataObj.Topic[i]);
         	$('#qc').text(dataObj.Content[i]);
         
         
         
         //Send Solution to database
         SaveButton = document.getElementById("saveQ");
         SaveButton.onclick = function() {
         	
         	var AjaxID = "SaveSolution"; // AJAX  function identifier for php file using ajax variables
         	//var Solution = $("StArea").val();
         	$.ajax({
         				url: "php/AjaxActions.php",
         				type: 'post',
         				method: 'POST',
         				async: false,
         				data: {
         				 QuestionId: dataObj.QID[i],
         				 Solution: $("#StArea").val(),
         				 SolverId: dataObj.OwnersID,
         				 SolveeId: dataObj.UserID[i],
         				 AjaxID:AjaxID
         				},
         				
         		  }).always(function(data){
         			 
         			  
         			  Swal.fire({
         						  titleText: 'Success',
         						  text: data,
         						  icon: 'success',
         						  button: 'Okay'
         						  
         
         						 
         				}).then((result) => {
         				  //Action listener for comfirmation button
         				  if (result.isConfirmed) {
         					location.reload(true);	// reload page
         				  }
         				})
         			  
         		  })
         	
         	
         	
         	
         };
         
         }
         function openSolveQForm() {
           document.getElementById("sqForm").style.display = "block";
         }
         
         function closeSolveQForm() {
           document.getElementById("sqForm").style.display = "none";
         }
      </script>	
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/js/chart.min.js"></script>
      <script src="assets/js/bs-init.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
      <script src="assets/js/theme.js"></script>
      <script src="alert/dist/sweetalert-dev.js"></script>
      <link rel="stylesheet" href="alert/dist/sweetalert.css">
   </body>
</html>