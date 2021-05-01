<?php
session_start();

if ($_SESSION["regState"] != 4) header("location: index.php");
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>t1</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alfa+Slab+One">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
	<link rel="stylesheet" href="css/lab2.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>


    <script>
        var dashboardState;
        var lab1State;
        var lab2State;
        var projReport;
		
		var lab1State1;
        var lab2State1;
        var projReport1;
		
		

        $(document).ready(function() { //Implement a toggle Button for Dashboard
            $("#dashBtn").click(function() {
                if (dashboardState == 0) {
                    $("#dashBtn").html("Show Dashboard");
					$("#lab1Btn").html("Show Run Lab1.1");
					$("#lab2Btn").html("Show Run Lab1.1");
					$("#reportBtn").html("Show Run Lab1.1");

                    //$("#fullDashboard").hide();
                    $("#i2").hide();
                    $("#i3").hide();
                    $("#i4").hide();
                    $("#i5").hide();
                    $("#i6").hide();
                    $("#i7").hide();
                    $("#i8").hide();
                    $("#i9").hide();
                    $("#ic").hide();

                    dashboardState++;
                } else {
                    $("#dashBtn").html("Hide Dashboard");
					$("#lab1Btn").html("Hide Run Lab1.1");
					$("#lab2Btn").html("Hide Run Lab1.1");
					$("#reportBtn").html("Hide Run Lab1.1");
                    //$("#fullDashboard").show();
                    $("#i2").show();
                    $("#i3").show();
                    $("#i4").show();
                    $("#i5").show();
                    $("#i6").show();
                    $("#i7").show();
                    $("#i8").show();
                    $("#i9").show();
                    $("#ic").show();
                    dashboardState = 0;
                }

            })


        })

         $(document).ready(function() { //Implement a toggle Button for LAB 1.1
            $("#lab1Btn").click(function() {
                if (lab1State == 0) {
                    $("#lab1Btn").html("Show Run Lab1.1");
					
                    $("#i2").hide();
                    $("#i3").hide();
                    $("#ic").hide();

                    lab1State++;
                } else {
                    $("#lab1Btn").html("Hide Run Lab1.1");
                    //$("#fullDashboard").show();
                    $("#i2").show();
                    $("#i3").show();
                    $("#ic").show();
                    lab1State = 0;
                }

            })


        })

         $(document).ready(function() { //Implement a toggle Button for LAB 1.2
            $("#lab2Btn").click(function() {
                if (lab2State == 0) {
                    $("#lab2Btn").html("Show Run Lab1.2");


                    $("#i4").hide();
                    $("#i5").hide();
                    $("#i6").hide();


                    lab2State++;
                } else {
                    $("#lab2Btn").html("Hide Run Lab1.2");


                    $("#i4").show();
                    $("#i5").show();
                    $("#i6").show();

                    lab2State = 0;
                }

            })


        })


         $(document).ready(function() { //Implement a toggle Button for Project Report
            $("#reportBtn").click(function() {
                if (projReport == 0) {
                    $("#reportBtn").html("Show Report");


                    $("#i7").hide();
                    $("#i8").hide();
                    $("#i9").hide();

                    projReport++;
                } else {
                    $("#reportBtn").html("Hide Report");


                    $("#i7").show();
                    $("#i8").show();
                    $("#i9").show();

                    projReport = 0;
                }

            })


        })
		
		$(document).ready(function() { //Implement a toggle Button for LAB 1.1
            $("#lab1Btn1").click(function() {
                if (lab1State1 == 0) {
                    $("#lab1Btn1").html("Extend Lab1.1 sort magic with data partitioning");
					
                   
                    $("#i3").hide();
                    $("#ic").hide();

                    lab1State1++;
                } else {
                    $("#lab1Btn1").html("Collapse Lab1.1 sort magic with data partitioning");
                   
                  
                    $("#i3").show();
                    $("#ic").show();
                    lab1State1 = 0;
                }

            })


        })

         $(document).ready(function() { //Implement a toggle Button for LAB 1.2
            $("#lab2Btn1").click(function() {
                if (lab2State1 == 0) {
                   $("#lab2Btn1").html("Extend Lab1.2 Locality and matrix performance");


                 
                    $("#i5").hide();
                    $("#i6").hide();


                    lab2State1++;
                } else {
                   $("#lab2Btn1").html("Collapse Lab1.2 Locality and matrix performance");


                   
                    $("#i5").show();
                    $("#i6").show();

                    lab2State1 = 0;
                }

            })


        })


         $(document).ready(function() { //Implement a toggle Button for Project Report
            $("#reportBtn1").click(function() {
                if (projReport1 == 0) {
                    $("#reportBtn1").html("Extend Project  Report");


                  
                    $("#i8").hide();
                    $("#i9").hide();

                    projReport1++;
                } else {
                    $("#reportBtn1").html("Collapse Project Report");


                  
                    $("#i8").show();
                    $("#i9").show();

                    projReport1 = 0;
                }

            })


        })
		
		
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}

    
    </script>
	
</head>

<body style="height: 644px;padding: -6px;">
    <nav class="navbar navbar-dark navbar-expand-md bg-dark flex-md-nowrap p-0 sticky-top" style="padding: 5px;">
        <div class="container-fluid">
			<a class="navbar-brand" href="#" style="font-size: 14px; width: 230px;">
				Henry Kombem
			</a>  
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navcol-2">
				<span class="navbar-toggler-icon"></span>
			</button>
            <div class="collapse navbar-collapse" id="navcol-2" style="">
			   <div >
					<input  id ="smallerSearch" class="  border rounded-0" type="search" style=" background: rgb(237, 241, 247);text-align: justify;height: 39px;padding-top: 0px;padding-bottom: 0px;" placeholder="Search" >
			   </div>
			   <div id ="smallerButton">
					<form action="php/Logout.php">
						<input class="btn  btn-primary btn-block" type="submit" value="Logout" />
					</form>
					
					
			   </div>
		
					
			</div>
        </div>
       
    </nav>
    <div>
        <div class="container-fluid" style="padding-left: 0px;">
        
                <div id="mySidebar" class="sidebar">
				 <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                    <ul>
                        <li class="text-truncate" style=" margin-bottom: 10px;" >
							<i class="fa fa-dashboard" style="padding-right: 7px; color: white;"></i>
								<button class="btn " id="dashBtn" type="button" style=" width: 137px; border-radius: 4px; background-color: #e7e7e7; color: black;">
									Hide Dashboard
								</button>
                        </li>
                        <li class="text-truncate visible" style=" margin-bottom: 10px;" >
                            <i class="fas fa-dot-circle" style="padding-right: 7px; color: white;"></i>
								<button id="lab1Btn" class="btn" type="button" style=" width: 137px; border-radius: 4px; background-color: #e7e7e7; color: black;">
									Hide Run Lab1.1
								</button>
                        </li>
                        <li class="text-truncate" style=" margin-bottom: 10px;" >
                            <i class="fas fa-dot-circle" style="padding-right: 7px; color: white;"></i>
								<button id="lab2Btn" class="btn" type="button" style=" width: 137px; border-radius: 4px; background-color: #e7e7e7; color: black;">
									Hide Run Lab1.2
								</button>
                        </li>
                        <li class="text-truncate" style=" margin-bottom: 10px;">
                            <i class="fas fa-book" style="padding-right: 8px; color: white;"></i>
								<button id="reportBtn" class="btn" type="button" style=" width: 137px; border-radius: 4px; background-color: #e7e7e7; color: black;" >
									Hide  Report
								</button>
                        </li>
                    </ul>
					 
                </div>
					  <div class="row" >
					  <button class="openbtn" onclick="openNav()">
						☰ Open Sidebar
					  </button> 
						<div id="fullDashboard" class="col-md-12" >
							<ul class="list-group" >
								<li id="i1" class="list-group-item" style="text-align: left;border-style: none;border-color: rgb(26,29,33);border-bottom-style: solid;border-bottom-color: rgb(203,210,220);">
									<div>
										<div class="visible" style="font-size: 17px; display: inline; font-family: 'Abril Fatface', cursive;" >CIS3296 Software Design
										</div>
										
										<div role="group"id="smallerGroup" class="btn-group " >
											<button class="btn border rounded" type="button" style="filter: contrast(91%);background: #ffffff;">Share
											</button>
												<button class="btn border rounded" type="button"
												style="background: #f5f4f4;border-style: solid;border-left-color: rgb(0,0,0);">Export
												</button>
												<div class="dropdown btn-group" role="group" style="padding-left:10px;">
													<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="  color: rgb(1,1,1);background: rgb(239,239,239);">
														This Week
													</button>
													<div class="dropdown-menu">
														<a class="dropdown-item" href="#">
															Week 1
														</a>
														<a class="dropdown-item" href="#">
															Week 2
														</a>
														<a class="dropdown-item" href="#">
															Week 3
														</a>
													</div>
												</div>
											</div>
									  
									</div>
								</li>
								<li id="i2" class="list-group-item " ">
								<button id = "lab1Btn1" class="btn  btn-primary btn-block" type="button" style="">
											Lab1.1 Sort Magic with Data Partitioning
										</button>
									
								</li>
								<li id="i3" class="list-group-item border rounded-0" style="padding-top: 13px;">
									<span>
										Lab1.1
									</span>
								</li>
								<li id="ic" class="list-group-item" style="height: 82px;">
									<input class="form-control-plaintext" type="text" value="Sort Magic" readonly="">
									<input class="form-control-plaintext" type="text" value="Sort Monitor Here" readonly="" style="font-size: 11px;border-style: dotted;">
								</li>
								<li id="i4" class="list-group-item " ">
									<button id = "lab2Btn1"class="btn  btn-primary btn-block" type="button" style="">
										Lab1.2 Locality and matrix peformance
									</button>
									
								</li>
								<li id="i5" class="list-group-item border rounded-0" style="border-top-color: rgba(50,45,45,0.125);padding-left: 28px;"><span>Lab1.2</span>
								</li>
								<li id="i6" class="list-group-item" style="height: 157px;">
									<input class="form-control-plaintext" type="text" value="Locality and Performance" readonly="">
									<input class="form-control-plaintext" type="text" value="Order Correctness" readonly="" style="border-bottom-color: #e0e0e0;border-bottom-style: solid;font-size: 11px;padding-top: 4px;">
									<input class="form-control-plaintext" type="text" value="Best Peforming Order" readonly="" style="border-bottom-style: solid;border-bottom-color: #e0e0e0;font-size: 11px;">
									<input class="form-control-plaintext" type="text" value="Best Scaling" readonly="" style="font-size: 11px;">
								</li>
								<li id="i7" class="list-group-item " ">
									<button id = "reportBtn1" class = "btn  btn-primary btn-block" type="button" >
										Project Report
									</button>
									
								</li>
								<li id="i8" class="list-group-item border rounded-0"><span>Report</span>
								</li>
								<li id="i9" class="list-group-item">
									<input class="form-control-plaintext" type="text" value="Project Report" readonly="">
									<input class="form-control-plaintext" type="text" value="This is the report" readonly="" style="font-size: 11px;">
								</li>
							</ul>
						</div>
				</div>
        </div>
    </div>


</body>

</html>