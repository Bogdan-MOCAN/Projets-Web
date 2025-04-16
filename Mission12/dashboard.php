<?php
@include("connexion.php");

// Récupérer les articles depuis la base de données
$requete = "SELECT Identifiant, titre, contenu, image FROM article";
$stmt = $pdo->query($requete);
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>

    <main class="content">
        <h1>Bienvenue Administrateur</h1>
        <h2>Dashboard</h2>

        <div class="articles">
            <?php foreach ($articles as $article) { ?>
            <article class="article">
            <img src="<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['titre']); ?>">
                <div class="article-content">
                    <h3><?php echo htmlspecialchars($article['titre']); ?></h3>
                    <p><?php echo htmlspecialchars(substr($article['contenu'], 0, 100)) . '...'; ?></p>
                </div>
                <form action="supprimer.php" method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer cet article ?');">
                    <input type="hidden" name="Identifiant" value="<?php echo $article['Identifiant']; ?>">
                    <button type="submit" class="delete-btn">🗑️</button>
                </form>

            </article>
            <?php } ?>
        </div>
    </main>

</body>
</html>
