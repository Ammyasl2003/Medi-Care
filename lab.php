<?php

$Name = $_POST['Name'];
	$test = $_POST['test'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	
	$phone = $_POST['phone'];
    $date=$_POST['date'];

    $conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {




		$stmt = $conn->prepare("insert into lab(Name, test, gender, email, phone, date) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $Name, $test, $gender, $email, $phone, $date);



		$execval = $stmt->execute();
	
	
		echo $execval;


		header('Location: /Medi-care/lab.html');

      exit;





		$stmt->close();
		$conn->close();
	}
    ?>