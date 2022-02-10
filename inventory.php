<?php 
session_start();
if ( isset( $_SESSION['user_id'] ) ) {
	$permission = $_SESSION['permission'];
	$id         = $_SESSION['user_id'];
	$username   = $_SESSION['username'];
	$password	= $_SESSION['password'];
	$level      = $_SESSION['level']; 
} else {
    header("Location: index");
}

?>
<!doctype html>
<html lang="en">
<head>
	<title>Lab PTC - Inventory</title>
	<?php include 'includes/head.php';require_once 'action/db_conn.php'; ?>
	<style type="text/css">
	a{text-decoration: none !important;}
	.table td, .table th {vertical-align: inherit!important;}
</style>
</head>

<body class="bg-light"> 
		<?php require_once 'includes/header.php';
		$sql = mysqli_query($conn, "SELECT level.permission FROM users INNER JOIN level ON users.level = level.id  WHERE users.id = '$id'");
		list($permission) = mysqli_fetch_array($sql);
		$dirs = unserialize($permission);?> 
			<div class="m-4">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Inventory</li>
					</ol>
				</nav>
				<div class="row">
					<div class="col-lg-4">
						<?php if ($dirs): ?>
							<?php if (in_array("createInventory", $dirs)): ?>
								<a class="btn btn-danger btn-lg" href="addInventory" role="button">tambah data</a>
								<a class="btn btn-secondary btn-lg" data-toggle='modal' href="#importdata" role="button">import data</a>
							<?php endif ?>
						<?php endif ?>
					</div>
					<div class="col-lg-6">
						<?php if (isset($_GET['action'])) { 
							if ($_GET['action'] == 'del') { ?>
								<div class="alert alert-danger" role="alert">
									Data Berhasil dihapus!
								</div>
						<?php }} ?>

						<?php if (isset($_GET['action'])) { 
							if ($_GET['action'] == 'insert') { ?>
								<div class="alert alert-success" role="alert">
									Data Berhasil ditambahkan!
								</div>
						<?php }} ?>
						
						<?php if (isset($_GET['action'])) { 
							if ($_GET['action'] == 'edit') { ?>
								<div class="alert alert-info" role="alert">
									Data Berhasil diupdate!
								</div>
						<?php }} ?>
					</div>
				</div>
			</div>
			<div class="card m-4"> 
				<div class="card-body">
					<div class="table-responsive">
						<table id="zero_config" class="table table-hover table-bordered">
							<thead class="text-center">
								<tr>
									<td rowspan="2" style="width: 20px">No</td>                            
									<td rowspan="2">NAMA BARANG</td>
									<td rowspan="2">MEREK</td>
									<td rowspan="2">SERI</td>
									<td rowspan="2">TAHUN</td>
									<td rowspan="2">JUMLAH</td>
									<td rowspan="2">SAT</td>
									<td colspan="2">LOKASI</td>
									<td colspan="3">KONDISI</td>
									<td rowspan="2">KET</td>
								</tr>
								<tr>
									<td>GUDANG</td>
									<td>RUANG</td>
									<td>BAIK</td>
									<td>RUSAK</td>
									<td>SISA</td>
								</tr>  
							</thead>
							<tbody> 
								<?php 
                                $result = mysqli_query($conn,"SELECT * FROM data_inventory");
                                $no = 1;
                                while ($data = mysqli_fetch_array($result)) { 
                                	$id = $data['data_inventoris'];
                                	$name = $data['name'];
                                	$brand = $data['brand'];
                                	$series = $data['series'];
                                	$years = $data['years'];
                                	$quantity = $data['quantity'];
                                	$unit = $data['unit'];
                                	$room = $data['room'];
                                	$warehouse = $data['warehouse'];
                                	$conditions = $data['conditions'];
                                	$descs = $data['descs'];
                                ?>
								<tr>  
									<td class="no"><?php echo $no ?></td>
									<td>
										<?php if ($dirs): ?>
											<?php if (in_array("updateInventory", $dirs)): ?>
												<a href="detail?id=<?php echo $id ?>"><b><?php echo $name;?></b></a>
											<?php else: ?>
												<b><?php echo $name;?></b>
											<?php endif ?>
										<?php endif ?>
									</td>
									<td><?php echo $brand;?></td> 
									<td><?php echo $series;?></td> 
									<td><?php echo $years;?></td> 
									<td><?php echo $quantity;?></td> 
									<td><?php echo $unit;?></td> 
									<td><?php echo $warehouse;?></td> 
									<td><?php echo $room;?></td> 
									<td><?php echo($conditions == 1? '<i class="fa fa-check"></i>' : '');  ?></td> 
									<td><?php echo($conditions == 2? '<i class="fa fa-check"></i>' : '');  ?></td> 
									<td><?php echo($conditions == 3? '<i class="fa fa-check"></i>' : '');  ?></td> 
									<td><?php echo $descs;?></td> 
								</tr>  
								<tr></tr>
								<?php 
									$results = mysqli_query($conn,"SELECT * FROM sub_data_inventory WHERE id_inventory='$id'");
									while ($datas = mysqli_fetch_array($results)) { 
										$ids = $datas['id'];
										$names = $datas['name'];
										$brands = $datas['brand'];
										$seriess = $datas['series'];
										$yearss = $datas['years'];
										$quantitys = $datas['quantity'];
										$units = $datas['unit'];
										$rooms = $datas['room'];
										$warehouses = $datas['warehouse'];
										$conditionss = $datas['conditions'];
										$descss = $datas['descs'];
										?>
									<tr>
									<td></td>
									<td><?php echo $names;?></td>
									<td><?php echo $brands;?></td> 
									<td><?php echo $seriess;?></td> 
									<td><?php echo $yearss;?></td> 
									<td><?php echo $quantitys;?></td> 
									<td><?php echo $units;?></td> 
									<td><?php echo $warehouses;?></td> 
									<td><?php echo $rooms;?></td> 
									<td><?php echo($conditionss == 1? '<i class="fa fa-check"></i>' : '');  ?></td> 
									<td><?php echo($conditionss == 2? '<i class="fa fa-check"></i>' : '');  ?></td> 
									<td><?php echo($conditionss == 3? '<i class="fa fa-check"></i>' : '');  ?></td> 
									<td><?php echo $descss;?></td> 
								</tr> 
								<?php  }$no++;} ?>
							</tbody>
						</table>
					</div>
					<div class="modal fade" id="importdata" role="dialog">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">import data</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>
								<div class="modal-body">
									<form action="action/importData" method="post" enctype="multipart/form-data">
										<div class="input-group">
											<input type="file" class="form-control" name="myfile" id="myfile">
											<div class="input-group-append">
												<button type="submit" name="import" class="btn btn-danger btn-lg">import</button>
											</div>
										</div>
									</form>
								</div> 
							</div>
						</div>
					</div>
				</div>
			</div> 

	<?php include 'includes/footer.php'; ?> 
</body>
</html>