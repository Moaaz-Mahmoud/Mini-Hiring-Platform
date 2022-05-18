<?php

$_POST["username"] = strtolower($_POST["username"]);
$_POST["password"] = strtolower($_POST["password"]);
$_POST["password-check"] = strtolower($_POST["password-check"]);

echo $_POST["username"] . "--" . $_POST["password"] . "--" . $_POST["password-check"] . "<br>";

// Connect
$servername = "localhost";
$username = "root";
$password = "";
$conn = mysqli_connect($servername, $username, $password);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Validate the operation—count must be 0 and passwords must match
$cnt = mysqli_query($conn, "USE hiring_platform;");
$cnt = mysqli_query($conn, 
  "SELECT COUNT(*) AS cnt " .
  "FROM hiring_managers " .
  "WHERE name = \"" . $_POST["username"] . "\";"
);
$cnt = mysqli_fetch_assoc($cnt);
echo $cnt["cnt"] . " " . "<br>";
$pass_match = ($_POST["password"] == $_POST["password-check"]);
echo $pass_match . "<br>";
if($cnt["cnt"] != "0"){
  die('User already exists!');
}
if(!$pass_match){
  die('Passwords do not match!');
}

// Register new user
$id = mysqli_query($conn, "SELECT MAX(id) FROM hiring_managers;");
$id = mysqli_fetch_assoc($id)["MAX(id)"] + 1;
echo $id . "<br>";
$query = 
  "INSERT INTO hiring_managers(id, name, candidate_id, scenario_id, template_id) " .
  "VALUES(" . $id  . ", \"" . $_POST['username'] . "\", NULL, NULL, NULL);";
mysqli_query($conn, $query);

$query = 
  "INSERT INTO hiring_managers_accounts(id, user_name, encrypted_password, hiring_manager_id)" .
  "VALUES(" . $id . ", \"" . $_POST['username'] . "\", \"" . $_POST['password'];
$query = $query . "\", " . $id . ");";
mysqli_query($conn, $query);

$conn -> close();

?>
