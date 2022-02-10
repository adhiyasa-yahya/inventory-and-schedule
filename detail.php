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
	<?php include 'includes/head.php'; require_once 'action/db_conn.php';?>
	<style type="text/css">
		a{text-decoration: none !important;}
	</style>
</head>

<body class="bg-light">
		<?php require_once 'includes/header.php'?>
			<div class="m-4">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="inventory">Inventory</a></li>
						<li class="breadcrumb-item active" aria-current="page">Detail Data</li>
					</ol>
				</nav>

				<div class="card">
					<div class="card-body">
						<div class="container">
							<?php 
							$id = $_GET['id'];
                            $result = mysqli_query($conn,"SELECT * FROM data_inventory WHERE data_inventoris='$id'");
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
							<form action="action/addInventory" method="post">
								<div class="dynamic-wrap">
								<div class="entry form-row mt-5 border-bottom">
									<div class="col-md-6 mb-3">
										<label for="validationDefault01">Nama Barang</label>
										<input type="text" class="form-control" id="validationDefault01" name="name" value="<?php echo $name ?>">
										<input type="hidden" name="id" value="<?php echo $id ?>">
									</div>
									<div class="col-md-6 mb-3">
										<label for="validationDefault02">Merek</label>
										<input type="text" class="form-control" id="validationDefault02" name="brand" value="<?php echo $brand ?>">
									</div> 
									<div class="col-md-2 mb-3">
										<label for="validationDefault02">Seri</label>
										<input type="text" class="form-control" id="validationDefault02" name="series" value="<?php echo $series ?>">
									</div>
									<div class="col-md-1 mb-3">
										<label for="validationDefault02">Tahun</label>
										<select class="form-control" name="years">
											<option value="" >Choose...</option>
											<?php for ($year = (int)date('Y'); 1995 <= $year; $year--): ?>
												<option value="<?=$year;?>" <?php echo($years == $year? 'selected' : '')  ?>><?=$year;?></option>
											<?php endfor; ?>
	  									</select>
									</div>

									<div class="col-md-1 mb-3">
										<label for="validationDefault02">Jumlah</label>
										<input type="text" class="form-control" id="validationDefault02" name="quantity" value="<?php echo $quantity ?>">
									</div>
									<div class="col-md-1 mb-3">
										<label for="validationDefault02">Satuan</label>
										<input type="text" class="form-control" value="<?php echo $unit ?>" name="unit">
									</div>

									<div class="col-md-3 mb-3">
										<label for="validationDefault03">Lokasi Gudang</label>
										<input type="text" class="form-control" value="<?php echo $warehouse ?>" name="warehouse">
									</div>
									<div class="col-md-2 mb-3">
										<label for="validationDefault04">Lokasi Ruang</label>
										<input type="text" class="form-control" value="<?php echo $room ?>" name="room">
									</div> 
									<div class="col-md-2 mb-3">
										<label for="validationDefault03">Konsidi</label>
										<select class="form-control" name="conditions">
										    <option value="" selected>Choose...</option>
											<option value="1" <?php echo($conditions === '1'? 'selected' : '')  ?>>Baik</option>
											<option value="2" <?php echo($conditions === '2'? 'selected' : '')  ?>>Rusak</option>
											<option value="3" <?php echo($conditions === '3'? 'selected' : '')  ?>>Sisa</option>
	  									</select>
									</div> 
									<div class="col-md-12 mb-3">
										<label>Keterangan</label>
										<textarea class="form-control"  name="descs" rows="3"><?php echo $descs ?></textarea>
									</div>
								</div> 
							</div>
							<div class="text-right mt-3">
								<a href="#delete" data-toggle='modal' id="data" data-href="action/addInventory?idK=<?php echo $id ?>&idS=<?php echo $id ?>"><button type="button" class="btn btn-secondary btn-lg"> Delete</button> </a>

								<?php $id = $_GET['id'];
								$sql = mysqli_query($conn,"SELECT * FROM sub_data_inventory WHERE id_inventory='$id'");
								if (mysqli_num_rows($sql) > 0) { ?>
									<a href="detailSubData?id=<?php echo $id ?>"><button type="button" class="btn btn-success btn-lg"> Edit Sub Data</button> </a>
								<?php } ?>

								<a href="addSubData?id=<?php echo $id ?>"><button type="button" class="btn btn-warning btn-lg"> Add Sub Data</button> </a>
								
								<button class="btn btn-danger btn-lg" name="edit" type="submit">Update</button>
							</div> 
							</form>
						<?php } ?>
						</div>
					</div>
				</div>

				<div id="delete" class="modal fade">
					<div class="modal-dialog modal-confirm">
						<div class="modal-content">
							<div class="modal-header border-0"> 			
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							</div>
							<div class="modal-body text-center mb-5">
								<i  class="fa fa-times-circle" style="font-size: 120px;color: red"></i>
								<h2 class="modal-title mt-3">Are you sure?</h2><br>
								<p class="mb-4">Do you really want to delete these records? <br> This process cannot be undone.</p>	<br> 
								<button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Cancel</button> 
								<a class="hapus btn-ok"> 
									<button type="button" class="btn btn-danger btn-lg">Delete</button>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div> 

	<?php include 'includes/footer.php'; ?>

	<script type="text/javascript">
		$(function() {
			$(document).on('click', '.btn-add', function(e) {
				e.preventDefault();

				var dynaForm = $('.dynamic-wrap'),
				currentEntry = $(this).parents('.entry:first'),
				newEntry = $(currentEntry.clone()).appendTo(dynaForm);

				newEntry.find('input').val('');
				dynaForm.find('.entry:not(:last) .btn-add')
				.removeClass('btn-add').addClass('btn-remove')
				.removeClass('btn-success').addClass('btn-danger')
				.html('<i class="fa fa-minus"></i>');
			}).on('click', '.btn-remove', function(e) {
				$(this).parents('.entry:first').remove();

				e.preventDefault();
				return false;
			});
		});

		$(document).ready(function() {
			$('#delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
			});
		});
	</script>
</body>
</html>