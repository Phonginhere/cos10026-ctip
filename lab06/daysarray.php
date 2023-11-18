<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array document</title>
</head>

<body>
    <?php

    $days[] = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
    $englishDays = $days[0];
    echo "The days of the week in English are: ";
    foreach ($englishDays as $key => $value) {
        echo $value;
        if ($key == count($englishDays) - 1) {
            echo ". ";
        } else {
            echo ", ";
        }
    }
    echo "<br>";
    echo "<br>";

    $days[] = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
    $frenchDays = $days[0];
    echo "The days of the week in French are: ";
    foreach ($frenchDays as $key => $value) {
        echo $value;
        if ($key == count($frenchDays) - 1) {
            echo ". ";
        } else {
            echo ", ";
        }
    }
    ?>
</body>

</html>