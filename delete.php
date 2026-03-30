<?php 
$msg="";
session_start();
//print_r($_SESSION);
//print_r($_COOKIE);
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

if( isset($_GET['delpostid']) ){
	//print_r($_POST);
	
	if( empty($_GET['delpostid']) ){
		$msg .= "delpostid is required <br>";
	}else{
		$delpostid=vld_input($_GET['delpostid']);
	}
	
	if($msg==""){
		$conn=mysqli_connect('localhost','root','','lovemate');
		$sql = "DELETE FROM `posts` WHERE `postid`='$delpostid' AND `userid`='$sessuserid' ";
		if( mysqli_query($conn, $sql) ){
			$msg="Deleted successfully";
			header('Location: home.php');
		}else{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
}
?>