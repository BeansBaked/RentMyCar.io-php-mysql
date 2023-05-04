<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rentmycar";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST['delete'])) {
        $vehicle_id = $_POST['vehicle_id'];
        $sql = "DELETE FROM vehicle_details WHERE vehicle_id = $vehicle_id";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Vehicle deleted successfully')</script>";
        } else {
            echo "<script>alert('Error Deleteing Vehicle')</script>" . mysqli_error($conn);
        }
    }

    $sql = "SELECT vehicle_id,vehicle_make,vehicle_model,vehicle_bodytype,fuel_type,mileage,location,year,num_doors,image_url FROM vehicle_details";
    $result = mysqli_query($conn, $sql);

?>



<!DOCTYPE html>
<html>
    <html lang="en";>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale-1.0">
        <title>RentMyCar.io</title>
        <link rel="stylesheet" href="/Delete/delete.css">
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
                        <li><a href="/Dashboard/dash.php">Dashboard</a></li>
                        <li><a href="/index.php">Log out</a></li>
                    </ul>
                </div>
            </nav>

        <!-----BANNER SECTION----->

        <div class ="content-top">
            <h1>Delete Vehicles</h1>
        </div>
        </section>

        <!-----WELCOME SECTION----->

        <section class="info">
            <h1>Here you can delete your vehicles!</h1>
            <p>Here you can see all your vehicles that you have posted on the site and which ones to remove.</p>

            <?php
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

?>
            <div class="wrapper">
                <div class="image-placeholder">
                    <img id="uploaded-image" alt="Uploaded Image">
                </div>
                <div class = form-inner>

                <form action="#"  class="form"  method="POST">

                    <div class="button-1">
                        <label type="button"><a href="/Add/add.php">Add Vehicle</a></label>
                        </div>
                        <div class="button-2">
                        <label type="button"><a href="/Edit/edit.php">Edit Vehicle</a></label>
                      </div>
                      <div class="button-3">
                        <label type="button"><a href="/Delete/delete.php">Delete Vehicle</a></label>
                      </div>
                      
                      <input type="hidden" name="vehicle_id" value="<?php echo $row['vehicle_id']; ?>">

                      <div class="field">
                        <input type="text" id="vehicle_make" name="vehicle_make" value="<?php echo $row['vehicle_make']; ?>">
                    </div>

                    <div class="field">
                        <input type="text" id="vehicle_model" name="vehicle_model" value="<?php echo $row['vehicle_model']; ?>">
                    </div>

                    <div class="field">
                        <input type="text" id="vehicle_bodytype" name="vehicle_bodytype" value="<?php echo $row['vehicle_bodytype']; ?>">
                    </div>

                    <div class="field">
                        <input type="text" id="fuel_type" name="fuel_type" value="<?php echo $row['fuel_type']; ?>">
                    </div>

                    <div class="field">
                        <input type="text" id="mileage" name="mileage" value="<?php echo $row['mileage']; ?>">
                    </div>

                    <div class="field">
                        <input type="text" id="location" name="location" value="<?php echo $row['location']; ?>">
                    </div>

                    <div class="field">
                     <input type="text" id="year" name="year" value="<?php echo $row['year']; ?>">
                    </div>

                    <div class="field">
                        <input type="text" id="num_doors" name="num_doors" value="<?php echo $row['num_doors']; ?>">
                    </div>

                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" name="delete" value="Delete Vehicle!">
                     </div>

                </form>
                </div> 
            </div>  
<?php
    
    }
}
mysqli_close($conn);
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