<?php
@include("connexion.php");

// Récupérer les messages depuis la base de données
$requete = "SELECT Identifiant, Nom, E_mail, Message FROM message_utilisateurs ORDER BY Identifiant DESC";
$stmt = $pdo->query($requete);
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages des Utilisateurs</title>
    <link rel="stylesheet" href="message.css">
</head>
<body>

    <main class="content">
        <h1>Messages Reçus</h1>
        <h2>Retrouvez ici les messages envoyés par les utilisateurs</h2>

        <div class="articles">
            <?php foreach ($messages as $message) { ?>
            <article class="article">
                <div class="article-content">
                    <h3><?php echo htmlspecialchars($message['Nom']); ?> - <?php echo htmlspecialchars($message['E_mail']); ?></h3>
                    <p><?php echo htmlspecialchars(substr($message['Message'], 0, 150)) . '...'; ?></p>
                </div>
                <form action="supprimer_message.php" method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer ce message ?');">
                    <input type="hidden" name="Identifiant" value="<?php echo $message['Identifiant']; ?>">
                    <button type="submit" class="delete-btn">🗑️</button>
                </form>
            </article>
            <?php } ?>
        </div>
    </main>

</body>
</html>
