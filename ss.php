<?php
$alert = false;
$status = "alert-success";
$mainMessage = "Error";
$message = "This is a success alert—check it out!";
// The request is using the POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // handle user data

  $email = $_REQUEST['email'];
  $password = $_REQUEST['password'];



  if ((is_null($email)) || (is_null($password))) {

    $alert = true;
    $mainMessage = "Warning !";
    $status = "alert-warning";
    $message = "Please Fill All the Fields Properly ";
  }


  // check whether user already registered or not 

  require('./database/connection.php');
  $resultGet = mysqli_query($connection, "SELECT * FROM users where email='$email'");
  $rows = mysqli_num_rows($resultGet);
  $datas = mysqli_fetch_assoc($resultGet);
  if ($rows > 0) {

    // verify password
    if (password_verify($password, $datas['password'])) {
      // login success
      // session created
      session_start();
      $_SESSION['activeUserId'] = $datas['id'];
      $_SESSION['activeUserEmail'] = $datas['email'];
      $_SESSION['activeUserDob'] = $datas['dob'];
echo  gettype($datas['dob']);

      $alert = true;
      $mainMessage = "Success !";
      $status = "alert-success";
      $message = "User Login SuccessFully ";
      $_REQUEST['email'] = "";
      $_REQUEST['password'] = "";
      header('Location: /birthdayTracker/');

      exit;
    }
    //    password not correct
    else {
      $alert = true;
      $mainMessage = "Warning !";
      $status = "alert-warning";
      $message = "Password Not Correct";
    }


    //    user not exits
  } else {



    $alert = true;
    $mainMessage = "Duplicate account Warning !";
    $status = "alert-warning";
    $message = "Account Not Exits with this Email";

    $_REQUEST['email'] = "";
  }
  mysqli_close($connection);


  $rows = null;
}


?>


<!DOCTYPE html>
<html lang="en">
<?php require('./components/HeadTag.php'); ?>

<body>
  <?php if ($alert) {
    echo "<div class=\"alert $status alert-dismissible fade show\" role=\"alert\">
  <strong>$mainMessage</strong> $message
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
    <span aria-hidden=\"true\">&times;</span>
  </button>
</div>";
  } ?>
  <div class="container w-50 p-3 mt-5 shadow p-3 mb-5 bg-white rounded pt-5">


    <form action="Login.php" method="POST">
      <!-- Email input -->
      <div class="form-outline mb-4">
        <label class="form-label" for="form2Example1">Email address</label>
        <input type="email" id="form2Example1" class="form-control" name="email" required maxlength="40" value="<?php if (isset($_REQUEST['email'])) {
                                                                                                                  echo $_REQUEST['email'];
                                                                                                                } ?>" />
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4">
        <label class="form-label" for="form2Example2">Password</label>
        <input type="password" id="form2Example2" class="form-control" name="password" required maxlength="30" />
      </div>

      <!-- 2 column grid layout for inline styling -->
      <div class="row mb-4">
        <div class="col d-flex justify-content-center">
          <!-- Checkbox -->
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked required />
            <label class="form-check-label" for="form2Example31"> Remember me </label>
          </div>
        </div>

        <div class="col">
          <!-- Simple link -->
          <a href="#!">Forgot password?</a>
        </div>
      </div>

      <!-- Submit button -->
      <input type="submit" value="Sign in" class="btn btn-primary btn-block mb-4" />
      <!-- Register buttons -->
      <div class="text-center">
        <p>Not have account? <a href="/birthdayTracker/Signup.php">Register</a></p>
        <p>or sign up with:</p>
        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-facebook-f"></i>
        </button>

        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-google"></i>
        </button>

        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-twitter"></i>
        </button>

        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-github"></i>
        </button>
      </div>
    </form>
  </div>


  <?php require('./components/BootstrapJavascript.php'); ?>
  <!-- prevent page from re-submit data on page refresh -->
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</body>

</html>