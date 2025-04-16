<?php
@include("../connexion.php");

$a = $_POST['nom_produit'];
$b = $_POST['prix'];
$c = $_POST['stock'];
$d = $_POST['disponibilite'];

$req = "INSERT INTO produits (nom_produit, prix, stock, disponibilite) VALUES ('$a', '$b', '$c', '$d')";

if (mysqli_query($conn, $req)) {
    echo "<center><p>Enregistrement effectue</p></center>";
} else {
    echo "<center><p>Erreur : " . mysqli_error($conn) . "</p></center>";
}

echo "<center><a href='menu2.php'>Retour au menu</a></center>";
mysqli_close($conn);
?>
