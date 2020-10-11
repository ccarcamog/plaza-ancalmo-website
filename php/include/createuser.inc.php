<?php 

	if(isset($_POST["createuser-submit"])){

		require "../credentials.php";
		require "../db.php";
		require "salt.php";

		$db = new db($dbHost, $dbUID, $dbPWD, $dbName);

		$username 	= $_POST['username'];
		$mail 		= $_POST['mail'];
		$password	= $_POST['password'];
		$passwordRepeat = $_POST['password-repeat'];
		if($password != $passwordRepeat){
			header("Location: ../../backpanel/create-user.php?error=nomatch");
			exit();
		}

		$sql = "SELECT username FROM `user-login` WHERE username=?";
		
		$users = $db->query($sql, $username);

		$resultCheck = $users->numRows(); 

		if($resultCheck > 0){
			header("Location: ../../backpanel/create-user.php?error=usertaken&mail=".$mail);
			exit();
		}

		$sql = "INSERT INTO `user-login` (username, mail, salt, password) VALUES (?,?,?,?)"; 
	
		$salt = generate_random_string();
		$pwdHashed = password_hash($password."".$salt, PASSWORD_DEFAULT);

		$db->query($sql,$username, $mail, $salt, $pwdHashed);

		header("Location: ../../backpanel/create-user.php?signup=success");

		$db->close();

	}else{

		header("Location: ../../");

	}

?>