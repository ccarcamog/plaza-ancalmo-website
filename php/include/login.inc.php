<?php 
	if(isset($_POST['login-submit'])){

		require "../credentials.php";
		require "../db.php";
		
		$db = new db($dbHost, $dbUID, $dbPWD, $dbName);

		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM `user-login` WHERE username=? OR mail=?";

		$row = $db->query($sql, $username, $username)->fetchArray();
		
		$pwdCheck = false;
		
		if($row){	
			$pwdCheck = password_verify($password."".$row['salt'], $row['password']);
		}else{
			header("Location: /backpanel/login.php?error=nouser");
			exit();
		}

		if($pwdCheck != true){
			
			header("Location: /backpanel/login.php?error=wrongpwd");
			exit();
		}

		session_start();
		$_SESSION['username'] = $row['username'];
		$_SESSION['email'] = $row['email'];

		header("Location: /backpanel/login.php?login=success");

	}else{	
		header("Location: ../../");
		exit();
	}
?>