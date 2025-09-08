<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
  header('Location: index.php');
  exit;
}
// Include database configuration file  
include 'src/connection.php';

$stmt = $mysqli->prepare('SELECT password FROM accounts WHERE id = ?');
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html>

<head>
  <title>Profile Page</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="layouts/style.css">
</head>

<body class="loggedin">
  <?php include("layouts/navbar.php");
  ?>
  <div class="container-fluid">
    <div class="row">
      <?php include("layouts/sidebar.php");
      ?>
      <?php include("profile-content.php");
      ?>
    </div>
  </div>
</body>

</html>