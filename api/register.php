<?php
// Include database configuration file  
include '../src/connection.php';

if (!isset($_POST['username'], $_POST['email'], $_POST['password1'], $_POST['password2'])) {
  exit('Please complete the registration form!');
}
if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password1']) || empty($_POST['password2'])) {
  exit('Please complete the registration form');
}
if (!($_POST['password1'] === $_POST['password2'])) {
  echo "Retype your password";
}

if ($stmt = $mysqli->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
  $stmt->bind_param('s', $_POST['username']);
  $stmt->execute();
  $stmt->store_result();
  if ($stmt->num_rows > 0) {
    echo 'Username exists, please choose another!';
  } else {
    if ($stmt = $mysqli->prepare('INSERT INTO accounts (username, email, password) VALUES (?, ?, ?)')) {
      $password = password_hash($_POST['password1'], PASSWORD_DEFAULT);
      $stmt->bind_param('sss', $_POST['username'], $_POST['email'], $password);
      $stmt->execute();
      echo 'You have successfully registered! You can now login!';
      header('Location: ../index.php');
    } else {
      echo 'Could not prepare statement!';
      header('Location: ../index.php');
    }
  }
  $stmt->close();
} else {
  echo 'Could not prepare statement!';
  header('Location: ../index.php');
}
$mysqli->close();
