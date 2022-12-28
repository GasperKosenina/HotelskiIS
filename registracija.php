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
    <section class="vh-100 bg-image"
        style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-3">
                                <h2 class="text-uppercase text-center mb-5">Ustvarite profil</h2>

                                <form action="registracija1.php" method="post">
                                    <?php
                                    if (count($_GET) > 0) {
                                        $error = $_GET['error'];
                                        echo $error. "!";
                                    }
                                    ?>

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
                                        <label class="form-label" for="form3Example3cg"><b>Email</b></label>
                                        <input type="email" id="form3Example3cg" class="form-control form-control-lg"
                                            name="email" />

                                    </div>

                                    <div class="form-outline">
                                        <label class="form-label" for="form3Example4cg"><b>Geslo</b></label>
                                        <input type="password" id="form3Example4cg" class="form-control form-control-lg"
                                            name="geslo" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required/>
                                    <p>Geslo naj vsebuje vsaj eno malo črko, eno veliko črko, eno število in pa dolžina mora biti vsaj 8 znakov!</p>

                                    </div>

                                    <div class="form-outline">
                                        <label class="form-label" for="form3Example4cdg"><b>Telefonska
                                                številka</b></label>
                                        <input type="text" id="form3Example4cdg" class="form-control form-control-lg"
                                            name="telefonska_stevilka" />

                                    </div>
                                    <label class="form-label" for="form3Example4cdg"><b>Spol</b></label>

                                    <label for="radio1">Moški</label>
                                    <input type="radio" id="radio1" name="radio" value="option1">
                                    <label for="radio2">Ženska</label>
                                    <input type="radio" id="radio2" name="radio" value="option2">


                                    <br>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
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