<?php
	$loginError = "";
	if (isset($_POST['Login']))
	{ 
		include ('Database.php');
		$db = new Database();
		$user = $db->loginUsers($_POST['username'], $_POST['password']);
		if(!empty($user)) 
		{
			//echo var_dump($user);
			session_start();
			$_SESSION['username'] = 'true';
			$_SESSION['username'] = $user[0]['User_Name'];
			header("Location:TestRedirect.php");
		} 
		else
		{
			$loginError = "Invalid username or password!";
		}
	}
	else
	{
		$loginError = "";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="scripts.js"></script>
	<title>Gmail Clone</title>
</head>
<body>
	<div align="center">
		<form name="demo" action="<?php $_SERVER['PHP_SELF'] ?>" onsubmit="return checkEmptyTextBox();" method="post">
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			<table style="border:thin solid black">
				<tr>
					<td>Enter Email : </td>
					<td>
						<input type="text" name="username" id='username' placeholder="Email"><br>
						<div>
							<span id="EmailError" style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;display: none;color: red ">
								<img src="img/WarningIcon.png" id="WarningIcon" height=14px width=14px>
								Enter an email
							</span>	
						</div>
					</td>
				</tr>
				<tr>
					<td><br>Enter Passeord : </td>
					<td>
						<br><input type="password" name="password" id = 'password' placeholder="Password"><br>
						<div>
							<span id="PasswordError" style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;display: none;text-align: center;color: red">
								<img src="img/WarningIcon.png" id="WarningIcon" height=14px width=14px>
								Enter an Password
							</span>
						</div>	
					</td>
				</tr>
				<tr>
					<td align="center" colspan="2"><br>
						<button type="submit" name="Login" >Login</button>
					</td>
				</tr>
				<tr>
					<td colspan="2"><span style="color:red; text-align: center;"><?php  echo $loginError;?></span></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>