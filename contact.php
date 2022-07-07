<?php
// echo $contact->send();
$name = $_POST['firstName'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'Kreena');
if ($conn->connect_error) {
	die('Connection Failed : ' . $conn->connect_error);
} else {
	$stmt = $conn -> prepare("insert into KreenaData($name,$email,$subject,$message) values(?,?,?,?)");
	$stmt->bind_param("ssss",$name,$email,$subject,$message);
	$stmt->execute();
	echo "Your message send";
	$stmt->close();
	$conn->close();
	// $stmt = $conn->prepare("insert into registration(firstName, lastName, gender, email, password, number) values(?, ?, ?, ?, ?, ?)");
	// $stmt->bind_param("ssss", $firstName, $email, $subject, $message);
	// $execval = $stmt->execute();
	// echo $execval;
	// echo "Registration successfully...";
	// $stmt->close();
	// $conn->close();
}
