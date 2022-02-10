<?php 
	include '../action/db_conn.php';

	if (isset($_POST['edit'])) {
		$id 	= $_POST['id'];
		$titile 	= $_POST['titile'];  
		$sub_title 	= $_POST['sub_title'];   
		
		date_default_timezone_set('Asia/Jakarta');
		$today = date("Y-m-d H:i:s");
		
		$sql = "UPDATE 
					setting 
				SET 
					titile 		= '$titile',
					subTitle 	= '$sub_title',
					updated_at 	= '$today'
				WHERE
					id = '$id'";
	    
	    if (mysqli_query($conn,$sql)) { 
	    	header("location:../setting?action=edit");
	    } else {
	    	header("location:../setting?action=failed"); 
	    }

	}

	if (isset($_POST['info'])) {
		$id 	= $_POST['id'];
		$progdi = $_POST['progdi'];
		$head	 = $_POST['head'];
		$NIP	 =$_POST['NIP']; 
		$NIDN	 = $_POST['NIDN']; 
		
		date_default_timezone_set('Asia/Jakarta');
		$today = date("Y-m-d H:i:s");
		
		$sql = "UPDATE 
					infolab 
				SET 
					progdi 		= '$progdi',
					head 		= '$head',
					NIP 		= '$NIP',
					NIDN 		= '$NIDN',
					updated_at 	= '$today'
				WHERE
					id = '$id'";
	    
	    if (mysqli_query($conn,$sql)) { 
	    	header("location:../setting?action=edit");
	    } else {
	    	header("location:../setting?action=failed"); 
	    }

	}

	if (isset($_POST['editlogo1'])) {

	    $fileName = $_FILES['myfile']['name'];
	    $fileSize = $_FILES['myfile']['size'];
	    $fileTmpName  = $_FILES['myfile']['tmp_name'];
	    $fileType = $_FILES['myfile']['type'];
		move_uploaded_file ($fileTmpName, "../assets/img/".$fileName);



		$id 	= $_POST['id'];
		date_default_timezone_set('Asia/Jakarta');
		$today = date("Y-m-d H:i:s"); 
		$sql = "UPDATE 
					setting 
				SET  
					logo1 	= '$fileName',
					updated_at 	= '$today'
				WHERE
					id = '$id'";
	    
	    if (mysqli_query($conn,$sql)) { 
	    	header("location:../setting?action=edit");
	    } else {
	    	header("location:../setting?action=failed"); 
	    }

	}

	if (isset($_POST['editlogo2'])) {
	    $fileName = $_FILES['myfile']['name'];
	    $fileSize = $_FILES['myfile']['size'];
	    $fileTmpName  = $_FILES['myfile']['tmp_name'];
	    $fileType = $_FILES['myfile']['type'];
		move_uploaded_file ($fileTmpName, "../assets/img/".$fileName);



		$id 	= $_POST['id'];
		date_default_timezone_set('Asia/Jakarta');
		$today = date("Y-m-d H:i:s"); 
		$sql = "UPDATE 
					setting 
				SET  
					logo2 	= '$fileName',
					updated_at 	= '$today'
				WHERE
					id = '$id'";
	    
	    if (mysqli_query($conn,$sql)) { 
	    	header("location:../setting?action=edit");
	    } else {
	    	header("location:../setting?action=failed"); 
	    }

	}

	if (isset($_POST['editimg1'])) {
	    $fileName = $_FILES['myfile']['name'];
	    $fileSize = $_FILES['myfile']['size'];
	    $fileTmpName  = $_FILES['myfile']['tmp_name'];
	    $fileType = $_FILES['myfile']['type'];
		move_uploaded_file ($fileTmpName, "../assets/img/".$fileName);



		$id 	= $_POST['id'];
		date_default_timezone_set('Asia/Jakarta');
		$today = date("Y-m-d H:i:s"); 
		$sql = "UPDATE 
					setting 
				SET  
					img1 	= '$fileName',
					updated_at 	= '$today'
				WHERE
					id = '$id'";
	    
	    if (mysqli_query($conn,$sql)) { 
	    	header("location:../setting?action=edit");
	    } else {
	    	header("location:../setting?action=failed"); 
	    }

	}

	if (isset($_POST['editimg2'])) {
	    $fileName = $_FILES['myfile']['name'];
	    $fileSize = $_FILES['myfile']['size'];
	    $fileTmpName  = $_FILES['myfile']['tmp_name'];
	    $fileType = $_FILES['myfile']['type'];
		move_uploaded_file ($fileTmpName, "../assets/img/".$fileName);



		$id 	= $_POST['id'];
		date_default_timezone_set('Asia/Jakarta');
		$today = date("Y-m-d H:i:s"); 
		$sql = "UPDATE 
					setting 
				SET  
					img2 	= '$fileName',
					updated_at 	= '$today'
				WHERE
					id = '$id'";
	    
	    if (mysqli_query($conn,$sql)) { 
	    	header("location:../setting?action=edit");
	    } else {
	    	header("location:../setting?action=failed"); 
	    }
	}

	if (isset($_POST['editimg3'])) {
	    $fileName = $_FILES['myfile']['name'];
	    $fileSize = $_FILES['myfile']['size'];
	    $fileTmpName  = $_FILES['myfile']['tmp_name'];
	    $fileType = $_FILES['myfile']['type'];
		move_uploaded_file ($fileTmpName, "../assets/img/".$fileName);



		$id 	= $_POST['id'];
		date_default_timezone_set('Asia/Jakarta');
		$today = date("Y-m-d H:i:s"); 
		$sql = "UPDATE 
					setting 
				SET  
					img3 	= '$fileName',
					updated_at 	= '$today'
				WHERE
					id = '$id'";
	    
	    if (mysqli_query($conn,$sql)) { 
	    	header("location:../setting?action=edit");
	    } else {
	    	header("location:../setting?action=failed"); 
	    }

	}

	if (isset($_POST['editimg4'])) {
	    $fileName = $_FILES['myfile']['name'];
	    $fileSize = $_FILES['myfile']['size'];
	    $fileTmpName  = $_FILES['myfile']['tmp_name'];
	    $fileType = $_FILES['myfile']['type'];
		move_uploaded_file ($fileTmpName, "../assets/img/".$fileName);



		$id 	= $_POST['id'];
		date_default_timezone_set('Asia/Jakarta');
		$today = date("Y-m-d H:i:s"); 
		$sql = "UPDATE 
					setting 
				SET  
					img4 	= '$fileName',
					updated_at 	= '$today'
				WHERE
					id = '$id'";
	    
	    if (mysqli_query($conn,$sql)) { 
	    	header("location:../setting?action=edit");
	    } else {
	    	header("location:../setting?action=failed"); 
	    }

	}

	if (isset($_POST['idK'])) {
		$id = $_POST['idK'];
		$sql = "DELETE FROM level WHERE id=$id";
		mysqli_query($conn,$sql);
		header('Location: ../user-level?action=del');
	}

?>