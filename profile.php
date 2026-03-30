<?php 
include('config.php');
include('fun.php');
//print_r($_SESSION);
//print_r($_COOKIE);
if( isset($_COOKIE['cookuserid']) ){
	$_SESSION['sessuserid']=$_COOKIE['cookuserid'];
}
if( !(isset($_SESSION['sessuserid'])) ){
	header('Location: index.php');
}
$sessuserid=$_SESSION['sessuserid'];
if( isset($_POST['uplbtn']) ){
	//print_r($_FILES);
	$name=$_FILES['pic']['name'];
	$full_path=$_FILES['pic']['full_path'];
	$type=$_FILES['pic']['type'];
	$tmp_name=$_FILES['pic']['tmp_name'];
	$error=$_FILES['pic']['error'];
	$size=$_FILES['pic']['size'];
	$arr=explode(".",$name);
	$ext=strtolower( end($arr) );
	$allowedExt=array("jpg","jpeg","png");
	if( in_array($ext,$allowedExt) ){
		if( ($size/1024)<200 ){
			$path='upl/'.time().$name;
			if( move_uploaded_file($tmp_name,$path) ){
				$sql = "UPDATE `users` SET `propic`='$path' WHERE `userid`='$sessuserid'";
				if(mysqli_query($conn, $sql)) {
					$msg="PROPIC Updateded successfully";
				}else{
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
		}else{
			$msg="FileSize Should be Less Than 200KB";
		}
	}else{
		$msg="File type is invalid";
	}
}



if( isset($_POST['postbtn']) ){
	//print_r($_POST);
	
	if( empty($_POST['postcontent']) ){
		$msg .= "postcontent is required <br>";
	}else{
		$postcontent=vld_input($_POST['postcontent']);
	}
	
	if($msg==""){
		$dt=date('Y-m-d H:i:s');
		$sql = "INSERT INTO `posts` (`postcontent`, `userid`, `dt`) VALUES ('$postcontent', '$sessuserid', '$dt');";
		if (mysqli_query($conn, $sql)) {
			$msg="Posted successfully";
		}else{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
}

$sql = "SELECT * FROM `users` WHERE `userid`='$sessuserid'";
$result=mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

if( isset($_GET['profileid']) ){
	//print_r($_POST);
	
	if( empty($_GET['profileid']) ){
		$profileid=$sessuserid;
	}else{
		$profileid=vld_input($_GET['profileid']);
	}
	$sqlpp = "SELECT * FROM `users` WHERE `userid`='$profileid'";
	$resultpp=mysqli_query($conn, $sqlpp);
	$num=mysqli_num_rows($resultpp);
	if( $num==1 ){
		$rowpp=mysqli_fetch_assoc($resultpp);
	}else{
		$rowpp=$row;
	}
	$profileid=$rowpp['userid'];
}
/*hdjshfhsjfh*/

if( isset($_GET['puid']) ){
	
	if( empty($_GET['puid']) ){
		$msg .= "Sid is required <br>";
	}else{
		$puid = vld_input($_GET['puid']);
		// check if name only contains letters and whitespace
		if( !preg_match("/^[0-9]*$/",$sid) ){
			$msg .= "Only digits allowed in SID<br>";
		}
	}
	if($msg==""){
		$sql = "SELECT * FROM `posts` WHERE `puid`='$puid'";
		$result=mysqli_query($conn, $sql);
		$num=mysqli_num_rows($result);
		if($num==1){
			$arr=mysqli_fetch_assoc($result);
		}else{
			header('Location: all.php');
		}
	}
}



if( isset($_POST['uplp']) ){
	//print_r($_POST);
	if( empty($_POST['postcontent']) ){
		$msg .= "Post is required<br>";
	}else{
		$postcontent=vld_input($_POST['postcontent']);
	}
	if( empty($_POST['puid']) ){
		$msg .= "sid is required <br>";
	}else{
		$puid=vld_input($_POST['puid']);
	}
	if($msg==""){
		$dor=date('Y-m-d');
		$sql = "UPDATE `posts` SET `postcontent`='$postcontent'";
		if( mysqli_query($conn, $sql) ){
			$msg="Record updated successfully";
			header('Location: index.php');
		}else{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
}
?>

<?php include('header.php'); ?>


    <!-- ================ Banner Section start Here =============== -->
    <section class="banner-section">
        <div class="container">
			<div class="row">
				<div class="col-md-12" id="msg"><?php echo $msg; ?></div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<aside class="mt-5 mt-xl-0">
						<div class="widget search-widget">
							<div class="widget-inner">
								<div class="widget-title">
									<div class="profile-pic">
										<img src="<?php echo $rowpp['propic']; ?>" class="img-thumbnail img-fluid" width="100%">
									</div>
									<h5><?php echo $rowpp['name']; ?> <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#mypropic">Change proPic</button></h5>
								</div>
							</div>
						</div>
						<div class="widget active-group">
							<div class="widget-inner">
								<div class="widget-title">
									<h6><i class="fa-solid fa-male"></i> <?php echo $rowpp['gender']; ?></h6>
									<h6><i class="fa-solid fa-location"></i> <?php echo $rowpp['city']; ?></h6>
									<h6><i class="fa-solid fa-phone"></i> <?php echo $rowpp['mobile']; ?></h6>
									<h5> <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#mypropic">Change proPic</button></h5>
									<h6>join the group</h6>
								</div>
							</div>
						</div>
					</aside>
				</div>
				<div class="col-md-8">
					<div class="create-post mb-20">
						
					</div>
					<hr />
					<div id="allposts">
					<?php 
					$sqlp = "SELECT * FROM `posts` WHERE userid='$profileid' ORDER BY dt DESC";
					$resultp=mysqli_query($conn, $sqlp);
					while( $rowp=mysqli_fetch_assoc($resultp) ){ 
					$profilerow=getuserinfo($conn,$rowp['userid']);
					?>
					<div class="post-item mb-20">
						<!-- post-content -->
						<div class="post-content">
							<!-- post-author -->
							<div class="post-author">
								<div class="post-author-inner">
									<div class="author-thumb">
										<img src="<?php echo $profilerow['propic'] ?>" alt="img" style="width:40px;height:40px;object-fit:cover;border-radius:50%">
									</div>
									<div class="author-details">
										<h6><a href="#"><?php echo $profilerow['name'] ?></a></h6>
										<ul class="post-status">
											<li class="post-privacy"><i class="icofont-world"></i>
												Public</li>
											<li class="post-time">6 Mintues Ago
											</li>
										</ul>
									</div>
								</div>
							</div>
							<!-- post-description -->
							<div class="post-description">
								<p><?php echo $rowp['postcontent'] ?></p>
							</div>
						</div>
						<!-- post meta -->
						<div class="post-meta">
							<div class="post-meta-bottom">
								<ul class="react-list">
									<li class="react">
										<a href="#">
											<i class="fa fa-thumbs-up"></i>Like
										</a>
									</li>
									<li class="react">
										<a href="#">
											<i class="icofont-speech-comments"></i>Comment
										</a>
									</li>
									<?php if( $rowp['userid']==$sessuserid ){ ?>
									<li class="react">
										<a href="delete.php?delpostid=<?php echo $rowp['postid'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">
											<i class="fa fa-trash"></i> DELETE
										</a>
									</li>
									
									<li class="react">
										<button class="btn btn-primary btn-sm px-3 edit-btn" 
										data-toggle="modal" 
										data-target="#myModal" 
										data-post-id="<?php echo $rowp['postid']; ?>" 
										data-post-content="<?php echo htmlspecialchars($rowp['postcontent']); ?>">
											<i class="fa fa-pen"></i>EDIT
										</button>
									</li>
									<?php } ?>
									
								</ul>
							</div>
						</div>
					</div>
					<?php } ?>
					</div>
				</div>
			</div>
		</div>
    </section>    
        
<?php include('footer.php'); ?>