<?php 
//название сайта
$site_name="file manager";

$logged_user_id=null;
$logged_user_name=null;
$logged_user_photo=null;

if (isset($_COOKIE["logged_user_id"])) {
	$logged_user_id=$_COOKIE["logged_user_id"];
	$logged_user_name=$_COOKIE["logged_user_name"];
	$logged_user_photo=$_COOKIE["logged_user_photo"];
}
?>