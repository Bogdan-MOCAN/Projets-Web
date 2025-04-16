<?php
@include("../connexion.php");

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Requête de suppression sécurisée avec requête préparée
        $requete = "DELETE FROM produits WHERE id_produit = :id";
        $stmt = $pdo->prepare($requete);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Redirection après suppression
        header("Location: aff_special.php");
        exit;
    } catch (PDOException $e) {
        die("Erreur lors de la suppression : " . $e->getMessage());
    }
} else {
    echo "ID du produit non spécifié.";
}
?>
