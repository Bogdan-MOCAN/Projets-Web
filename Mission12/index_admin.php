<?php
// Inclusion du fichier de connexion à la base de données
include("connexion.php");

// Requête pour récupérer les articles
$query = "SELECT article.Titre, article.Contenu, article.Image, article.Date_publication, 
                 COALESCE(categorie.Nom, 'Sans catégorie') AS Categorie 
          FROM article 
          LEFT JOIN categorie ON article.Identifiant_Categorie = categorie.Identifiant 
          ORDER BY article.Date_publication DESC 
          LIMIT 10";

$stmt = $pdo->prepare($query);
$stmt->execute();
$articles = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les actualités d'aujourd'hui</title>
    <link rel="stylesheet" href="style_admin.css">
</head>
<body>

<header>
    <div class="header-container">
        <nav>
            <ul>
                <li><a href="index_admin.php">Actualités</a></li>
                <li><a href="gestion.html">Gestion des articles</a></li>
            </ul>
        </nav>
        
        <!-- Groupe le titre et le message ensemble -->
        <div class="header-center">
            <h1>Site d'Actualités</h1>
            <p class="admin-welcome">Bienvenue Administrateur</p>
        </div>
        
        <a href="login.php" class="login-btn">Déconnexion</a>
    </div>
</header>

<main>
    <section class="featured-news">
        <img src="images/Image1.png" alt="Image principale">
        <div class="news-content">
            <h1>Les avancées de l'IA en 2025 : Ce que vous devez savoir</h1>
            <p>Les nouvelles intelligences artificielles révolutionnent le monde de la technologie. Découvrez comment elles impactent votre quotidien.</p>
        </div>
    </section>

    <section class="news-columns">
        <div class="top-stories">
            <center><h2>Actualités principales</h2></center>

            <?php foreach ($articles as $article) : ?>
                <div class="news-card">
                <img src="<?php echo htmlspecialchars($article['Image']); ?>" alt="<?php echo htmlspecialchars($article['Titre']); ?>">
                    <div class="text-content">
                        <h3><?php echo htmlspecialchars($article['Titre']); ?></h3>
                        <p><?php echo nl2br(htmlspecialchars(substr($article['Contenu'], 0, 150))) . '...'; ?></p>
                        <p><strong>Catégorie :</strong> <?php echo htmlspecialchars($article['Categorie']); ?></p>
                        <p><strong>Publié le :</strong> <?php echo htmlspecialchars($article['Date_publication']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>

</body>
</html>
