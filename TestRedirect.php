<?php
	session_start();
	if(!$_SESSION['username'])
	{
		header('location:Login.php');
	}
	else
	{
		echo "Welcome ".$_SESSION['username']."..You’re authenticated..";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Gmail_Clone</title>
</head>
<body>
	<h1>Welcome</h1>
	<form method="post">
		<input type="submit" name="Logout" value="Logout">
	</form>
</body>
</html>
<?php
if(isset($_POST['Logout']))
{
	session_unset();
    session_destroy();
    header('location:Login.php');
}
?>