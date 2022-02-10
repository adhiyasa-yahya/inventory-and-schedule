<?php
	include 'db_conn.php';

	if (isset($_POST['input'])) {
		$name     	= $_POST['username'];
		$roles     	= $_POST['level'];
		$email     	= $_POST['email'];
		$password	= $_POST['password']; 
		$desc  		= hash('sha256', $password);

		$query 		= "INSERT INTO users (email, username,password,level) VALUES ('$email','$name','$desc','$roles')";
		mysqli_query($conn, $query); 
		header("location:../user?action=insert" );
	}

	if (isset($_POST['edit'])) {
		$id     	= $_POST['id'];
		$name     	= $_POST['username'];
		$roles     	= $_POST['level'];
		$email     	= $_POST['email'];
		date_default_timezone_set('Asia/Jakarta');
		$today = date("Y-m-d H:i:s");

		$sql = "UPDATE 
					users 
				SET 
					email 		= '$email',
					username 	= '$name',
					level 		= '$roles',
					updated_at 	= '$today'
				WHERE
					id = '$id'";
	    
	    if (mysqli_query($conn,$sql)) { 
	    	header("location:../user?action=edit");
	    } else {
	    	// header("location:../user?action=failed"); 
	    }
	}

	if (isset($_GET['idK'])) {
		$id = $_GET['idK'];
		$sql = "DELETE FROM users WHERE id=$id";
		mysqli_query($conn,$sql);
		header('Location: ../user?action=del');
	}

?>

