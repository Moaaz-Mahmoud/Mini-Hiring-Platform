<!DOCTYPE html>
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
            <form method="post" action="save-invitation.php">
                <div>
                    <label>Candidate ID</label> <br>
                    <input name="candidate-id"> <br>
                    <label>Assessment</label> <br>
                    <select name="assessment">
                        <option value="Developer">Developer</option>
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

session_start();

?>