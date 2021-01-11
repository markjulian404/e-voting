<?php 
define("BASEPATH", dirname(__FILE__));
include('../config.php');
session_start();
session_unset();
session_destroy();
$_SESSION = [];
header('location:../admin');
?>