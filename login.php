<html>
<body>

<?php
session_start();
?>

<?php
if (isset($_POST['submit'])){
	$message = NULL;
	if ($_POST['user'] == 'yuribanawa'){
		$message = NULL;
		$_SESSION['user'] = $_POST['user'];
	} else {
		$message.="Invalid Username";
	}
	
	if($_POST['pass'] == 'yurib') {
		$message = NULL;
		$_SESSION['pass'] = $_POST['pass'];
	} else {
		$message.="Invalid Password";
	}
	
	if (isset($message)){
		echo $message;
	} 
}
?>

<form method="post">
Username: <input type="text" name="user"> <br>
Password: <input type="password" name="pass"> <br>
<input type="submit">
</form>

</body>
</html>