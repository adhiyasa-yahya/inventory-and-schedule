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
	<title>Lab PTC - Informasi Lab.</title>
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
						<li class="breadcrumb-item active" aria-current="page">Informasi Lab.</li>
					</ol>
				</nav>
				<div class="card">
					<div class="card-body">
						<h4><u>Informasi Lab.</u></h4>
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
									<input type="text" class="form-control" id="inputText3" name="progdi" value="<?php echo $progdi ?>" disabled>
									<input type="hidden" name="id" value="<?php echo $id ?>">
								</div>
							</div>
							<div class="form-group row">
								<label for="inputText3" class="col-sm-2 col-form-label">Kepala Lab.</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="inputText3" name="head" value="<?php echo $head ?>" disabled>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputText3" class="col-sm-2 col-form-label">NIP</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="inputText3" name="NIP" value="<?php echo $NIP ?>" disabled>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputText3" class="col-sm-2 col-form-label">NIDN</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="inputText3" name="NIDN" value="<?php echo $NIDN ?>" disabled>
								</div>
							</div> 
						<?php } ?>
						</form> 
			</div>  

	<?php include 'includes/footer.php'; ?> 
</body>
</html>