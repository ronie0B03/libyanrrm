<?php
	include('dbh.php');
	if(isset($_POST['register'])){
		echo $fname = ucfirst($_POST['fname']);
		echo $lname = ucfirst($_POST['lname']);
		echo $email = strtolower($_POST['email']);
		echo $password1 = $_POST['password1'];
		echo $password2 = $_POST['password2'];

		$checkUser = $mysqli->query("SELECT * FROM users WHERE email='$email' ");
		if(mysqli_num_rows($checkUser)>0){
			$_SESSION['registerError'] = "Email already taken. Please try another.";
			header("location: register.php?fname=".$fname."&lname=".$lname);
		}
		else if($password1!=$password2){
			$_SESSION['registerError'] = "Password not match. Please try again.";
			header("location: register.php?fname=".$fname."&lname=".$lname."&email=".$email);
		}
		else{
			$mysqli->query(" INSERT INTO users ( firstname, lastname, email, password) VALUES('$fname','$lname','$email','$password1') ") or die ($mysqli->error());

			$_SESSION['loginError'] = "User Account Creation Successful!";
			header("location: login.php");
		}
	}
?>