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
		window.location = "forgotpass.php";
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
				SafeKeep Forgot User ID
			</div>
		</div>
		
		<hr>
		<center>
		<div id="formforsignin">
			<form action="mailuserid.php" method="post">
				<input id="username" placeholder="Enter your Email" name="email" type="text" required></input>
				</br>
				<button id="cancel" name="submit" title="Go Back" onclick="redirectback()">Cancel</button>
				<button id="submit" name="submit" value="submit" type="submit" title="Get User ID for your SafeKeep Account">Get User ID</button>
			</form>
		</div>
		</center>
	</div>
	</center>
 
</body>

</html>