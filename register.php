<?php
$insert=false;

//database connection
$servername="localhost";
$username="root";
$password="";
$database="marshalart";

$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
  die("sorry we faild to connect ".mysqli_connect_error());
}

if($_SERVER['REQUEST_METHOD']=='POST'){
  $firstname=$_POST['first_name'];
  $lastname=$_POST['last_name'];
  $birthday=$_POST['birthday'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $gender=$_POST['gender'];
  $subject=$_POST['subject'];

  $sql="INSERT INTO `register` (`first_name`, `last_name`, `birthday`, `gender`, `email`, `phone`, `subject`) VALUES ('$firstname', '$lastname', '$birthday', '$gender', '$email', '$phone', '$subject')";
  $result=mysqli_query($conn,$sql);


  if($result){
    $insert=true;
  }

  $html="<p>'$firstname $lastname has filled the form of his Unique Mix Marshal Art Foundation. The details are as follows. Then you contact them.'</p>
        <table><tr><td>First_Name</td><td>$firstname</td></tr>
                <tr><td>Last_Name</td><td>$lastname</td></tr>
                <tr><td>Birth_Date</td><td>$birthday</td></tr>
                <tr><td>Email</td><td>$email</td></tr>
                <tr><td>Phone_no</td><td>$phone</td></tr>
                <tr><td>Choose_Event</td><td>$subject</td></tr></table>";
	
	include('PHPMailerAutoload.php');
	$mail=new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host="smtp.gmail.com";
	$mail->Port=587;
	$mail->SMTPSecure="tls";
	$mail->SMTPAuth=true;
	$mail->Username="waghvinayak17@gmail.com";
	$mail->Password="7057807841wagh";
	$mail->SetFrom("waghvinayak16@gmail.com");
	$mail->addAddress("waghvinayak17@gmail.com");
	$mail->IsHTML(true);
	$mail->Subject="New registration details";
	$mail->Body=$html;
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if($mail->send()){
		//echo "Mail send";
	}else{
		//echo "Error occur";
	}

}

?>












<!DOCTYPE html>
<!--
Template Name: Sislaf
Author: <a href="https://www.os-templates.com/">OS Templates</a>
Author URI: https://www.os-templates.com/
Copyright: OS-Templates.com
Licence: Free to use under our free template licence terms
Licence URI: https://www.os-templates.com/template-terms
-->
<html lang="">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->
<head>
<title>Unique Mix Marshal Art Foundation</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Colorlib Templates">
<meta name="author" content="Colorlib">
<meta name="keywords" content="Colorlib Templates">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<!-- Icons font CSS-->
<link href="reg_vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
<link href="reg_vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
<!-- Font special for pages-->
<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Vendor CSS-->
<link href="reg_vendor/select2/select2.min.css" rel="stylesheet" media="all">
<link href="reg_vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

<!-- Main CSS-->
<link href="reg_css/main.css" rel="stylesheet" media="all">
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- Top Background Image Wrapper -->
<div class="bgded overlay" style="background-image:url('images/logo.jpg');"> 
  <!-- ################################################################################################ -->
  <div class="wrapper row0">
    <div id="topbar" class="hoc clear">
      <div class="fl_left"> 
        <!-- ################################################################################################ -->
        <ul class="nospace">
          <li><i class="fas fa-phone rgtspace-5"></i> +91 9172933078</li>
          <li><i class="fas fa-phone rgtspace-5"></i> +91 7498742931</li>
          <li><i class="far fa-envelope rgtspace-5"></i> uniquemixmarshalart.com</li>
        </ul>
        <!-- ################################################################################################ -->
      </div>
      <div class="fl_right"> 
        <!-- ################################################################################################ -->
        <ul class="nospace">
          <li><a href="index.html"><i class="fas fa-home"></i></a></li>
          <li><a href="#" title="Help Centre"><i class="far fa-life-ring"></i></a></li>
          <li><a href="#" title="Login"><i class="fas fa-sign-in-alt"></i></a></li>
          <li><a href="#" title="Sign Up"><i class="fas fa-edit"></i></a></li>
          <li id="searchform">
            <div>
              <form action="#" method="post">
                <fieldset>
                  <legend>Quick Search:</legend>
                  <input type="text" placeholder="Enter search term&hellip;">
                  <button type="submit"><i class="fas fa-search"></i></button>
                </fieldset>
              </form>
            </div>
          </li>
        </ul>
        <!-- ################################################################################################ -->
      </div>
    </div>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="wrapper row1">
    <header id="header" class="hoc clear">
      <div id="logo" class="fl_left"> 
        <!-- ################################################################################################ -->
        <h1><a href="index.html">Unique Mix Marshal Art</a></h1>
        <!-- ################################################################################################ -->
      </div>
      <nav id="mainav" class="fl_right"> 
        <!-- ################################################################################################ -->
        <ul class="clear">
          <li class="active"><a href="index.html">Home</a></li>
          <li><a class="drop" href="#">Pages</a>
            <ul>
              <li><a href="pages/gallery.html">Gallery</a></li>
              <li><a href="events.php">Events</a></li>
            </ul>
          </li>
         
          <li><a href="AboutUs.php">AboutUs</a></li>
          <li><a href="events.php">EVENTS</a></li>
          <li><a href="register.php">Registration</a></li>
        </ul>
        <!-- ################################################################################################ -->
      </nav>
    </header>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ######## registration form ##########-->






    <div class="page-wrapper">
          <div class="wrapper wrapper--w680">
              <div class="card card-4">
                  <div class="card-body">
                      <h2 class="title">Registration now</h2>
                      
                      <h2>
                      <?php
                      if($insert){
                        echo '<div class="alert alert-dark" role="alert">
                        <h4 class="alert-heading" style="color:blue;">registartion Successful!</h4>
                        <p style="color:blue;">Thanks for your registration.</p>
                        </div>';
                        }
                        ?>
                      </h2>
                      
                      <form action="/marshalart/register.php" method="POST">
                          <div class="row row-space">
                              <div class="col-2">
                                  <div class="input-group">
                                      <label class="label">first name</label>
                                      <input class="input--style-4" type="text" name="first_name" required>
                                  </div>
                              </div>
                              <div class="col-2">
                                  <div class="input-group">
                                      <label class="label">last name</label>
                                      <input class="input--style-4" type="text" name="last_name" required>
                                  </div>
                              </div>
                          </div>
                          <div class="row row-space">
                              <div class="col-2">
                                  <div class="input-group">
                                      <label class="label">Birthday</label>
                                      <div class="input-group-icon">
                                          <input class="input--style-4 js-datepicker" type="text" name="birthday" required>
                                          <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-2">
                                  <div class="input-group">
                                      <label class="label">Gender</label>
                                      <div class="p-t-10">
                                          <label class="radio-container m-r-45">Male
                                              <input type="radio" checked="checked" name="gender">
                                              <span class="checkmark"></span>
                                          </label>
                                          <label class="radio-container">Female
                                              <input type="radio" name="gender">
                                              <span class="checkmark"></span>
                                          </label>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row row-space">
                              <div class="col-2">
                                  <div class="input-group">
                                      <label class="label">Email</label>
                                      <input class="input--style-4" type="email" name="email" required>
                                  </div>
                              </div>
                              <div class="col-2">
                                  <div class="input-group">
                                      <label class="label">Phone Number</label>
                                      <input class="input--style-4" type="text" name="phone" required>
                                  </div>
                              </div>
                          </div>
                          <div class="input-group">
                              <label class="label">Subject</label>
                              <div class="rs-select2 js-select-simple select--no-search" required>
                                  <select name="subject">
                                      <option  selected="selected">Choose event</option>
                                      <option>Karate</option>
                                      <option>Kickboxing</option>
                                      <option>Yoga</option>
                                      <option>Weapon Traning</option>
                                      <option>Gymnastics</option>
                                      <option>Street Workout</option>
                                      <option>Ninja Commando Training</option>
                                      <option>Gym Training</option>
                                      <option></option>
                                  </select>
                                  <div class="select-dropdown"></div>
                              </div>
                          </div>
                          <div class="p-t-15">
                              <button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
      
    
  
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="bgded overlay row4" style="background-image:url('images/marshal3.jpeg');">
  <footer id="footer" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="center btmspace-50">
      <h6 class="heading">about us</h6>
      <ul class="faico clear">
      <p class="nospace">If You’re Serious About Growing Your Martial Arts School, You Owe it to Yourself to Speak to One of Our Online Martial Arts Marketing Experts. </p>
    </div>
    <!-- ################################################################################################ -->
    <hr class="btmspace-50">
    <!-- ################################################################################################ -->
    <div class="group btmspace-50">
      <div class="one_quarter first">
        <h6 class="heading">Disclaimer</h6>
        <p class="nospace btmspace-15">By using this website you acknowledge that everything is protected by copyright and that and Unique Mix Martial Arts foundation takes no responsibility for the actions you take based on the writings on recordings displayed on this website.

By using this website you also acknowledge that any links this website may or may not be affiliate links which earn this business a monetary commission upon sale. These products and services all come highly recommended and this will impact your price and service in no way whatsoever.</p>
        <form method="post" action="#">
          <fieldset>
            <li><a class="btn inverse" href="register.php">register now</a></li>
          </fieldset>
        </form>
      </div>
      <div class="one_quarter">
        <h6 class="heading">pages</h6>
        <ul class="nospace linklist">
          <ul class="nospace linklist">
          <li><a href="index.html">Home</a></li>
          <ul <a>pages</a>
              
              <li><a href="pages/gallery.html">Gallery , </a><a href="events.php">Events</a></li>
              <li></li>
          </ul>
          <li><a href="aboutus.php">AboutUs</a></li>
          <li><a href="events.php">Events</a></li>
          <li><a href="register.php">registration</a></li>
        </ul>
        </ul>
      </div>
      <div class="one_quarter">
        <h6 class="heading">Instructor Details</h6>
        <ul class="nospace linklist">
          <li><a href="#">Black Belt -- Master Sachin Padekar</a></li>
          <li><a href="#">Contact -- <p>+91 9172933078</p> <p>+91 8766702766</p> </a></li>
          <li><a href="#">Email -- padekarsachin4@gmail.com </a></li>
          
        </ul>
      </div>
      <div class="one_quarter">
        <h6 class="heading">Gallery</h6>
        <ul class="nospace clear latestimg">
          <li><a class="imgover" href="pages/gallery.html"><img src="images/sachin2.jpg" alt=""></a></li>
          <li><a class="imgover" href="pages/gallery.html"><img src="images/sachinimg12.jpg" alt=""></a></li>
          <li><a class="imgover" href="pages/gallery.html"><img src="images/sachin1.jpg" alt=""></a></li>
          <li><a class="imgover" href="pages/gallery.html"><img src="images/sachinimg7.jpeg" alt=""></a></li>
          <li><a class="imgover" href="pages/gallery.html"><img src="images/sachinimg10.jpg" alt=""></a></li>
          <li><a class="imgover" href="pages/gallery.html"><img src="images/sachinimg11.jpg" alt=""></a></li>
          <li><a class="imgover" href="pages/gallery.html"><img src="images/sachinimg12.jpg" alt=""></a></li>
          <li><a class="imgover" href="pages/gallery.html"><img src="images/sachinimg11.jpg" alt=""></a></li>
          <li><a class="imgover" href="pages/gallery.html"><img src="images/sachinimg7.jpeg" alt=""></a></li>
        </ul>
        <fieldset>
        <hr>
            <li><a class="btn inverse" href="pages/gallery.html">Check it</a></li>
          </fieldset>
      </div>
      <!-- ################################################################################################ -->
    </div>
    <div id="ctdetails" class="clear">
      <ul class="nospace clear">
        <li class="one_quarter first">
          <div class="block clear"><a href="#"><i class="fas fa-phone"></i></a> <span><strong>Give us a call:</strong> <p>+91 9172933078</p> <p>+91 8766702766</p></span></div>
        </li>
        <li class="one_quarter">
          <div class="block clear"><a href="#"><i class="fas fa-envelope"></i></a> <span><strong>Send us a mail:</strong> padekarsachin4@gmail.com</span></div>
        </li>
        <li class="one_quarter">
          <div class="block clear"><a href="#"><i class="fas fa-clock"></i></a> <span><strong> Monday - Saturday:</strong> 08.00am - 18.00pm</span></div>
        </li>
        <li class="one_quarter">
          <div class="block clear"><a href="#"><i class="fas fa-map-marker-alt"></i></a> <span><strong>Come visit us:</strong> Directions to <a href="https://www.google.co.in/maps/place/Alephata+ST+Depot+./@19.1816574,74.0917074,16z/data=!4m13!1m7!3m6!1s0x3bdd23c2bf542617:0x4e394fdc8a8f1a6!2sAle,+Maharashtra+412411!3b1!8m2!3d19.1766126!4d74.1107824!3m4!1s0x3bdd23b99e33a917:0xb581dd0c3becb11!8m2!3d19.1824966!4d74.095902">Alephata</a></span></div>
        </li>
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </footer>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="#">uniquemixmarshalart.com</a></p>
    <p class="fl_right">Instruct by <a target="_blank" ></a>Master Sachin Padekar</p>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>

<script src="reg_vendor/jquery/jquery.min.js"></script>

<!-- Vendor JS-->
    <script src="reg_vendor/select2/select2.min.js"></script>
    <script src="reg_vendor/datepicker/moment.min.js"></script>
    <script src="reg_vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="reg_js/global.js"></script>

</body>
</html>