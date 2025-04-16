<?php
@include("../connexion.php");

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Requête de suppression
    $requete = "DELETE FROM produits WHERE id_produit = '$id'";
    $resultat = mysqli_query($conn, $requete);

    if (!$resultat) {
        die("Erreur lors de la suppression : " . mysqli_error($conn));
    }
    header("Location: aff_special.php");
    exit;
} else {
    echo "ID du produit non spécifié.";
}
mysqli_close($conn);
?>
