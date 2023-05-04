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



// Function to generate a random string
function generate_random_string($length = 10) {
    return bin2hex(openssl_random_pseudo_bytes($length));
}

// Function to handle file upload
define("UPLOADS_SRC", $_SERVER['DOCUMENT_ROOT'] . "/uploads");

function image_upload($img){
    $tmp_loc = $img['tmp_name'];
    $new_name = generate_random_string(5).$img['name'];
    $new_loc = UPLOADS_SRC . '/' . $new_name;
    if(move_uploaded_file($tmp_loc,$new_loc)){
        return UPLOADS_SRC . $new_name;
    } else{
        return false;
    }
}

// Check if form was submitted
if (isset($_POST["submit"])) {

    // Get form data
    $vehicle_make = $_POST["vehicle_make"];
    $vehicle_model = $_POST["vehicle_model"];
    $vehicle_bodytype = $_POST["vehicle_bodytype"];
    $fuel_type = $_POST["fuel_type"];
    $mileage = $_POST["mileage"];
    $location = $_POST["location"];
    $year = $_POST["year"];
    $num_doors = $_POST["num_doors"];

    // Upload image
    $image_url = image_upload($_FILES['image']);

    if ($image_url === false) {
        echo '<script>alert("Error uploading image")</script>';
        exit;
    }

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO vehicle_details (vehicle_make,vehicle_model,vehicle_bodytype,fuel_type,mileage,location,year,num_doors,image_url) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if ($stmt === false) {
        echo '<script>alert("Error preparing statement: ")</script>' . $conn->error;
    }

    // Bind parameters
    if (!$stmt->bind_param("sssssssss", $vehicle_make , $vehicle_model, $vehicle_bodytype, $fuel_type, $mileage, $location, $year, $num_doors , $image_url)) {
        echo '<script>alert("Error binding parameters: ")</script>' . $stmt->error;
    }

    // Execute statement
    if (!$stmt->execute()) {
        echo '<script>alert("Error executing statement:")</script>'  . $stmt->error;
    } else {
        echo '<script>alert("Record saved successfully")</script>';
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
        <link rel="stylesheet" href="/Add/add.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="/Add/add.js"></script>
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
            <h1>Add Vehicles</h1>
        </div>
        </section>

        <!-----WELCOME SECTION----->

        <section class="info">
            <h1>Here you can add your vehicle!</h1>
            <p>Here you can fill out the form below providing all the detials of your vehicles to get it ready to post on our site.</p>

            <div class="wrapper">
                <div class="image-placeholder">
                    <img id="uploaded-image" alt="Uploaded Image">
                </div>
                <div class = form-inner>

                <form action="add.php" class="form"  method="POST" enctype="multipart/form-data">

                    <div class="button-1">
                    <label type="button"><a href="/Add/add.php">Add Vehicle</a></label>
                        </div>
                        <div class="button-2">
                        <label type="button"><a href="/Edit/edit.php">Edit Vehicle</a></label>
                      </div>
                      <div class="button-3">
                        <label type="button"><a href="/Delete/delete.php">Delete Vehicle</a></label>
                      </div>

                    <div class="field">
                        <input type="text" id="vehicle_make" name="vehicle_make" placeholder="Make *" required>
                    </div>

                    <div class="field">
                        <input type="text" id="vehicle_model" name="vehicle_model" placeholder="Model *" required>
                    </div>

                    <div class="field">
                        <input type="text" id="vehicle_bodytype" name="vehicle_bodytype" placeholder="Body Type *" required>
                    </div>

                    <div class="field">
                        <input type="text" id="fuel_type" name="fuel_type" placeholder="Fuel Type *" required>
                    </div>

                    <div class="field">
                        <input type="text" id="mileage" name="mileage" placeholder="Miles *" required>
                    </div>

                    <div class="field">
                        <input type="text" id="location" name="location" placeholder="Location *" required>
                    </div>

                    <div class="field">
                     <input type="text" id="year" name="year" placeholder="Year *" required>
                    </div>

                    <div class="field">
                        <input type="text" id="num_doors" name="num_doors" placeholder="Doors *" required>
                    </div>

                    <div class="upload-container">
                        <div class="upload-container">
                            <div class="file-info">
                              <span class="file-name"></span>
                            </div>
                            <input type="file" id="image" name="image">
                          </div>
                    </div>

                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" name="submit" value="Add Vehicle!">
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