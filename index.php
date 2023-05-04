<?php
//index.php

  if(!isset($_COOKIE["type"]))
  {
    header("location:login.php"); 
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rainbow Reading!🏳️‍🌈</title>
  <link rel="stylesheet" href="./css/index.css">
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
      <div class="main">
        <h1 class="font">Welcome to...</h1>
        <img src="images/Rainbow_Reading.jpg" alt="Rainbow Bookclub Logo" class="image">
        <p class="font">We read a new book every month!</p>
        <p class="font">Meetings every week!</p>
        <p class="font">But that’s not all, 
          we have other fun events to look forward to!</p>
      </div>
      <!-- <div class="side-bar">
        <p style="font-size:large;"><strong>Book of the Month:</strong></p>
        <img src="images/call-me-by-your-name.jpg" alt="Call Me By Your Name Book Cover" class="book">
      </div> -->
    </div> 
</body>
</html>