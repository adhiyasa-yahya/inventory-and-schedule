<?php
	include '../action/db_conn.php';

	if (isset($_POST['add'])) {
		$no			= rand();
		$name    	= $_POST['name'];
		$brand  	= $_POST['brand']; 
		$series  	= $_POST['series']; 
		$years  	= $_POST['years']; 
		$quantity  	= $_POST['quantity']; 
		$warehouse  = $_POST['warehouse']; 
		$room  		= $_POST['room']; 
		$unit  		= $_POST['unit']; 
		$conditions = $_POST['conditions'];  
		$descs  	= $_POST['descs'];  

		$query = "INSERT INTO data_inventory (data_inventoris,name, brand , series , years, quantity , unit , warehouse , room , conditions , descs) VALUES";

		$index = 0; 
		if(is_array($name)){
		foreach($name as $names){ 
			$query .= "('".$no."','".$names."','".$brand[$index]."','".$series[$index]."','".$years[$index]."','".$quantity[$index]."','".$unit[$index]."','".$warehouse[$index]."','".$room[$index]."','".$conditions[$index]."','".$descs[$index]."'),";
			$index++;
		}}

		$query = substr($query, 0, strlen($query) - 1).";";
		mysqli_query($conn, $query);
		echo $query;
		header("location:../inventory?action=insert" );
	}

	if (isset($_POST['subdata'])) {
		$id    	= $_POST['id'];
		$name    	= $_POST['name'];
		$brand  	= $_POST['brand']; 
		$series  	= $_POST['series']; 
		$years  	= $_POST['years']; 
		$quantity  	= $_POST['quantity']; 
		$warehouse  = $_POST['warehouse']; 
		$room  		= $_POST['room']; 
		$unit  		= $_POST['unit']; 
		$conditions = $_POST['conditions'];  
		$descs  	= $_POST['descs'];  

		$query = "INSERT INTO sub_data_inventory (id_inventory, name, brand , series , years, quantity , unit , warehouse , room , conditions , descs) VALUES";

		$index = 0; 
		if(is_array($id)){
		foreach($id as $ids){ 
			$query .= "('".$ids."','".$name[$index]."','".$brand[$index]."','".$series[$index]."','".$years[$index]."','".$quantity[$index]."','".$unit[$index]."','".$warehouse[$index]."','".$room[$index]."','".$conditions[$index]."','".$descs[$index]."'),";
			$index++;
		}}

		$query = substr($query, 0, strlen($query) - 1).";";
		mysqli_query($conn, $query);
		echo $query;
		header('Location: ../detailSubData?id='.$id[0].'&action=insert');

		// header("location:../inventory?action=insert" );
	}

	if (isset($_POST['edit'])) {

		$id    	 	= $_POST['id'];
		$name    	= $_POST['name'];
		$brand  	= $_POST['brand']; 
		$series  	= $_POST['series']; 
		$years  	= $_POST['years']; 
		$quantity  	= $_POST['quantity']; 
		$warehouse  = $_POST['warehouse']; 
		$room  		= $_POST['room']; 
		$unit  		= $_POST['unit']; 
		$conditions = $_POST['conditions'];  
		$descs  	= $_POST['descs'];
		date_default_timezone_set('Asia/Jakarta');
		$today = date("Y-m-d H:i:s");

		$sql = "UPDATE 
					data_inventory 
				SET 
					name 		= '$name',
					brand 		= '$brand',
					series 		= '$series',
					years 		= '$years',
					quantity 	= '$quantity',
					warehouse 	= '$warehouse',
					room 		= '$room',
					unit 		= '$unit',
					conditions 	= '$conditions',
					descs 		= '$descs',
					updated_at 	= '$today'
				WHERE
					data_inventoris = '$id'";
	    
	    if (mysqli_query($conn,$sql)) { 
	    	header("location:../inventory?action=edit");
	    } else {
	    	header("location:../inventory?action=failed"); 
	    }

	}

	if (isset($_POST['editDetail'])) {

		$id    	 	= $_POST['id'];
		$name    	= $_POST['name'];
		$brand  	= $_POST['brand']; 
		$series  	= $_POST['series']; 
		$years  	= $_POST['years']; 
		$quantity  	= $_POST['quantity']; 
		$warehouse  = $_POST['warehouse']; 
		$room  		= $_POST['room']; 
		$unit  		= $_POST['unit']; 
		$conditions = $_POST['conditions'];  
		$descs  	= $_POST['descs'];
		date_default_timezone_set('Asia/Jakarta');
		$today = date("Y-m-d H:i:s");

		$count=count($id);

		for($i=0;$i<$count;$i++){
			$sql="UPDATE 
						sub_data_inventory 
				   SET 
					   name			= '" . $name[$i] . "',
					   brand		= '" . $brand[$i] . "',
					   series		= '" . $series[$i] . "',
					   years		= '" . $years[$i] . "',
					   quantity		= '" . $quantity[$i] . "',
					   warehouse	= '" . $warehouse[$i] . "',
					   room			= '" . $room[$i] . "',
					   unit			= '" . $unit[$i] . "',
					   conditions	= '" . $conditions[$i] . "',
					   descs		= '" . $descs[$i] . "',
					   updated_at	= '" . $today . "'
				   	WHERE 
				   		id ='" . $id[$i] . "'";
			mysqli_query($conn,$sql);
		}
	    
	    if (mysqli_query($conn,$sql)) { 
	    	header("location:../inventory?action=edit");
	    } else {
	    	header("location:../inventory?action=failed"); 
	    }

	}

	if (isset($_GET['idK']) && isset($_GET['idS'])) {
			$id = $_GET['idK'];
			$id = $_GET['idS'];
			$sql = "DELETE FROM data_inventory WHERE data_inventoris=$id";
			$sqls = "DELETE FROM sub_data_inventory WHERE id_inventory=$id";
			mysqli_query($conn,$sql);
			mysqli_query($conn,$sqls);
			header('Location: ../inventory?action=del');
	}

	if (isset($_GET['idSs'])) {
		$id = $_GET['idSs'];
		$ids = $_GET['id'];
		$sql = "DELETE FROM sub_data_inventory WHERE id=$id";
		mysqli_query($conn,$sql);
		header('Location: ../detailSubData?id='.$ids.'&action=del');
	}
?>

