<?php

session_start();
$conn = mysqli_connect("localhost", "root", "");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
mysqli_query($conn, "USE hiring_platform;");

$username = $_SESSION['username'];

$scenarios = "
SELECT sc.name
FROM scenarios sc
JOIN hiring_managers hm
ON sc.hiring_manager_id = hm.id
WHERE hm.name = '$username';
";
$scenarios = mysqli_query($conn, $scenarios);

?>

<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Template</title>
        <link rel="stylesheet" href="hm-create-template.css">
        
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
            <form method="post" action="hm-save-template.php" id="formm">
                <div id="before-submit">
                    <label>Name</label> <br>
                    <input name="name"> <br>
                    <label>Description</label> <br>
                    <input name="description"> <br>
                    <label>Scenarios</label> <br>
                    <!-- Scenarios with checkboxes go here. See the JS. -->
                </div>
                <select name="scenario" multiple="multiple" tabindex="1">
                    <?php
                    while($row = mysqli_fetch_assoc($scenarios)){
                        $scenario = $row['name'];
                    ?>
                        <option value=<?= $scenario?> type="checkbox"><?= $scenario?></option>
                    <?php
                    }
                    ?>
                </select>
                <div class="btns">
                    <button id="save-btn">Save</button>     
                </div>
                
            </form>
        </div>
    </body>
</html>

