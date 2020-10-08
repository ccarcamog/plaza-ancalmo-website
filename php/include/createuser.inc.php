<?php 

	if(isset($_POST["createuser-submit"])){

		require "dbh.inc.php";
		require "salt.php";

		$username 	= $_POST['username'];
		$mail 		= $_POST['mail'];
		$password	= $_POST['password'];
		$passwordRepeat = $_POST['password-repeat'];
		if($password != $passwordRepeat){
			header("Location: ../../backpanel/create-user.php?error=nomatch");
			exit();
		}

		$sql = "SELECT username FROM `user-login` WHERE username=?";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: ../../backpanel/create-user.php?error=sqlerror1");
			exit();
		}

		mysqli_stmt_bind_param($stmt,"s", $username);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);

		$resultCheck = mysqli_stmt_num_rows($stmt); 

		if($resultCheck > 0){
			header("Location: ../../backpanel/create-user.php?error=usertaken&mail=".$mail);
			exit();
		}

		$sql = "INSERT INTO `user-login` (username, mail, salt, password) VALUES (?,?,?,?)"; 
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: ../../backpanel/create-user.php?error=sqlerror");
			exit();
		}
		$salt = generate_random_string();
		$pwdHashed = password_hash($password."".$salt, PASSWORD_DEFAULT);

		mysqli_stmt_bind_param($stmt, "ssss", $username, $mail, $salt, $pwdHashed);
		mysqli_stmt_execute($stmt);
		// $stmt->execute();
		echo mysqli_error($conn);

		header("Location: ../../backpanel/create-user.php?signup=success");

		mysqli_stmt_close($stmt);
		mysqli_close($conn);

	}else{

		header("Location: ../../");

	}

?>