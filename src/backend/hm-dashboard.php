<?php

session_start();
// Connect
$conn = mysqli_connect("localhost", "root", "");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
mysqli_query($conn, "USE hiring_platform;");

$hiring_manager_id = "SELECT id FROM hiring_managers WHERE name = \"" . $_SESSION['username'] . "\";";
// echo $hiring_manager_id . "<br>";
$hiring_manager_id = mysqli_query($conn, $hiring_manager_id);
$hiring_manager_id = mysqli_fetch_assoc($hiring_manager_id)['id'];

$_SESSION['hiring_manager_id'] = $hiring_manager_id;

// var_dump($_SESSION);

$sent_invitations = "
SELECT inv.candidate_id, tmp.name
FROM invitations inv
JOIN templates tmp
ON inv.template_id = tmp.id
WHERE inv.hiring_manager_id = $hiring_manager_id AND
      inv.invitation_status = 'sent';
";
$sent_invitations = mysqli_query($conn, $sent_invitations);

$finished_invitations = "
SELECT inv.candidate_id, tmp.name, inv.score
FROM invitations inv
JOIN templates tmp
ON inv.template_id = tmp.id
WHERE inv.hiring_manager_id = $hiring_manager_id AND
      inv.invitation_status = 'finished';
";
$finished_invitations = mysqli_query($conn, $finished_invitations);

?>




<!DOCTYPE html>
<!-- Template By CodingNepal - www.codingnepalweb.com -->
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mini Hiring Platform – Home</title>
        <link rel="stylesheet" href="hm-dashboard.css">
        <script>
            function createTemplateBtn(){
                window.location.href = "hm-create-template.php"
            }
            function inviteCandidateBtn(){
                window.location.href = "hm-invite-candidate.php"
            }
            function createScenarioBtn(){
                window.location.href = "hm-create-scenario.php"
            }
        </script>
    </head>
    <body>
        <nav>
            <div class="menu">
            <div class="logo">
                <a href="hm-home.html">Mini Hiring Platform</a>
            </div>
            <ul>
                <li><a href="about.html">About</a></li>
            </ul>
            </div>
        </nav>
        <div class="center">
            <div class="btns">
                <button id="add-temp-btn" onclick="createTemplateBtn()">Create Template</button>
                <button id="inv-cand-btn" onclick="inviteCandidateBtn()">Invite Candidate</button>
                <button id="add-scen-btn" onclick="createScenarioBtn()">Create Scenario</button>
            </div>
            <div>
                <!-- Sent -->
                <table>
                    <thead>
                        <tr>
                            <th>Candidate ID</th>
                            <th>Assessment</th>
                        </tr>
                    </thead>
                    <?php
                    while($row = mysqli_fetch_assoc($sent_invitations)){
                    ?>
                    <tr>
                        <td><?= $row['candidate_id']?></td>
                        <td><?= $row['name']?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
                <!-- Finished -->
                <table>
                    <thead>
                        <tr>
                            <th>Candidate ID</th>
                            <th>Assessment</th>
                            <th>Score</th>
                        </tr>
                    </thead>
                    <?php
                    while($row = mysqli_fetch_assoc($finished_invitations)){
                    ?>
                    <tr>
                        <td><?= $row['candidate_id']?></td>
                        <td><?= $row['name']?></td>
                        <td><?= $row['score']?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
          </div>
    </body>
</html>

