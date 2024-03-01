<?php

$name = $_POST['name'];
	$tests = $_POST['test'];

	$email = $_POST['email'];
	
	$phone = $_POST['phone'];
    $dates= $_POST['date'];
 	$gender=$_POST["gender"]; 

    $conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {


		$query = "insert into labbook(name,test,email,phone,date,gender) VALUES ('$name','$tests','$email','$phone','$dates','$gender')";
	$result= mysqli_query($conn, $query);
	
	
	echo '<script>
		alert("Lab Test Booked Successfully");
		window.location.href="/Medi-care/lab.html";
		</script>';
		
		
	
		mysqli_close($conn);
	}
    ?>