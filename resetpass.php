<?php

$servername="127.0.0.1";
$username="root";
$password="";
$dbname="passwordmanager";

$connect = new mysqli("$servername",$username,$password,$dbname); 

$uname = $_POST['uname'];
$rowcount=0;
$check_for_user = "SELECT * FROM pass_login WHERE username='$uname'";
$result = mysqli_query($connect,$check_for_user);
$rowcount=mysqli_num_rows($result);

if($rowcount==0)
{
	echo "<script>
				alert('There is no such user. Redirecting you to the sign up page.');
				window.location.href='register.php';
		</script>";
}

else
{
	$tp = $connect->query($check_for_user);
	while($row = $tp->fetch_assoc())
	{
		$is_prev_reset = $row['is_for_reset'];
	}
	if($is_prev_reset=='Y')
	{
		echo "
		<script>
			alert('You have already applied to reset your account. Check your mail for the reset code.');
			window.location.href='reset.php';
		</script>
		";
	}
	
	else
	{
		$update_for_reset = "UPDATE `pass_login` SET `is_for_reset`='Y' WHERE username='$uname'";
	
		if ($connect->query($update_for_reset) === TRUE) 
		{
			echo "";
		}
	
		$string = "AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz0123456789!@#$%^&*";
		$len_of_string = strlen($string);
		$i=0;
		$len = rand(10,16);
		$reset_code="";
		for($i=0;$i<$len;$i++)
			$reset_code.=$string[rand(0,$len_of_string-1)] ;
		
		$insert_reset_code = "UPDATE `pass_login` SET `reset_code`='$reset_code' WHERE username='$uname'";
		if ($connect->query($insert_reset_code) === TRUE) 
		{
			$res = $connect->query($check_for_user);
			while($row = $res->fetch_assoc())
			{
				$email_of_user = $row['email'];
			}
			$sub = "Reset password for SafeKeep Account";
			$body = "Your reset code is : $reset_code";
			mail($email_of_user,$sub,$body);
		}
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
				SafeKeep
			</div>
		</div>
		
		<hr>
		<center>
		<div id="formforsignin">
				<h5 style="color:green">Please check your mail for the reset code.</h5>
				</br>
				<button id="cancel" name="submit" title="Go Back" onclick="redirectback()">Go to Sign In Page</button>
		</div>
		</center>
	</div>
	</center>
 
</body>

</html>