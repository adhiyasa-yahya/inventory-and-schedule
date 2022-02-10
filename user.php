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
	<title>Lab PTC - User</title>
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
						<li class="breadcrumb-item active" aria-current="page">User</li>
					</ol>
				</nav>
				<div class="row">
					<div class="col-xl-3 col-lg-5">

	 					<?php if ($dirs): ?>
	 						<?php if (in_array("createUser", $dirs)): ?>
								<a class="btn btn-danger btn-lg mt-2"  data-toggle='modal' href="#add" role="button">Tambah User</a>
	 						<?php endif ?>
	 					<?php endif ?>
	 					<?php if ($dirs): ?>
	 						<?php if (in_array("viewLevel", $dirs)): ?>
								<a class="btn btn-secondary btn-lg mt-2" href="user-level"  role="button">User Level</a>
								<?php endif ?>
	 					<?php endif ?>
					</div>
					<div class="col-xl-7 col-lg-6 mt-2">
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
									<th>Email</th>
									<th>Username</th>
									<th>Level</th>
									<?php if ($dirs): ?>
	 									<?php if (in_array("updateUser", $dirs) || in_array("deleteUser", $dirs)): ?>
											<th class="text-center"> opsi</th>
										<?php endif ?>
		 							<?php endif ?>
								</tr>
							</thead>
							<tbody> 
								<?php 
                                $result = mysqli_query($conn,"SELECT users.*, level.name  FROM users INNER JOIN level ON users.level = level.id WHERE users.id NOT IN  (SELECT MIN(id) from users)" );
                                $no = 1;
                                while ($data = mysqli_fetch_array($result)) { 
                                	$id = $data['id'];
                                	$day = $data['username'];
                                	$name = $data['name'];
                                	$email = $data['email'];
                                	$level = $data['level'];

                                ?>
								<tr>
									<td width="89px"><b><?php echo $no ;?></b></td>
									<td><?php echo $email;?></td> 
									<td><?php echo $day;?></td> 
									<td><?php echo $name;?></td> 
									<?php if ($dirs): ?>
										<?php if (in_array("updateUser", $dirs) || in_array("deleteUser", $dirs)): ?>
										<td class="text-center" width="183px"> 
											<?php if ($dirs): ?>
												<?php if (in_array("updateUser", $dirs)): ?>
													<a href="#myModal" id='custId' data-toggle='modal' data-id="<?php echo $id ?>"> 
														<button type="button" class="btn btn-warning btn-sm"> 
															<i class="fa fa-fw fa-edit"></i>
														</button> 
													</a> 
												<?php endif ?>
											<?php endif ?>
											<?php if ($dirs): ?>
												<?php if (in_array("deleteUser", $dirs)): ?>
													<a href="#delete" data-toggle='modal' id="data" data-href="action/addUser?idK=<?php echo $id ?>"><button type="button" class="btn btn-danger btn-sm"> <i class="fa fa-fw fa-trash"></i></button> </a>
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

					<div class="modal fade" id="myModal" role="dialog">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Edit Data User</h4>
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
									<form action="action/addUser" method="post" >
										<div class="form-group">
											<label>User Level</label>
											<select class="form-control" name="level">
												<option selected disabled>pilih...</option>
												<?php 
												$result = mysqli_query($conn,"SELECT * FROM level WHERE id NOT IN  (SELECT MIN(id) from level)");
												$no = 1;
												while ($data = mysqli_fetch_array($result)) { 
													$id = $data['id'];
													$name = $data['name']; 
												?>
												<option value="<?php echo $id ?>"><?php echo $name; ?></option> 
											<?php } ?>
   											</select>
										</div>

										<div class="form-group">
											<label>Email</label>
											<input type="email" class="form-control" name="email" placeholder="email" required="">
										</div>
										<div class="form-group">
											<label>Username</label>
											<input type="text" class="form-control" name="username" placeholder="username" required="">
										</div>
										<div class="form-group">
											<label>password</label>
											<input type="password" class="form-control" name="password" placeholder="password" required="">
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
            	url : 'action/fetched-dataUser',
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