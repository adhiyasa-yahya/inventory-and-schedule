<?php 
	include '../action/db_conn.php';

	if (isset($_POST['input'])) {
		$date 	= $_POST['dates'];
		$days 	= date("l", strtotime($date));
		$desc 	= $_POST['desc'];

		$sql = "INSERT INTO schedule (day,dates,description) VALUES ('$days','$date','$desc')";
	    
	    if (mysqli_query($conn,$sql)) { 
	    	header("location:../jadwal?action=insert");
	    } else {
	    	header("location:../jadwal?action=failed"); 
	    }
	}

	if (isset($_POST['edit'])) {

		$dates 	= $_POST['dates'];
		$id 	= $_POST['id'];
		$days 	= date("l", strtotime($date));
		$desc 	= $_POST['desc'];
		date_default_timezone_set('Asia/Jakarta');
		$today = date("Y-m-d H:i:s");

		$sql = "UPDATE 
					schedule 
				SET 
					day 		= '$days',
					dates 		= '$dates',
					description = '$desc',
					updated_at 	= '$today'
				WHERE
					id = '$id'";
	    
	    if (mysqli_query($conn,$sql)) { 
	    	header("location:../jadwal?action=edit");
	    } else {
	    	header("location:../jadwal?action=failed"); 
	    }

	}

	if (isset($_GET['idK'])) {
		$id = $_GET['idK'];
		$sql = "DELETE FROM schedule WHERE id=$id";
		mysqli_query($conn,$sql);
		header('Location: ../jadwal?action=del');
	}

?>