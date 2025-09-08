<?php
$servername = "REPLACEME";
$username = "REPLACEME";
$password = "REPLACEME";
$dbname = "REPLACEME";

$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}
