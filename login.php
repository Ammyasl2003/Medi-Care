
<?php

$username = $_POST['username'];
$password = $_POST['password'];


$conn = new mysqli('localhost', 'root','', 'test');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
} else {




    $resultGet = mysqli_query($conn, "SELECT * FROM register where username='$username'");
  $rows = mysqli_num_rows($resultGet);
  $datas = mysqli_fetch_assoc($resultGet);

  if ($rows > 0) {


        if (password_verify($password, $datas['password'])) {


           

            // header('Location: /HOTEL/ammy.html ');
            header('Location: /Medi-Care/ammy.html	');

            exit;

        }
        
    } else {
        echo "<h2>Invalid Email or password</h2>";
    }
}



?>