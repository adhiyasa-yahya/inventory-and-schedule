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
	<title>Lab PTC - Jadwal</title>
	<?php include 'includes/head.php'; require_once 'action/db_conn.php';?>
	<style type="text/css">
	a{text-decoration: none !important;}
</style>
</head>

<body class="bg-light">
		<?php require_once 'includes/header.php';
		$sql = mysqli_query($conn, "SELECT level.permission FROM users INNER JOIN level ON users.level = level.id  WHERE users.id = '$id'");
		list($permission) = mysqli_fetch_array($sql);
		$dirs = unserialize($permission);?>
			<div class="m-4">
				<nav aria-label="breadcrumb mb-3">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Jadwal</li>
					</ol>
				</nav>
				<div class="row">
					<div class="col-lg-2">
						<?php if ($dirs): ?>
							<?php if (in_array("createSchedule", $dirs)): ?>
								<a class="btn btn-danger btn-lg"  data-toggle='modal' href="#add" role="button">tambah jadwal</a>
							<?php endif ?>
						<?php endif ?>
					</div>
					<div class="col-lg-9">
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
						<table id="zero_config" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th><b>Hari</b></th>
									<th>Tanggal</th>
									<th>Jadwal</th>
									<?php if ($dirs): ?>
										<?php if (in_array("updateSchedule", $dirs) || in_array("deleteSchedule", $dirs)): ?>
										<th class="text-center"> opsi</th>
									<?php endif ?>
								<?php endif ?>
								</tr>
							</thead>
							<tbody> 
								<?php 
                                $result = mysqli_query($conn,"SELECT * FROM schedule ORDER BY id DESC");

                                while ($data = mysqli_fetch_array($result)) { 
                                	$id = $data['id'];
                                	$day = $data['day'];
                                	$dates = $data['dates'];
                                	$description = $data['description'];

                                ?>
								<tr>
									<td width="89px"><b><?php echo $day ;?></b></td>
									<td width="89px"><?php echo $dates;?></td> 
									<td><?php echo $description;?></td> 
									<?php if ($dirs): ?>
										<?php if (in_array("updateSchedule", $dirs) || in_array("deleteSchedule", $dirs)): ?>
										<td class="text-center" width="183px"> 
											<?php if ($dirs): ?>
												<?php if (in_array("updateSchedule", $dirs)): ?>
													<a href="#myModal" id='custId' data-toggle='modal' data-id="<?php echo $id ?>"> 
														<button type="button" class="btn bg-warning btn-sm"> 
															<i class="fa fa-fw fa-edit"></i>
														</button> 
													</a> 

												<?php endif ?>
											<?php endif ?>
											<?php if ($dirs): ?>
												<?php if (in_array("deleteSchedule", $dirs)): ?>
													<a href="#delete" data-toggle='modal' id="data" data-href="action/addScedule?idK=<?php echo $id ?>"><button type="button" class="btn btn-danger btn-sm"> <i class="fa fa-fw fa-trash"></i></button> </a>
												<?php endif ?>
											<?php endif ?>
										</td>
									<?php endif ?>
								<?php endif ?>
								</tr> 
								<?php } ?>
							</tbody>
						</table>
					</div>

					<div class="modal fade" id="myModal" role="dialog">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Edit Jadwal</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>
								<div class="modal-body">
									<div class="fetched-data"></div>
								</div> 
							</div>
						</div>
					</div>

					<div class="modal fade" id="add" role="dialog">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Tambah Jadwal</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>
								<div class="modal-body">
									<form action="action/addScedule" method="post" >
										<div class="form-group">
											<label>Pilih Hari</label>
											<input type="date" class="form-control" name="dates" id="date-input" required>
										</div>
										<div class="form-group">
											<label>Keterangan Jadwal</label>
											<textarea class="form-control" rows="3" name="desc" required></textarea>
										</div>
										<div class="form-group">
										 	<button type="submit" name="input" class="btn btn-danger btn-block">Tambah</button>
										</div>
									</form>
								</div> 
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
			</div>

	<?php include 'includes/footer.php'; ?> 
	<script type="text/javascript">
		$(document).ready(function(){
			$('#myModal').on('show.bs.modal', function (e) {
				var rowid = $(e.relatedTarget).data('id');
				console.log(rowid);
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
            	type : 'post',
            	url : 'action/fetched-dataScedule',
            	data :  'rowid='+ rowid,
            	success : function(data){
            		console.log(data);

                $('.fetched-data').html(data);//menampilkan data ke dalam modal
            }
        });
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