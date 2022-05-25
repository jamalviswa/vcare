<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="demo.css" />
	<link href="style.css" rel="stylesheet">
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">
		h1 {
			font-size: 2.2em;
			padding: 0 .5em 0
		}

		h2 {
			font-size: 1.5em
		}

		.header {
			padding: 1em 0
		}

		.col {
			padding: 1em 0;
			text-align: center
		}
	</style>
	<link rel="stylesheet" href="css/bemo.css">
	<link rel="stylesheet" href="dist/ladda.min.css">
</head>

<body style="background-color:#101d25">
	<div id="done" class="panel" style="z-index:9999">
		<div class="content" style="width:100%;right:0;left:0;">
			<br>
			<center>
				<div style="color:green;font-size:14px">
					Congratulations !! Your account is active. Please log in with the application installed on your Android smartphone</div><br><br>
			</center>
		</div>
	</div>
	<?php
	session_start();
	include_once 'dbconnect.php';

	if (!isset($_SESSION['user'])) {

	?>
		<script>
			document.location.href = "jimli.php#login";
		</script><?php
				}
				if (isset($_POST['btn-login'])) {

					$email = mysqli_real_escape_string($mysqli, $_POST['email']);
					$upass = mysqli_real_escape_string($mysqli, $_POST['pass']);
					$email = trim($email);
					$upass = trim($upass);
					$res = mysqli_query($mysqli, "SELECT id, first_name, password, phone, email, kunci FROM users WHERE email='$email' or phone='$email'");
					$row = mysqli_fetch_array($res);

					if ($row['kunci'] == '1') { ?> <style>
				#hideme {
					-webkit-animation: cssAnimation 150s forwards;
					animation: cssAnimation 150s forwards
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
			<div id="hideme" style="width:100%;position:absolute;color:#ef2525;z-index:99999;top:0px;padding:20px;box-shadow:5px 2px 8px 1px rgba(0,0,0,0.15);background-color:rgba(255, 255, 82, 0.95)">
				<center>Akun anda belum diverifikasi, atau di suspend oleh Trol management, periksa email dari kami
					<br>
					<br>
					<center><b><a href="firli.php#login">SignIn Again</a></b></center>
			</div><?php return false;
					}
					$count = mysqli_num_rows($res);
					if ($count == 1 && $row['password'] == md5($upass)) {


						$_SESSION['user'] = $row['id'];
					?>
			<script>
				document.location.href = "mithome.php#home";
			</script><?php
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
					<center><b><a href="firli.php#login">SignIn Again</a></b></center>
			</div><?php
					}
				}
					?><br><br>
	<?php
	$computerId = $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT'] . $_SERVER['SERVER_ADDR'] . $_SERVER['SERVER_PORT'];
	$benjo = str_replace(' ', '', $computerId);
	$res = mysqli_query($mysqli, "SELECT * FROM users WHERE forgot_pass_identity='$benjo' and kunci='0'");
	$row = mysqli_fetch_array($res);
	// $rembo=$row['forgot_pass_identity'];
	// $tession = $row['id'];
	// print_r($tession);exit;
	// if ($tession) {
	// 	$_SESSION['user'] = $tession;
	// ?>
	 	<script>
	// 		document.location.href = "fdex.php";
	// 	</script><?php
	// 			}

	// 				?>

	<?php
	$computerId = $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT'] . $_SERVER['SERVER_ADDR'] . $_SERVER['SERVER_PORT'];
	$bento = str_replace(' ', '', $computerId);
	$pit = mysqli_query($mysqli, "SELECT * FROM users WHERE forgot_pass_identity='$bento'");
	$kakpit = mysqli_fetch_array($pit);
	// $er = $kakpit['forgot_pass_identity'];
	// $boykunci = $kakpit['kunci'];	
	// if ($boykunci == 1) {
	// 	header("Location: registrasiemail/activate.php?email=" . $kakpit['email'] . "&&key=" . $kakpit['forgot_pass_identity'] . "&&phone=" . $kakpit['phone'] . "");
	// }
	?>
	<center>
		<img src="icon/ggo.png" width="170px" />
		<center style="color:#FFA800"><b>Login Technician</b></center>
		<br>
		<style>
			::-webkit-input-placeholder {
				color: #ada7a7
			}

			:-moz-placeholder {
				color: #ada7a7;
				opacity: 1
			}

			::-moz-placeholder {
				color: #ada7a7;
				opacity: 1
			}

			:-ms-input-placeholder {
				color: #ada7a7
			}

			::-ms-input-placeholder {
				color: #ada7a7
			}

			#input {
				color: #fff;
				position: relative;
				display: inline-block;
				width: 100%
			}

			nav {
				position: absolute;
				content: '';
				height: 40px;
				height: 2px;
				background: #e87817;
				transition: all .2s linear;
				width: 0;
				bottom: 1px
			}

			input:hover~nav {
				width: 100%
			}
		</style>
		<form id="form" method="post" style="padding-right: 25px;padding-left: 25px;">
			<div id="input"><input style="color:#ffffff;background:url(icon/email.png) no-repeat 12px;padding-left:40px;vertical-align:middle;border-bottom:1px solid #ada7a7;background-size:20px" type='text' name="email" class='holo' placeholder="Email" aria-required="true" required="required" />
				<nav></nav>
			</div>
			<br><br>
			<div id="input"><input style="color:#ffffff;background:url(icon/password.png) no-repeat 12px;padding-left:40px;vertical-align:middle;border-bottom:1px solid #ada7a7;background-size:20px" type="password" name="pass" class='holo' placeholder="Password" aria-required="true" required="required" />
				<nav></nav>
			</div><br>
			<div style="float:right;padding:20px"><a href="mitloginregister/forgotPassword.php" style="color:#101D25" onclick="javascript:showDiv()"><small>Forgot password</small></a></div>
			</p>
			<br>
			<section style="width:100%;padding:0" class="button-demo"><button style="background:#FFA500;color:#101D25;width:100%;border-radius:20px;height:auto" type="submit" name="btn-login" class="ladda-button" data-color="green" data-style="expand-right" onclick="javascript:showDiv()"><b>Sign In</b></button></section>
		</form>
		<p>
			<center>
				<small>
					<div style="color:white">Not registered yet? <a style="color:#ffa800" onclick="javascript:showDiv();" href="mitregistrasiemail/index.php"><b>Register Now</b></a><br><br>

				</small></div>
		</p>
	</center>
	<script src="dist/spin.min.js"></script>
	<script src="dist/ladda.min.js"></script>
	</section>
	<script>
		Ladda.bind(".button-demo button");
		Ladda.bind(".progress-demo button", {
			callback: function(e) {
				var f = 0;
				var d = setInterval(function() {
					f = Math.min(f + Math.random() * 0.1, 1);
					e.setProgress(f);
					if (f === 1) {
						e.stop();
						clearInterval(d)
					}
				}, 200)
			}
		});
	</script>
</body>
<?php
//$id_users = $_SESSION['user'];
//$view = mysqli_query($mysqli, "SELECT * FROM transaksi where id_users='$id_users'");
//while ($row = mysqli_fetch_array($view)) {
?><?php
	// 	if ($row['status_trans'] == 'otw') { ?><script>
	// document.location.href = " about.php#otw";
</script><?php //}
		// if ($row['status_trans'] == 'minta') { ?><script>
		// document.location.href = " about.php#about";
	</script><?php //}
		// 	if ($row['status_trans'] == 'dijemput') { ?><script>
		// document.location.href = " about.php#row";
	</script><?php //}
//		};
				?>
<style>
	#loading {
		display: block;
		position: absolute;
		top: 0;
		left: 0;
		z-index: 99999;
		width: 100vw;
		height: 100vh;
		background-image: url("hourglass.svg");
		background-repeat: no-repeat;
		background-position: center
	}
</style>
<div id="loading" style="display:none">
</div>
<script type="text/javascript">
	function showDiv() {
		div = document.getElementById("loading");
		div.style.display = "block"
	};
</script>