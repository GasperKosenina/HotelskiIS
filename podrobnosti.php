<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin HIS</title>
    <link rel="stylesheet" href="registracija.css">

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
    $id_sobe = $_GET['id'];
    ?>
    <section class="vh-100 bg-image"
        style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-3">
                                <?php
                                $id = $_GET['id'];
                                $sql = "SELECT * FROM soba WHERE id_sobe = $id";

                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id_Gosta = $row['gost_id'];
                                    $sql2 = "SELECT ime, priimek, telefonska_stevilka, ulica, posta, postna_stevilka
                                FROM gost
                                WHERE id_gosta = $id_Gosta
                                ";
                                    $result2 = mysqli_query($conn, $sql2);
                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                ?>
                                <h4 class="mb-2">Podatki gosta:</h4>
                                <p>
                                    <?php echo "<b>Ime: </b>" . $row2["ime"] ?>
                                </p>
                                <p>
                                    <?php echo "<b>Priimek: </b>" . $row2["priimek"] ?>
                                </p>
                                <p>
                                    <?php echo "<b>Telefonska št.: </b>" . $row2["telefonska_stevilka"] ?>
                                </p>
                                <p>
                                    <?php echo "<b>Ulica: </b>" . $row2["ulica"] ?>
                                </p>
                                <p>
                                    <?php echo "<b>Pošta: </b>" . $row2["posta"] ?>
                                </p>
                                <p>
                                    <?php echo "<b>Poštna št.: </b>" . $row2["postna_stevilka"] ?>
                                </p>

                                <form action="izbrisi.php" method="post">
                                    <button type="button" class="btn btn-primary btn-rounded btn-lg"
                                        onclick="window.location.href = 'index.php';">Nazaj</button>
                                    <button type="submit" class="btn btn-danger btn-rounded btn-lg">
                                        Izbriši gosta
                                    </button>
                                    <input type="hidden" name="id" value=<?php echo $id_sobe; ?>>
                                </form>
                                <?php
                                    }



                                }


                                mysqli_close($conn);

                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</body>