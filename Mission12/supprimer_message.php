<?php
@include("connexion.php");

// Vérifier si l'ID est passé par le formulaire
if (isset($_POST['Identifiant'])) {
    $id_message = $_POST['Identifiant'];

    // Requête de suppression
    $requete = "DELETE FROM message_utilisateurs WHERE Identifiant = :id";
    $stmt = $pdo->prepare($requete);
    $stmt->bindParam(':id', $id_message, PDO::PARAM_INT);

    // Exécuter la requête
    if ($stmt->execute()) {
        // Redirection après suppression
        header("Location: message.php");
        exit();
    } else {
        echo "<p style='color: red;'>Erreur lors de la suppression du message.</p>";
    }
} else {
    echo "<p style='color: red;'>Aucun ID specifie pour la suppression.</p>";
}
?>
