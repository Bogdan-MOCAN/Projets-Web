<?php
@include("connexion.php");

// Vérifier si l'ID est passé par le formulaire
if (isset($_POST['Identifiant'])) {
    $id_article = $_POST['Identifiant'];

    // Requête de suppression
    $requete = "DELETE FROM article WHERE Identifiant = :id";
    $stmt = $pdo->prepare($requete);
    $stmt->bindParam(':id', $id_article, PDO::PARAM_INT);

    // Exécuter la requête
    if ($stmt->execute()) {
        // Redirection après suppression
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<p style='color: red;'>Erreur lors de la suppression de l'article.</p>";
    }
} else {
    echo "<p style='color: red;'>Aucun ID spécifié pour la suppression.</p>";
}
?>
