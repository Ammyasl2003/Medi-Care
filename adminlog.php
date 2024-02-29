
<?php

$username = $_POST['username'];
$password = $_POST['password'];


$conn = new mysqli('localhost', 'root','', 'test');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
} else {




    $resultGet = mysqli_query($conn, "SELECT * FROM mylogin where username='$username'");  //checking
  $rows = mysqli_num_rows($resultGet);
  $datas = mysqli_fetch_assoc($resultGet);

  if ($rows > 0) {


        


           

            header('Location: /Medi-Care/admin.html ');

            exit;

        }
    }



?>