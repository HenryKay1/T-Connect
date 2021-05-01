<?php
   session_start();
   if ($_SESSION["regState"] != 4){ header("location: index.php");}
   if(!isset($_SESSION["answerState"])) $_SESSION["answerState"] = 0;
   if(!isset($_SESSION["CurrentQID"])) $_SESSION["CurrentQID"] = 0;
   
   
   
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
      <script src="vendor/mark.js/dist/mark.min.js"></script> <!--keyword highlighter-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Google icons-->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
      <!---Fancy TextArea 
         <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
            <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script> -->
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
               <li class="nav-item"><a id = "Dash" onclick = "dashboardTab()" class="nav-link active" href="Dashboard.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
               <li class="nav-item"><a class="nav-link" href="addCourse.php"><i class="fas fa-user"></i><span>Manage Courses</span>
                  </a>
               </li>
               <li class="nav-item"><a class="nav-link " href="askQuestion.php"><i class="fas fa-table"></i><span>Post Question</span></a></li>
               <li  class="nav-item"><a onclick ="toggleCourses()" class="nav-link" href="CoursesTemplate.php"><i class="far fa-user-circle"></i><span    >Course Feed</span></a></li>
               <li class="nav-item"><a class="nav-link" href="php/Logout.php"><i class="fas fa-user-circle"></i><span>Logout</span></a></li>
            </ul>
         </div>
      </nav>
      <div class="d-flex flex-column" id="content-wrapper">
      <div id="content">
      <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
         <div class="container-fluid">
            <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
            <div style = "width:60vw;" class="input-group border border-gray">
               <input style = "background:grey;" id = "searchInput" class="bg-light form-control border-0 small" type="text" placeholder="Look up Question">
               <div class="input-group-append"><button  onclick = "postSearch()"class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
            </div>
            <span style = "padding-left: 250px;">&nbsp; <button onclick = "Logout()"class = "btn btn" style="background:#fc5b5b; color:white;">Logout</button></span>
         </div>
      </nav>
      <?php
         if ($_SESSION["answerState"] == 0) {
         
         ?>
      <!--Solution Page not ready for viewing-->
      <div id="sp" style = "display: none">
         <div class = "" id = "Qsection" style = "padding-bottom:5px;padding-left:5px;s">
            <!--Content filled in script-->
         </div>
         <br>
         <div  id = "Ssection" style = "padding-bottom:15px; padding-left:5px;"> 
         </div>
      </div>
      <div  class = "" id = "searchR" style="display : none">
         <!--display: none;-->
         <p class= "fancytitle"    ><strong>Search Results</strong></p>
         <table id = "myTable1"class="table table-hover table-striped">
            <thead >
               <tr id="mythead">
                  <th>CourseID</th>
                  <th>Instructor</th>
                  <th>Question</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody id = "tb1">
            </tbody>
         </table>
      </div>
      <!--Get the course Data via php-->
      <?php
         //Connect to dba_close
         require_once("php/config.php");
          	
          //Get session Email
          $Email = $_SESSION["Email"];
          $index = 0;  //to give different IDs for links in while loop
         
          
         
           $con = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);
          if(!$con){
          	$_SESSION["Message"] = "Query failed.  ".mysqli_error($con)."";	
         echo $_SESSION["Message"];
          }
          
         
          $query = "SELECT * FROM (SELECT Questions_AH.QID, Questions_AH.Content, Questions_AH.Topic,t1.Likes,t1.Dislikes, Courses_AH.CourseName,Courses_AH.CourseID
         	FROM Questions_AH
         	INNER JOIN (Select * FROM (SELECT  SID,QID,Likes,Dislikes
         	FROM FA20_3296_tul46491.Solutions_AH
         	where Likes >0
         	and dislikes >0
         	and Likes-Dislikes BETWEEN -2 AND 1
         	order by Likes DESC) as ControSub
         	group by QID) as t1 
         	ON t1.QID=Questions_AH.QID
         	INNER JOIN Courses_AH ON Courses_AH.CID = Questions_AH.CID
         	order by t1.Likes DESC) as ControMain 
         	Group by CourseName;
         
         ";  //Get Controversial Solution for each course
          
          $result = mysqli_query($con, $query);
          
          if(!$result){
          	$_SESSION["Message"] = "Database cannot connect. ".mysqli_error($con)."";
          	echo $_SESSION["Message"];
          	
          }
          $num_rows = mysqli_num_rows($result);
           $index =1;
          
          $html = '
          <div id = "sb"><p class= "fancytitle"   ><strong>Controversial solutions for ongoing courses</strong></p>
         <br>
          <div class="slideshow-container" style ="width: 60vv;  background:#c0f0f0">
           <p class= "fancytitle" style="background:pink;" ></strong></p>
          ';
          //Append Data to slide show
              while($row = mysqli_fetch_array($result))
         
           { 
           
              //echo $row["CourseName"];
           
         $html.= '
         
         			<div  class="mySlides ">
         	  <div class="" ><span style = "background:black;color:white;">'.$index.'/' .$num_rows.'</span></div>
         	  
         	<div class="container">
         	  <div class="row">
         		<div class="col-12 d-flex justify-content-center">
         		<i class="fas fa-street-view" style="font-size:100px;"></i>
         		</div>
         		<div class="col-12 d-flex justify-content-center"><strong style ="color: black; font-size:17px;">
         		  '."  . ".'
         		</strong></div>
         		
         		<div class="col-12 d-flex justify-content-center"><strong style ="color: black; font-size:17px;">
         		  '.$row["CourseName"].'  ('.$row["CourseID"].')
         		</strong></div>
         		
         		<div style = "color: black;font-weight: bold;padding-left: 50px"class="col-11 "><span >
         		'.$row["Topic"].'
         		</span></div>
         		<div class="col-12 " style = "padding-left: 50px">
         		<span class = " " >
         		 '.".".'
         		 </span>
         		</div>
         		<div class="col-12 " style = " padding-left: 50px;padding-right: 50px; padding-bottom:5px;">
         		<div class = " " style =";  word-wrap: break-word;white-space: pre-wrap;" >'.htmlspecialchars($row["Content"]).'</div>
         		</div>
         		<br>
         		<div class="col-6 d-flex justify-content-end">
         		<button class = " btn btn-primary border"style=" pointer-events: none;background: black;color:white;  font-size:14px">'.$row["Likes"].'&nbsp;<i class="fa fa-thumbs-up " style="color:white;"></i></button>
         		</div>
         		<div class="col-6 d-flex justify-content-start">
         		 <button class = "btn btn-danger border" style=" pointer-events: none;background: black;color:white;  font-size:14px">'.$row["Dislikes"].'&nbsp;<i class="fa fa-thumbs-down"></i></button> 
         		</div>
         		
         		
         	  </div>
         	</div>
         	<br>
         	  <div class=" text-center" style=" " >
         		<button class ="btn border border-dark" style =" background:pink; " onclick = "showSolution('.$row["QID"].')"> 	Follow up</button>	
         
         		</div>
         	  <br>
         	  
         	</div>
         
         
         ';
         $index++;
           }
         $html.= '<p class= "fancytitle" style="background:pink;" ></strong></p>
         	<a class="prev" style ="background:grey;"onclick="plusSlides(-1)">&#10094;</a>
         	<a class="next" style ="background:grey;"onclick="plusSlides(1)">&#10095;</a>
         	</div><br> <div style="text-align:center">';
         
         for ($x = 0; $x < $num_rows; $x++) {
         $i = $x+1;
         //echo $num_rows;
         $html.= '<span class="dot" onclick="currentSlide('.$i.')"></span> ';
         }
         $html.= '</div></div>';
         
         
         echo $html;
         mysql_close($con);
         ?>
      <?php
         } 
          if($_SESSION["answerState"] == 1) {
         ?>
      <!--Solution Page  ready for viewing-->
      <p> 1</p>
      <?php
         } 
         ?>
      <script>
         //alert("haha its not  over");
         $("document").ready(function(){ //default look is the first course
          
		  
		  
		  
		  
         var sessionS =sessionStorage.getItem("QID");
         if( sessionS == null){
         	$("#Dash").trigger("click");
         }
		 
         else if( sessionS !=0){
         	//alert(sessionS);
         	showSolution(sessionS);
         }
         
         if (!sessionStorage.getItem('tagL') == null || !sessionStorage.getItem('tagD') == null || !sessionStorage.getItem('CurrentID') == null ) 
         {
         	alert("hey");
         	
         	sessionStorage.setItem("tagL", 0);
         	sessionStorage.setItem("tagD", 0);
         	sessionStorage.setItem("CurrentID", (-1));
         	
         }
         
         if (!sessionStorage.getItem('tagLC') == null || !sessionStorage.getItem('tagDC') == null || !sessionStorage.getItem('CurrentIDC') == null ) 
         {
         	alert("heyC");
         	
         	sessionStorage.setItem("tagLC", 0);
         	sessionStorage.setItem("tagDC", 0);
         	sessionStorage.setItem("CurrentIDC", (-1));
         	
         }
         
          
         });
         var slideIndex = 1;
         showSlides(slideIndex);
         
         
         
         function showSolution(Qid){
             $("#sb").hide();
         	$("#searchR").hide();
         	$("#sp").show();
         	
         	$('#Qsection').empty();
         	$('#Ssection').empty();
			
			
         	
         	$.ajax({
         						url: "php/AjaxActions.php",
         						type: 'post',
         						method: 'POST',
         						async: false,
         						dataType: "json",
         						data: {
         						 QID: Qid,
         						 AjaxID:"ShowSolution"
         						},
         						encode: true
         				  }).always(function(data){
         				   console.log(data);// see data for debugging
         				//alert(data.Qdata[0]);
         				  $('#Qsection').append('<p class ="fancytitle"><b>Topic: '+ data.Qdata[4]+'</b></p>'+
         				  '<div class = "border border-grey" style= "min-height: 30px;word-wrap: break-word;white-space: pre-wrap; padding-top: 1px; padding-bottom: 1px;center;width: 100%; color: black;"  id="Qcontent"  > '+ htmlspecialchars(data.Qdata[5])+'</div>'+
         				 
         				  '<div style= "padding-top:8px; font-size: 12px "> <b style="color:#dea747; font-size:14px;">Question Attributes &nbsp;&nbsp;</b>  '+
         					  '<mark class = "" style ="border-radius: 10px ;background:#B8B8B8; color: white;">'+ data.Qdata[0]+' </mark> &nbsp;&nbsp;'+
         					 ' <mark style ="border-radius: 10px ;background:#B8B8B8; color: white;"> '+ data.Qdata[1]+' </mark>&nbsp;&nbsp;'+
         					  '<mark style ="border-radius: 10px ;background:#B8B8B8; color: white;">'+ data.Qdata[2]+'</mark> &nbsp;&nbsp;'+
         					  '<mark style ="border-radius: 10px ;background:#B8B8B8; color: white;">DueDate:&nbsp;'+ data.Qdata[3].split(' ', 1)+'</mark> &nbsp;&nbsp;'+
         				  '</div>');
         				  
         				  
         				  for ( i = 0; i < data.SID.length; i++) {
         					  if(i ==0){
         						 $("#Ssection").append('<div style="padding-top:10px;margin-bottom:0px;"><p class ="fancytitle"><b>User Solutions</b></p></div>'); 
         					  }
         					
         					$("#Ssection").append('<div style ="margin-top: 0px;padding-left: 7px;padding-bottom: 10px;"><mark style ="border-radius: 10px ;background:black; color: white; font-size:12px;">Answer '+(i+1)+'</mark></div>'+
         					'<hr style= "border-top: 1px solid black; margin-top:0px">'+
         					'<div class="row" style = "margin-left:5px; margin-buttom : 0px">'+					  
         						
         						'<div  style =""  >'+
         						  '<i class="material-icons" style="font-size:36px">account_circle</i>'+
         						  
         						'</div>'+
         						'<div  style="margin-left:5px">'+
         						  '<div class="nowrap" style = "font-size:12px"> <span  style="padding-bottom:3px;white-space: nowrap; font-weight:bold; color:#dea747;">'+ data.sUsername[i]+'</span > answered this</div>'+
         						' <div style = "font-size:11px">'+ data.sSolvedQuestions[i]+' Answers</div>'+
         						'</div>'+
         						
         				      '</div>'+
         					
         				  
         					'<div class = "border border-orange" style= "min-height: 40px;padding: 5px;width: 100%; color: black;"  id="Scontent"  > '+ htmlspecialchars(data.Solutions[i])+'</div>'+
         				   
         					'<div class="" style="padding-bottom:5px;text-align: right">'+
         						 ' <button onclick = "EditReaction(this,'+ data.sLikes[i]+',10,'+data.SID[i]+','+Qid+','+i+')" class = "btn btn-danger border" style="background: #4dafff;  font-size:14px">'+ data.sLikes[i]+'&nbsp;<i class="fa fa-thumbs-up"></i></button>'+
         						 ' <button onclick = "EditReaction(this,'+ data.sDislikes[i]+',20,'+data.SID[i]+','+Qid+','+i+')" class = "btn btn-danger border" style="background: #ff6363;  font-size:14px">'+ data.sDislikes[i]+'&nbsp;<i class="fa fa-thumbs-down"></i></button> '+
         					
         					'</div>');
         					
         					var CommentObj = showComments(data.SID[i]); //data.SID[i]
         					 $("#Ssection").append('<div  onclick = "toggleComments('+i+')" style= "padding-bottom: 10px;"><a  style= "cursor: pointer; color: #359cd4;"> <u  id ="toggler" >Toggle Comments ('+ CommentObj.Comment.length+')</u></a></div>');
         					
         						
         					for (a = 0; a < CommentObj.Comment.length; a++){
         						
         						$("#Ssection").append('<div   class="row tog'+i+'" style = "display:none; padding-top: 5px;margin-left:5px; margin-buttom : 0px">'+
         						'<div  style =""  >'+
         						 ' <i class="material-icons" style="font-size:36px">account_circle</i>'+
         						  
         						'</div>'+
         						'<div  style="margin-left:5px">'+
         						'  <div class="nowrap" style = "font-size:12px"> <span  style="padding-bottom:3px; white-space: nowrap; font-weight:bold; color:#dea747;">'+ CommentObj.cUsername[a]+'</span ></div>'+
         						  '<div type = "text"class = "border border-dark" style= "width:40vw; color: black;"  id="Comment1"  > '+ htmlspecialchars(CommentObj.Comment[a])+
         							
         						  '</div>'+
         						  '<div style = "padding-bottom: 5px;padding-top:5px;padding-left: 34vw">'+
         						 ' <button  id = "ddd" onclick = "EditReaction(this,'+ CommentObj.cLikes[a]+',30,'+CommentObj.commentID[a]+','+Qid+','+i+')" class = "btn btn-danger border" style="background: #4dafff;  font-size:10px">'+ CommentObj.cLikes[a]+'&nbsp;<i class="fa fa-thumbs-up"></i></button>'+
         						  '<button onclick = "EditReaction(this,'+ CommentObj.cDislikes[a]+',40,'+CommentObj.commentID[a]+','+Qid+','+i+')" class = "btn btn-danger border" style="background: #ff6363;  font-size:10px">'+ CommentObj.cDislikes[a]+'&nbsp;<i class="fa fa-thumbs-down"></i></button> '+
         						'</div>'+
         						
         						
         				       '</div>'+
         					  
         				
                   '</div>');
         						
         					}
         					 $("#Ssection").append(''+
         					' <div class="row" style = "margin-left:5px; padding-bottom : 10px">'+
         						'<div  style =""  >'+
         						 ' <i class="material-icons" style="font-size:36px">account_circle</i>'+
         						  
         						'</div>'+
         						'<div  style="margin-left:5px">'+
         						 ' <div class="nowrap" style = "font-size:11px"> </div>'+
         						 ' <textarea  id= "ta'+i+'" style= "width:40vw; color: black;" placeholder = "Type your comment here"    ></textarea>  '+
         							
         						 
         						 ' <div style = "padding-top:5px;padding-left: 31.5vw">'+
         						 ' <button onclick="postComment('+data.SID[i]+','+ i +','+Qid+')" class = "btn  border" style ="height: 32px;  ">Post Comment</button>'+
         						  
         						'</div>'+
         						
         						
         				       '</div>'+
         					  
         				
                   '</div>'+
         		  ' <hr style= "border-top: 1px solid black; margin-top:0px">');
                              					 
         						
         				  }
         				  
         				  
         				  
         				  
         				  
         				  
         				  })
         	
         
         	}
         	
         function dashboardTab(){
         	//alert("you clicked it");
         	 sessionStorage.setItem("QID", 0);
			 
			 
         }
		 
         	
         function toggleComments(i){
         	$('.tog'+i).toggle();
         	
         	
         }
         
         function postComment(Sid,i,Qid){
         	
         	
         	var comment = $('#ta'+i).val();
         	
         	$.ajax({
         						url: "php/AjaxActions.php",
         						type: 'post',
         						method: 'POST',
         						async: false,
         						//dataType: "json",
         						data: {
         						 Comment: comment,
         						 SID: Sid,
         						 AjaxID:"PostComment"
         						},
         						//encode: true
         				  }).always(function(data){
         				   //alert(data);
         				   $('#Qsection').empty();
         				   $('#Ssection').empty();
         				  showSolution(Qid);
         				  })
         	
         	
         }
         function htmlspecialchars(str) { // Avoid Html Injections
          if (typeof(str) == "string") {
           str = str.replace(/&/g, "&amp;"); //must do &amp; first 
           str = str.replace(/"/g, "&quot;");
           str = str.replace(/'/g, "&#039;");
           str = str.replace(/</g, "&lt;");
           str = str.replace(/>/g, "&gt;");
           }
          return str;
          }
          
         function EditReaction(element,currentNum, tag, id,Qid,i){
         
         
         /* 
         	tag = 10 => Solution Like, id = Solution ID
         	tag = 20 => Solution Disike, id = Solution ID
         	tag = 20 => Comment Like, id = Comment ID
         	tag = 40 => Comment Disike, id = Comment ID
         
         */
         var currentID = sessionStorage.getItem("CurrentID");
         
         if (currentID != id){
         	sessionStorage.setItem("tagL", 0);
         	sessionStorage.setItem("tagD", 0);
         	//sessionStorage.setItem("CurrentID", (-1));
         	sessionStorage.setItem("CurrentID", id);
         }
         
         var tagL =sessionStorage.getItem("tagL");                  //like state Solution 0 or 1
         var tagD =sessionStorage.getItem("tagD");                  //Dislike state Solution 0 or 1
         
         
         var currentIDC = sessionStorage.getItem("CurrentIDC");
         
         if (currentIDC != id){
         	sessionStorage.setItem("tagLC", 0);
         	sessionStorage.setItem("tagDC", 0);
         	//sessionStorage.setItem("CurrentID", (-1));
         	sessionStorage.setItem("CurrentIDC", id);
         }
         
         var tagLC =sessionStorage.getItem("tagLC");                  //like state Comment 0 or 1
         var tagDC =sessionStorage.getItem("tagDC");                  //Dislike state Comment 0 or 1
         
         //sessionStorage.setItem("tagL", 0);
         //sessionStorage.setItem("tagD", 0);
         
         
         
         
         
         if(tag == 10 && tagL == 0 && tagD == 0){
         	
         	$.ajax({                                                  //Increment Solution Like
         						url: "php/AjaxActions.php",
         						type: 'post',
         						method: 'POST',
         						async: false,
         						//dataType: "json",
         						data: {
         						 tag: 10,
         						 ID: id,
         						 AjaxID:"IncrementReactions"
         						},
         						//encode: true
         				  }).always(function(data){
         				  
         				  $('#Qsection').empty();
         				   $('#Ssection').empty();
         				  showSolution(Qid);
         				  toggleComments(i);
         				  
         				  })
         	
         	sessionStorage.setItem("tagL", 1);
         }
         
         else if(tag == 10 && tagL == 0 && tagD == 1){
         	
         	$.ajax({
         						url: "php/AjaxActions.php",              //Decrement Solution Like
         						type: 'post',
         						method: 'POST',
         						async: false,
         						//dataType: "json",
         						data: {
         						 tag: 20,
         						 ID: id,
         						 AjaxID:"DecrementReactions"
         						},
         						//encode: true
         				  }).always(function(data){
         				  
         				  $('#Qsection').empty();
         				   $('#Ssection').empty();
         				  showSolution(Qid);
         				  toggleComments(i);
         				  
         				  })
         	
         	$.ajax({
         						url: "php/AjaxActions.php",                //Increment Solution Like
         						type: 'post',
         						method: 'POST',
         						async: false,
         						//dataType: "json",
         						data: {
         						 tag: 10,
         						 ID: id,
         						 AjaxID:"IncrementReactions"
         						},
         						//encode: true
         				  }).always(function(data){
         				  
         				  $('#Qsection').empty();
         				   $('#Ssection').empty();
         				  showSolution(Qid);
         				  toggleComments(i);
         				  
         				  })
         	
         	sessionStorage.setItem("tagL", 1);
         	sessionStorage.setItem("tagD", 0);
         }
         
         
         else if(tag == 20 && tagL == 0 && tagD == 0){
         	
         	$.ajax({                                                  //Increment Solution Dislike
         						url: "php/AjaxActions.php",
         						type: 'post',
         						method: 'POST',
         						async: false,
         						//dataType: "json",
         						data: {
         						 tag: 20,
         						 ID: id,
         						 AjaxID:"IncrementReactions"
         						},
         						//encode: true
         				  }).always(function(data){
         				  
         				  $('#Qsection').empty();
         				   $('#Ssection').empty();
         				  showSolution(Qid);
         				  toggleComments(i);
         				  
         				  })
         	
         	sessionStorage.setItem("tagD", 1);
         }
         
         else if(tag == 20 && tagL == 1 && tagD == 0){
         	
         	$.ajax({
         						url: "php/AjaxActions.php",              //Decrement Solution Like
         						type: 'post',
         						method: 'POST',
         						async: false,
         						//dataType: "json",
         						data: {
         						 tag: 10,
         						 ID: id,
         						 AjaxID:"DecrementReactions"
         						},
         						//encode: true
         				  }).always(function(data){
         				  
         				  $('#Qsection').empty();
         				   $('#Ssection').empty();
         				  showSolution(Qid);
         				  toggleComments(i);
         				  
         				  })
         	
         	$.ajax({
         						url: "php/AjaxActions.php",                //Increment Solution Dislike
         						type: 'post',
         						method: 'POST',
         						async: false,
         						//dataType: "json",
         						data: {
         						 tag: 20,
         						 ID: id,
         						 AjaxID:"IncrementReactions"
         						},
         						//encode: true
         				  }).always(function(data){
         				  
         				  $('#Qsection').empty();
         				   $('#Ssection').empty();
         				  showSolution(Qid);
         				  toggleComments(i);
         				  
         				  })
         	
         	sessionStorage.setItem("tagL", 0);
         	sessionStorage.setItem("tagD", 1);
         }
         
         
         
         //------------------------
         
         
         
         else if(tag == 30 && tagLC == 0 && tagDC == 0){
         	
         	$.ajax({                                                  //Increment Comment Like
         						url: "php/AjaxActions.php",
         						type: 'post',
         						method: 'POST',
         						async: false,
         						//dataType: "json",
         						data: {
         						 tag: 30,
         						 ID: id,
         						 AjaxID:"IncrementReactions"
         						},
         						//encode: true
         				  }).always(function(data){
         				  
         				  $('#Qsection').empty();
         				   $('#Ssection').empty();
         				  showSolution(Qid);
         				  toggleComments(i);
         				  
         				  })
         	
         	sessionStorage.setItem("tagLC", 1);
         }
         
         else if(tag == 30 && tagLC == 0 && tagDC == 1){
         	
         	$.ajax({
         						url: "php/AjaxActions.php",              //Decrement Comment Like
         						type: 'post',
         						method: 'POST',
         						async: false,
         						//dataType: "json",
         						data: {
         						 tag: 40,
         						 ID: id,
         						 AjaxID:"DecrementReactions"
         						},
         						//encode: true
         				  }).always(function(data){
         				  
         				  $('#Qsection').empty();
         				   $('#Ssection').empty();
         				  showSolution(Qid);
         				  toggleComments(i);
         				  
         				  })
         	
         	$.ajax({
         						url: "php/AjaxActions.php",                //Increment Comment Like
         						type: 'post',
         						method: 'POST',
         						async: false,
         						//dataType: "json",
         						data: {
         						 tag: 30,
         						 ID: id,
         						 AjaxID:"IncrementReactions"
         						},
         						//encode: true
         				  }).always(function(data){
         				  
         				  $('#Qsection').empty();
         				   $('#Ssection').empty();
         				  showSolution(Qid);
         				  toggleComments(i);
         				  
         				  })
         	
         	sessionStorage.setItem("tagLC", 1);
         	sessionStorage.setItem("tagDC", 0);
         }
         
         
         else if(tag == 40 && tagLC == 0 && tagDC == 0){
         	
         	$.ajax({                                                  //Increment Comment Dislike
         						url: "php/AjaxActions.php",
         						type: 'post',
         						method: 'POST',
         						async: false,
         						//dataType: "json",
         						data: {
         						 tag: 40,
         						 ID: id,
         						 AjaxID:"IncrementReactions"
         						},
         						//encode: true
         				  }).always(function(data){
         				  
         				  $('#Qsection').empty();
         				   $('#Ssection').empty();
         				  showSolution(Qid);
         				  toggleComments(i);
         				  
         				  })
         	
         	sessionStorage.setItem("tagDC", 1);
         }
         
         else if(tag == 40 && tagLC == 1 && tagDC == 0){
         	
         	$.ajax({
         						url: "php/AjaxActions.php",              //Decrement Comment Like
         						type: 'post',
         						method: 'POST',
         						async: false,
         						//dataType: "json",
         						data: {
         						 tag: 30,
         						 ID: id,
         						 AjaxID:"DecrementReactions"
         						},
         						//encode: true
         				  }).always(function(data){
         				  
         				  $('#Qsection').empty();
         				   $('#Ssection').empty();
         				  showSolution(Qid);
         				  toggleComments(i);
         				  
         				  })
         	
         	$.ajax({
         						url: "php/AjaxActions.php",                //Increment Comment Dislike
         						type: 'post',
         						method: 'POST',
         						async: false,
         						//dataType: "json",
         						data: {
         						 tag: 40,
         						 ID: id,
         						 AjaxID:"IncrementReactions"
         						},
         						//encode: true
         				  }).always(function(data){
         				  
         				  $('#Qsection').empty();
         				   $('#Ssection').empty();
         				  showSolution(Qid);
         				  toggleComments(i);
         				  
         				  })
         	
         	sessionStorage.setItem("tagLC", 0);
         	sessionStorage.setItem("tagDC", 1);
         }
         
         	
         	
         	
         	
         	
         	
         	
         }
         function showComments(Sid){
         	var commentData;
         	$.ajax({
         						url: "php/AjaxActions.php",
         						type: 'post',
         						method: 'POST',
         						async: false,
         						dataType: "json",
         						data: {
         						 SID: Sid,
         						 AjaxID:"ShowComments"
         						},
         						encode: true
         				  }).always(function(data){
         					  commentData = data;
         				   console.log(data);// see data for debugging
         				  //alert(data.Comments.cUser[0]);
         				  
         				  
         				  
         				  
         				  })
         	return commentData;
         }
         function postSearch() {
           //alert($("#searchInput").val());
          //var AjaxID = "SearchQuestion"; // AJAX  function identifier for php file using ajax variables
         					//Get the required ajax data
          //var question = $("#cName"+i).text();
          $("#searchR").show();
          $('#sp').hide();
          $("#sb").hide();
          $.ajax({
         						url: "php/AjaxActions.php",
         						type: 'post',
         						method: 'POST',
         						async: false,
         						dataType: "json",
         						data: {
         						 Question: $("#searchInput").val(),
         						 AjaxID:"SearchQuestion"
         						},
         						encode: true
         				  }).always(function(data){
         				  
         				  console.log(data);// see data for debugging
         				  //alert(data.group[0]);
         				  $("#tb1").empty();
         				   $("#searchR").show();
         				   if(data.QID.length == 0){
         					  $('#tb1').append(
         							'<tr>'+
         								'<td colspan ="4" style="text-align:center">Sorry, we could not find any matches. Click <a href = "askQuestion.php">here to post a Question</a> </td>'+
         								
         								
         							'</tr>' 
         											 );
         				   }
         				   
         				   
         				  for (var i = 0; i < data.QID.length; i++) {
         					  var res = data.Question[i];
         					  var highlighted = res; 
         					  var t = "";
         					 for (var j = 0; j < data.group.length; j++) {
         						 highlighted = htmlspecialchars(highlighted);
         						  highlighted = highlighted.replace(new RegExp(data.group[j], "gi"), (match) => '<mark>'+data.group[j]+'</mark>');
         					  }
         					 // var t  = highlighted.replace("<mark>n</mark>","AAA");
         					  
         					  $('#tb1').append(
         							'<tr>'+
         								'<td>'+htmlspecialchars(data.CourseID[i])+'</td>'+
         								'<td>'+htmlspecialchars(data.Instructor[i])+'</td>'+
         								'<td style ="width: 55vw;">'+(highlighted)+'</td>'+
         								'<td>'+
         								'<div  onclick = "showSolution('+data.QID[i]+')" style= ""><a  style= "cursor: pointer; color: #359cd4;"> <u>View Solution</u></a></div>'+
         									
         								'</td>'+
         								
         							'</tr>' 
         											 );
         					  
         					  
         					  
         					  
         					  
         					}
         				  
         				  
         				  
         				  
         				  })
           
         }
         
         function plusSlides(n) {
           showSlides(slideIndex += n);
         }
         
         function currentSlide(n) {
           showSlides(slideIndex = n);
         }
         
         function showSlides(n) {
         	
           var i;
           var slides = document.getElementsByClassName("mySlides");
           var dots = document.getElementsByClassName("dot");
           if (n > slides.length) {slideIndex = 1}    
           if (n < 1) {slideIndex = slides.length}
           for (i = 0; i < slides.length; i++) {
               slides[i].style.display = "none";  
           }
           for (i = 0; i < dots.length; i++) {
               dots[i].className = dots[i].className.replace(" active", "");
           }
           slides[slideIndex-1].style.display = "block";  
           dots[slideIndex-1].className += " active";
         }
         function Logout(){
         	location.replace("php/Logout.php");
         }
      </script>
   </body>
</html>