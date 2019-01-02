<html>

<head>

<title>SafeKeep | Password Manager</title>
<link rel="icon" href="pass.jpg"/>
<meta name="author" content="Saket Jajoo">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />

<link rel="stylesheet" href="home_style.css">

<script>

	function redirectback()
	{
		window.location = "index.php";
	}

</script>

</head>

<body oncontextmenu="return false;">

	<div id="main_head">
		<div id="main_heading">
			<div id="heading_content">
				SafeKeep
			</div>
		</div>
	</div>
 
	<center>
	<div id="main_form">
		<div id="head_form">
			<div id="head_formcontent">
				SafeKeep Forgot Password
			</div>
		</div>
		
		<hr>
		<center>
		<div id="formforsignin">
			<form action="resetpass.php" method="post">
				<input id="username" placeholder="Enter your User ID" name="uname" type="text" required></input>
				</br>
				<button id="submit" name="submit" value="submit" type="submit" title="Go Back" onclick="redirectback()">Cancel</button>
				<button id="submit" name="submit" value="submit" type="submit" title="Reset your SafeKeep Account">Reset</button>
			</form>
			<div id="afterform">
				<div id="forgotpass" class="afterform">
					<div id="forgot_text">
						<a href="forgotuserid.php" title="Go to User ID forgot form" class="afterformlinks">I don't know my User Id</a>
					</div>
				</div>
				<div id="signup" class="afterform">
					<div id="signupcontent">
						<a href="reset.php" title="Go to Reset Password Page" class="afterformlinks">I have the reset code</a>
					</div>
				</div>
			</div>
		</div>
		</center>
	</div>
	</center>
 
</body>

</html>