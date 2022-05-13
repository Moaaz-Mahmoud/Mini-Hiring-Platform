<?php

session_start();

$candidate_id = $_POST['candidate-id'];
$assessment = $_POST['assessment'];
$hiring_manager_id = $_SESSION['hiring_manager_id'];

// Connect
$conn = mysqli_connect("localhost", "root", "");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
mysqli_query($conn, "USE hiring_platform;");

// Prepare the data for the query
$status = "sent";

$template_id = "SELECT id FROM templates WHERE name = '$assessment';";
echo $template_id . "<br>";
$template_id = mysqli_query($conn, $template_id);
var_dump(mysqli_fetch_assoc($template_id));
$template_id = mysqli_fetch_assoc($template_id)['id'];

$id = "SELECT COUNT(*) FROM invitations";
$id = mysqli_query($conn, $id);
$id = mysqli_fetch_assoc($id)['COUNT(*)'] + 1;
echo $id . "<br><br><br>";

echo  $candidate_id      . "<br>"
    . $hiring_manager_id . "<br>"
    . $id                . "<br>"
    . $status            . "<br>"
    . $template_id       . "<br>";

// Save the assessment
$query = "
INSERT INTO invitations(id, 
                        hiring_manager_id,
                        candidate_id,
                        template_id,
                        invitation_status)
VALUES($id,
       $hiring_manager_id,
       $candidate_id,
       $template_id,
      '$status');
";

?>