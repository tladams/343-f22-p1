<?php
//login.php

include("database_connection.php");

if (isset($_COOKIE["type"])) {
    header("location:index.php");
}

$message = '';

if (isset($_POST["login"])) {
    if (empty($_POST["user_email"]) || empty($_POST["user_password"])) {
        $message = "<div class='alert alert-danger'>Both Fields are required</div>";
    } else {
        $query = "
  SELECT * FROM user_details 
  WHERE user_email = :user_email
  ";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                'user_email' => $_POST["user_email"]
            )
        );
        $count = $statement->rowCount();
        if ($count > 0) {
            $result = $statement->fetchAll();
            foreach ($result as $row) {
                if (password_verify($_POST["user_password"], $row["user_password"])) {
                    setcookie("type", $row["user_type"], time() + 3600);
                    header("location:index.php");
                } else {
                    $message = '<div class="alert alert-danger">Wrong Password</div>';
                }
            }
        } else {
            $message = "<div class='alert alert-danger'>Wrong Email Address</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="./css/get-started.css" type="text/css">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>

<body>
    <div class="login-page">
        <div class="form">
        <span>
            <?php echo $message; ?>
        </span>
        <form class="login-form" method="post">
            <div class="form-group">
                <input type="text" placeholder="username" name="user_email" id="user_email" class="form" />
            </div>
            <div class="form-group">
                <input type="password" placeholder="password" name="user_password" id="user_password" class="form" />
            </div>
            <div class="form-group">
              <button class = "button" type="submit" name="login" id="login" class="form" value="Login" >Login!</button>  
        </div>
            <a href="get-started.php">Create an account</a></p>
        </form>
        </div>


    </div>
</body>

</html>