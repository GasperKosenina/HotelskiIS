<?php
include "connect.php";

$id_sobe = $_POST['id'];

$sql = "SELECT gost_id FROM soba WHERE id_sobe='$id_sobe'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$id_gosta = $row['gost_id'];

$qry = "DELETE FROM gost WHERE id_gosta = $id_gosta";


if (mysqli_query($conn, $qry)) {
    header("Location: index.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);