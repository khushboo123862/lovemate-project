<?php 
$msg="";
session_start();

if( isset($_COOKIE['cookuserid']) ){
	$_SESSION['sessuserid']=$_COOKIE['cookuserid'];
}
if( !(isset($_SESSION['sessuserid'])) ){
	header('Location: index.php');
}
$sessuserid=$_SESSION['sessuserid'];
function vld_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
function getuserinfo($conn,$uid){
	$sql = "SELECT name,userid,propic FROM `users` WHERE `userid`='$uid'";
	$result=mysqli_query($conn, $sql);
	$row=mysqli_fetch_assoc($result);
	return $row;
}
/*
if( isset($_POST['postcontent']) ){
	//print_r($_POST);die;
	if( empty($_POST['postcontent']) ){
		$msg .= "postcontent is required <br>";
	}else{
		$postcontent=vld_input($_POST['postcontent']);
	}
	
	if($msg==""){
		date_default_timezone_set('Asia/Kolkata');
		$dt=date('Y-m-d H:i:s');
		$conn=mysqli_connect('localhost','root','','lovemate');
		$sql = "INSERT INTO `posts` (`postcontent`, `userid`, `dt`) VALUES ('$postcontent', '$sessuserid', '$dt');";
		if (mysqli_query($conn, $sql)) { 
			$profilerow=getuserinfo($conn,$sessuserid);
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
						<p><?php echo $postcontent; ?></p>
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
							<li class="react">
								<a href="delete.php?delpostid=<?php echo $rowp['postid'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">
									<i class="fa fa-trash"></i> DELETE
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		<?php }else{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
}
*/
if( isset($_POST['postcontent']) ){
	//print_r($_POST);die;
	if( empty($_POST['postcontent']) ){
		$msg .= "postcontent is required <br>";
	}else{
		$postcontent=vld_input($_POST['postcontent']);
	}
	
	if($msg==""){
		date_default_timezone_set('Asia/Kolkata');
		$dt=date('Y-m-d H:i:s');
		$conn=mysqli_connect('localhost','root','','lovemate');
		$sql = "INSERT INTO `posts` (`postcontent`, `userid`, `dt`) VALUES ('$postcontent', '$sessuserid', '$dt');";
		if(mysqli_query($conn, $sql)){ 
			$last_id = mysqli_insert_id($conn);
			$profilerow=getuserinfo($conn,$sessuserid);
			$data=array();
			$data['pid']=$last_id;
			$data['postcontent']=$postcontent;
			$data['dt']=$dt;
			$data['userid']=$profilerow['userid'];
			$data['name']=$profilerow['name'];
			$data['propic']=$profilerow['propic'];
			$data['msg']="Successfully Posted";
			echo json_encode($data);
			
		}else{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
}

if( isset($_POST['searchhints']) ){
	//print_r($_POST);die;
	if( empty($_POST['searchhints']) ){
		$msg .= "searchhints is required <br>";
	}else{
		$searchhints=vld_input($_POST['searchhints']);
	}
	
	if($msg==""){
		$conn=mysqli_connect('localhost','root','','lovemate');
		$sql="SELECT name,userid,propic FROM `users` WHERE name LIKE '%$searchhints%' ";
		$result=mysqli_query($conn, $sql);
		$num=mysqli_num_rows($result);
		if($num>0){
			while( $row=mysqli_fetch_assoc($result) ){ ?>
				<li>
					<a href="profile.php?profileid=<?php echo $row['userid']; ?>">
					<img src="<?php echo $row['propic']; ?>" width="30" height="30" />
					<?php echo $row['name']; ?>
					</a>
				</li>
			<?php }
		}else{
			echo '<li>No Result Found</li>';
		}
	}
}
?>