<?php include_once("./db_connect.php");?>
<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$fname    = "";
$lname    = "";
$phone    = "";
$errors = array();


// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $fname = mysqli_real_escape_string($conn, $_POST['fname']);
  $lname = mysqli_real_escape_string($conn, $_POST['lname']);
  $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($phone)) { array_push($errors, "Phone is required"); }
  if (empty($fname)) { array_push($errors, "First name is required"); }
  if (empty($lname)) { array_push($errors, "Last name is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  if (strlen($password_1)<8){
    array_push($errors, "Password has to contain no less than 8 letters");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email

  $user_check_query = "SELECT * FROM public_database WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
//  	$password = md5($password_1);//encrypt the password before saving in the database
    $query = "SELECT MAX(id) from public_database";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);
    $id = 1;
    if ($row) {
        $id = $row[0] + 1;
    }
  	$query = "INSERT INTO public_database (id, first_name, last_name, email, phone, username, password)
  			  VALUES('$id', '$fname', '$lname', '$email', '$phone','$username', '$password_1')";
  	mysqli_query($conn, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: whole_market.html');
  }
}



?>
