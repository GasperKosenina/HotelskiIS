<?php
include "connect.php";


$ime = $_POST['ime'];
$priimek = $_POST['priimek'];
$telefonska_stevilka = $_POST['telefonska_stevilka'];
$letnica_rojstva = $_POST['date'];
$telefonska_stevilka = $_POST['telefonska_stevilka'];
$ulica = $_POST['ulica'];
$hisna_stevilka = $_POST['hisna_stevilka'];
$posta = $_POST['posta'];
$postna_stevilka = $_POST['postna_stevilka'];
$id_sobe = $_POST['id'];





$qry = "INSERT INTO gost (ime, priimek, telefonska_stevilka, letnica_rojstva, ulica, hisna_stevilka, posta, postna_stevilka) VALUES ('$ime', '$priimek', '$telefonska_stevilka', '$letnica_rojstva', '$ulica', '$hisna_stevilka', '$posta', '$postna_stevilka')";
$insert = mysqli_query($conn, $qry);

$sql = "SELECT id_gosta FROM gost WHERE ime='$ime'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$gost_id = $row['id_gosta'];

$qry2 = "UPDATE soba SET gost_id='$gost_id' WHERE id_sobe=$id_sobe";
$insert = mysqli_query($conn, $qry2);




if (!$insert) {
    echo "tezava pri vnosu v bazo";
} else {
    header("Location: index.php");

}