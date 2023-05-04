<?php

ob_start();

// Database connection variables
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rentmycar";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Verify user input
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['PASSWORD'];

  $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // Login successful
    header('Location: /Dashboard/dash.php');
    exit;
  } else {
    // Login failed
    echo '<script> alert("Invalid username or password.")</script>';
  }
}
mysqli_close($conn);

?>




<!DOCTYPE html>
<html>
    <html lang="en";>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale-1.0">
        <title>RentMyCar.io</title>
        <link rel="stylesheet" href="/Login/login.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

        <!-----NAV SECTION----->

    <body>
        <section class="header">
            <nav>
            <a href="/index.php"><img src="/images/newL.png"></a>
                <div class="nav-links">
                    <ul>
                        <li><a href="/index.php">Home</a></li>
                        <li><a href="/About/about.php">About</a></li>
                        <li><a href="/Vehicles/vehicles.php">Vehicles</a></li>
                        <li><a href="/Signup/signup.php">Sign up</a></li>
                        <li><a href="/Login/login.php">Login</a></li>
                    </ul>
                </div>
            </nav>

        <!-----BANNER SECTION----->

        <div class ="content-top">
            <h1>Login</h1>
        </div>
        </section>

        <!----- LOG IN SECTION----->

        <section class="info">
            <div class="wrapper">
                <div class="title-text">
                   <div class="title login">
                      Login
                   </div>
                </div>
                   <div class="form-inner">
                      <form action="" class="login" method="post">
                         <div class="field">
                            <input type="text" name="username" placeholder="Username *" required>
                         </div>
                         <div class="field">
                            <input type="password" name="PASSWORD" placeholder="Password *" required>
                         </div>
                         <div class="field btn">
                            <div class="btn-layer"></div>
                            <input type="submit" name="submit" value="Login">
                         </div>
                         <div class="signup-link">
                            Don't have a log in? <a href="/Signup/signup.php">Register an account</a>
                         </div>
                      </form>
                    </div>
                   </div>
        </section>

         <!-----Footer Section----->

         <section class="footer">

            <h3>About RentMyCar.io</h3>
            <p>As the largest carsharing service in Europe, we’re on a mission to bring fresh air to big cities with convenient 24/7 access to shared cars nearby. <br>With RentMyCar.io, simply book a car, unlock it with your phone, and get going.</p>
            <h3>Follow us on social media !</h3>
            <div class="icons">
                <a href="https://en-gb.facebook.com/" target="_blank" class="fa fa-facebook"></a>
                <a href="https://twitter.com/?lang=en" target="_blank" class="fa fa-twitter"></a>
                <a href="https://www.instagram.com/" target="_blank" class="fa fa-instagram"></a>

            </div>
         </section>

    </body>
</html>