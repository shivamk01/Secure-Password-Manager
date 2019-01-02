<?php

	if((isset($_SESSION['username']) && isset($_SESSION['email'])))
	{
		session_unset();
		unset($_SESSION['username']);
		unset($_SESSION['email']);
		session_destroy();
		header("location:index.php");
	}
	
	$servername="127.0.0.1";
	$username="root";
	$password="";
	$dbname="passwordmanager";

	$connect = new mysqli("$servername",$username,$password,$dbname);
	
	if(isset($_POST['submit_fromlogin']))
	{
		$uname = $_POST['uname'];
		$checkpass='';
		$passfromlogin = $_POST['pass'];
		$passfromlogin = md5($passfromlogin);
		$check_log_det = "SELECT password,email FROM pass_login WHERE username = '$uname'";
		$result = $connect->query($check_log_det);
		while($row = $result->fetch_assoc())
		{	
			$checkpass = $row['password'];
			$email = $row['email'];
		}	
		if($checkpass != $passfromlogin)
		{
			echo "
			<script>
				alert('Invalid credentials. Try again.');
				window.location.href = 'index.php';
			</script>
			";
		}
		else	
		{
			session_start();
			$_SESSION['username'] = $uname;
			$_SESSION['email'] = $email;
			echo "
			<script>
				window.location.href = 'afterlogin/welcome.php';
			</script>
			";
		}
	}
?>


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
				SafeKeep Sign In
			</div>
		</div>
		
		<hr>
		<center>
		<div id="formforsignin">
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<input id="uname" placeholder="User ID" name="uname" type="text" required></input>
				</br>
				<input id="pass" placeholder="Password" type="password" name="pass" required></input>
				</br>
				<button id="submit" name="submit_fromlogin" value="submit_fromlogin" type="submit" title="Sign In to your SafeKeep Account">Sign In</button>
			</form>
			<div id="afterform">
				<div id="forgotpass" class="afterform">
					<div id="forgot_text">
						<a href="forgotpass.php" title="Go to Forgot Password form" class="afterformlinks">Forgot Your Password?</a>
					</div>
				</div>
				<div id="signup" class="afterform">
					<div id="signupcontent">
						<a href="register.php" title="Go to Registration form" class="afterformlinks">Don't have a SafeKeep account?</a>
					</div>
				</div>
			</div>
		</div>
		</center>
	</div>
	</center>
 
</body>

</html>