<?php

session_start();
// Connect
$conn = mysqli_connect("localhost", "root", "");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
mysqli_query($conn, "USE hiring_platform;");

// Get the data from the session
$hiring_manager_id = $_SESSION['hiring_manager_id'];

// Retrieve the assessments for this manager
$assessments = "
SELECT name 
FROM templates
WHERE hiring_manager_id = '$hiring_manager_id';
";
$assessments = mysqli_query($conn, $assessments);

?>

<!-- Template By CodingNepal - www.codingnepalweb.com -->
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Invite Candidate</title>
        <link rel="stylesheet" href="hm-invite-candidate.css">
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
            <form method="post" action="hm-save-invitation.php">
                <div>
                    <label>Candidate ID</label> <br>
                    <input name="candidate-id"> <br>
                    <label>Assessment</label> <br>
                    <select name="assessment">
                        <?php
                        while($row = mysqli_fetch_assoc($assessments)){
                            $assessment = $row['name'];
                        ?>
                            <option value=<?= $assessment?>><?= $assessment?></option>
                        <?php
                        }
                        ?>
                    </select> <br>
                </div>
                <div class="btns">
                    <button id="send-btn">Send</button>     
                </div>    
            </form>
        </div>
    </body>
    <script src="hm-invite-candidate.js"></script>
</html>

<?php

// session_start();
// $_SESSION['template'] = 

?>