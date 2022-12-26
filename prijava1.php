<?php

session_start();

include "connect.php";


if (isset($_POST['email']) && isset($_POST['geslo'])) {
    $email = $_POST['email'];
    $geslo = $_POST['geslo'];
    if (empty($email)) {
        header("Location: prijava.php?error=User Name is required");
        exit();
    } else if (empty($geslo)) {
        header("Location: prijava.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM uporabnik WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($geslo, $row['geslo'])) {
                $_SESSION['id_uporabnika'] = $row['id_uporabnika'];
                $_SESSION['idUsluzbenec'] = $row['idUsluzbenec'];
                $_SESSION['email'] = $row['email'];
                header("Location: index.php");
                exit();
            } else {
                header("Location: prijava.php?error=Incorect User name or password");
                exit();
            }
        } else {
            header("Location: prijava.php?error=Incorect User name or password");
            exit();
        }
    }
} else {
    header("Location: prijava.php");
    exit();
}