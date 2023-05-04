<?php
// Database connection information
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rentmycar";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form was submitted
if (isset($_POST["submit"])) {
    // Get form data
    $title = $_POST["title"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $gender = $_POST["gender"];
    $adressss = $_POST["adressss"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $username = $_POST["username"];
    $password = $_POST["PASSWORD"];

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO users (title, first_name, last_name, gender, adressss, email, telephone, username, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if ($stmt === false) {
        echo '<script>alert("Error preparing statement: ")</script>' . $conn->error;
    }

    // Bind parameters
    if (!$stmt->bind_param("sssssssss", $title, $first_name, $last_name, $gender, $addressss, $email, $telephone, $username, $password)) {
        echo '<script>alert("Error binding parameters: ")</script>' . $stmt->error;
    }

    // Execute statement
    if (!$stmt->execute()) {
        echo '<script>alert("Error executing statement:")</script>'  . $stmt->error;
    } else {
        echo '<script>alert("Record saved successfully")</script>';
        header("Location: /Login/login.php");
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>



<!DOCTYPE html>
<html>
    <html lang="en";>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale-1.0">
        <title>RentMyCar.io</title>
        <link rel="stylesheet" href="/Signup/signup.css">
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
            <h1>Sign Up</h1>
        </div>
        </section>

        <!-----SIGN UP SECTION----->

        <section class="info">
            <div class="wrapper">
                <div class="title-text">
                   <div class="title signup">
                      Sign up now!
                   </div>
                </div>
                   <div class="form-inner">
                      <form action="" class="signup" method="post">

                        <div class="field">
                            <input type="text" name="title" placeholder="Title *" required>
                         </div>
                         <div class="field">
                            <input type="text" name="first_name" placeholder="First Name *" required>
                         </div>
                         <div class="field">
                            <input type="text" name="last_name" placeholder="Last Name *" required>
                         </div>
                         <div class="field">
                            <input type="text" name="gender" placeholder="Gender ">
                         </div>
                         <div class="field">
                            <input type="text" name="adressss" placeholder="Address *" required>
                         </div>
                         <div class="field">
                            <input type="email" name="email" placeholder="Email * " required>
                         </div>
                         <div class="field">
                            <input type="text" name="telephone" placeholder="Telephone *" required>
                         </div>
                         <div class="field">
                            <input type="text" name="username" placeholder="Username *" required>
                         </div>
                         <div class="field">
                            <input type="password" name="PASSWORD" placeholder="Password * " required>
                         </div>
                         <div class="field btn">
                            <div class="btn-layer"></div>
                            <input type="submit" name="submit" value="SignUp">
                         </div>
                         <div class="login-link">
                            Already have an account? <a href="/Login/login.html">Login now!</a>
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