<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factorial</title>
</head>

<body>
    <?php
    include("mathfunctions.php"); //makes functions in the included file available
    ?>
    <h1> Factorial </h1>
    <?php

    if (isset($_GET["number"])) { // check if form data exists
        $num = $_GET["number"]; //obtain the form data
        if (isPositiveInteger($num)) { //call the function
            echo "<p>", $num, "! is ", factorial($num), ".</p>"; //ditto for factorial
        } else { // number is not an integer
            echo "<p>Please enter a positive integer.</p>";
        }
    }
    echo "<p><a href='factorial.html'>Return to the Entry Page</a></p>";
    ?>
</body>

</html>