<!DOCTYPE html>
<html>
    <html lang="en";>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale-1.0">
        <title>RentMyCar.io</title>
        <link rel="stylesheet" href="/Dashboard/dash.css">
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
            <h1>Dashboard</h1>
        </div>
        </section>

        <!-----WELCOME SECTION----->

        <section class="info">
            <h1>Welcome back!</h1>
            <p> Here you can see all of the available options for you to see your vehicles, edit your vehicles or delete any of your vehicles.</p>

            <div class="row">

                <div class="column">
                  <img src="/images/dash4.jpg" alt="Image 1">
                  <h2>View Vehicles</h2>
                  <p>View all the vehicles that you have added to the site and have the chance to edit or delete any of them.</p>
                  <button><a href="/View/view.php">View Vehicles</a></button>
                </div>
                
                <div class="column">
                  <img src="/images/dash5.jpg" alt="Image 2">
                  <h2>Add Vehicles</h2>
                  <p>Add any of your personal vehicles onto the site for people to view and potenially rent from you!</p>
                  <button><a href="/Add/add.php">Add Vehicles</a></button>
                </div>

                <div class="column">
                  <img src="/images/dash7.jpg" alt="Image 3">
                  <h2>Log Out</h2>
                  <p>Finished editing and adding vehicles, log out of your account and continue browsing the site!</p>
                  <button><a href="/index.php">Logout</a></button>
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