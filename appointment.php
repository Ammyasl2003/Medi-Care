<?php

$name = $_POST['name'];
	$doctor = $_POST['doctor'];

	$email = $_POST['email'];
	
	$phone = $_POST['phone'];
    $dates= $_POST['date'];
$message=$_POST["message"]; 

    $conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {


		$query = "insert into appointment(name,doctor,email,phone,date,message) VALUES ('$name','$doctor','$email','$phone','$dates','$message')";
	$result= mysqli_query($conn, $query);
	
	
	echo '<script>
	alert("Appointment Booked Successfully");
	window.location.href="/Medi-care/doctor.html";
	</script>';
		
	
		mysqli_close($conn);
	}
    ?>