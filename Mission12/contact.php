<?php
// Inclusion du fichier de connexion à la base de données
include("connexion.php");

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Préparation de la requête d'insertion dans la table 'message_utilisateurs'
    $query = "INSERT INTO message_utilisateurs (Nom, E_mail, Message) VALUES (:nom, :email, :message)";
    $stmt = $pdo->prepare($query);

    // Lier les paramètres
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':message', $message);

    // Exécution de la requête
    if ($stmt->execute()) {
        // Message de succès avec un bouton pour revenir à la page contact
        echo "<script>
                alert('Message envoye avec succes !');
                window.location.href = 'contact.html'; // Redirige vers la page contact
              </script>";
    } else {
        // Message d'erreur avec un bouton pour revenir à la page contact
        echo "<script>
                alert('Erreur lors de l\'envoi du message.');
                window.location.href = 'contact.php'; // Redirige vers la page contact
              </script>";
    }
}
?>