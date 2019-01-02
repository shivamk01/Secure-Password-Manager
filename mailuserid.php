<?php

$servername="127.0.0.1";
$username="root";
$password="";
$dbname="passwordmanager";

$connect = new mysqli("$servername",$username,$password,$dbname); 

if(isset($_POST['submit']))
{
	$email = $_POST['email'];
	$check_db = "SELECT * FROM pass_login WHERE email='$email'";
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
			$uid = $row['username'];
		}
		$sub = "User ID for SafeKeep Account.";
		$body = "Your User ID for your SafeKeep Account is : $uid";
		mail($email,$sub,$body);
		echo "
		<script>
			alert('Check your mail for your User ID.');
			window.location.href='index.php';
		</script>
		";
	}
}
?>