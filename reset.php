<?php

$servername="127.0.0.1";
$username="root";
$password="";
$dbname="passwordmanager";

$connect = new mysqli("$servername",$username,$password,$dbname); 

if(isset($_POST['submit']))
{
	$code = $_POST['rescode'];
	$uname = $_POST['uname'];
	$newpass = $_POST['newpass'];
	
	$check_db = "SELECT * FROM pass_login WHERE username='$uname'";
	$result = mysqli_query($connect,$check_db);
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
		$tp = $connect->query($check_db);
		while($row = $tp->fetch_assoc())
		{	
			$is_prev_reset = $row['is_for_reset'];
		}
		if($is_prev_reset=='N')
		{
			echo "
			<script>
				alert('You have not applied to reset your account.');
				window.location.href='forgotpass.php';
			</script>
			";
		}
		else
		{
			$pt = $connect->query($check_db);
			while($row = $pt->fetch_assoc())
			{	
				$reset_code = $row['reset_code'];
			}
			if($reset_code==$code)
			{
				$newpass = md5($newpass);
				$update_pass_reset = "UPDATE `pass_login` SET `password`='$newpass', `is_for_reset`='N', `reset_code`='' WHERE username='$uname'";
				if ($connect->query($update_pass_reset) === TRUE) 
				{
						echo "
						<script>
							alert('Password successfully changed.');
							window.location.href='index.php';
						</script>
				";
				}
			}
			else
			{
				echo "
				<script>
					alert('Your reset code does not match. Try again.');
					window.location.href='reset.php';
				</script>
				";
			}
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
				SafeKeep Forgot User ID
			</div>
		</div>
		
		<hr>
		<center>
		<div id="formforsignin">
			<form method="post" action=" <?php echo $_SERVER['PHP_SELF'];?> " novalidate>
				<input id="uname" placeholder="Enter your User ID" name="uname" type="text" required></input>
				</br>
				<input id="rescode" placeholder="Enter your Reset code" name="rescode" type="text" required></input>
				</br>
				<input id="newpass" placeholder="Enter your new Password here" name="newpass" type="password" required></input>
				</br>
				<button id="submit" name="submit" value="submit" title="Reset your password">Submit</button>
			</form>
		</div>
		</center>
	</div>
	</center>
 
</body>

</html>