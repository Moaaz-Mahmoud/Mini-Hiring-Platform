<!DOCTYPE html>
<!-- Template By CodingNepal - www.codingnepalweb.com -->
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Template</title>
        <link rel="stylesheet" href="hm-create-template.css">
        <script src="hm-create-template.js"></script>
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
            <form method="post" action="hm-save-scenario.php">
                <div>
                    <label>Name</label> <br>
                    <input name="name"> <br>
                    <label>Prompt</label> <br>
                    <textarea name="prompt"></textarea> <br>
                    <label>Difficulty</label> <br>
                    <select name="difficulty">
                        <option>Entry level</option>
                        <option>Intermediate level</option>
                        <option>Expert level</option>
                    </select> <br>
                    <label>Solution</label> <br>
                    <textarea name="solution"></textarea> <br>
                    <label>Language</label> <br>
                    <select name="language">
                        <option>Plain text</option>
                        <option>Python</option>
                    </select> <br>
                </div>
                <div class="btns">
                    <button id="save-btn">Save</button>     
                </div>    
            </form>
        </div>
    </body>
</html>

<?php

session_start();

?>