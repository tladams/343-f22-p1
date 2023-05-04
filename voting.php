<?php

  // Connect to the database
  $mysqli = new mysqli("localhost", "root", "", "bookclub");

  // // Define the book title
  // $bookTitle1 = "Ulysses";
  // $bookTitle2 = "The Hobbit";
  // $bookTitle2 = "The Raven";

  // // Prepare the SQL statement to select the Book_ID based on the Book_Title
  // $query1 = "SELECT Book_ID FROM Book WHERE Book_Title = '$bookTitle1'";
  // $query2 = "SELECT Book_ID FROM Book WHERE Book_Title = '$bookTitle2'";
  // $query3 = "SELECT Book_ID FROM Book WHERE Book_Title = '$bookTitle3'";

  // // Execute the SQL statement
  // $book_id1 = $mysqli->query($query1);
  // $book_id2 = $mysqli->query($query2);
  // $book_id3 = $mysqli->query($query3);

  // // Check if the query returned any results
  // if ($book_id1->num_rows > 0) {
  //     // Loop through the results and output the Book_ID
  //     while ($row = $$book_id1->fetch_assoc()) {
  //         echo "Book_ID: " . $row["Book_ID"];
  //     }
  // } else {
  //     echo "No results found.";
  // }
  // if ($book_id2->num_rows > 0) {
  //   // Loop through the results and output the Book_ID
  //   while ($row = $$book_id2->fetch_assoc()) {
  //       echo "Book_ID: " . $row["Book_ID"];
  //   }
  // } else {
  //     echo "No results found.";
  // }
  // if ($book_id3->num_rows > 0) {
  //   // Loop through the results and output the Book_ID
  //   while ($row = $$book_id3->fetch_assoc()) {
  //       echo "Book_ID: " . $row["Book_ID"];
  //   }
  // } else {
  //   echo "No results found.";
  // }

  // Get the user's email from the session variable
  // $userEmail = $_SESSION['email'];

  // // Prepare the SQL statement to select the User_ID based on the user's email
  // $query4 = "SELECT user_id FROM user_details WHERE user_email = '$user_email'";

  // // Execute the SQL statement
  // $result4 = $mysqli->query($query4);

  // // Check if the query returned any results
  // if ($result4->num_rows > 0) {
  //     // Loop through the results and output the User_ID
  //     while ($row = $result4->fetch_assoc()) {
  //         echo "User_ID: " . $row["user_id"];
  //     }
  // } else {
  //     echo "No results found.";
  // }

  // Check if the form has been submitted
  echo "<p>Hello</p>";
  if (isset($_POST['submit'])) {
    echo "<p>Thanks for voting!</p>";
    // Get the current date and time
    //$date = date('M-Y');

    // Prepare the SQL statement to update the Vote_Date column in the Vote table
    $query5 = "INSERT INTO Vote (Vote_Date, Book_ID, User_ID)
              VALUES ('5/23'), (1), (2)";

    // Execute the SQL statement
    if ($mysqli->query($query5)) {
      echo "Date added to Vote_Date column in Vote table!";
    } else {
      echo "Error updating Vote_Date column: " . $mysqli->error;
    }
  }
  // Close the database connection
  $mysqli->close();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./css/voting.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
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
    <div id="header" class="container-fluid">
      
      <div class="row justify-content-center">
        <h3 id="title">Vote for next Book of the Month</h3>
      </div>
         
    </div>
      
    <div id="title-container" class="container-fluid text-center">
      <p id="sub-title">Select one book below for the next Book of the Month!</p>
    </div>
      
    
    <div class="row">
      
      <div class="col-md text-center top-padding">
        
        <div class="form-group">
     
         <div class="btn-group-vertical" data-toggle="buttons">
  
             <label class="btn btn-lg btn-primary">
                 <input type="radio" name="options" id="option1" autocomplete="off" checked> Ulysses by James Joyce
             </label>
  
             <label class="btn btn-lg btn-primary">
               <input type="radio" name="options" id="option2" autocomplete="off"> The Hobbit by J.R.R Tolkien
             </label>
 
             <label class="btn btn-lg btn-primary">
               <input type="radio" name="options" id="option3" autocomplete="off"> The Raven by Edgar Allan Poe
             </label> 
          </div>
            
          <div class="top-padding">
        
            <form method="post">
              <input type="submit" name="button" value="Submit Vote">  
            </form> 

          </div> 
          
          
        </div><!--form end-->
        
      </div><!--flex col 1 end-->
      
      
    </div><!--container row end-->
      
    <div class="row">  
      <div class="container-fluid">
      <p class="text-center">One vote per member.</p>
      </div>    
    </div>

      
      <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>