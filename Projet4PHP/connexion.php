<?php

$conn = mysqli_connect("localhost", "root", "", "scolarite");

if (!$conn) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

?>
