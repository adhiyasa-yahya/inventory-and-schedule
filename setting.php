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
	<title>Lab PTC - Setting</title>
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
				<nav aria-label="breadcrumb mb-4">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Setting</li>
					</ol>
				</nav>
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
				<div class="card">
					<div class="card-body">
						<h4><u>Setting Informasi Lab.</u></h4>
						<form action="action/addSetting" method="post">
							<?php 
							$result = mysqli_query($conn,"SELECT * FROM infolab");
							$no = 1;
							while ($data = mysqli_fetch_array($result)) { 
								$id = $data['id'];
								$progdi = $data['progdi'];
								$head	 = $data['head']; 
								$NIP	 = $data['NIP']; 
								$NIDN	 = $data['NIDN']; 

							?> 
							<div class="form-group row">
								<label for="inputText3" class="col-sm-2 col-form-label">Program Studi</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="inputText3" name="progdi" value="<?php echo $progdi ?>">
									<input type="hidden" name="id" value="<?php echo $id ?>">
								</div>
							</div>
							<div class="form-group row">
								<label for="inputText3" class="col-sm-2 col-form-label">Kepala Lab.</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="inputText3" name="head" value="<?php echo $head ?>">
								</div>
							</div>
							<div class="form-group row">
								<label for="inputText3" class="col-sm-2 col-form-label">NIP</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="inputText3" name="NIP" value="<?php echo $NIP ?>">
								</div>
							</div>
							<div class="form-group row">
								<label for="inputText3" class="col-sm-2 col-form-label">NIDN</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="inputText3" name="NIDN" value="<?php echo $NIDN ?>">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-12 text-right">
									<a class="btn btn-secondary btn-lg" href="dashboard" role="button">Back</a>
									<button type="submit" name="info" class="btn btn-danger btn-lg">Update</button>
								</div>
							</div>
						<?php } ?>
						</form> 
						<h4><u>Setting Title Hearder</u></h4>
						<form action="action/addSetting" method="post" enctype="multipart/form-data">
							<?php 
							$result = mysqli_query($conn,"SELECT * FROM setting");
							$no = 1;
							while ($data = mysqli_fetch_array($result)) { 
								$id = $data['id'];
								$titile = $data['titile'];
								$sub_title	 = $data['subTitle']; 

							?>
							<div class="form-group row">
								<label for="inputText3" class="col-sm-2 col-form-label">Nama Laboratorium</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="inputText3" name="titile" value="<?php echo $titile ?>">
									<input type="hidden" name="id" value="<?php echo $id ?>">
								</div>
							</div>
							<div class="form-group row">
								<label for="inputText3" class="col-sm-2 col-form-label">Sub Nama Laboratorium</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="inputText3" name="sub_title" value="<?php echo $sub_title ?>">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-12 text-right">
									<a class="btn btn-secondary btn-lg" href="dashboard" role="button">Back</a>
									<button type="submit" name="edit" class="btn btn-danger btn-lg">Update</button>
								</div>
							</div>
						<?php } ?>
						</form> 
						<h4><u>Setting Images</u></h4>
						<?php 
							$result = mysqli_query($conn,"SELECT * FROM setting");
							while ($data = mysqli_fetch_array($result)) { 
								$id = $data['id']; 
								$logo1 = $data['logo1']; 
							?>
							<div class="form-group row">
								<label for="inputText4" class="col-sm-2 col-form-label">Logo 1</label>
								<div class="col-sm-10">
									<div class="input-group">
										<input type="text" class="form-control" name="img" value="<?php echo $logo1; ?>" disabled>
										<input type="hidden" name="id" value="<?php echo $id ?>">
										<div class="input-group-append">
											<a class="btn btn-warning" role="button" href="#logo1"  data-toggle='modal'>change</a>
										</div>
									</div>
									<?php if ($logo1): ?>
                        				<img id="output" class="mt-2" width="150px" src="assets/img/<?php echo $logo1 ?>">
									<?php endif ?>
								</div>
							</div>
							<?php } ?> 

							<?php 
							$result = mysqli_query($conn,"SELECT * FROM setting");
							while ($data = mysqli_fetch_array($result)) { 
								$id = $data['id']; 
								$logo2 = $data['logo2']; 
							?>
							<div class="form-group row">
								<label for="inputText4" class="col-sm-2 col-form-label">Logo 2</label>
								<div class="col-sm-10">
									<div class="input-group">
										<input type="text" class="form-control" name="img" value="<?php echo $logo2; ?>" disabled>
										<input type="hidden" name="id" value="<?php echo $id ?>">
										<div class="input-group-append">
											<a  class="btn btn-warning"  role="button" href="#logo2"  data-toggle='modal'>change</a>
										</div>
									</div>
									<?php if ($logo2): ?>
                        				<img id="output" class="mt-2"  width="150px" src="assets/img/<?php echo $logo2 ?>">
									<?php endif ?>
								</div>
							</div>
							<?php } ?> 

							<?php 
							$result = mysqli_query($conn,"SELECT * FROM setting");
							while ($data = mysqli_fetch_array($result)) { 
								$id = $data['id']; 
								$img1 = $data['img1']; 
							?>
							<div class="form-group row">
								<label for="inputText4" class="col-sm-2 col-form-label">Gambar 1</label>
								<div class="col-sm-10">
									<div class="input-group">
										<input type="text" class="form-control" name="img" value="<?php echo $img1; ?>" disabled>
										<input type="hidden" name="id" value="<?php echo $id ?>">
										<div class="input-group-append">
											<a class="btn btn-warning"role="button"  href="#img1"  data-toggle='modal'>change</a>
										</div>
									</div>
									<?php if ($img1): ?>
                        				<img id="output" class="mt-2"  width="150px" src="assets/img/<?php echo $img1 ?>">
									<?php endif ?>
								</div>
							</div>
							<?php } ?> 

							<?php 
							$result = mysqli_query($conn,"SELECT * FROM setting");
							while ($data = mysqli_fetch_array($result)) { 
								$id = $data['id']; 
								$img2 = $data['img2']; 
							?>
							<div class="form-group row">
								<label for="inputText4" class="col-sm-2 col-form-label">Gambar 2</label>
								<div class="col-sm-10">
									<div class="input-group">
										<input type="text" class="form-control" name="img" value="<?php echo $img2; ?>" disabled>
										<input type="hidden" name="id" value="<?php echo $id ?>">
										<div class="input-group-append">
											<a class="btn btn-warning" role="button" href="#img2"  data-toggle='modal'>change</a>
										</div>
									</div>
									<?php if ($img2): ?>
                        				<img id="output" class="mt-2"  width="150px" src="assets/img/<?php echo $img2 ?>">
									<?php endif ?>
								</div>
							</div>
							<?php } ?> 

							<?php 
							$result = mysqli_query($conn,"SELECT * FROM setting");
							while ($data = mysqli_fetch_array($result)) { 
								$id = $data['id']; 
								$img3 = $data['img3']; 
							?>
							<div class="form-group row">
								<label for="inputText4" class="col-sm-2 col-form-label">Gambar 3</label>
								<div class="col-sm-10">
									<div class="input-group">
										<input type="text" class="form-control" name="img" value="<?php echo $img3; ?>" disabled>
										<input type="hidden" name="id" value="<?php echo $id ?>">
										<div class="input-group-append">
											<a class="btn btn-warning" role="button" href="#img3"  data-toggle='modal'>change</a>
										</div>
									</div>
									<?php if ($img3): ?>
                        				<img id="output" class="mt-2"  width="150px" src="assets/img/<?php echo $img3 ?>">
									<?php endif ?>
								</div>
							</div>
							<?php } ?> 

							<?php 
							$result = mysqli_query($conn,"SELECT * FROM setting");
							while ($data = mysqli_fetch_array($result)) { 
								$id = $data['id']; 
								$img4 = $data['img4']; 
							?>
							<div class="form-group row">
								<label for="inputText4" class="col-sm-2 col-form-label">Gambar 4</label>
								<div class="col-sm-10">
									<div class="input-group">
										<input type="text" class="form-control" name="img" value="<?php echo $img4; ?>" disabled>
										<input type="hidden" name="id" value="<?php echo $id ?>">
										<div class="input-group-append">
											<a class="btn btn-warning" role="button" href="#img4"  data-toggle='modal'>change</a>
										</div>
									</div>
									<?php if ($img4): ?>
                        				<img id="output" class="mt-2"  width="150px" src="assets/img/<?php echo $img4 ?>">
									<?php endif ?>
								</div>
							</div>
							<?php } ?>  
					</div>
				</div>

				<div class="modal fade" id="logo1" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Edit Image</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
								<form action="action/addSetting" method="post" enctype="multipart/form-data">
									<div class="input-group">
										<input type="file" class="form-control" name="myfile" id="fileToUpload">
										<input type="hidden" name="id" value="1">
										<div class="input-group-append">
											<button type="submit" name="editlogo1" class="btn btn-danger btn-lg">Update</button>
										</div>
									</div>
								</form>
							</div> 
						</div>
					</div>
				</div>


				<div class="modal fade" id="logo2" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Edit Image</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
								<form action="action/addSetting" method="post" enctype="multipart/form-data">
									<div class="input-group">
										<input type="file" class="form-control" name="myfile" id="fileToUpload">
										<input type="hidden" name="id" value="1">
										<div class="input-group-append">
											<button type="submit" name="editlogo2" class="btn btn-danger btn-lg">Update</button>
										</div>
									</div>
								</form>
							</div> 
						</div>
					</div>
				</div>

				<div class="modal fade" id="img1" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Edit Image</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
								<form action="action/addSetting" method="post" enctype="multipart/form-data">
									<div class="input-group">
										<input type="file" class="form-control" name="myfile" id="fileToUpload">
										<input type="hidden" name="id" value="1">
										<div class="input-group-append">
											<button type="submit" name="editimg1" class="btn btn-danger btn-lg">Update</button>
										</div>
									</div>
								</form>
							</div> 
						</div>
					</div>
				</div>

				<div class="modal fade" id="img2" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Edit Image</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
								<form action="action/addSetting" method="post" enctype="multipart/form-data">
									<div class="input-group">
										<input type="file" class="form-control" name="myfile" id="fileToUpload">
										<input type="hidden" name="id" value="1">
										<div class="input-group-append">
											<button type="submit" name="editimg2" class="btn btn-danger btn-lg">Update</button>
										</div>
									</div>
								</form>
							</div> 
						</div>
					</div>
				</div>

				<div class="modal fade" id="img3" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Edit Image</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
								<form action="action/addSetting" method="post" enctype="multipart/form-data">
									<div class="input-group">
										<input type="file" class="form-control" name="myfile" id="fileToUpload">
										<input type="hidden" name="id" value="1">
										<div class="input-group-append">
											<button type="submit" name="editimg3" class="btn btn-danger btn-lg">Update</button>
										</div>
									</div>
								</form>
							</div> 
						</div>
					</div>
				</div>

				<div class="modal fade" id="img4" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Edit Image</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
								<form action="action/addSetting" method="post" enctype="multipart/form-data">
									<div class="input-group">
										<input type="file" class="form-control" name="myfile" id="fileToUpload">
										<input type="hidden" name="id" value="1">
										<div class="input-group-append">
											<button type="submit" name="editimg4" class="btn btn-danger btn-lg">Update</button>
										</div>
									</div>
								</form>
							</div> 
						</div>
					</div>
				</div>
			</div>  

	<?php include 'includes/footer.php'; ?> 
</body>
</html>