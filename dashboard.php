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
	<title>Lab PTC - Dashboard</title>
	<?php include 'includes/head.php';require_once 'action/db_conn.php'; ?>
	<style type="text/css">
		a{text-decoration: none !important;}
	</style>
</head>

<body class="bg-light"> 
		<?php require_once 'includes/header.php';
		$sql = mysqli_query($conn, "SELECT level.permission FROM users INNER JOIN level ON users.level = level.id  WHERE users.id = '$id'");
		list($permission) = mysqli_fetch_array($sql);?>
			<div class="m-4">
				<nav aria-label="breadcrumb ">
					<ol class="breadcrumb justify-content-center">
						<li class="breadcrumb-item active w-50" aria-current="page"><a href="dashboard">Dashboard</a></li>

						<li class="text-right w-50" aria-current="page"><a href="#" data-toggle="modal" data-target="#logoutModal">logout </a></li>
					</ol>
				</nav>
			</div>
	 		<div class="row">
	 			<?php  $dirs = unserialize($permission); ?>
	 			<div class="col-lg-5 justify-content-center mt-3">
	 				<div class="row mt-4">
	 					<?php if ($dirs): ?>
	 						<?php if (in_array("viewUser", $dirs)): ?>
	 							<div class="col-8 text-center" style="margin: 0 auto">
	 								<a href="user">
	 									<button type="button" class="btn btn-danger btn-lg btn-block">USER</button>
	 								</a>
	 							</div>
	 						<?php endif ?>
	 					<?php endif ?>
	 					<?php if ($dirs): ?>
	 						<?php if (in_array("viewSchedule", $dirs)): ?>
			 					<div class="col-8 text-center mt-3" style="margin: 0 auto">
			 						<a href="jadwal">
				 						<button type="button" class="btn btn-danger btn-lg btn-block">JADWAL</button>
			 						</a>
			 					</div>
	 						<?php endif ?>
	 					<?php endif ?>
	 					<?php if ($dirs): ?>
	 						<?php if (in_array("viewInventory", $dirs)): ?>
			 					<div class="col-8 text-center mt-3" style="margin: 0 auto">
			 						<a href="inventory">
			 							<button type="button" class="btn btn-danger btn-lg btn-block">INVENTORIES</button>
			 						</a>
			 					</div>
	 						<?php endif ?>
	 					<?php endif ?>
	 					<div class="col-8 text-center mt-3" style="margin: 0 auto">
	 						<a href="infolab">
	 							<button type="button" class="btn btn-danger btn-lg btn-block">INFORMASI LABORATORIUM</button>
	 						</a>
	 					</div>
	 					<?php if ($dirs): ?>
	 						<?php if (in_array("viewSetting", $dirs)): ?>
			 					<div class="col-8 text-center mt-3" style="margin: 0 auto">
			 						<a href="setting">
			 							<button type="button" class="btn btn-danger btn-lg btn-block">SETTING</button>
			 						</a>
			 					</div>
	 						<?php endif ?>
	 					<?php endif ?>
	 				</div>
	 			</div>
	 			<div class="col-lg-7 text-center mt-3">
	 				<div class="row">
	 					<?php $result = mysqli_query($conn,"SELECT *  FROM setting" );
	 					while ($data = mysqli_fetch_array($result)) { $img = $data['img1']; ?>
	 						<div class="col-6 text-center">
	 							<img class="m-3" src="assets/img/<?php echo $img ?>" width="80%">
	 						</div>
	 					<?php } ?> 
	 					<?php $result = mysqli_query($conn,"SELECT *  FROM setting" );
	 					while ($data = mysqli_fetch_array($result)) { $img = $data['img2']; ?>
	 						<div class="col-6 text-center">
	 							<img class="m-3" src="assets/img/<?php echo $img ?>" width="80%">
	 						</div>
	 					<?php } ?> 
	 					<?php $result = mysqli_query($conn,"SELECT *  FROM setting" );
	 					while ($data = mysqli_fetch_array($result)) { $img = $data['img3']; ?>
	 						<div class="col-6 text-center">
	 							<img class="m-3" src="assets/img/<?php echo $img ?>" width="80%">
	 						</div>
	 					<?php } ?> 
	 					<?php $result = mysqli_query($conn,"SELECT *  FROM setting" );
	 					while ($data = mysqli_fetch_array($result)) { $img = $data['img4']; ?>
	 						<div class="col-6 text-center">
	 							<img class="m-3" src="assets/img/<?php echo $img ?>" width="80%">
	 						</div>
	 					<?php } ?> 
	 				</div>
	 			</div>

	 			<div class="modal fade bd-example-modal-sm" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	 				<div class="modal-dialog modal-sm">
	 					<div class="modal-content">
	 						<div class="modal-header">
	 							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
	 						</div>
	 						<div class="modal-body">
	 							<p><i class="fa fa-question-circle"></i> Are you sure you want to logout? <br /></p>
	 							<div class="actionsBtns text-right">
	 								<form action="logout" method="post">
	 									<button class="btn btn-default" data-dismiss="modal">Cancel</button>
	 									<button type="submit" class="btn btn-default btn-primary">Logout</button>
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