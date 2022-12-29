<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	// $gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	// $number = $_POST['number'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName, email, password) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $firstName, $lastName, $email, $password,);
		$execval = $stmt->execute();
		echo $execval;
		header("Location: loading.html");
		exit();
		$stmt->close();
		$conn->close();
	}
?>