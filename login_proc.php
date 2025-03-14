<?php
session_start();
include 'connect.php';

$email = $_POST['txtEmail'];
$pword = $_POST['txtPword'];

$sql = "SELECT * FROM users_tbl WHERE u_email = '$email'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($email == $row['u_email'] && $pword == $row['u_pword'])
{
	$_SESSION["id"] = $row['u_id'];
	$_SESSION["lname"] = $row['u_lname'];
	$_SESSION["fname"] = $row['u_fname'];
	$_SESSION["mname"] = $row['u_mname'];
	$_SESSION["email"] = $row['u_email'];
	$_SESSION["level"] = $row['u_level'];
?>
	<script>
	  alert("Login Successful");
	  location.replace("dashboard.php");
	</script>
<?	
}
else 
{
	
?>
	<script>
	  alert("Login Failed");
	  location.replace("index.php");
	</script>
<?php
}
?>