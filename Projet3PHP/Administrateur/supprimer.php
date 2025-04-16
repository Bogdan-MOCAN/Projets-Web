<?php
@include("../connexion.php");

if (isset($_POST['id_produit']) && !empty($_POST['id_produit'])) {
    $id_produit = $_POST['id_produit'];

    try {
        // Préparation de la requête sécurisée
        $requete = "DELETE FROM produits WHERE id_produit = :id_produit";
        $stmt = $pdo->prepare($requete);
        $stmt->bindParam(':id_produit', $id_produit, PDO::PARAM_INT);
        $stmt->execute();

        // Vérification du nombre de lignes affectées
        if ($stmt->rowCount() > 0) {
            echo "<center><h1>Suppression effectuee</h1></center>";
        } else {
            echo "<center><h1>Aucun produit trouvé avec cet ID</h1></center>";
        }
    } catch (PDOException $e) {
        echo "<center><h1>Échec de la suppression : " . $e->getMessage() . "</h1></center>";
    }
} else {
    echo "<center><h1>ID du produit non spécifié.</h1></center>";
}
?>

<center><a href='menu1.php'>Retour</a></center>
