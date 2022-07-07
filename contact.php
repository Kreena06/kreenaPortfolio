<?php
// echo $contact->send();
$name = $_POST['firstName'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'Kreena');
if (mysqli_connect_error()) {
	echo "Cannot connect";
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
