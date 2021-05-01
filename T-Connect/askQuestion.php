<!DOCTYPE html>
<?php
   session_start();
   if ($_SESSION["regState"] != 4) header("location: index.php");
   
    $_SESSION["CourseID"]= "";
    
   
   ?>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
      <title>Table - Brand</title>
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
      <!--  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> <!-- Better and custom alerrts-->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> <!-- Better and custom alerrts-->
   <body id="page-top">
      <div id="wrapper" >
      <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style ="margin-right:0px" >
         <div class="container-fluid d-flex flex-column p-0">
            <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
               <div class="sidebar-brand-icon rotate-n-15"><i class='fab fa-studiovinari' style='font-size:48px;color:rgb(250, 178, 90);'></i></div>
               <div class="sidebar-brand-text mx-3"><span style = "font-family: Times New Roman;Cursive;">T-Connect</span></div>
            </a>
            <hr class="sidebar-divider my-0">
            <ul class="nav navbar-nav text-light" id="accordionSidebar">
               <li class="nav-item"><a class="nav-link" href="Dashboard.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
               <li class="nav-item"><a class="nav-link" href="addCourse.php"><i class="fas fa-user"></i><span>Manage Courses</span></a></li>
               <li class="nav-item"><a class="nav-link active" href="askQuestion.php"><i class="fas fa-table"></i><span>Post Question</span></a></li>
               <li class="nav-item"><a class="nav-link" href="CoursesTemplate.php"><i class="far fa-user-circle"></i><span>Course Feed</span></a></li>
               <li class="nav-item"><a class="nav-link" href="php/Logout.php"><i class="fas fa-user-circle"></i><span>Logout</span></a></li>
            </ul>
         </div>
      </nav>
      <div class="d-flex flex-column" id="content-wrapper" style ="padding-left: 0px; margin-left: 0px;">
         <div id="content" style ="padding-left:0px;">
            <div class="container-fluid">
               <div style = "">
                  <form  style="padding-left: 0px; margin-left: 0px; " method="POST" >
                     <div>
                        <p class= "fancytitle" style="margin-top: 5px;"><strong>Please fill in your question details below</strong></p>
                        <div class="form-row">
                           <div class="form-group col-md-6">
                              <label for="CourseName">Course Name</label> 
                              <select onchange = "setReadOnly(this)"style = "width: 100%; height: 36px" id="CNvalue" name = "CourseName">	
                              <?php
                                 //Pull Users Course Data
                                   require_once("php/config.php");
                                 
                                 //Initialize Empty Arrays;
                                 $CourseIDList = [];
                                  $InstructorList = [];
                                  $SectionList = [];
                                     $index = 0;
                                   
                                   
                                  
                                   
                                   $Email = $_SESSION["Email"];
                                   
                                 
                                   
                                   
                                   
                                 
                                 $con = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);
                                   if(!$con){
                                 $_SESSION["Message"] = "Query failed.  ".mysqli_error($con)."";
                                 $_SESSION["regState"] = -1;
                                 
                                 header("location: ../index.php");
                                 exit();
                                   }
                                   
                                  
                                   
                                   $query = "SELECT DISTINCT * FROM FA20_3296_tul46491.Courses_AH where UID = (SELECT ID FROM FA20_3296_tul46491.Users_AH where Email = '$Email' );";
                                 
                                   
                                  
                                   
                                   $result = mysqli_query($con, $query);
                                   
                                   
                                   
                                   if(!$result){
                                 $_SESSION["Message"] = "Database cannot connect. ".mysqli_error($con)."";
                                 $_SESSION["regState"] = -2;
                                 header("location: ../index.php");
                                 exit();
                                 
                                   }
                                  
                                 $select = ' ';	
                                 while($row = mysqli_fetch_array($result))
                                 {
                                 
                                    $select.='<option onclick = "setCourseID()" class = "options" >'.$row['CourseName'].'</option>';
                                 
                                  $InstructorList[$index] = $row['Instructor'];
                                 $CourseIDList[$index] = $row['CourseID'];
                                 $SectionList[$index]= $row['Section'];
                                 $index = $index +1;
                                 }
                                 $select.='</select>';
                                 
                                 echo $select;
                                 
                                 mysql_close($con);
                                 
                                  ?>
                              <!--  <input type="name" class="form-control" id="courseName"  name = "courseName"> -->
                           </div>
                           <script>
                              //Get arrays from php using json_enchode
                              
                              var CourseIDList =   <?php echo json_encode($CourseIDList); ?>; 
                              var InstructorList =   <?php echo json_encode($InstructorList); ?>; 
                              var SectionList =   <?php echo json_encode($SectionList); ?>; 
                              
                              $("#courseID").val(CourseIDList[0]);
                              $("#instructorName").val(InstructorList[0]);
                              $("#classSection").val(SectionList[0]);
                              
                              function setReadOnly(a){
                               
                              
                              
                              //  $z = $("#CNvalue option:selected").text(); //Get Selected Text
                              $selectedIndex = $("#CNvalue option:selected").index(); //Get Selected Index
                              
                              //Set values of other text fields
                              
                              
                              $("#courseID").val(CourseIDList[$selectedIndex]);
                              $("#instructorName").val(InstructorList[$selectedIndex]);
                              $("#classSection").val(SectionList[$selectedIndex]);
                              }
                              
                              
                           </script>
                           <div class="form-group col-md-6">
                              <label for="CourseID">Course ID</label>
                              <input  readonly type="name"  name = "courseID" class="form-control" id="courseID" value="<?php   echo  $CourseIDList[0];   ?>" >
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-6">
                              <label for="InstructorName">Instructor's Name</label>
                              <input value="<?php   echo  $InstructorList[0];   ?>" readonly type="name"  name = "InstructorName" class="form-control" id="instructorName" >
                           </div>
                           <div class="form-group col-md-6">
                              <label for="classSection">Class Section</label>
                              <input value="<?php   echo  $SectionList[0];   ?>"  readonly type="name" name = "classSection" class="form-control" id="classSection" >
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-6">
                              <label for="dueDate">Due Date</label>
                              <input  type="date" name = "dueDate" class="form-control" id="dueDate" >
                           </div>
                           <div class="form-group col-md-6">
                              <label>
                              Assignment Category
                              </label>
                              <input type="aCategory"  name = "Category" class="form-control" id="aCategory" placeholder="Ex. Homework, Quiz, in-class problem">
                           </div>
                           <script>
                              sessionStorage.setItem("QID", 0);
                              var AjaxID = "AutoCompleteFieldAQ"; // AJAX  function identifier for php file using ajax variables
                              //Sending data via ajax to php file for Autocomplete Computation 	
                              $( "#aCategory" ).autocomplete({
                               source: function( request, response ) {
                                // Fetch data
                                $.ajax({
                              url: "php/AjaxActions.php",
                              type: 'post',
                              method: 'POST',
                              dataType: "json",
                              data: {
                               search: request.term,
                               Cat: $("#aCategory").val(),
                               AjaxID:AjaxID
                              },
                              success: function( data ) {
                              	//alert($("#aCategory").val())
                               response( data );
                              }
                                });
                               },
                               select: function (event, ui) {
                                // Set selection
                                $('#aCategory').val(ui.item.label); // display the selected text
                              //  $('#selectuser_id').val(ui.item.value); // save selected id to input
                                return false;
                               }
                              }); 
                              
                           </script>
                        </div>
                        <div class="form-group">
                           <p class= "fancytitle" ><strong>Please type your Question Below</strong></p>
                           <div class="form-group col-md-12">
                              <label for="TopicName">Add the question Topic  (Please be specific)</label>
                              <input placeholder=" Example: 16.2 Line Integrals "  type="name"  name = "TopicName" class="form-control" id="TopicName" >
                           </div>
                           <textarea wrap = "hard"id = "tArea" placeholder="Type question here" name = "Caption_question" style="height: 25vh;width: 100vw" class="form-control"></textarea>
                        </div>
                        <div style="text-align: center;"class="form-group">
                           <button id = "PQButton"class="btn btn-primary " >Post Question</button>
                        </div>
                     </div>
                  </form>
                  <script>
                     // use ajax to Post question using php file with database instructions without altering the page
                              $(document).ready(function(){
                                  $("#PQButton").click(function(event){
                                      var cn=$("#CNvalue").val();
                                      var cid=$("#courseID").val();
                     		 var topic =$("#TopicName").val();
                     		 var ta = $('#tArea').val();
                     		
                                    /* var nicE = new nicEditors.findEditor('tArea'); for fancy text area
                     		 ta = nicE.getContent();
                     	*/
                                      var dd=$("#dueDate").val();
                     		 var ac=$("#aCategory").val();
                     		var AjaxID = "PostQuestion"; // AJAX  function identifier for php file using ajax variables
                     		 // alert(ta);
                     		 
                     		
                                      $.ajax({
                                          url:'php/AjaxActions.php',
                                          method:'POST',
                     			async: false,
                                          data:{
                                              cn:cn,
                                              cid:cid,
                     				ta:ta,
                     				dd:dd,
                     				ac:ac,
                     				topic:topic,
                     				AjaxID:AjaxID
                     			
                     				
                                          },
                                          success:function(response){
                                             
                     			  
                     			Swal.fire({
                     					  titleText: 'Success',
                     					  text: "Check Course Feed for updates!",
                     					  icon: 'success',
                     					  confirmButtonText: 'Okay'
                     					  
                     
                     					 
                     			}).then((result) => {
                     			  //Action listener for comfirmation button
                     			  if (result.isConfirmed) {
                     				location.reload(true);	// reload page
                     			  }
                     			})
                     				event.preventDefault(); // allows Swal to fun without function interfering	
                     			
                                          }
                                      });
                                  
                     	
                     	});
                              });
                     
                          
                  </script>
                  <script src="assets/js/jquery.min.js"></script>
                  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
                  <!---Fancy TextArea 
                     <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
                       <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script> -->
               </div>
            </div>
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