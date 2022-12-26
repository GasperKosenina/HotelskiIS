<?php
include "connect.php";
session_start();
$new_email = $_POST['email2'];
$id = $_SESSION['id_uporabnika'];

$sql = "UPDATE uporabnik SET email='$new_email' WHERE id_uporabnika=$id";

if (mysqli_query($conn, $sql)) {
    $_SESSION['email'] = $new_email;
    header("Location: profil.php");
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>