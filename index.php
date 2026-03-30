<?php
include('config.php');
include('fun.php');
if( isset($_POST['regbtn']) ){
	//print_r($_POST);
	
	if( empty($_POST['gender']) ){
		$msg .= "Gender is required <br>";
	}else{
		$gender=vld_input($_POST['gender']);
	}
	
	if( empty($_POST['unm']) ){
		$msg .= "Name is required<br>";
	}else{
		$name=vld_input($_POST['unm']);
		// check if name only contains letters and whitespace
		if( !preg_match("/^[a-zA-Z-' ]*$/",$name) ){
			$msg .= "Only letters and white space allowed in name <br>";
		}
	}
	
	if( empty($_POST['city']) ){
		$msg .= "City is required<br>";
	}else{
		$city=vld_input($_POST['city']);
		// check if city only contains letters and whitespace
		if( !preg_match("/^[a-zA-Z-' ]*$/",$city) ){
			$msg .= "Only letters and white space allowed in city <br>";
		}
	}
	
	if( empty($_POST['mobile']) ){
		$msg .= "Mob. No. is required <br>";
	}else{
		$mobile = vld_input($_POST['mobile']);
		// check if name only contains letters and whitespace
		if( !preg_match("/^[0-9]*$/",$mobile) ){
			$msg .= "Only digits allowed in mobile number<br>";
		}
	}
	
	if( empty($_POST['pwd']) ){
		$msg .= "Password is required <br>";
	}else{
		$pwd=vld_input($_POST['pwd']);
	}
	
	if($msg==""){
		$dor=date('Y-m-d');
		$sql = "INSERT INTO `users` (`name`, `mobile`, `city`, `pwd`, `gender`, `dor`) VALUES ('$name', '$mobile', '$city', '$pwd', '$gender', '$dor');";
		if (mysqli_query($conn, $sql)) {
			$msg="New record created successfully";
		}else{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
}
if( isset($_POST['loginbtn']) ){
	
	if( empty($_POST['mob']) ){
		$msg .= "Mob. No. is required <br>";
	}else{
		$mobile = vld_input($_POST['mob']);
		// check if name only contains letters and whitespace
		if( !preg_match("/^[0-9]*$/",$mobile) ){
			$msg .= "Only digits allowed in mobile number<br>";
		}
	}
	
	if( empty($_POST['pwd']) ){
		$msg .= "Password is required <br>";
	}else{
		$pwd=vld_input($_POST['pwd']);
	}
	
	if($msg==""){
		$sql = "SELECT * FROM `users` WHERE `mobile`='$mobile' AND `pwd`='$pwd'";
		$result=mysqli_query($conn, $sql);
		$num=mysqli_num_rows($result);
		if( $num==1 ){
			$row=mysqli_fetch_assoc($result);
			//print_r($row);
			if( isset($_POST['rememberme']) && $_POST['rememberme']=='11' ){
				setcookie("cookuserid",$row['userid'],time()+60);
			}
			$_SESSION['sessuserid']=$row['userid'];
			header('Location: home.php');
		}else{
			$msg="Mobile/Password Incorrect";
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- x-icon -->
    <link rel="shortcut icon" href="assets/images/x-icon.png" type="image/x-icon">

    <!-- Other css -->
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="fa/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/swiper.min.css">
    <link rel="stylesheet" href="css/style.css">

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>TuruLav</title>
	 <script type="text/javascript">  
        (function () {  
            'use strict';  
            window.addEventListener('load', function () {  
                var form = document.getElementById('needs-validation');  
                form.addEventListener('submit', function (event) {  
                    if (form.checkValidity() === false) {  
                        event.preventDefault();  
                        event.stopPropagation();  
                    }  
                    form.classList.add('was-validated');  
                }, false);  
            }, false);  
        })();  
    </script>  
</head>

<body>
    <!-- preloader start here -->
    <div class="preloader" style="display: none;">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- preloader ending here -->

    


    <!-- ==========Header Section Starts Here========== -->
    <header class="header-section header-fixed fadeInUp">
        <div class="header-bottom">
            <div class="container">
                <div class="header-wrapper">
                    <div class="logo">
                        <a href="index.html">
                            <img src="images/logo.png" alt="logo">
                        </a>
                    </div>
                    <div class="menu-area">
                        <ul class="menu">
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li>
                                <a href="active-group.html">Community</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="index.html#0">Blog</a>
                                <ul class="submenu">
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="blog-single.html">Blog Single</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                        <a href="login.html" class="login"><i class="fa-solid fa-user"></i><span>LOG IN</span> </a>
                        <a href="signup.html" class="signup"><i class="fa-solid fa-users"></i><span>SIGN UP</span> </a>

                        <!-- toggle icons -->
                        <div class="header-bar d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="ellepsis-bar d-lg-none">
                            <i class="icofont-info-square"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ==========Header Section Ends Here========== -->


    <!-- ================ Banner Section start Here =============== -->
    <section class="banner-section">
        <div class="container">
			<div class="row">
				<div class="col-md-12"><p><?php echo $msg; ?></p></div>
			</div>
            <div class="section-wrapper">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="banner-content">
                            <div class="intro-form">
                                <div class="account-wrapper">
									<h3 class="title">Login</h3>
									<form class="account-form" action="" method="post"id="needs-validation" novalidate>
										<div class="form-group">
											<input type="text" placeholder="Mobile Number" name="mob"  class="form-control" aria-describedby="inputGroupPrepend" required pattern="[0-9]{10}">
											<div class="invalid-feedback">  
                                            Please enter Mobile.  
											</div>
										</div>
										<div class="form-group">
											<input type="password" placeholder="Password" name="pwd" class="form-control" aria-describedby="inputGroupPrepend" required>
											<div class="invalid-feedback">  
                                            Please enter Password.  
											</div>
										</div>
										<div class="form-group">
											<div class="d-flex justify-content-between flex-wrap pt-sm-2">
												<div class="checkgroup">
													<input type="checkbox" name="rememberme" id="rememberme" value="11">
													<label for="remember">Remember Me</label>
												</div>
												<a href="#">Forget Password?</a>
											</div>
										</div>
										<div class="form-group">
											<input type="submit" class="d-block lab-btn" value="LOGIN" name="loginbtn">
										</div>
									</form>
								</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2"></div>
                    <div class="col-lg-5">
                        <div class="banner-content">
                            <div class="intro-form" style="background:rgb(237 197 210 / 60%);">
                                <div class="intro-form-inner">
									<h3>Sign Up TuruLav</h3>
                                    <form action="" method="post" class="banner-form">
                                        <div class="gender">
                                            <label for="gender" class="left">I am a </label>
                                            <div class=" right">
                                                <div class="form-check-inline">
												  <label class="form-check-label">
													<input type="radio" class="form-check-input" name="gender" value="male">Male
												  </label>
												</div>
												<div class="form-check-inline">
												  <label class="form-check-label">
													<input type="radio" class="form-check-input" name="gender" value="female">Female
												  </label>
												</div>
                                            </div>
                                        </div>
										<div class="city">
                                            <label for="name" class="left">Name</label>
                                            <input class="right" type="text" name="unm" id="unm" placeholder="Your Name">
                                        </div>
                                        <div class="city">
                                            <label for="city" class="left">City</label>
                                            <input class="right" type="text" name="city" id="city" placeholder="Your City Name..">
                                        </div>
										<div class="city">
                                            <label for="name" class="left">Mobile</label>
                                            <input class="right" type="text" name="mobile" id="mobile" placeholder="Mobile Number">
                                        </div>
										
										<div class="city">
                                            <label for="name" class="left">Password</label>
                                            <input class="right" type="password" id="pwd" name="pwd" placeholder="Choose Password">
                                        </div>
                                        <input type="submit" name="regbtn" value="Sign Up" class="btn btn-primary btn-block">

                                    </form>
                                    
                                </div>
                            </div>	
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="all-shapes">
            <img src="images/01(1).png" alt="shape" class="banner-shape shape-1">
            <img src="images/02.png" alt="shape" class="banner-shape shape-2">
            <img src="images/03.png" alt="shape" class="banner-shape shape-3">
            <img src="images/04.png" alt="shape" class="banner-shape shape-4">
            <img src="images/05.png" alt="shape" class="banner-shape shape-5">
            <img src="images/06.png" alt="shape" class="banner-shape shape-6">
            <img src="images/07.png" alt="shape" class="banner-shape shape-7">
            <img src="images/08.png" alt="shape" class="banner-shape shape-8">
        </div>
    </section>
    <!-- ================ Banner Section end Here =============== -->


    <!-- ================ Member Section Start Here =============== -->
    <section class="member-section padding-tb">
        <div class="container">
            <div class="section-header">
                <h4 class="theme-color">Meet New People Today!</h4>
                <h2>New Members in London</h2>
            </div>
            <div class="section-wrapper">
                <div class="row justify-content-center g-3 g-md-4">
                    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                        <div class="lab-item member-item style-1">
                            <div class="lab-inner">
                                <div class="lab-thumb">
                                    <img src="images/01.jpg" alt="member-img">
                                </div>
                                <div class="lab-content">
                                    <h6><a href="profile.html">Andrea Guido</a> </h6>
                                    <p>Active 1 Day</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                        <div class="lab-item member-item style-1">
                            <div class="lab-inner">
                                <div class="lab-thumb">
                                    <img src="images/02.jpg" alt="member-img">
                                </div>
                                <div class="lab-content">
                                    <h6><a href="profile.html">Gihan-Fernando</a></h6>
                                    <p>Active 2 Day</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                        <div class="lab-item member-item style-1">
                            <div class="lab-inner">
                                <div class="lab-thumb">
                                    <img src="images/03.jpg" alt="member-img">
                                </div>
                                <div class="lab-content">
                                    <h6><a href="profile.html">Sweet Admin</a></h6>
                                    <p>Active 3 Day</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                        <div class="lab-item member-item style-1">
                            <div class="lab-inner">
                                <div class="lab-thumb">
                                    <img src="images/04.jpg" alt="member-img">
                                </div>
                                <div class="lab-content">
                                    <h6><a href="profile.html">Gyan-Baffour</a></h6>
                                    <p>Active 5 Day</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                        <div class="lab-item member-item style-1">
                            <div class="lab-inner">
                                <div class="lab-thumb">
                                    <img src="images/05.jpg" alt="member-img">
                                </div>
                                <div class="lab-content">
                                    <h6><a href="profile.html">Teszt Eleking</a></h6>
                                    <p>Active 1 Day</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                        <div class="lab-item member-item style-1">
                            <div class="lab-inner">
                                <div class="lab-thumb">
                                    <img src="images/06.jpg" alt="member-img">
                                </div>
                                <div class="lab-content">
                                    <h6><a href="profile.html">Zeahra Guido</a>
                                    </h6>
                                    <p>Active 1 Day</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="member-button-group d-flex flex-wrap justify-content-center">
                    <a href="signup.html" class="lab-btn"><i class="fa-solid fa-users"></i><span>Join Us for
                            Free</span></a>
                    <a href="login.html" class="lab-btn"><i class="fa-solid fa-circle-play"></i><span>Our tv
                            commercial</span></a>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ Member Section end Here =============== -->


    <!-- ================ About Section start Here =============== -->
    <section class="about-section padding-tb bg-img">
        <div class="container">
            <div class="section-header">
                <h4>About Our Turulav</h4>
                <h2>It All Starts With A Date</h2>
            </div>
            <div class="section-wrapper">
                <div class="row justify-content-center g-4">
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                        <div class="lab-item about-item">
                            <div class="lab-inner text-center">
                                <div class="lab-thumb">
                                    <img src="images/01(2).png" alt="img">
                                </div>
                                <div class="lab-content">
                                    <h2 class="counter">29,991</h2>
                                    <p>Members in Total</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                        <div class="lab-item about-item">
                            <div class="lab-inner text-center">
                                <div class="lab-thumb">
                                    <img src="images/02(1).png" alt="img">
                                </div>
                                <div class="lab-content">
                                    <h2 class="counter">29,960</h2>
                                    <p>Members Online</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                        <div class="lab-item about-item">
                            <div class="lab-inner text-center">
                                <div class="lab-thumb">
                                    <img src="images/03(1).png" alt="img">
                                </div>
                                <div class="lab-content">
                                    <h2 class="counter">29,960</h2>
                                    <p>Men Online</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                        <div class="lab-item about-item">
                            <div class="lab-inner text-center">
                                <div class="lab-thumb">
                                    <img src="images/04(1).png" alt="img">
                                </div>
                                <div class="lab-content">
                                    <h2 class="counter">28,960</h2>
                                    <p>Women Online</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ About Section end Here =============== -->



    <!-- ================ Active Group Section Start Here =============== -->
    <section class="group-section padding-tb bg-img">
        <div class="container">
            <div class="section-header">
                <h4>Recently Active Groups</h4>
                <h2>Turulav 4 Best Active Group</h2>
            </div>
            <div class="section-wrapper">
                <div class="row g-4">
                    <div class="col-xl-6 col-12">
                        <div class="group-item lab-item">
                            <div class="lab-inner d-flex flex-wrap align-items-center p-4">
                                <div class="lab-thumb me-sm-4 mb-4 mb-sm-0">
                                    <img src="images/01(5).jpg" alt="img">
                                </div>
                                <div class="lab-content">
                                    <h4>Active Group A1</h4>
                                    <p>Colabors atively fabcate best breed and
                                        apcations through visionary value </p>
                                    <ul class="img-stack d-flex">
                                        <li><img src="images/01(6).png" alt="member-img"></li>
                                        <li><img src="images/02(4).png" alt="member-img"></li>
                                        <li><img src="images/03(4).png" alt="member-img"></li>
                                        <li><img src="images/04(2).png" alt="member-img"></li>
                                        <li><img src="images/05(1).png" alt="member-img"></li>
                                        <li><img src="images/06(1).png" alt="member-img"></li>
                                        <li class="bg-theme">12+</li>
                                    </ul>
                                    <div class="test"> <a href="active-group.html" class="lab-btn"> <i class="icofont-users-alt-5"></i>View Group</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-12">
                        <div class="group-item lab-item">
                            <div class="lab-inner d-flex flex-wrap align-items-center p-4">
                                <div class="lab-thumb me-sm-4 mb-4 mb-sm-0">
                                    <img src="images/02(5).jpg" alt="img">
                                </div>
                                <div class="lab-content">
                                    <h4>Active Group A2</h4>
                                    <p>Colabors atively fabcate best breed and
                                        apcations through visionary value </p>
                                    <ul class="img-stack d-flex">
                                        <li><img src="images/01(6).png" alt="member-img"></li>
                                        <li><img src="images/02(4).png" alt="member-img"></li>
                                        <li><img src="images/03(4).png" alt="member-img"></li>
                                        <li><img src="images/04(2).png" alt="member-img"></li>
                                        <li><img src="images/05(1).png" alt="member-img"></li>
                                        <li><img src="images/06(1).png" alt="member-img"></li>
                                        <li class="bg-theme">12+</li>
                                    </ul>
                                    <div class="test"> <a href="active-group.html" class="lab-btn"> <i class="icofont-users-alt-5"></i>View Group</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-12">
                        <div class="group-item lab-item">
                            <div class="lab-inner d-flex flex-wrap align-items-center p-4">
                                <div class="lab-thumb me-sm-4 mb-4 mb-sm-0">
                                    <img src="images/03(5).jpg" alt="img">
                                </div>
                                <div class="lab-content">
                                    <h4>Active Group A3</h4>
                                    <p>Colabors atively fabcate best breed and
                                        apcations through visionary value </p>
                                    <ul class="img-stack d-flex">
                                        <li><img src="images/01(6).png" alt="member-img"></li>
                                        <li><img src="images/02(4).png" alt="member-img"></li>
                                        <li><img src="images/03(4).png" alt="member-img"></li>
                                        <li><img src="images/04(2).png" alt="member-img"></li>
                                        <li><img src="images/05(1).png" alt="member-img"></li>
                                        <li><img src="images/06(1).png" alt="member-img"></li>
                                        <li class="bg-theme">12+</li>
                                    </ul>
                                    <div class="test"> <a href="active-group.html" class="lab-btn"> <i class="icofont-users-alt-5"></i>View Group</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-12">
                        <div class="group-item lab-item">
                            <div class="lab-inner d-flex flex-wrap align-items-center p-4">
                                <div class="lab-thumb me-sm-4 mb-4 mb-sm-0">
                                    <img src="images/04(3).jpg" alt="img">
                                </div>
                                <div class="lab-content">
                                    <h4>Active Group A4</h4>
                                    <p>Colabors atively fabcate best breed and
                                        apcations through visionary value </p>
                                    <ul class="img-stack d-flex">
                                        <li><img src="images/01(6).png" alt="member-img"></li>
                                        <li><img src="images/02(4).png" alt="member-img"></li>
                                        <li><img src="images/03(4).png" alt="member-img"></li>
                                        <li><img src="images/04(2).png" alt="member-img"></li>
                                        <li><img src="images/05(1).png" alt="member-img"></li>
                                        <li><img src="images/06(1).png" alt="member-img"></li>
                                        <li class="bg-theme">12+</li>
                                    </ul>
                                    <div class="test"> <a href="active-group.html" class="lab-btn"> <i class="icofont-users-alt-5"></i>View Group</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ Active Group Section end Here =============== -->


    <!-- ================ App Section start Here =============== -->
    <section class="app-section bg-pink">
        <div class="container">
            <div class="section-wrapper padding-tb">
                <div class="app-content">
                    <h4>Download App Our Turulav</h4>
                    <h2>Easy Connect to Everyone</h2>
                    <p>You find us, finally, and you are already in love. More than 5.000.000 around
                        the world already shared the same experience andng ares uses our system
                        Joining us today just got easier!</p>
                    <ul class="app-download d-flex flex-wrap">
                        <li><a href="index.html#" class="d-flex flex-wrap align-items-center">
                                <div class="app-thumb">
                                    <img src="images/apple.png" alt="apple">
                                </div>
                                <div class="app-content">
                                    <p>Available on the</p>
                                    <h4>App Store</h4>
                                </div>
                            </a></li>
                        <li class="d-inline-block"><a href="index.html#" class="d-flex flex-wrap align-items-center">
                                <div class="app-thumb">
                                    <img src="images	/playstore.png" alt="playstore">
                                </div>
                                <div class="app-content">
                                    <p>Available on the</p>
                                    <h4>Google Play</h4>
                                </div>
                            </a></li>
                    </ul>

                </div>
                <div class="mobile-app">
                    <img src="images/mobile-view.png" alt="mbl-view">
                </div>
            </div>
        </div>
    </section>
    <!-- ================ App Section end Here =============== -->


    <!-- ================ footer Section start Here =============== -->
    <footer class="footer-section">
        <div class="footer-top">
            <div class="container">
                <div class="row g-3 justify-content-center g-lg-0">
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="footer-top-item lab-item">
                            <div class="lab-inner">
                                <div class="lab-thumb">
                                    <img src="images/01(7).png" alt="Phone-icon">
                                </div>
                                <div class="lab-content">
                                    <span>Phone Number : +880123 456 789</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="footer-top-item lab-item">
                            <div class="lab-inner">
                                <div class="lab-thumb">
                                    <img src="images/02(6).png" alt="email-icon">
                                </div>
                                <div class="lab-content">
                                    <span>Email : admin@turulav.com</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="footer-top-item lab-item">
                            <div class="lab-inner">
                                <div class="lab-thumb">
                                    <img src="images/03(6).png" alt="location-icon">
                                </div>
                                <div class="lab-content">
                                    <span>Address : 30 North West New York 240</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-middle padding-tb" style="background-image: url('images/bg.png');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="footer-middle-item-wrapper">
                            <div class="footer-middle-item mb-lg-0">
                                <div class="fm-item-title">
                                    <h4>About TuruLav</h4>
                                </div>
                                <div class="fm-item-content">
                                    <p class="mb-4">Energistically coordinate highly efficient procesr
                                        partnerships befor revolutionar growth strategie
                                        improvement viaing awesome</p>
                                    <img src="images/about.jpg" alt="about-image" class="footer-abt-img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="footer-middle-item-wrapper">
                            <div class="footer-middle-item mb-lg-0">
                                <div class="fm-item-title">
                                    <h4>our Recent news</h4>
                                </div>
                                <div class="fm-item-content">
                                    <div class="fm-item-widget lab-item">
                                        <div class="lab-inner">
                                            <div class="lab-thumb">
                                                <a href="index.html#"> <img src="images/01(8).jpg" alt="footer-widget-img"></a>
                                            </div>
                                            <div class="lab-content">
                                                <h6><a href="blog-single.html">Enable Seamin Matera Forin And Our
                                                        Orthonal Create Vortals.</a></h6>
                                                <p>July 23, 2021</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fm-item-widget lab-item">
                                        <div class="lab-inner">
                                            <div class="lab-thumb">
                                                <a href="index.html#"><img src="images/02(7).jpg" alt="footer-widget-img"></a>
                                            </div>
                                            <div class="lab-content">
                                                <h6><a href="blog-single.html">Dynamca Network Otuitive Catays For
                                                        Plagiarize Mindshare After</a></h6>
                                                <p>July 23, 2021</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fm-item-widget lab-item">
                                        <div class="lab-inner">
                                            <div class="lab-thumb">
                                                <a href="index.html#"><img src="images/03(7).jpg" alt="footer-widget-img"></a>
                                            </div>
                                            <div class="lab-content">
                                                <h6><a href="blog-single.html">Dynamca Network Otuitive Catays For
                                                        Plagiarize Mindshare After</a></h6>
                                                <p>July 23, 2021</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="footer-middle-item-wrapper">
                            <div class="footer-middle-item-3 mb-lg-0">
                                <div class="fm-item-title">
                                    <h4>Our Newsletter Signup</h4>
                                </div>
                                <div class="fm-item-content">
                                    <p>By subscribing to our mailing list you will always
                                        be update with the latest news from us.</p>
                                    <form>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Enter email">
                                        </div>
                                        <button type="submit" class="lab-btn">Send Massage<i class="fa-solid fa-paper-plane"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-bottom-content text-center">
                            <p>© 2025 <a href="#">KhushabooLav</a> -Best For Dating</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ================ footer Section end Here =============== -->



    <!-- scrollToTop start here -->
    <a href="index.html#" class="scrollToTop" style="bottom: 5%; opacity: 1; transition: 0.5s;"><i class="fa-solid fa-angle-up"></i></a>
    <!-- scrollToTop ending here -->




    <!-- All Scripts -->
    <script src="js/jquery.3.7.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/swiper.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/functions.js"></script>


</body>
</html>