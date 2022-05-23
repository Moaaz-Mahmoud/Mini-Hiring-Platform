<?php

session_start();
// Connect
$conn = mysqli_connect("localhost", "root", "");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
mysqli_query($conn, "USE hiring_platform;");

$candidate_id = "SELECT id FROM candidates WHERE name = \"" . $_SESSION['username'] . "\";";
// echo $hiring_manager_id . "<br>";
$candidate_id = mysqli_query($conn, $candidate_id);
$candidate_id = mysqli_fetch_assoc($candidate_id)['id'];

$_SESSION['candidate_id'] = $candidate_id;

// var_dump($_SESSION);

$sent_invitations = "
SELECT hm.name AS `HiringManager`,
	     tmp.name AS `Role`,
       inv.id
FROM invitations inv
     JOIN templates tmp
     ON inv.template_id = tmp.id
     JOIN hiring_managers hm
     ON inv.hiring_manager_id = hm.id
WHERE inv.candidate_id = $candidate_id AND
	    inv.invitation_status = 'sent';
";
$sent_invitations = mysqli_query($conn, $sent_invitations);

$finished_invitations = "
SELECT hm.name AS `HiringManager`, 
	     tmp.name AS `Role`, 
       inv.score AS `Score`
FROM invitations inv
     JOIN templates tmp
     ON inv.template_id = tmp.id
     JOIN hiring_managers hm
     ON inv.hiring_manager_id = hm.id
WHERE inv.candidate_id = $candidate_id AND
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
        <link rel="stylesheet" href="cd-dashboard.css">
        <script>
            function hardFrontend(){
                window.location.href = "hard-frontend.html"
            }
            function hardDevOps(){
                window.location.href = "hard-devops.html"
            }
        </script>
    </head>
    <body>
        <nav>
            <div class="menu">
            <div class="logo">
                <a href="home.html">Mini Hiring Platform</a>
            </div>
            <ul>
                <li><a href="about.html">About</a></li>
            </ul>
            </div>
        </nav>
        <div class="center">
            <div>
              <div>
                <h2>Available Assessments</h2>
              </div>
              <!-- Sent -->
              <table>
                    <thead>
                        <tr>
                            <th>Hiring Manager</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <?php
                    $i = 0;
                    while($row = mysqli_fetch_assoc($sent_invitations)){
                        $i = $i + 1;
                        if($i == 1){
                    ?>
                    <tr class="clickable" onclick="hardFrontend()">
                        <td><?= $row['HiringManager']?></td>
                        <td><?= $row['Role']?></td>
                        <?php
                        // $_SESSION['assessment'] = 
                        ?>
                    </tr>
                    <?php
                        }
                        else{
                    ?>
                    <tr class="clickable" onclick="hardDevOps()">
                        <td><?= $row['HiringManager']?></td>
                        <td><?= $row['Role']?></td>
                        <?php
                        // $_SESSION['assessment'] = 
                        ?>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
                <div>
                    <h2>Finished Assessments</h2>
                </div>
                <!-- Finished -->
                <table>
                    <thead>
                        <tr>
                            <th>Hiring Manager</th>
                            <th>Role</th>
                            <th>Score</th>
                        </tr>
                    </thead>
                    <?php
                    while($row = mysqli_fetch_assoc($finished_invitations)){
                    ?>
                    <tr>
                        <td><?= $row['HiringManager']?></td>
                        <td><?= $row['Role']?></td>
                        <td><?= $row['Score']?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
          </div>
    </body>
</html>

