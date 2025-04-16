<?php
@include("connexion.php"); // Inclusion de la connexion à la base de données

// Récupérer les articles depuis la base de données
$requete = "SELECT Identifiant, Titre FROM article";
$stmt = $pdo->query($requete);
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Article</title>
    <link rel="stylesheet" href="modifier.css">
</head>
<body>

    <div class="container">
        <div class="main-content">
            <header>
                <h1>Modifier un Article</h1>
                <form action="" method="GET">
                    <label for="article">Sélectionnez un article :</label>
                    <select id="article" name="id">
                        <?php
                        // Affichage des articles disponibles dans la liste déroulante
                        foreach ($articles as $article) {
                            echo "<option value='" . htmlspecialchars($article['Identifiant']) . "'>" . 
                                 htmlspecialchars($article['Identifiant']) . " - " . htmlspecialchars($article['Titre']) . "</option>";
                        }
                        ?>
                    </select>
                    <button type="submit">Choisir</button>
                </form>
            </header>

            <?php
            // Vérification de l'ID de l'article sélectionné
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                // Charger les données de l'article sélectionné
                $requete = "SELECT * FROM article WHERE Identifiant = :id";
                $stmt = $pdo->prepare($requete);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                $article = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($article) {
                    // Récupérer l'image actuelle (si elle existe)
                    $image_current = isset($article['Image']) ? $article['Image'] : '';
                    ?>

                    <!-- Formulaire de modification de l'article -->
                    <form class="modify-form" id="modify-form" action="modifier_.php" method="POST" enctype="multipart/form-data">
                        <!-- ID de l'article (caché) -->
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($article['Identifiant']); ?>">
                        
                        <!-- Image actuelle (cachée) -->
                        <input type="hidden" name="image_current" value="<?php echo htmlspecialchars($image_current); ?>">

                        <!-- Champ pour le titre -->
                        <div class="form-group">
                            <label for="titre">Titre :</label>
                            <input type="text" id="titre" name="titre" value="<?php echo htmlspecialchars($article['Titre']); ?>" required>
                        </div>

                        <!-- Champ pour le contenu -->
                        <div class="form-group">
                            <label for="contenu">Contenu :</label>
                            <textarea id="contenu" name="contenu" rows="4" required><?php echo htmlspecialchars($article['Contenu']); ?></textarea>
                        </div>

                        <!-- Champ pour l'image -->
                        <div class="form-group">
                            <label for="image">Image :</label>
                            <input type="file" id="image" name="image">
                            <?php
                            // Vérifier si l'image actuelle existe dans le dossier Images/
                            if ($image_current) {
                                // Vérifier si l'image commence par "Images/"
                                if (substr($image_current, 0, 7) !== 'Images/') {
                                    $imagePath = "Images/" . $image_current;
                                } else {
                                    $imagePath = $image_current;
                                }

                                // Vérifier l'existence du fichier
                                if (file_exists($imagePath)) {
                                    echo "<p>Image actuelle :</p>";
                                    // Afficher l'image actuelle
                                    echo "<img src='$imagePath' alt='Image actuelle' width='100'>";
                                } else {
                                    echo "<p style='color: red;'>Erreur : L'image actuelle n'a pas été trouvée. Le chemin est : $imagePath</p>";
                                }
                            } else {
                                echo "<p>Aucune image actuelle.</p>";
                            }
                            ?>
                        </div>

                        <!-- Champ pour la date de publication -->
                        <div class="form-group">
                            <label for="date_publication">Date de publication :</label>
                            <input type="date" id="date_publication" name="date_publication" value="<?php echo htmlspecialchars($article['Date_publication']); ?>" readonly>
                        </div>

                        <!-- Bouton de soumission -->
                        <button type="submit" class="modify-btn">Modifier</button>
                    </form>

                    <?php
                } else {
                    echo "<p style='color: red;'>Aucun article trouvé avec cet ID.</p>";
                }
            }
            ?>
        </div>
    </div>

</body>
</html>
