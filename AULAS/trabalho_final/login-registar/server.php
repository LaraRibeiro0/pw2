<?php
session_start();

// initializing variables
$nomeUtilizador = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'Kll');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $nomeUtilizador = mysqli_real_escape_string($db, $_POST['nomeUtilizador']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $senha_1 = mysqli_real_escape_string($db, $_POST['senha_1']);
  $senha_2 = mysqli_real_escape_string($db, $_POST['senha_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($nomeUtilizador)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($senha_1)) { array_push($errors, "Password is required"); }
  if ($senha_1 != $senha_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE nomeUtilizador='$nomeUtilizador' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['nomeUtilizador'] === $nomeUtilizador) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$senha = md5($senha_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (nomeUtilizador, email, senha) 
  			  VALUES('$nomeUtilizador', '$email', '$senha')";
  	mysqli_query($db, $query);
  	$_SESSION['nomeUtilizador'] = $nomeUtilizador;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

if (isset($_POST['login_user'])) {
  $nomeUtilizador = mysqli_real_escape_string($db, $_POST['nomeUtilizador']);
  $senha = mysqli_real_escape_string($db, $_POST['senha']);

  if (empty($nomeUtilizador)) {
    array_push($errors, "Username is required");
  }
  if (empty($senha)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $senha = md5($senha);
    $query = "SELECT * FROM users WHERE nomeUtilizador='$nomeUtilizador' AND senha='$senha'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['nomeUtilizador'] = $nomeUtilizador;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
    }else {
      array_push($errors, "Wrong nomeUtilizador/senha combination");
    }
  }
}

?>