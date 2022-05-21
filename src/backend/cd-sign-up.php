<?php

// Connect
$servername = "localhost";
$username = "root";
$password = "";
$conn = mysqli_connect($servername, $username, $password);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$_POST["username"] = strtolower($_POST["username"]);
$_POST["password"] = strtolower($_POST["password"]);
$_POST["password-check"] = strtolower($_POST["password-check"]);

$username = $_POST["username"];
$password = $_POST["password"];

echo $_POST["username"] . "--" . $_POST["password"] . "--" . $_POST["password-check"] . "<br>";


// Validate the operation—count must be 0 and passwords must match
$cnt = mysqli_query($conn, "USE hiring_platform;");
$cnt = mysqli_query($conn, 
  "SELECT COUNT(*) AS cnt " .
  "FROM candidates " .
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
$id = mysqli_query($conn, "SELECT MAX(id) FROM candidates;");
$id = mysqli_fetch_assoc($id)["MAX(id)"] + 1;
echo $id . "<br>";

$register = "
INSERT INTO candidates(id, name)
VALUES($id, '$username');
";
mysqli_query($conn, $register);
$register = "
INSERT INTO candidates_accounts(id, user_name, encrypted_password, candidate_id)
VALUES($id, '$username', '$password', $id);
";
mysqli_query($conn, $register);

$conn -> close();

?>
