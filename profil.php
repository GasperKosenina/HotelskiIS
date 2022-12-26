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
    <style>
        .sredina {
            text-align: center;
        }
    </style>

</head>

<body>
    <?php

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

                <li class="nav-item">
                    <a class="nav-link" href="index.php">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="profil.php">Moj profil</a>
                </li>
            </ul>
        </div>
    </nav>

    <?php

    // Connect to the database
    $host = 'localhost';
    $dbname = 'his';
    $username = 'root';
    $password = '';

    try {
        $conn = new PDO("mysql:host=$host;port=3307;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $usluzbenec_id = $_SESSION['idUsluzbenec'];

    // Select data from the database
    $sql = "SELECT * FROM usluzbenec, uporabnik WHERE $usluzbenec_id = id_usluzbenca AND $usluzbenec_id = idUsluzbenec";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Print the data
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>





    <section class="vh-100" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-12 col-xl-4">

                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body text-center">
                            <div class="mt-3 mb-4">
                                <?php
        if ($row["spol"] === 0) {
            $image_path = 'ava2-bg.webp';
        } else if ($row["spol"] === 1) {
            $image_path = 'avatar2.png';
        } else {
            $image_path = 'bdafbf81a88e8872b457dd2779840931.jpg';
        }
                                ?>
                                <img src="<?php echo $image_path; ?>" class="rounded-circle img-fluid"
                                    style="width: 100px;" />

                            </div>
                            <h4 class="mb-2">
                                <?php echo $row["ime"] . " " . $row["priimek"] ?>
                            </h4>
                            <p class="text-muted mb-4">@Usluzbenec
                            <p>
                                <?php echo "<b>Telefonska št.: </b>" . $row["telefonska_stevilka"] ?>
                            </p>
                            <p>
                                <?php echo "<b>Email: </b>" . $row["email"] ?>
                            </p>
                        </div>
                        <a class="sredina" href='spremeni.php'>Spremeni email</A>
                        <a class="sredina" href='odjava.php'>Log out</A>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <?php
    }
    // Close the connection
    $conn = null;
    ?>





    <br>
    <br>

    <footer class="bg-light text-center text-lg-start fixed-bottom">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright:
            <a class="text-dark" href="https://mdbootstrap.com/">@Terme Čatež</a>
        </div>
        <!-- Copyright -->
    </footer>




    <script src="index.js"></script>
</body>

</html>