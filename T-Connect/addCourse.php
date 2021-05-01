<!DOCTYPE html>
<?php
   
   session_start();
   
   
   if ($_SESSION["regState"] != 4) header("location: index.php");
   
   if(!isset($_SESSION["regState"])) $_SESSION["regState"] = 0;
   if(!isset($_SESSION["Authenticate"])) $_SESSION["Authenticate"] = 0;
   require_once("php/config.php");
   //Display Errors
   //error_reporting(E_ALL);
   //ini_set('display_errors',1);
   
   //Read Dropdown Data from a file
   $collegesFile = file('Colleges.txt', FILE_IGNORE_NEW_LINES);
   $collegeMajorsFile = file('CollegeMajors.txt', FILE_IGNORE_NEW_LINES);
   $courseIDFile = file('CourseID.txt', FILE_IGNORE_NEW_LINES);
   $professorsFile = file('Professors.txt', FILE_IGNORE_NEW_LINES);
   
   //Gets Dropdown Data for Courses Tag
   $con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
   //$query = "SELECT CourseTag FROM courseslist;";
   //$coursesIDS = mysqli_query($con, $query);
   //print "In addCourse.php (Daniels) after query processing<br>";
   //exit();	
   
   $_SESSION["ms"]= "myTable";
   
   ?>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=">
      <title>Profile - Brand</title>
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
   </head>
   <body id="page-top " >
      <div id="wrapper " style = "display: flex;">
         <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0"  >
            <div class="container-fluid d-flex flex-column p-0 "style=" ">
               <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                  <div class="sidebar-brand-icon rotate-n-15"><i class='fab fa-studiovinari' style='font-size:48px;color:rgb(250, 178, 90);'></i></div>
                  <div class="sidebar-brand-text mx-3"><span style = "font-family: Times New Roman;Cursive;">T-Connect</span></div>
               </a>
               <hr class="sidebar-divider my-0">
               <ul class="nav navbar-nav text-light" id="accordionSidebar "  style = "width: 100%; overflow: auto;">
                  <li class="nav-item"><a class="nav-link" href="Dashboard.php"><i  class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                  <li class="nav-item"><a class="nav-link active" href="addCourse.php"><i class="fas fa-user"></i><span>Manage Courses</span></a></li>
                  <li class="nav-item"><a class="nav-link " href="askQuestion.php"><i class="fas fa-table"></i><span>Post Question</span></a></li>
                  <li class="nav-item"><a class="nav-link" href="CoursesTemplate.php"><i class="far fa-user-circle"></i><span>Course Feed</span></a></li>
                  <li class="nav-item"><a class="nav-link" href="php/Logout.php"><i class="fas fa-user-circle"></i><span>Logout</span></a></li>
               </ul>
            </div>
         </nav>
         <script type="text/javascript">
            // $(function() {
            //     var availableTags = <?php include('autocomplete.php'); ?>;
            //     $("#department_name").autocomplete({
            //         source: availableTags,
             //        autoFocus:true
             //    });
            // });
            sessionStorage.setItem("QID", 0);
             
         </script>
         <div class="d-flex flex-column" id="content-wrapper"style=" padding:2px;width: 100%;">
            <div id="content" >
               <div style = "">
                  <form action="php/AjaxActions.php"   method="POST">
                     <div>
                        <p class= "fancytitle"   ><strong>Please fill in your Course Information  </strong></p>
                        <div class="form-row">
                           <div class="form-group col-md-6">
                              <label for="CourseTag">Course Tag</label>
                              <select style = "width: 100%; height: 36px" id="CTagValue" name = "CourseTag">
                                 <option value="base">Select Course Tag</option>
                                 <?php 
                                    //Read file line by line into dropdown
                                    require_once("php/config.php");
                                    $con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
                                    
                                    if (!$con) {
                                    	print "Database connection failure: ".mysqli_error($con);
                                    	exit();
                                    }
                                    //print "<option value='1'>After connection</option>";							
                                    $query = "SELECT DISTINCT CourseTag FROM CoursesList ORDER BY CourseTag ASC;";
                                    $coursesIDS = mysqli_query($con, $query);
                                    if (!$coursesIDS) {
                                    	print "Query failure:".mysqli_error($con);
                                    	exit();
                                    }
                                    while ($obj = mysqli_fetch_object($coursesIDS)) {
                                    	$tempstring = "".$obj->CourseTag;
                                    	echo "<option value='".$tempstring."'>$tempstring</option>";;
                                    } 
                                    ?>
                              </select>
                              <script>
                                 // use ajax to access php file with database instructions without altering the page
                                 $(document).ready(function(){
                                 	$('#CTagValue').change(function(){
                                 		var ct = $('#CTagValue').val();
                                 		var AjaxID = "ChangeDropdown"; // AJAX  function identifier for php file using ajax variables
                                 	 
                                 		$.ajax({
                                 			url:'php/AjaxActions.php',
                                 			method:'POST',
                                 			data:{
                                 				request:1,
                                 				ct:ct,
                                 				AjaxID:AjaxID
                                 			},
                                 			dataType: 'json',
                                 			success:function(response){
                                 				//alert(response);
                                 				console.log(response);
                                 				var len = response.length;
                                 					
                                 				$("#courseNameID").val("");
                                 				$('#CIDvalue').find('option').not(':first').remove();
                                 				for( var i = 0; i<len; i++){
                                 					var cID = response[i]["number"];
                                 					$("#CIDvalue").append("<option value='"+cID+"'>"+cID+"</option>");
                                 				}
                                 			}
                                 		});
                                 	});
                                 });
                              </script>
                           </div>
                           <div class="form-group col-md-6">
                              <label for="CourseID">Course ID</label>
                              <select style = "width: 100%; height: 36px" id="CIDvalue" name = "CourseID">
                                 <option value="base">Select Course ID</option>
                                 <?php 
                                    ?>
                              </select>
                              <script>
                                 // use ajax to access php file with database instructions without altering the page
                                 $(document).ready(function(){
                                 	$('#CIDvalue').change(function(){
                                 		var cid = $('#CIDvalue').val();
                                 		var ct = $('#CTagValue').val();
                                 		var AjaxID = "ChangeDropdown"; // AJAX  function identifier for php file using ajax variables
                                 	 
                                 		$.ajax({
                                 			url:'php/AjaxActions.php',
                                 			method:'POST',
                                 			data:{
                                 				request:2,
                                 				cid:cid,
                                 				ct:ct,
                                 				AjaxID:AjaxID
                                 			},
                                 			dataType: 'json',
                                 			success:function(response){
                                 				//alert(response);
                                 				console.log(response);
                                 				$("#CourseNameID").empty();
                                 
                                 				var cName = response[0]["name"];
                                 				$("#courseNameID").val(cName);
                                 			}
                                 		});
                                 	});
                                 });
                              </script>
                           </div>
                           <div class="form-group col-md-6">
                              <label for="CourseName">Course Name</label>
                              <input readonly="readonly" id="courseNameID" name = "CourseName"type="text" size="50" style = "width: 100%; height: 36px"/>
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-6">
                              <label for="InstructorName">Instructor's Name</label>
                              <input id="ProfID" name = "InstructorName"type="text" size="50" style = "width: 100%; height: 36px"/>
                              <script>
                                 //$("#ProfID").autocomplete({
                                 	
                                 	
                                 //	source: "php/autocomplete.php"
                                 //});
                                 
                              </script>
                              <script>
                                 var AjaxID = "AutoCompleteFieldAC"; // AJAX  function identifier for php file using ajax variables
                                 //Sending data via ajax to php file for Autocomplete Computation 	
                                 $( "#ProfID" ).autocomplete({
                                  source: function( request, response ) {
                                   // Fetch data
                                   $.ajax({
                                    url: "php/AjaxActions.php",
                                    type: 'post',
                                 method: 'POST',
                                    dataType: "json",
                                    data: {
                                     search: request.term,
                                  Prof: $("#ProfID").val(),
                                  AjaxID:AjaxID
                                    },
                                    success: function( data ) {
                                 	//alert(data);
                                     response( data );
                                    }
                                   });
                                  },
                                  select: function (event, ui) {
                                   // Set selection
                                   $('#ProfID').val(ui.item.label); // display the selected text
                                 //  $('#selectuser_id').val(ui.item.value); // save selected id to input
                                   return false;
                                  }
                                 }); 
                                 
                              </script>
                              <!--  <select style = "width: 100%; height: 36px" id="ProfID" name = "InstructorName">
                                 <option selected value="base">Select Instructor</option>
                                   <?php 
                                    //Read file line by line into dropdown
                                    //foreach($professorsFile as $lines){ //add php code here
                                    //echo "<option ProfID='".$lines."'>$lines</option>";
                                    //}
                                    ?>
                                 </select>-->
                           </div>
                           <div class="form-group col-md-6">
                              <label for="classSection">Class Section</label>
                              <input type="name" name = "classSection" class="form-control" id="classSection" >
                           </div>
                        </div>
                     </div>
                  </form>
                  <div style="display: flex; justify-content: center;">
                     <button type = "submit" id="ACButton" onclick="AddRowFunction()" class = "btn btn-primary ">Add Course</button> 
                     <span style="padding-left: 35px;"></span>
                     <button  id ="DCButton"  class = "btn btn-primary ">Delete Course</button> 
                  </div>
                  <script>
                     // use ajax to access php file with database instructions without altering the page
                              $(document).ready(function(){
                                  $("#ACButton").click(function(){
                                      var cn=$("#courseNameID").val();
                                      var cid=$("#CTagValue").val() + " "+$("#CIDvalue").val();
                     		 var p=$("#ProfID").val();
                                      var cs=$("#classSection").val();
                     		var AjaxID = "AddCourse"; // AJAX  function identifier for php file using ajax variables
                     		 
                     		 
                     		
                                      $.ajax({
                                          url:'php/AjaxActions.php',
                                          method:'POST',
                                          data:{
                                              cn:cn,
                                              cid:cid,
                     				p:p,
                     				cs:cs,
                     				AjaxID:AjaxID
                     				
                                          },
                                          success:function(response){
                     				console.log(response);
                                             //alert(response);
                                          }
                                      });
                                  });
                              });
                          
                  </script>
                  <br>
                  <p class= "fancytitle"><strong>Your Courses</strong></p>
                  <div class="table-responsive">
                     <table id = "myTable"class="table table-hover table-striped">
                        <thead >
                           <tr id="mythead">
                              <th>Course Name </th>
                              <th>Course ID </th>
                              <th>Instructor Name</th>
                              <th> Class Section</th>
                              <?php 
                                 //Keep track of user
                                 $Email = $_SESSION["Email"];
                                 //Pull data from database
                                 
                                  require_once("php/config.php");
                                   $con = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);
                                  if(!$con){
                                 		$_SESSION["Message"] = "Query failed.  ".mysqli_error($con)."";
                                 		$_SESSION["regState"] = -1;
                                 		
                                 		header("location: addCourse.php");
                                 		exit();
                                  }
                                  $query = "SELECT * FROM FA20_3296_tul46491.Courses_AH where UID = (SELECT ID FROM FA20_3296_tul46491.Users_AH where Email = '$Email' );";
                                 
                                 
                                 
                                           $result = mysqli_query($con, $query);
                                 
                                 
                                 
                                    if(!$result){
                                 	$_SESSION["Message"] = "Database cannot connect. ".mysqli_error($con)."";
                                 	$_SESSION["regState"] = -2;
                                 	header("location: addCourse.php");
                                 	exit();
                                 	
                                    }
                                  if(mysqli_num_rows($result) > 0){
                                 
                                              while ($row = mysqli_fetch_assoc($result)) {
                                                  echo '<tr style="" onclick="highlightFunction(this)" ">';
                                                  echo '<td>'. $row['CourseName'] .'</td>';
                                                  echo '<td>'. $row['CourseID'] .'</td>';
                                 		echo '<td>'. $row['Instructor'] .'</td>';
                                 		echo '<td>'. $row['Section'] .'</td>';
                                                  echo '</tr>';
                                              }
                                          }
                                 
                                 mysql_close($con);
                                 ?>
                           </tr>
                        </thead>
                        <tbody>
                        </tbody>
                     </table>
                     <!--Hidden dive to Communicate session variable with javaScript via text content"-->
                     <div style = " display:none;" id = "sa" value = "wawa"><?php echo $_SESSION["ms"]; ?></div>
                     <!--Script to add course to front end table-->
                     <script>
                        var rowIndexNum;
                        var previousRow = document.getElementById("myTable");
                        
                         var courseID;
                        
                        	function AddRowFunction(){ //Add row function because the page doesnt reset to pull from db whena row is added // I could just refresh with location.reload(true); but i dont want to because i already did the work
                        		
                        		var sessionV = document.getElementById("sa").textContent;
                        		//<?php $_SESSION["ms"]?>
                        		//'<%= Session["haha"] %>';
                        		
                        		
                        		
                        		var CourseName = document.getElementById("courseNameID").value;
                        		var CourseID = document.getElementById("CTagValue").value + " "+ document.getElementById("CIDvalue").value;
                        		var InstructorName = document.getElementById("ProfID").value;
                        		var ClassSection = document.getElementById("classSection").value;
                        		
                        		
                        	  var table = document.getElementById("myTable");
                        	  var row = table.insertRow(1);
                        	  row.setAttribute('onclick', 'highlightFunction(this)');
                        	  var cell1 = row.insertCell(0);
                        	  var cell2 = row.insertCell(1);
                        	  var cell3 = row.insertCell(2);
                        	  var cell4 = row.insertCell(3);
                        	  
                        	  
                        	  cell1.innerHTML = CourseName;
                        	  cell2.innerHTML = CourseID
                        	  cell3.innerHTML = InstructorName;
                        	  cell4.innerHTML = ClassSection;
                        	 
                        	 // Add stuff to database via php
                        									
                        			
                        	
                        								
                        	}
                        	
                         
                        	function highlightFunction(oRow){
                        		
                        		
                        		previousRow.style.backgroundColor = "white";
                        		previousRow = oRow;
                        		
                        		
                        		var empTab = document.getElementById('myTable');
                        		 rowIndexNum = oRow.rowIndex;  // Keep track of changing index
                        		
                        		document.getElementById("DCButton").setAttribute('onclick', 'DeleteRowFunction()');
                                                  oRow.style.backgroundColor = "rgb(200, 218, 247)";
                        		
                        		
                        	 
                        	}
                        	function DeleteRowFunction(){
                         if(rowIndexNum != -1){
                        	 
                        	    var table = document.getElementById("myTable");
                        		var AjaxID = "DeleteCourse"; // AJAX  function identifier for php file using ajax variables
                        
                        	     courseID = table.rows[rowIndexNum].cells[1].innerHTML;
                        	
                        		table.deleteRow(rowIndexNum);
                        	    rowIndexNum = -1; //Make sure it does not delete unselected rows on front end table
                        		
                        		 $.ajax({
                        		url:'php/AjaxActions.php',
                        		method:'POST',
                        		data:{
                        			courseID:courseID,
                        			AjaxID: AjaxID
                        			
                        			
                        		},
                        		success:function(response){
                        		  // alert(response);
                        		}
                        		});
                        		
                        	}
                        	
                        
                        	
                        		
                        	//Use ajax to delete from database	
                        					
                        	// use ajax to access php file with database instructions without altering the page
                        	
                        			//var cn=$("#courseNameID").val();
                        			//var cid=$("#CIDvalue").val();
                        			// var p=$("#ProfID").val();
                        			//var cs=$("#classSection").val();
                        			 
                        			 
                        	 
                        			
                        	
                        	}
                        
                        
                        	function EditRowFunction(){
                        		//table.contentEditable = true;
                        		
                        		//document.getElementById("myTable").contentEditable = true;
                        		//document.getElementById("mythead").contentEditable  = false;
                        		
                        
                        
                        	}
                        
                         function saveFunction() {
                        	 //document.getElementById("myTable").contentEditable = false;
                        	
                        	 
                        	}
                     </script>
                     <?php
                        $_SESSION["ms"]= "myTablea"; ?>
                  </div>
                  <script src="assets/js/jquery.min.js"></script>
                  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
                  <!---Fancy TextArea -->
                  <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
                  <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
               </div>
            </div>
            <footer class="bg-white sticky-footer">
               <div class="container my-auto">
                  <div class="text-center my-auto copyright"><span>Copyright © Brand 2020</span></div>
               </div>
            </footer>
         </div>
         <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
      </div>
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/js/chart.min.js"></script>
      <script src="assets/js/bs-init.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
      <script src="assets/js/theme.js"></script>
   </body>
</html>