<?php

$fullname = $_POST['fullname'];
	$username = $_POST['username'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$phone = $_POST['phone'];

    $conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {



		$resultGet = mysqli_query($conn, "SELECT * FROM register where username='$username'");
		$rows = mysqli_num_rows($resultGet);
		
		if ($rows > 0) {
			echo '<script>
alert("Username already registered");
window.location.href="register.html";
</script>';

exit;
			
		}

		$encodePassword=password_hash($_REQUEST['password'], PASSWORD_BCRYPT);



		$stmt = $conn->prepare("insert into register(fullname, username, gender, email, password, phone) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $fullname, $username, $gender, $email, $encodePassword, $phone);



		$execval = $stmt->execute();
	
	
		echo $execval;
	 
 
		echo '<script>
		alert("Register Successfully");
		window.location.href="/Medi-Care/login.html	";
		</script>';
		

      exit;
	



		$stmt->close();
		$conn->close();
	}
    ?>