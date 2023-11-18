<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Search car lab 10">
    <meta name="keywords" content="PHP, MySQL, Search, cars">
    <meta name="author" content="Phong Tran - 104334842">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search result</title>
</head>

<body>
    <h1>Search result - lab 10</h1>
    <?php
    function sanitise_input($data)
    {
        $data = trim($data); //removing spaces
        $data = stripslashes($data); //removing backslashes in front of quotes
        $data = htmlspecialchars($data); //converting HTML special characters to HTML code
        return $data;
    }


    if (isset($_POST["carmake"])) { //if receiving form data successfully
        //getting data from form
        $make = sanitise_input($_POST["carmake"]);
        $model = sanitise_input($_POST["carmodel"]);
        $price = sanitise_input($_POST["price"]);
        $yom = sanitise_input($_POST["yom"]);

        //using the conditional to extract the information from the table, using if else
        $conditional = "";
        if ($make != "")
            $conditional .= "make='$make'";
        if ($model != "") {
            if ($conditional != "")
                $conditional .= "and model='$model'";
            else
                $conditional .= "model='$model'";
        }
        if ($price != "") {
            if ($conditional != "")
                $conditional .= "and price='$price'";
            else
                $conditional .= "price='$price'";
        }
        if ($yom != "") {
            if ($conditional != "")
                $conditional .= "and yom='$yom'";
            else
                $conditional .= "yom='$yom'";
        }


        
        require_once("settings.php"); //database information
        $conn = @mysqli_connect($host, $user, $pwd, $sql_db); //connect to database
        $sql_table = "cars"; //table's name
        $query = "select * from $sql_table where $conditional;"; //MySQL command
        $result = mysqli_query($conn, $query); //execute the query
        if (!$result) { //if execution fails
            echo "<p>Something is wrong with ", $query, "</p>";
        } else { //if execution works
            echo "<table border='1'>";
            echo "<tr>
							<th>Make</th>
							<th>Model</th>
							<th>Price</th>
							<th>Year</th>
					  </tr>";
            while ($record = mysqli_fetch_assoc($result)) {
                echo "<tr>\n";
                echo "<td>", $record["make"], "</td>\n";
                echo "<td>", $record["model"], "</td>\n";
                echo "<td>", $record["price"], "</td>\n";
                echo "<td>", $record["yom"], "</td>\n";
                echo "</tr>\n";
            }
            echo "</table>";
            mysqli_free_result($result); //free the memory
        }
        mysqli_close($conn); //close connection
    } else {
        header("location: searchcar.html"); //redirect to form
    }
    ?>
</body>

</html>