<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My first</title>
</head>

<body>
    <h1>PHP Variables, arrays and operators </h1>
    <?php
    $marks = array(85, 85, 95); // declaring and initialising array
    $marks[1] = 90; //editing second element
    $ave = ($marks[0] + $marks[1] + $marks[2]) / 3; //Calculating average
    if ($ave >= 50) //condition
        $status = "PASSED";
    else //otherwise
        $status = "FAILED";
    echo "<p>The average score is $ave. You $status.</p>";
    ?>
</body>

</html>