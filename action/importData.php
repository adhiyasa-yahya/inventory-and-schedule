<style type="text/css">body{color: white}</style>

<?php ob_start();
	include '../action/db_conn.php';
	include '../action/excel_reader2.php';

if(isset($_POST["import"])){
 $file_name = $_FILES["myfile"]["name"]; // For getting Extension of selected file
 $tmp = explode('.', $file_name);
 $file_extension = end($tmp);
 $allowed_extension = array("xls", "xlsx", "csv"); //allowed extension
 if(in_array($file_extension, $allowed_extension)) //check selected file extension is present in allowed extension array
 {
  $file = $_FILES["myfile"]["tmp_name"]; // getting temporary source of excel file
  include("Classes/PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
  $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file
$worksheet = $objPHPExcel->getActiveSheet();
$rows = [];
foreach ($worksheet->getRowIterator() AS $row) {
    $cellIterator = $row->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(FALSE); // This loops through all cells,
    $cells = [];
    foreach ($cellIterator as $cell) {
        $cells[] = $cell->getValue();
    }
    $rows[] = $cells;
}
    // var_dump($rows);
	
	$no = 0;

  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet){

   $highestRow = $worksheet->getHighestDataRow('B');
   // echo $highestRow;

   for($row=3; $row<=$highestRow; $row++){
    $nos = rand();
    $data1 = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
    $data2 = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
    $data3 = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
    $data4 = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
    $data5 = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
    $data6 = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
    $data7 = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
    $data8 = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(7, $row)->getValue());
    $data9 = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(8, $row)->getValue());
    $data10 = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(9, $row)->getValue());
    $data11 = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(10, $row)->getValue());
    $data12 = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(11, $row)->getValue());
    $data13 = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(12, $row)->getValue());
	
	if ($data10 != '') {
		$conditions = 1;
	}

	if ($data11 != '') {
		$conditions = 2;
	}
	
	if ($data12 != '') {
		$conditions = 3;
	}

	if ($data1 != '' and $data2 != '') {
    	$query = "INSERT INTO  data_inventory 
    		(data_inventoris,name, brand , series , years, quantity , unit , warehouse , room , conditions , descs) 
    			 VALUES 
    		('".$nos."','".$data2."','".$data3."','".$data4."','".$data5."','".$data6."','".$data7."','".$data8."','".$data9."','".$conditions."','".$data13."')";
			mysqli_query($conn, $query); 

		// echo  $query , '<br>';

		$no = $nos;
	}elseif ($data1 == '' and $data2 != '') {
    	$data1 = $no;
    	$query2 = "INSERT INTO sub_data_inventory (id_inventory, name, brand , series , years, quantity , unit , warehouse , room , conditions , descs) VALUES ('".$data1."','".$data2."','".$data3."','".$data4."','".$data5."','".$data6."','".$data7."','".$data8."','".$data9."','".$conditions."','".$data13."')";
			mysqli_query($conn, $query2); 

		// echo  $query2 , '<br>';
	}
	else{
		echo "";
	}

   }
  } 
	header( "refresh:0;url=../inventory?action=insert" );
 }
 else
 {
  $output = '<label class="text-danger">Invalid File</label>'; //if non excel file then
 }
}

 ?>