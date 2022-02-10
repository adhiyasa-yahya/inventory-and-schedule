<?php 
session_start();
if ( isset( $_SESSION['user_id'] ) ) {
	$permission = $_SESSION['permission'];
	$id         = $_SESSION['user_id'];
	$username   = $_SESSION['username'];
	$password	= $_SESSION['password'];
	$level      = $_SESSION['level']; 
    header("Location: dashboard");

} else {
  header( "refresh:0;url=login" );

}

?>
 