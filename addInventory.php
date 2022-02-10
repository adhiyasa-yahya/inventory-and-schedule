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
						<li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
					</ol>
				</nav>

				<div class="card">
					<div class="card-body">
						<div class="container">
							<form action="action/addInventory" method="post">
								<div class="dynamic-wrap">
								<div class="entry form-row mt-5 border-bottom">
									<div class="col-md-6 mb-3">
										<label for="validationDefault01">Nama Barang</label>
										<input type="text" class="form-control" id="validationDefault01" name="name[]" required>
									</div>
									<div class="col-md-5 mb-3">
										<label for="validationDefault02">Merek</label>
										<input type="text" class="form-control" id="validationDefault02" name="brand[]">
									</div>
									<div class="col-sm-1 text-right">
										<span class="input-group-btn ">
											<button class="btn btn-success btn-add" type="button">
												<i class="fa fa-plus"></i>
											</button>
										</span>
									</div> 
									<div class="col-md-2 mb-3">
										<label for="validationDefault02">Seri</label>
										<input type="text" class="form-control" id="validationDefault02" name="series[]">
									</div>
									<div class="col-md-1 mb-3">
										<label for="validationDefault02">Tahun</label>
										<select class="form-control" name="years[]">
											<option value="" selected>Choose...</option>
											<?php for ($year = (int)date('Y'); 1995 <= $year; $year--): ?>
												<option value="<?=$year;?>"><?=$year;?></option>
											<?php endfor; ?>
	  									</select>
									</div>

									<div class="col-md-1 mb-3">
										<label for="validationDefault02">Jumlah</label>
										<input type="text" class="form-control" id="validationDefault02" name="quantity[]">
									</div>
									<div class="col-md-1 mb-3">
										<label for="validationDefault02">Satuan</label>
										<input type="text" class="form-control" id="validationDefault02" name="unit[]">
									</div>

									<div class="col-md-3 mb-3">
										<label for="validationDefault03">Lokasi Gudang</label>
										<input type="text" class="form-control" id="validationDefault03" name="warehouse[]">
									</div>
									<div class="col-md-2 mb-3">
										<label for="validationDefault04">Lokasi Ruang</label>
										<input type="text" class="form-control" id="validationDefault04" name="room[]">
									</div> 
									<div class="col-md-2 mb-3">
										<label for="validationDefault03">Konsidi</label>
										<select class="form-control" name="conditions[]">
										    <option value="" selected>Choose...</option>
											<option value="1">Baik</option>
											<option value="2">Rusak</option>
											<option value="3">Sisa</option>
	  									</select>
									</div> 
									<div class="col-md-12 mb-3">
										<label>Keterangan</label>
										<textarea class="form-control" name="descs[]" rows="3"></textarea>
									</div>
								</div> 
							</div>
							<div class="text-right mt-3">
								<button class="btn btn-danger btn-lg" name="add" type="submit">Tambah</button>
							</div> 
							</form>
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



	</script>
</body>
</html>