<?php
session_start();
$msg="";
date_default_timezone_set('Asia/Kolkata');		

$hostname="localhost";
$dbusername="root";
$dbpassword="";
$dbname="lovemate";

// Create connection
$conn = mysqli_connect($hostname, $dbusername, $dbpassword, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>