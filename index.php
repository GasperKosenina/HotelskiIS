<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin HIS</title>
    <link rel="stylesheet" href="index.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="/path/to/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <style>
        .card {
            margin: 0.9rem;
        }

        .card-link {
            color: black;
        }
    </style>
</head>

<body>
    <?php
    include "connect.php";

    // Start the session
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['id_uporabnika'])) {
        // If the user is not logged in, redirect them to the login page
        header('Location: prijava.php');
        exit;
    }
    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light ">

        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav ">

                <li class="nav-item active">
                    <a class="nav-link" href="#">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profil.php">Moj profil</a>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <br>

    <div class="container">
        <div class="row">
            <?php

            // Connect to the database
// Write a SQL query to select data from the database
            $sql = "SELECT * FROM soba ";

            // Execute the query and retrieve the results
            $result = mysqli_query($conn, $sql);

            // Iterate over the results
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id_sobe'];

                // Create a new div element with placeholders for the data
                $html = '<div class="card text-white bg-%s mb-3" style="width: 12rem;"><div class="card-body"><h5 class="card-title">%s</h5><a href=%s class="card-link">%s</a></div></div>';
                $url = "podrobnosti.php?id=";
                $url .= $id;

                $url2 = "dodaj_gosta.php?id=";
                $url2 .= $id;

                if ($row["gost_id"] !== null) {
                    $class = "card text-white bg-danger mb-3";
                    $href = $url;
                    $ime = "Podrobnosti";
                } else {
                    $class = "card text-white bg-success mb-3";
                    $href = $url2;
                    $ime = "Dodaj gosta";
                }

                // Populate the placeholders with the data from the database
                $html = sprintf($html, $class, "Soba " . $row['id_sobe'], $href, $ime);


                // Echo the HTML to the browser
                echo $html . " ";
            }

            // Close the connection
            mysqli_close($conn);
            ?>
        </div>
        <button id="pritisni">Pritisni</button>
        <input type="text" id="text2">


        <script>

            $("#pritisni").click(function () {
                $("body").css(
                    "background-color",
                    document.getElementById("text2").value
                );
            });

        </script>

    </div>
    <footer class="bg-light text-center text-lg-start fixed-bottom">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright:
            <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>


    <script src="index.js"></script>
</body>

</html>