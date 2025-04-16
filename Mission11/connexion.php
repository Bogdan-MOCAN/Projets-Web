<?php
// MOCAN Bogdan

// Connexion à la base de données
$conn = mysqli_connect("localhost", "root", "", "zoo");

// Vérification de la connexion
if (!$conn) {
    die("Échec de la connexion : " . mysqli_connect_error());
}
?>
