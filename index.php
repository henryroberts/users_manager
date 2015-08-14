<?php
ob_start();
session_start();
include_once 'lib/__autoload.php';
$users = new users();
if($_SESSION['usersacc']) {

}

header("location: login.php");
?>