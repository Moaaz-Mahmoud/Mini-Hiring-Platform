<?php

$username = strtolower($_POST["username"]);
$password = strtolower($_POST["password"]);
session_start();
$_SESSION['username'] = $username;

echo $_POST["username"] . "--" . $_POST["password"] . "--" . "<br>";

// Connect
$conn = mysqli_connect("localhost", "root", "");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Validate the username and password
$valid = mysqli_query($conn, "USE hiring_platform;");
$query = "
  SELECT  COUNT(*)
  FROM    hiring_managers_accounts
  WHERE   user_name = '$username' AND
          encrypted_password = '$password';
";
$valid = mysqli_query($conn, $query);
echo $query . "<br>";
$valid = mysqli_fetch_assoc($valid)["COUNT(*)"];
echo $valid;
if($valid != 1){
  die("Invalid credentials!<br>");
}

// Load the page
header("Location: hm-dashboard.php");


$mysqli -> close();

?>
