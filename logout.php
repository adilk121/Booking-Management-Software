<?php require_once("includes/dbsmain.inc.php"); 
ob_start();
unset($_SESSION['UID_EMS']);
//session_destroy();
header("Location:index.php");
?>