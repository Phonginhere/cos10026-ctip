<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Display car lab 10">
    <meta name="keywords" content="PHP, MySQL, display, cars">
    <meta name="author" content="Phong Tran - 104334842">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retrieving records in PHP and MySQL</title>
</head>

<body>
    <h1>Display car</h1>
    <?php
    require_once("settings.php"); //require only once for file, if not, display the error
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    if (!$conn) {
        echo "<p>Database connection failure.</p>"; //connection failure
    } else {
        $sql_table = "cars";
        $query = "select make, model, price from $sql_table order by make, model;"; //query command
        $result = mysqli_query($conn, $query); //execute the query with mysql connection and store the result into result pointer
        if (!$result) { //if execution was not successful (because " ! " means opposite)
            echo "<p>Something is wrong with ", $query, "</p>";
        } else { //display table
            echo "<table border='1'>";
            echo "<tr>
							<th>Make</th>
							<th>Model</th>
							<th>Price</th>
					  </tr>";
            while ($record = mysqli_fetch_assoc($result)) { // Associative array
                echo "<tr>\n";
                echo "<td>", $record["make"], "</td>\n";
                echo "<td>", $record["model"], "</td>\n";
                echo "<td>", $record["price"], "</td>\n";
                echo "</tr>\n";
            }
            echo "</table>";
            mysqli_free_result($result); //free the memory after fetching rows from a result set
        }
        mysqli_close($conn);
    }
    ?>
</body>

</html>