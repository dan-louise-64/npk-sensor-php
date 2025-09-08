<?php
// Include database configuration file  
include '../src/connection.php';

if (!isset($_POST['username'], $_POST['password'])) {
  exit('Please complete the registration form!');
}
if (empty($_POST['username']) || empty($_POST['password'])) {
  exit('Please complete the registration form');
}

if ($stmt = $mysqli->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
  $stmt->bind_param('s', $_POST['username']);
  $stmt->execute();
  $stmt->store_result();
  if ($stmt->num_rows > 0) {
    echo 'Username exists, please choose another!';
  } else {
    if ($stmt = $mysqli->prepare('INSERT INTO accounts (username, password) VALUES (?, ?)')) {
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $stmt->bind_param('ss', $_POST['username'], $password);
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
