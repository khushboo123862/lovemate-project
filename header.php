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
</head>

<body id="body">	
	
	
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
					<style>
					#searchhints{
						min-width:200px;
						background:yellow;
						padding:5px;
						position:absolute;
						left:0px;
						top:40px;
					}
					#searchhints li{
						border-bottom:1px solid #fff;
					}
					</style>
					<div class="form-inline" style="position:relative;">
						<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="searchterm">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
						<ul id="searchhints" style="display:none;">
						</ul>
					</div>
                    <div class="menu-area">
                        <ul class="menu">
                            <li>
                                <a href="#" id="kuchhbhi">Hi <?php echo $row['name']; ?></a>
                            </li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                        <a href="logout.php" class="login"><i class="fa-solid fa-user"></i><span>LOGOUT</span> </a>

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
