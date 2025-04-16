<?php
@include("../connexion.php");

if (isset($_POST['id_produit']) && !empty($_POST['id_produit'])) {
    $c = $_POST['id_produit'];
    $requete = "DELETE FROM produits WHERE id_produit='$c';";
    echo $requete;

    $resultat = mysqli_query($conn, $requete);

    if (!$resultat) {
        echo "<center><h1>Echec de la suppression : $requete</h1></center>";
        echo mysqli_error($conn);
    } else {
        if (mysqli_affected_rows($conn)) {
            echo "<center><h1>Suppression effectuee</h1></center>";
            echo "<center><a href='menu2.php'>Retour</a></center>";
        } else {
            echo "<center><h1>Aucun produit trouvé avec cet ID</h1></center>";
        }
    }
    mysqli_close($conn);
} else {
    echo "<center><h1>ID du produit non spécifié.</h1></center>";
}
?>
