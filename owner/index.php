 <?php
	session_start();
	include_once 'dbconnect.php';
	if (isset($_POST['btn-login'])) {
		$mitra_email = mysqli_real_escape_string($mysqli, $_POST['mitra_email']);
		$mitra_pass = mysqli_real_escape_string($mysqli, $_POST['mitra_pass']);
		$mitra_email = trim($mitra_email);
		$mitra_pass = trim($mitra_pass);
		$res = mysqli_query($mysqli, "SELECT id_mitra, mitra_email, mitra_pass FROM mitra WHERE mitra_email='$mitra_email'");
		$row = mysqli_fetch_array($res);
		$count = mysqli_num_rows($res);
		// if uname/pass correct it returns must be 1 row
		if ($count == 1 && $row['mitra_pass'] == md5($mitra_pass)) {
			$_SESSION['mitra'] = $row['id_mitra'];
			$themes = $_POST['theme'];
			if ($themes == 'blue') {

	?><script>
 				document.location.href = "dashboard.php";
 			</script><?php
					}
					if ($themes == 'creative') {

						?><script>
 				document.location.href = "../responsive/dashboard.php";
 			</script><?php
					}
				} else {
						?>
 		<style>
 			#hideme {
 				-webkit-animation: cssAnimation 15s forwards;
 				animation: cssAnimation 15s forwards
 			}

 			@keyframes cssAnimation {
 				0% {
 					opacity: 1
 				}

 				90% {
 					opacity: 1
 				}

 				100% {
 					opacity: 0
 				}
 			}

 			@-webkit-keyframes cssAnimation {
 				0% {
 					opacity: 1
 				}

 				90% {
 					opacity: 1
 				}

 				100% {
 					opacity: 0
 				}
 			}
 		</style>
 		<div id="hideme" style="width:100%;position:relative;color:#ef2525;z-index:99999;top:0px;padding:20px;box-shadow:5px 2px 8px 1px rgba(0,0,0,0.15);background-color:rgba(255, 255, 82, 0.95)">
 			<center>Email or password is wrong...
 				<br><br>
 				<br>
 				<center><b><a href="index.php">SignIn Again</a></b></center>
 		</div>
 <?php
				}
			}

	?>
 <!DOCTYPE html>
 <html>

 <head>
 	<title>Administrator and Board management</title>
 	<link rel="stylesheet" type="text/css" href="css/sky.css">
 	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
 	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 </head>

 <body>


 	<div class="container">
 		<div class="img">
 			<img src="img/vcare.png" style="border-radius:50px;border-style: solid; border-color:#101D25; border:10px">
 		</div>
 		<div class="login-content">
 			<form style="width:100%" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
 				<img src="agen.png">
 				<h2 class="title">Backend Team</h2>
 				<div class="input-div one">
 					<div class="i">
 						<i class="fas fa-user"></i>
 					</div>
 					<div class="div">
 						<h5>Email</h5>
 						<input type="email" class="input" name="mitra_email" aria-required="true" required="required">
 					</div>
 				</div>
 				<div class="input-div pass">
 					<div class="i">
 						<i class="fas fa-lock"></i>
 					</div>
 					<div class="div">
 						<h5>Password</h5>
 						<input type="password" class="input" name="mitra_pass" aria-required="true" required="required">
 					</div>
 				</div><br>
 				<!-- display none section -->
 				<label style="display:none"><small style="color:#000">Select Themes</small></label>
 				<select class="form-control" style="display:none" name="theme" required>
 					<option name="theme" value="creative">Creative Responsive (BETA DEMO)</option>
 				</select>
 				<!-- display none section -->
 				<a href="#">Forgot Password?</a>
 				<center>
 					<button class="btn" style="background-color:#101d25; color:#FFA500" type="submit" name="btn-login" value="Login">Login
 					</button>
 				</center><br><br><br><br><br>
 			</form>
 		</div>
 	</div>
 	<script type="text/javascript" src="js/rain.js"></script>
 </body>

 </html>