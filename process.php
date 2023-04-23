<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];

	
// Database connection
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "contact";

	$conn = new mysqli($servername, $username, $password, $dbname);
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(name, email, message) values(?, ?, ?)");
		$stmt->bind_param("sss", $name, $email, $message);
		$execval = $stmt->execute();
		echo $execval;
		echo "<script type='text/javascript'>
				window.alert('Merci beaucoup $name pour votre message');
				window.open('index.html');
			  </script>";//"<script type='text/javascript'>alert('شكرا $name على الرسالة>');</script>";
		$stmt->close();
		$conn->close();
	}
?>