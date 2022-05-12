<?php

// Get the form fields.
$name = $_POST['name'];
$prompt = $_POST['prompt'];
$difficulty = $_POST['difficulty'];
$language = $_POST['language'];
$solution = $_POST['solution'];
$hiring_manager_id = 999;
echo $name . '<br>';
echo $prompt . '<br>';
echo $difficulty . '<br>';
echo $language . '<br>';
echo $solution . '<br>';

// Connect
$conn = mysqli_connect("localhost", "root", "");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
mysqli_query($conn, "USE hiring_platform;");

// Compose the query to register add the scenario
$id = mysqli_query($conn, "SELECT MAX(id) FROM scenarios;");
$id = 1 + mysqli_fetch_assoc($id)["MAX(id)"];
echo $id . '<br>';
$query = "
INSERT INTO scenarios(id, name, problem_prompt, difficulty, 
solution, used_language, hiring_manager_id)
VALUES(" . 
$id . ", \"" . $name . "\", \"" . $prompt . "\", \"" . 
$solution . "\", \"" . $language . "\", \"" . $difficulty .
"\", " . $hiring_manager_id .
");";
echo $query . '<br>';
// mysqli_query($conn, $query) . '<br>';

?>