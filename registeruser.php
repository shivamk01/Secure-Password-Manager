<?php

$uname = $_POST['uname'];
$pass = $_POST['pass'];
$email = $_POST['email'];

if(isset($_POST['submit']))
{
	$servername="127.0.0.1";
	$username="root";
	$password="";
	$dbname="passwordmanager";

	$connect = new mysqli("$servername",$username,$password,$dbname); 
	
	$q2 = "SELECT * FROM pass_login WHERE email='".$email."'";
	$connect->query($q2);
	$result = mysqli_query($connect,$q2);
	$row = mysqli_fetch_assoc($result); 

	if($row['email']==$email)
	{
		echo "<script> alert('You already have an account registered with this email.'); 
						window.location.href='index.php';
				</script>";
	}
	else
	{
		$date = date("Y-m-d");
		$time = date("h:i:sa");
		
		$pass = md5($pass);
		
		$q1 = "INSERT INTO pass_login VALUES ('$uname' , '$email' , '$pass' , 'N' , '' , '$date' , '$time')";
		if ($connect->query($q1) === TRUE) 
		{
			sleep(2);
			echo "<script>
						window.location.href='mailsentforsignup.php';
				</script>";
		}
		else 
		{
			echo "Error: " . $q1 . "<br>" . $connect->error;
		}
	}
}

?>