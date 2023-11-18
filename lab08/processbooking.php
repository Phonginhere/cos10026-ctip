<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="description" content="lab08" />
    <meta name="keywords" content="PHP, form validation, lab08" />
    <meta name="author" content="Phong Tran" />
    <title>Booking Confirmation</title>
</head>

<body>
    <h1>Rohirrim Tour Booking Confirmation</h1>
    <?php
    // Sanitising input method from the function
    function sanitise_input($data)
    {
        $data = trim($data); //removing spaces
        $data = stripslashes($data); //removing backslashes in front of the quotes
        $data = htmlspecialchars($data); //converting from HTML special characters to HTML code
        return $data;
    }

    //Initial checking if the data from the form was submitted accurately
    if (isset($_POST["firstName"]))
        $firstName = sanitise_input($_POST["firstName"]); //get firstName
    else {
        //Redirecting to the form
        header("location: register.html");
    }

    if (isset($_POST["lastName"]))
        $lastName = sanitise_input($_POST["lastName"]); //get lastName from the function
    if (isset($_POST["age"]))
        $age = sanitise_input($_POST["age"]); //like above
    if (isset($_POST["food"]))
        $food = sanitise_input($_POST["food"]); //like above
    if (isset($_POST["partySize"]))
        $partySize = sanitise_input($_POST["partySize"]); //like above
    if (isset($_POST["species"]))
        $species = sanitise_input($_POST["species"]); //like above
    else
        $species = "Unknown species";

    $tour = ""; //get tour selections
    if (isset($_POST["1day"])) //if choosing 1 day -> 1 day tour tour is decided
        $tour = "one-day tour";

    if (isset($_POST["4day"])) { //if choosing 4 day -> 4 day tour is decided
        $tour = "four-day tour";
        if (isset($_POST["1day"])) //Like above
            $tour = "one-day and four-day tours.";
    }
    if (isset($_POST["10day"])) { //condition 10 day tour is decided
        $tour = "ten-day tour";
        if (isset($_POST["1day"])) { //condition 1 day, 10 day tours are decided
            $tour = "one-day and ten-day tours.";
            if (isset($_POST["4day"])) //condition 1 day, 4 day, 10 day tours are decided
                $tour = "one-day, four-day and ten-day tours.";
        } elseif (isset($_POST["4day"])) //condition 4 day, 10 day tours are decided
            $tour = "four-day and ten-day tours.";
    }

    //Form validation
    $errMsg = "";
    if ($firstName == "") // validate first name
        $errMsg .= "<p>Please enter your first name.</p>";
    elseif (!preg_match("/^[a-zA-Z]*$/", $firstName))
        $errMsg .= "<p>Please only alpha letters allowed in your first name.</p>";
    if ($lastName == "") // validation last name
        $errMsg .= "<p>Please enter your last name.</p>";
    elseif (!preg_match("/^[a-zA-Z\-]*$/", $lastName))
        $errMsg .= "<p>Please only alpha letters and hyphens are allowed in your last name.</p>";
    if (!is_numeric($age)) // validate age
        $errMsg .= "<p>Please your age must be a number.</p>";
    elseif ($age < 10 || $age > 10000)
        $errMsg .= "<p>Please your age must be in between 10 and 10,000.</p>";
    if ($food == "none") //validate food preferrence
        $errMsg .= "<p>Please choose your meal preferrence.</p>";
    if ($species == "")
        $errMsg .= "<p>Please choose species.</p>";
    if (!isset($_POST["1day"]) && !isset($_POST["4day"]) && !isset($_POST["10day"]))
        $errMsg .= "<p>Please choose booking.</p>";
    if (!is_numeric($partySize))
        $errMsg .= "<p>Please your number of travellers must be a number.</p>";
    elseif ($partySize < 1)
        $errMsg .= "<p>Please your number of travellers must be more than 0.</p>";

    if ($errMsg != "")
        echo "<p>$errMsg</p>";
    else {
        echo "<p>Welcome $firstName $lastName to our Rohirrim Ranch Tours !<br>
			 		 You are now booked on the $tour<br>
			 		 Species: $species<br>
					 Age: $age <br>
			 		 Meal preferrence: $food<br>
			 		 Number of travellers: $partySize</p>";
    }

    ?>
</body>

</html>