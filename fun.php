<?php
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
?>