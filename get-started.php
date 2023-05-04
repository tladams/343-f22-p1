<?php
include("database_connection.php");

$showAlert = false;
$showError = false;
$exists = false;
$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Include file which makes the
  // Database Connection.


  $useremail = $_POST["email"];
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $password = $_POST["password"];


  $query = "
  SELECT * FROM user_details 
  WHERE user_email = :user_email
  ";
  $statement = $connect->prepare($query);


  $statement->execute(
    array(
      'user_email' => $_POST["email"]
    )
  );

  $num = $statement->rowCount();
  if (strlen($useremail) == 0 || strlen($fname) == 0 || strlen($lname) == 0 || strlen($password) == 0) {

    $exists = "All sections must be filled";


  } else if (strlen($password) < 8) {

    $exists = "Password must be at least 8 characters";

  } else {
    if ($num == 0) {



      if ($exists == false) {

        $hash = password_hash(
          $password,
          PASSWORD_DEFAULT
        );

        $data = [
          'user_id' => null,
          'user_email' => $useremail,
          'user_password' => $hash,
          'user_lname' => $lname,
          'user_fname' => $fname,
          'user_type' => "user",
          'user_image' => null,
          'user_status' => "Active",

        ];
        // Password Hashing is used here. 
        $sql = "INSERT INTO user_details
      (user_id, user_email, user_password, user_lname, user_fname, user_type, user_image, user_status) 
      VALUES (?,?,?,?,?,?,?,?)";

        $result = $connect->prepare($sql)->execute([null, $useremail, $hash, $lname, $fname, "user", "", "Active"]);
        if ($result) {
          $showAlert = true;
          header("location:login.php");
        }

      }
    }
  } // end if 

  if ($num > 0) {
    $exists = "Email is already in use";
  }

} //end if  


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Get Started</title>
  <link rel="stylesheet" href="./css/get-started.css" />
  <link rel="icon" type="image/x-icon" href="images/favicon.ico" />
</head>

<body>
  <!-- <img src="images/Rainbow_Reading.jpg" alt="Rainbow Bookclub Logo" class="image"> -->
  <div class="form">
    <span>
      <?php echo $exists; ?>
    </span>
    <form action="get-started.php" method="post">

      <div class="form-group">
        <label class="text">First name:
          <input type="text" class="form" name="fname" id="fname" /><br /><br /></label>

        <label class="text" title="last-name">Last name:
          <input type="text" class="form" name="lname" id="lname" /><br /><br /></label>

        <label class="text" title="email">Email:
          <input type="text" class="form" name="email" id="email" /><br /><br /></label>

        <label class="text" title="password">Password:
          <input type="text" class="form" name="password" id="password" /><br /><br /></label>

        <button class="button" href="login.php">Sign up!</button>
      </div>
    </form>
  </div>

</body>

</html>