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
	<title>Lab PTC - User Level</title>
	<?php include 'includes/head.php'; require_once 'action/db_conn.php'; ?>
	<style type="text/css">
	a{text-decoration: none !important;}
	.badge{font-size: 18px}
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
						<li class="breadcrumb-item"><a href="user">User</a></li>
						<li class="breadcrumb-item active" aria-current="page">Level</li>
					</ol>
				</nav>
				<div class="row">
					<div class="col-xl-2 col-lg-6">
						<?php if ($dirs): ?>
	 						<?php if (in_array("createLevel", $dirs)): ?>
							<a class="btn btn-danger btn-lg mt-2"  data-toggle='modal' href="#add" role="button">Tambah Level</a>
							<?php endif ?>
	 					<?php endif ?>
					</div>
					<div class="col-xl-9 col-lg-6 mt-2">
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
								<div class="alert alert-success" role="alert">
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
									<th><b>No</b></th>
									<th>Level</th>
									<?php if ($dirs): ?>
	 									<?php if (in_array("updateLevel", $dirs) || in_array("deleteLevel", $dirs)): ?>
											<th class="text-center"> opsi</th>
										<?php endif ?>
	 							<?php endif ?>
								</tr>
							</thead>
							<tbody> 
								<?php 
                                $result = mysqli_query($conn,"SELECT * FROM level WHERE id NOT IN (SELECT MIN(id) from level)");
                                $no = 1;
                                while ($data = mysqli_fetch_array($result)) { 
                                	$id = $data['id'];
                                	$name = $data['name'];

                                	$permission =$data['permission'];
                                ?>
								<tr>
									<td width="89px"><b><?php echo $no ;?></b></td>
									<td><?php echo $name;?></td>
									<?php if ($dirs): ?>
										<?php if (in_array("updateLevel", $dirs) || in_array("deleteLevel", $dirs)): ?> 
										<td class="text-center"> 
											<?php if ($dirs): ?>
												<?php if (in_array("updateLevel", $dirs)): ?> 
												<a href="#myModal" id='custId' data-toggle='modal' data-id="<?php echo $id ?>"> 
													<button type="button" class="btn btn-warning btn-sm"> 
														<i class="fa fa-fw fa-edit"></i>
													</button> 
												</a> 

											<?php endif ?>
										<?php endif ?>
										<?php if ($dirs): ?>
											<?php if (in_array("deleteLevel", $dirs)): ?> 
											<a href="#delete" data-toggle='modal' id="data" data-href="action/addLevel?idK=<?php echo $id ?>"><button type="button" class="btn btn-danger btn-sm"> <i class="fa fa-fw fa-trash"></i></button> </a>

											<?php endif ?>
										<?php endif ?>
									</td>
										<?php endif ?>
									<?php endif ?>
								</tr> 
								<?php $no++; }  ?>
							</tbody>
						</table>
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

					<div class="modal fade" id="myModal" role="dialog">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Edit User Permission</h4>
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
									<h4 class="modal-title">Tambah User</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>
								<div class="modal-body">
									<form action="action/addLevel" method="post" >
										<div class="form-group"> 
										<div class="form-group">
											<label>Name Level</label>
											<input type="text" class="form-control" name="level" placeholder="type level.." autocomplete="off" required>
										</div>
										<div class="form-group">
											<label>Permission Page User</label>
											<div class="row">
												<div class="col-6">
													<div class="custom-control custom-checkbox">
														<input class="custom-control-input" type="checkbox" name="permission[]"  id="customCheck1" value="createUser">
														<label class="custom-control-label" for="customCheck1">
															Create
														</label>
													</div>
												</div>  
												<div class="col-6">
													<div class="custom-control custom-checkbox">
														<input class="custom-control-input" type="checkbox" name="permission[]"  id="customCheck2" value="updateUser">
														<label class="custom-control-label" for="customCheck2">
															Update
														</label>
													</div>
												</div>  
												<div class="col-6">
													<div class="custom-control custom-checkbox">
														<input class="custom-control-input" type="checkbox" name="permission[]" id="customCheck3" value="viewUser">
														<label class="custom-control-label" for="customCheck3">
															View
														</label>
													</div>
												</div>  
												<div class="col-6">
													<div class="custom-control custom-checkbox">
														<input class="custom-control-input" type="checkbox" name="permission[]" id="customCheck4" value="deleteUser">
														<label class="custom-control-label" for="customCheck4">
															Delete
														</label>
													</div>
												</div> 
											</div>
										</div> 
										<div class="form-group">
											<label>Permission Page Level User</label>
											<div class="row">
												<div class="col-6">
													<div class="custom-control custom-checkbox">
														<input class="custom-control-input" type="checkbox" name="permission[]" id="customCheck5" value="createLevel">
														<label class="custom-control-label" for="customCheck5">
															Create
														</label>
													</div>
												</div>  
												<div class="col-6">
													<div class="custom-control custom-checkbox">
														<input class="custom-control-input" type="checkbox" name="permission[]" id="customCheck6" value="updateLevel">
														<label class="custom-control-label" for="customCheck6">
															Update
														</label>
													</div>
												</div>  
												<div class="col-6">
													<div class="custom-control custom-checkbox">
														<input class="custom-control-input" type="checkbox" name="permission[]" id="customCheck7" value="viewLevel">
														<label class="custom-control-label" for="customCheck7">
															View
														</label>
													</div>
												</div>  
												<div class="col-6">
													<div class="custom-control custom-checkbox">
														<input class="custom-control-input" type="checkbox" name="permission[]" id="customCheck8" value="deleteLevel">
														<label class="custom-control-label" for="customCheck8">
															Delete
														</label>
													</div>
												</div> 
											</div>
										</div> 
										<div class="form-group">
											<label>Permission Page Schedule</label>
											<div class="row">
												<div class="col-6">
													<div class="custom-control custom-checkbox">
														<input class="custom-control-input" type="checkbox" name="permission[]" id="customCheck9" value="createSchedule">
														<label class="custom-control-label" for="customCheck9">
															Create
														</label>
													</div>
												</div>  
												<div class="col-6">
													<div class="custom-control custom-checkbox">
														<input class="custom-control-input" type="checkbox" name="permission[]" id="customCheck10" value="updateSchedule">
														<label class="custom-control-label" for="customCheck10">
															Update
														</label>
													</div>
												</div>  
												<div class="col-6">
													<div class="custom-control custom-checkbox">
														<input class="custom-control-input" type="checkbox" name="permission[]" id="customCheck11" value="viewSchedule">
														<label class="custom-control-label" for="customCheck11">
															View
														</label>
													</div>
												</div>  
												<div class="col-6">
													<div class="custom-control custom-checkbox">
														<input class="custom-control-input" type="checkbox" name="permission[]" id="customCheck12" value="deleteSchedule">
														<label class="custom-control-label" for="customCheck12">
															Delete
														</label>
													</div>
												</div> 
											</div>
										</div> 
										<div class="form-group">
											<label>Permission Page Inventory</label>
											<div class="row">
												<div class="col-6">
													<div class="custom-control custom-checkbox">
														<input class="custom-control-input" type="checkbox" name="permission[]" id="customCheck13" value="createInventory">
														<label class="custom-control-label" for="customCheck13">
															Create
														</label>
													</div>
												</div>  
												<div class="col-6">
													<div class="custom-control custom-checkbox">
														<input class="custom-control-input" type="checkbox" name="permission[]" id="customCheck14" value="updateInventory">
														<label class="custom-control-label" for="customCheck14">
															Update
														</label>
													</div>
												</div>  
												<div class="col-6">
													<div class="custom-control custom-checkbox">
														<input class="custom-control-input" type="checkbox" name="permission[]" id="customCheck15" value="viewInventory">
														<label class="custom-control-label" for="customCheck15">
															View
														</label>
													</div>
												</div>  
												<div class="col-6">
													<div class="custom-control custom-checkbox">
														<input class="custom-control-input" type="checkbox" name="permission[]" id="customCheck16" value="deleteInventory">
														<label class="custom-control-label" for="customCheck16">
															Delete
														</label>
													</div>
												</div> 
											</div>
										</div> 
										<div class="form-group">
											<label>Permission Page Setting</label>
											<div class="row">
												<div class="col-6">
													<div class="custom-control custom-checkbox">
														<input class="custom-control-input" type="checkbox" name="permission[]" id="customCheck17" value="createSetting">
														<label class="custom-control-label" for="customCheck17">
															Create
														</label>
													</div>
												</div>  
												<div class="col-6">
													<div class="custom-control custom-checkbox">
														<input class="custom-control-input" type="checkbox" name="permission[]" id="customCheck18" value="updateSetting">
														<label class="custom-control-label" for="customCheck18">
															Update
														</label>
													</div>
												</div>  
												<div class="col-6">
													<div class="custom-control custom-checkbox">
														<input class="custom-control-input" type="checkbox" name="permission[]" id="customCheck19" value="viewSetting">
														<label class="custom-control-label" for="customCheck19">
															View
														</label>
													</div>
												</div>  
												<div class="col-6">
													<div class="custom-control custom-checkbox">
														<input class="custom-control-input" type="checkbox" name="permission[]" id="customCheck20" value="deleteSetting">
														<label class="custom-control-label" for="customCheck20">
															Delete
														</label>
													</div>
												</div> 
											</div>
										</div> 
										<div class="form-group">
										 	<button type="submit" name="input" class="btn btn-danger btn-block">Tambah</button>
										</div>
									</form>
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
            	url : 'action/fetched-dataLevel',
            	data :  'rowid='+ rowid,
            	success : function(data){
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