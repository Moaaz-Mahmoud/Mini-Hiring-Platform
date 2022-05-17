<?php

session_start();

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
            <form method="post" action="save-template.php" id="formm">
                <div id="before-submit">
                    <label>Name</label> <br>
                    <input> <br>
                    <label>Description</label> <br>
                    <input> <br>
                    <label>Scenarios</label> <br>
                    <!-- Scenarios with checkboxes go here. See the JS. -->
                </div>
                <div class="btns">
                    <button id="save-btn">Save</button>     
                </div>
            </form>
        </div>
    </body>
    <script>
        let beforeSubmit = document.getElementById('before-submit')

        // linebreak.innerHTML = "<br>"
        for (let i = 0; i < 4; i++){
            // Scenario name
            let scenario = document.createElement('label')
            scenario.setAttribute('id','scenario'+i)
            scenario.innerHTML = 'Scenario #' + i
            // Checkbox
            const checkbox = document.createElement('input')
            checkbox.type = "checkbox"
            // Linebreak for the next element
            const linebreak = document.createElement('br')
            // Add to the form
            beforeSubmit.appendChild(scenario)
            beforeSubmit.appendChild(checkbox)
            beforeSubmit.appendChild(linebreak)
        }
    </script>
</html>

