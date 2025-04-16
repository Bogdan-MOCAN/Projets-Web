<?php
// Connexion à la base de données
$conn = mysqli_connect("localhost", "root", "", "gestioncommandes");

// Vérification de la connexion
if (!$conn) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

// Affichage du message en bas de la page
echo '<div style="
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    text-align: center;
    background-color: #f1f1f1;
    padding: 10px 0;
    font-size: 14px;
    color: #333;
    border-top: 1px solid #ccc;
">
    Parfait, connexion réussie
</div>';
?>
