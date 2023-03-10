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
                            <div class="card-body p-4">
                                <h2 class="text-uppercase text-center mb-5">Dodaj gosta v sobo</h2>

                                <form action="dodaj_gosta_insert.php" method="post">

                                    <div class="form-outline">
                                        <label class="form-label" for="form3Example1cg"><b>Ime</b></label>
                                        <input type="text" id="form3Example1cg" class="form-control form-control-lg"
                                            name="ime" />

                                    </div>

                                    <div class="form-outline">
                                        <label class="form-label" for="form3Example3cg"><b>Priimek</b></label>
                                        <input type="text" id="form3Example3cg" class="form-control form-control-lg"
                                            name="priimek" />

                                    </div>

                                    <div class="form-outline">
                                        <label class="form-label" for="form3Example4cdg"><b>Telefonska
                                                ??tevilka</b></label>
                                        <input type="text" id="form3Example4cdg" class="form-control form-control-lg"
                                            name="telefonska_stevilka" />

                                    </div>

                                    <div class="form-outline">
                                        <label class="form-label" for="form3Example3cg"><b>Letnica rojstva</b></label>
                                        <input type="date" id="form3Example3cg" class="form-control form-control-lg"
                                            name="date" />

                                    </div>

                                    <div class="form-outline">
                                        <label class="form-label" for="form3Example1cg"><b>Ulica</b></label>
                                        <input type="text" id="form3Example1cg" class="form-control form-control-lg"
                                            name="ulica" />

                                    </div>
                                    <div class="form-outline">
                                        <label class="form-label" for="form3Example1cg"><b>Hi??na ??tevilka:</b></label>
                                        <input type="number" id="form3Example1cg" class="form-control form-control-lg"
                                            name="hisna_stevilka" />

                                    </div>
                                    <div class="form-outline">
                                        <label class="form-label" for="form3Example1cg"><b>Po??ta:</b></label>
                                        <input type="text" id="form3Example1cg" class="form-control form-control-lg"
                                            name="posta" />

                                    </div>
                                    <div class="form-outline">
                                        <label class="form-label" for="form3Example1cg"><b>Po??tna ??tevilka:</b></label>
                                        <input type="number" id="form3Example1cg" class="form-control form-control-lg"
                                            name="postna_stevilka" />

                                    </div>
                                    <br>
                                    <input type="hidden" name="id" value=<?php echo $id_sobe; ?>>


                                    <div class="d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Dodaj</button>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>