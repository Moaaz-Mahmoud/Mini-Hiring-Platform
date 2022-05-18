<?php

session_start();
// Connect
$conn = mysqli_connect("localhost", "root", "");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
mysqli_query($conn, "USE hiring_platform;");

// Get the form fields.
$name = $_POST['name'];
$prompt = $_POST['prompt'];
$difficulty_level = $_POST['difficulty'];
$language = $_POST['language'];
$solution = $_POST['solution'];
// $hiring_manager_id → to be retrieved later using a query.
// echo $name . '<br>';
// echo $prompt . '<br>';
// echo $difficulty_level . '<br>';
// echo $language . '<br>';
// echo $solution . '<br>';

mysqli_query($conn, "USE hiring_platform;");

// Get the hiring manager ID
$hiring_manager_id = $_SESSION['hiring_manager_id'];

// Compose the query to register add the scenario
$id = mysqli_query($conn, "SELECT MAX(id) FROM scenarios;");
$id = 1 + mysqli_fetch_assoc($id)["MAX(id)"];
// echo $id . '<br>';
$query = "
INSERT INTO scenarios(id, name, problem_prompt, difficulty_level, 
                      solution, used_language, hiring_manager_id)
VALUES($id, '$name', '$prompt', '$difficulty_level', '$solution', 
      '$language', '$hiring_manager_id');"; 
// echo $query . '<br>';
mysqli_query($conn, $query) . '<br>';

?>
