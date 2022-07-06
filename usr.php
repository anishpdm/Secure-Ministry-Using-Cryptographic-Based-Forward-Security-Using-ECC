<?php
include './dbcon/db.php';
session_start();

if (isset($_POST['but'])) {


	$user = $_POST['cid'];

	$pass = $_POST['pass'];



	$sql = "SELECT id,`password`,CustomerId FROM `user` WHERE `CustomerId`=$user";


	$result = $con->query($sql);

	while ($row = mysqli_fetch_array($result)) {
		//  echo '<br>';
		$count = $row['password'];
		$uid = $row['id'];
		$cid = $row['CustomerId'];
	}


	if ($pass == $count) {
		// echo 'True';
		$_SESSION['userid'] = $uid;
		$_SESSION['custid'] = $cid;
		// echo 'true';
		echo "<script type='text/javascript'> window.location='./user/index.php';</script>";
		//  header('location:new.php');

	} else {

		header('location:error.php');

		echo 'Failed';
	}
}

?>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Custom Login Form Styling</title>
	<meta name="description" content="Custom Login Form Styling with CSS3" />
	<meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder" />
	<meta name="author" content="Codrops" />
	<link rel="shortcut icon" href="../favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script src="js/modernizr.custom.63321.js"></script>
	<!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
	<style>
		body {
			background: #e1c192 url(images/wood_pattern.jpg);
		}
	</style>
</head>

<body>
	<form method="POST">
		<div class="container">



			<header>
				<h1>Secure <strong>Ministry</strong> LogIn</h1>

				<nav class="codrops-demos">
					<a href="index.php">Admin LogIn</a>
					<a class="current-demo" href="usr.php">User LogIn</a>
				</nav>

				<div class="support-note">
					<span class="note-ie">Sorry, only modern browsers.</span>
				</div>

			</header>

			<section class="main">
				<div class="form-2">
					<h1><span class="log-in">Customer</span> <span class="sign-up">Log In </span></h1>
					<p class="float">
						<label for="login"><i class="icon-user"></i>User Id</label>
						<!--						<input type="text" name="custid" placeholder="Customer Id">-->
						<input type="text" name="cid" placeholder="User Id" />
					</p>
					<p class="float">
						<label for="password"><i class="icon-lock"></i>Password</label>
						<input type="password" name="pass" placeholder="Customer Id" />
					</p>
					<p class="clearfix">
						<a href="#" class="log-twitter"></a>
						<input type="submit" name="but" value="Log in">
					</p>
				</div>​​
			</section>

		</div>
		<!-- jQuery if needed -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript">
			$(function() {
				$(".showpassword").each(function(index, input) {
					var $input = $(input);
					$("<p class='opt'/>").append(
						$("<input type='checkbox' class='showpasswordcheckbox' id='showPassword' />").click(function() {
							var change = $(this).is(":checked") ? "text" : "password";
							var rep = $("<input placeholder='Password' type='" + change + "' />")
								.attr("id", $input.attr("id"))
								.attr("name", $input.attr("name"))
								.attr('class', $input.attr('class'))
								.val($input.val())
								.insertBefore($input);
							$input.remove();
							$input = rep;
						})
					).append($("<label for='showPassword'/>").text("Show password")).insertAfter($input.parent());
				});

				$('#showPassword').click(function() {
					if ($("#showPassword").is(":checked")) {
						$('.icon-lock').addClass('icon-unlock');
						$('.icon-unlock').removeClass('icon-lock');
					} else {
						$('.icon-unlock').addClass('icon-lock');
						$('.icon-lock').removeClass('icon-unlock');
					}
				});
			});
		</script>
	</form>
</body>

</html>