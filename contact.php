<?php

$Name = $_POST['name'];

	$email = $_POST['email'];
	
$message= $_POST['message'];


    $conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {


		$query = "insert into contact(Name,email,message) VALUES ('$Name','$email','$message')";
	$result= mysqli_query($conn, $query);
	
	
	
			header("Location: /Medi-care/ammy.html");
	
		mysqli_close($conn);
	}
    ?>