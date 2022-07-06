<?php
include '../dbcon/db.php';


session_start();

$cid = $_SESSION['custid'];
$uid = $_SESSION['userid'];
if ($uid == NULL) {

	echo "<script type='text/javascript'> window.location='../usr.php';</script>";
}



$sql = "SELECT `CustomerName`,`CustomerId`,`AccNumber`,`Phone`,`IMEI`,`Email`,AccountBalance FROM `user` WHERE `id`=$uid";


$result = $con->query($sql);

while ($row = mysqli_fetch_array($result)) {
	//  echo '<br>';
	$CustomerName = $row['CustomerName'];
	$CustomerId = $row['CustomerId'];
	$AccNumber = $row['AccNumber'];
	$Phone = $row['Phone'];
	$imei = $row['IMEI'];
	$Email = $row['Email'];
	$AccountBalance = $row['AccountBalance'];
}









?>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

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


				<h1>XYZ <strong>INTERNET</strong> BANKING</h1>

				<nav class="codrops-demos">
					<a class="current-demo" href="index.php">View Messages</a>
					<a href="acc.php">Profile Info</a>
					<a href="logout.php">Log Out</a>
				</nav>

				<div class="support-note">
					<span class="note-ie">Sorry, only modern browsers.</span>
				</div>

			</header>

			<section class="main">
				<div class="form-2">
					<h1><span class="log-in">Account</span> <span class="sign-up">Information </span></h1>
					<p class="float">
						<label for="login"><i class="icon-user"></i>Customer Id</label>
						<!--						<input type="text" name="custid" placeholder="Customer Id">-->
						<input type="text" name="cid" placeholder="Customer Id" value=<?php echo $CustomerId ?> readonly />
					</p>
					<p class="float">
						<label for="login"><i class="icon-user"></i>Customer Name</label>
						<input type="text" name="pass" placeholder="Customer Id" value=<?php echo $CustomerName ?> readonly />
					</p>
					<p class="float">
						<label for="login"><i class="icon-user"></i>Account Number</label>
						<input type="text" name="pass" placeholder="Customer Id" value=<?php echo $AccNumber ?> readonly />
					</p>
					<p class="float">
						<label for="login"><i class="icon-user"></i>Mobile Number</label>
						<input type="text" name="pass" placeholder="Customer Id" value=<?php echo $Phone ?> readonly />
					</p>
					<p class="float">
						<label for="login"><i class="icon-user"></i>IMEI Number</label>
						<input type="text" name="pass" placeholder="Customer Id" value=<?php echo $imei ?> readonly />
					</p>
					<p class="float">
						<label for="login"><i class="icon-user"></i>Email Id</label>
						<input type="text" name="pass" placeholder="Customer Id" value=<?php echo $Email ?> readonly />
					</p>
					<p class="float">
						<label for="login"><i class="icon-user"></i>Account Balance</label>
						<input type="text" name="pass" placeholder="Customer Id" value=<?php echo $AccountBalance ?> readonly />
					</p>
					<p class="clearfix">

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