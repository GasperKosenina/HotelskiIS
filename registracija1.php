<?php
include "connect.php";

if (isset($_POST['ime']) && !empty($_POST['ime']) && isset($_POST['priimek']) && !empty($_POST['priimek']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['geslo']) && !empty($_POST['geslo']) && isset($_POST['telefonska_stevilka']) && !empty($_POST['telefonska_stevilka'])) {

    $ime = $_POST['ime'];
    $priimek = $_POST['priimek'];
    $email = $_POST['email'];
    $geslo = $_POST['geslo'];
    $telefonska_stevilka = $_POST['telefonska_stevilka'];
    if (isset($_POST['radio'])) {
        $selected_radio = $_POST['radio'];
        if ($selected_radio === "option1") {
            $spol = 1;
        } else {
            $spol = 0;
        }
    }

    $hash = password_hash($geslo, PASSWORD_DEFAULT);

    $qry = "INSERT INTO `usluzbenec`(`ime`, `priimek`, `telefonska_stevilka`, `spol`) VALUES ('$ime', '$priimek', '$telefonska_stevilka', '$spol')";

    $insert = mysqli_query($conn, $qry);

    $sql = "SELECT id_usluzbenca FROM usluzbenec WHERE ime='$ime'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $usluzbenec_id = $row['id_usluzbenca'];

    $qry2 = "INSERT INTO `uporabnik`(`email`, `geslo`, `idUsluzbenec`) VALUES ('$email', '$hash', '$usluzbenec_id')";
    $insert = mysqli_query($conn, $qry2);




    if (!$insert) {
        echo "tezava pri vnosu v bazo";
    } else {
        header("Location: prijava.php");

    }
} else {
    header("Location: registracija.php?error=Izpolnite vsa polja");
    exit();
}