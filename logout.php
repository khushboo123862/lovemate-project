<?php 
session_start();
setcookie("cookuserid","",time()-60);
session_destroy();
header('Location: index.php');
?>