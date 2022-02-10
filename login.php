<!DOCTYPE html>
<html>
<head>
	<title>Lab PTC</title>
	<?php include 'includes/head.php';require_once 'action/db_conn.php'; ?>
	<style type="text/css">
	.card{width: 500px;margin: 60px auto}
	.form-signin {
		width: 100%;
		max-width: 330px;
		padding: 15px;
		margin: 0 auto;
	}
	.form-signin .form-control {
		position: relative;
		box-sizing: border-box;
		height: auto;
		padding: 10px;
		font-size: 16px;
	} 
</style>
</head>
<body oncontextmenu="return false" onload="start()">
	<?php require_once 'includes/header.php';?>  
	<div class="card text-center">
		<div class="card-header">
			<h1 class="h3 font-weight-normal">Please sign in</h1>
		</div>
		<form class="form-signin needs-validation" action="action/auth" method="post" novalidate>
			<div class="form-group text-left">
				<label for="inputEmail" class="sr-only">Username</label>
				<input type="text" class="form-control"  name="username" placeholder="email or username" autocomplete="off" required>
				<div class="valid-feedback">Valid.</div>
				<div class="invalid-feedback">Please fill out this field.</div>
			</div>
			<div class="form-group text-left">
				<label for="inputPassword" class="sr-only">Password</label>
				<input type="password" class="form-control"  name="password" placeholder="password" autocomplete="off" required>
				<div class="valid-feedback">Valid.</div>
				<div class="invalid-feedback">Please fill out this field.</div>
			</div>
			<button class="btn btn-lg btn-primary" type="submit" name="submit">Sign in</button> 
		</form>
	</div>

	<script type="text/javascript">
  
(function() {
	'use strict';
	window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
    	form.addEventListener('submit', function(event) {
    		if (form.checkValidity() === false) {
    			event.preventDefault();
    			event.stopPropagation();
    		}
    		form.classList.add('was-validated');
    	}, false);
    });
}, false);
})();

</script>
</body>
</html>







