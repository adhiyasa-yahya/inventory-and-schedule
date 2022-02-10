<?php 
	include '../action/db_conn.php';

	if (isset($_POST['input'])) {
		$level 	= $_POST['level'];
		$arr = serialize($_POST['permission']); 

		$sql = "INSERT INTO level (name,permission) VALUES ('$level','$arr')";
	    
	    if (mysqli_query($conn,$sql)) { 
	    	header("location:../user-level?action=insert");
	    } else {
	    	header("location:../user-level?action=failed"); 
	    }
	}

	if (isset($_POST['edit'])) {
		$id 	= $_POST['id'];
		$level 	= $_POST['level'];
		$arr 	= $_POST['permission'];
		// $data 	= implode(',', $arr);
		$data = serialize($_POST['permission']); 
		
		date_default_timezone_set('Asia/Jakarta');
		$today = date("Y-m-d H:i:s");
		$sql = "UPDATE 
					level 
				SET 
					name 		= '$level',
					permission 	= '$data',
					updated_at 	= '$today'
				WHERE
					id = '$id'";
	    
	    if (mysqli_query($conn,$sql)) { 
	    	header("location:../user-level?action=edit");
	    } else {
	    	header("location:../user-level?action=failed"); 
	    }

	}

	if (isset($_GET['idK'])) {
		$id = $_GET['idK'];
		$sql = "DELETE FROM level WHERE id=$id";
		mysqli_query($conn,$sql);
		header('Location: ../user-level?action=del');
	}

?>