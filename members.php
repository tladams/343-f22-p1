
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members</title>
    <link rel="stylesheet" href="./css/members.css">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>
<body>
    <nav class="topnav">
        <a href="index.php">Home</a>
        <a href="schedule.html">Schedule</a>
        <a href="books.php">Books</a>
        <a href="members.php">Members</a>
        <a href="voting.php">Vote</a>
        <a href="logout.php">Logout</a>
    </nav>
    <div class="page_background">
        <img src="images/Rainbow_Reading.jpg" alt="Rainbow Bookclub Logo" class="image">
        <h1 style="font-size:20px; padding-left:25px;">Members:</h1>
        <table class="table">
        <?php

            // Connect to the database
            $mysqli = new mysqli("localhost", "root", "", "bookclub");

            // Function to extract user_fname and user_email from user_details table
            function getUserDetails() {
                global $mysqli;
                
                // Query to select user_fname and user_email from user_details table
                $query = "SELECT user_fname, user_email FROM user_details";
                
                // Execute the query
                $result = $mysqli->query($query);
                
                // Check if query was successful
                if ($result) {

                    $name = "name";
                    $email = "email";

                    // Loop through the result set and extract user_fname and user_email data
                    while ($row = $result->fetch_assoc()) {
                        $user_fname = $row['user_fname'];
                        $user_email = $row['user_email'];
                        echo "<tr>";
                        echo "<td class=$name>$user_fname</td>";
                        echo "<td class=$email>$user_email</td>";
                        echo "</tr>";
                    }
                } else {
                    // Handle the case where the query failed
                    echo "Error executing query: " . $mysqli->error;
                }
                
                // Close the database connection
                $mysqli->close();
            }

            // Call the function to extract the data
            getUserDetails();

            ?>
        </table>  
    </div>
</body>
</html>