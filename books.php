<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="stylesheet" href="./css/book2.css">
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
        <div><img src="images/Rainbow_Reading.jpg" alt="Rainbow Bookclub Logo" class="image"></div>
        <div class="books-div">
            <div>
                <h1 style="font-size:20px; padding-left:15px;"><strong>Books We've Read:</strong></h1>
                <table class="table">
                <?php
                    // Connect to the database
                    $mysqli = new mysqli("localhost", "root", "", "bookclub");

                    // Function to extract author name and book title from Author and Book tables
                    function getAuthorAndBookData() {
                        global $mysqli;
                        // Query to join Author and Book tables based on Author_ID foreign key
                        $query = "SELECT Author.Author_FName, Author.Author_LName, Book.Book_Title
                                FROM Book
                                JOIN Author ON Book.Author_ID = Author.Author_ID LIMIT 7";

                        // Execute the query
                        $result = $mysqli->query($query);

                        // Check if query was successful
                        if ($result) {

                            // Loop through the result set and extract the author name and book title
                            while ($row = $result->fetch_assoc()) {
                                $author_fname = $row['Author_FName'];
                                $author_lname = $row['Author_LName'];
                                $book_title = $row['Book_Title'];
                                $book_class = "books";
                                $auth_class = "authors";
                                // Output the author name and book title however you want (e.g. print, echo, store in an array, etc.)
                                echo "<tr>";
                                echo "<td class=$book_class>$book_title</td>";
                                echo "<td class=$auth_class>$author_fname $author_lname</td>";
                                echo "</tr>";
                            }
                        } else {
                            // Handle the case where the query failed
                            echo "Error executing query: " . $mysqli->error;
                        }

                        // Close the database connection
                        $mysqli->close();
                    }

                    // Call the function to extract the author name and book title for each book
                    getAuthorAndBookData();
                ?>

                </table>
            </div>
        </div>
    </div>
</body>
</html>