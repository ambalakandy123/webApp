<?php
session_start();

// initializing variables
$name = "";
$uname = "";
$email    = "";
$address = "";
$phone = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'jc638254', 'Password254', 'jc638254');

if (isset($_POST['login_user'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($email)) {
  	array_push($errors, "email is required");
  }
  
  $email = test_input($_POST["email"]);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  array_push($errors, "Invalid email format");
}
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['email'] = $email;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: apanel/index.php');
  	}else {
  		array_push($errors, "Wrong email/password combination");
  	}
  }
}

?>
