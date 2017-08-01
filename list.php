<?php
session_start();
require_once('mysql_connect.php');

$_SESSION['username'] = $_SESSION['user'];
$fullnamequery = "SELECT fullname from users where username = '{$_SESSION['username']}'";
$fullnameresult = mysqli_query($dbc,$fullnamequery);
$fullnamerow = mysqli_fetch_array($fullnameresult, MYSQL_ASSOC);

// Request 1: Group by Age or University (View by option checkbox on Universities and Age then Button)
// Request 2: Sort by Last Name (Data Table)
// Request 3: Total number of students in each University (Show computed data)
?>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Student List</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
<script src="js/raphael-min.js"></script>
<script src="js/morris.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="index.html" class="logo">
        BBFL
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="images/2.png">
                <span class="username"><?php echo $fullnamerow['fullname']?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="login.php"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end --> 
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="index.html">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li> 
            </ul>            
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="panel-body">
				<div class="col-md-12">
					<!--Student List Table-->
						<div class="agileinfo-grap">
							<div>
								<header class="agileits-box-header clearfix">
									<h3>University Data</h3>
										<center>
										<div>
											<?php
												$totalquery = "SELECT MAX(studentid) as total from student";
												$totalresult = mysqli_query($dbc, $totalquery);
												$totalrow = mysqli_fetch_array($totalresult, MYSQL_ASSOC);

												$admuquery = "SELECT COUNT(studentid) as admu from student where university = 'Ateneo De Manila University'";
												$admuresult = mysqli_query($dbc, $admuquery);
												$admurow = mysqli_fetch_array($admuresult, MYSQL_ASSOC);

												$dlsuquery = "SELECT COUNT(studentid) as dlsu from student where university = 'De La Salle University'";
												$dlsuresult = mysqli_query($dbc, $dlsuquery);
												$dlsurow = mysqli_fetch_array($dlsuresult, MYSQL_ASSOC);

												$lpuquery = "SELECT COUNT(studentid) as lpu from student where university = 'Lyceum of the Philippines University'";
												$lpuresult = mysqli_query($dbc, $lpuquery);
												$lpurow = mysqli_fetch_array($lpuresult, MYSQL_ASSOC);

												$muquery = "SELECT COUNT(studentid) as mu from student where university = 'Mapua University'";
												$muresult = mysqli_query($dbc, $muquery);
												$murow = mysqli_fetch_array($muresult, MYSQL_ASSOC);

												$stiquery = "SELECT COUNT(studentid) as sti from student where university = 'Systems Technology Institute College'";
												$stiresult = mysqli_query($dbc, $stiquery);
												$stirow = mysqli_fetch_array($stiresult, MYSQL_ASSOC);

												$upquery = "SELECT COUNT(studentid) as up from student where university = 'University of the Philippines'";
												$upresult = mysqli_query($dbc, $upquery);
												$uprow = mysqli_fetch_array($upresult, MYSQL_ASSOC);

												$ustquery = "SELECT COUNT(studentid) as ust from student where university = 'University of Santo Tomas'";
												$ustresult = mysqli_query($dbc, $ustquery);
												$ustrow = mysqli_fetch_array($ustresult, MYSQL_ASSOC);

												echo "<p> &emsp; <b>Total Number of Students; </b>
												&emsp; <b> In ADMU: </b>".$admurow['admu']."&emsp; <b> In DLSU: </b>".$dlsurow['dlsu']."&emsp; <b> In LPU: </b>".$lpurow['lpu']."&emsp;<b> In MU: </b>
												".$murow['mu']."&emsp; <b> In STI: </b>".$stirow['sti']."&emsp; <b> In UP: </b>".$uprow['up']."&emsp; <b> In UST: </b>".$ustrow['ust']."</p> <br>";
											?>
											<?php
												$agequery = "SELECT TIMESTAMPDIFF(YEAR, birthday, CURDATE()) as age from student group by 1 asc";
												$ageresult = mysqli_query($dbc,$agequery);
												$num_rows = $ageresult->num_rows;

												echo '
												<div style="width:980px;height:220px;border:1px solid #ffffcc;background:#ffffcc;">
													<br>
													&nbsp; <b> Filter List by: </b> 
													<br><br>
													<form action="'.$_SERVER['PHP_SELF'].'" method="post">

	  												&emsp;&emsp; 				   <input type="checkbox" name="univ[]" value="Ateneo De Manila University"> ADMU 		
	  												&emsp;&emsp;&emsp;&emsp;&emsp; <input type="checkbox" name="univ[]" value="De La Salle University"> DLSU 		
	  												&emsp;&emsp;&emsp;&emsp;&emsp; <input type="checkbox" name="univ[]" value="Lyceum of the Philippines University"> LPU 		
	  												&emsp;&emsp;&emsp;&emsp;&emsp; <input type="checkbox" name="univ[]" value="Mapua University"> MU 		
	  												&emsp;&emsp;&emsp;&emsp;&emsp; <input type="checkbox" name="univ[]" value="Systems Technology Institute College"> STI 		
	  												&emsp;&emsp;&emsp;&emsp;&emsp; <input type="checkbox" name="univ[]" value="University of the Philippines"> UP 		
	  												&emsp;&emsp;&emsp;&emsp;&emsp; <input type="checkbox" name="univ[]" value="University of Santo Tomas"> UST
	 												<br><br><br>
	 												Age Range: 
	 												&emsp;&emsp;<select name="min" required> 
	 															<option value="">Min</option>';
	 															if (!empty($num_rows)){
	 																while ($agerow = mysqli_fetch_array($ageresult, MYSQL_ASSOC)){
	 																	echo '<option value="'.$agerow['age'].'">'.$agerow['age'].'</option>';
	 																}
	 															}
	 												echo 	   '</select> &emsp; -
	 													&emsp; <select name="max" required> 
	 															<option value="">Max</option>';
	 															$agequery2 = "SELECT TIMESTAMPDIFF(YEAR, birthday, CURDATE()) as age from student group by 1 asc";
																$ageresult2 = mysqli_query($dbc,$agequery2);
																$num_rows = $ageresult2->num_rows;

	 															if (!empty($num_rows)){
	 																while ($agerow2 = mysqli_fetch_array($ageresult2, MYSQL_ASSOC)){
	 																	echo '<option value="'.$agerow2['age'].'">'.$agerow2['age'].'</option>';
	 																}
	 															}
	 												echo  	   '</select>
	 												<br><br>
	 												<input type="submit" name="filter" value="Filter"> 
	 												</form> 
	 											</div> ';
													
											?>
											
 											<br><br>
										</div>
										</center>
										<div>
										<?php
											if (isset($_POST['filter'])){
												echo '<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
												        <thead>
												            <tr>
												                <th>First Name</th>
												                <th>Last Name</th>
												                <th>Age</th>
												                <th>Birthday</th>
												                <th>University</th>
												            </tr>
												        </thead>
												        <tfoot>
												            <tr>
												                <th>First Name</th>
												                <th>Last Name</th>
												                <th>Age</th>
												                <th>Birthday</th>
												                <th>University</th>
												            </tr>
												        </tfoot>
												        
												        <tbody>';

												if (!empty($_POST['univ'])){
													$university = array();
													$i = 0;
													foreach($_POST['univ'] as $compare){
														$university[$i] = $compare;
														$i++;
													}


													$j = 0;
													while ($j < $i){
														$tablequery = "SELECT firstname, lastname, birthday, university, TIMESTAMPDIFF(YEAR, birthday, CURDATE()) as age
														from student";
														$tableresult = mysqli_query($dbc, $tablequery);
														$num_rows=$tableresult->num_rows;
														if (!empty($num_rows)){
															while ($tablerow = mysqli_fetch_array($tableresult, MYSQL_ASSOC)){
																if ($university[$j] == $tablerow['university']){
																	if ($tablerow['age'] >= $_POST['min'] && $tablerow['age'] <= $_POST['max']){
																		echo "<tr>
															                <td>".$tablerow['firstname']."</td>
															                <td>".$tablerow['lastname']."</td>
															                <td>".$tablerow['age']."</td>
															                <td>".$tablerow['birthday']."</td>
															                <td>".$tablerow['university']."</td>
															            </tr>";
																	}
																	
																}

															}
														}
														
														$j++;
													}
													

													
													
												}
												
												
												echo '</tbody>
											    </table>';

											} else {
												echo '
												<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
											        <thead>
											            <tr>
											                <th>First Name</th>
											                <th>Last Name</th>
											                <th>Age</th>
											                <th>Birthday</th>
											                <th>University</th>
											            </tr>
											        </thead>
											        <tfoot>
											            <tr>
											                <th>First Name</th>
											                <th>Last Name</th>
											                <th>Age</th>
											                <th>Birthday</th>
											                <th>University</th>
											            </tr>
											        </tfoot>
											        
											        <tbody>';
											        	
												        	//Get University Data
												        	$universityquery = "SELECT firstname, lastname, birthday, university, TIMESTAMPDIFF(YEAR, birthday, CURDATE()) as age
												        	from student";
												        	$universityresult = mysqli_query($dbc, $universityquery);
												        	$num_rows=$universityresult->num_rows;

												        	if (!empty($num_rows)){

												        		while ($universityrow = mysqli_fetch_array($universityresult,MYSQL_ASSOC)) {
												        			echo "<tr>
															                <td>".$universityrow['firstname']."</td>
															                <td>".$universityrow['lastname']."</td>
															                <td>".$universityrow['age']."</td>
															                <td>".$universityrow['birthday']."</td>
															                <td>".$universityrow['university']."</td>
															            </tr>";
												        		}

											        			
											        		}
											        
											   echo '</tbody>
											    </table>';
											}
										?>
										
										</div>
								</header>
								<div class="agileits-box-body clearfix">
									
								</div>
							</div>
						</div>
					<!--//Student List Table-->
				</div>
			</div>
		</div>
		<div class="clearfix"> </div>
</section>
 <!-- footer -->
		  <div class="footer">
			<div class="wthree-copyright">
			  <p>© 2017 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
			</div>
		  </div>
  <!-- / footer -->
</section>
<!--main content end-->
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
<!-- morris JavaScript -->	
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	  
	 
    	$('#example').DataTable({
    		"lengthMenu": [[10, 25, 50, 100, 200], [10, 25, 50, 100, 200]],

    		"searching": false,

    		"columnDefs": [
			    { "width": "20%", "targets": 0 }
			  ]
    	});
   
	});
</script>

</body>
</html>


