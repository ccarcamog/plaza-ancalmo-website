<?php 
	if(isset($_POST['login-submit'])){

		require "dbh.inc.php";
		
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM `user-login` WHERE username=? OR mail=?";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("Location: /backpanel/login.php?error=sqlerror");
			exit;
		}

		mysqli_stmt_bind_param($stmt, "ss", $username, $username);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		
		$pwdCheck = false;
		$row;
		if($row = mysqli_fetch_assoc($result)){	
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