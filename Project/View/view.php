<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rentmycar";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT vehicle_make,vehicle_model,vehicle_bodytype,fuel_type,mileage,location,year,num_doors,image_url FROM vehicle_details";
$result = mysqli_query($conn, $sql);


define("FETCH_SRC","http://127.0.0.1");

$fetch_src = FETCH_SRC;

?>



<!DOCTYPE html>
<html>
    <html lang="en";>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale-1.0">
        <title>RentMyCar.io</title>
        <link rel="stylesheet" href="/View/view.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

        <!-----NAV SECTION----->

    <body>
        <section class="header">
            <nav>
                <a href="index.php"><img src="/images/newL.png"></a>
                <div class="nav-links">
                    <ul>
                        <li><a href="/Dashboard/dash.php">Dashboard</a></li>
                        <li><a href="index.html">Log out</a></li>
                    </ul>
                </div>
            </nav>

        <!-----BANNER SECTION----->

        <div class ="content-top">
            <h1>View Vehicles</h1>
        </div>
        </section>

        <!-----WELCOME SECTION----->

        <section>
        <?php



  while ($fetch = mysqli_fetch_assoc($result)) {
    echo "<div class='row-1'>";
    echo "<div class='column-1'>";
    echo "<img src='".$fetch_src."/".$fetch['image_url']."'>";
    echo "<div class='caption'>";
    echo "<h4>".$fetch['vehicle_make']." ".$fetch['vehicle_model']."</h4>";
    echo "<ul>";
    echo "<li>".$fetch['vehicle_bodytype']."</li>";
    echo "<li>".$fetch['fuel_type']."</li>";
    echo "<li>".$fetch['mileage']." miles</li>";
    echo "<li>".$fetch['location']."</li>";
    echo "<li>".$fetch['year']."</li>";
    echo "<li>".$fetch['num_doors']." doors</li>";
    echo "</ul>";
    echo "<div class='b-column'>";
    echo "<button class='button'><a href='/Edit/edit.php'>Edit Vehicle</a></button>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
  }
  
?>


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