<?php
@include("connexion.php"); // Inclusion de la connexion à la base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sécurisation des données
    $id = $_POST['id'];
    $titre = htmlspecialchars($_POST['titre']);
    $contenu = htmlspecialchars($_POST['contenu']);
    $image_current = $_POST['image_current'];

    // Vérification si une nouvelle image est téléchargée
    if (!empty($_FILES["image"]["name"])) {
        // Répertoire cible pour les images
        $targetDir = "Images/"; // Dossier des images
        // Nouveau nom pour l'image pour éviter les conflits
        $imageName = time() . "_" . basename($_FILES["image"]["name"]);
        $imagePath = $targetDir . $imageName;

        // Vérification de l'extension de l'image
        $imageType = strtolower(pathinfo($imagePath, PATHINFO_EXTENSION));
        $extensions_valides = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageType, $extensions_valides)) {
            die("<p style='color: red;'>Format d'image non valide. (JPG, JPEG, PNG, GIF autorisés)</p>");
        }

        // Vérification de la taille de l'image (max 2Mo)
        if ($_FILES["image"]["size"] > 2 * 1024 * 1024) {
            die("<p style='color: red;'>L'image est trop grande (max 2Mo).</p>");
        }

        // Déplacement de l'image téléchargée vers le dossier cible
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) {
            die("<p style='color: red;'>Erreur lors de l'upload de l'image.</p>");
        }
    } else {
        // Si aucune nouvelle image, garder l'ancienne image
        $imagePath = $image_current;
    }

    // Mise à jour de l'article dans la base de données
    try {
        $requete = "UPDATE article 
                    SET Titre = :titre, 
                        Contenu = :contenu, 
                        Image = :image 
                    WHERE Identifiant = :id";
        
        $stmt = $pdo->prepare($requete);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':contenu', $contenu);
        $stmt->bindParam(':image', $imagePath);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Exécution de la requête
        if ($stmt->execute()) {
            echo "<p style='color: green;'>Article modifié avec succès !</p>";
        } else {
            echo "<p style='color: red;'>Erreur lors de la mise à jour de l'article.</p>";
        }
    } catch (PDOException $e) {
        echo "<p style='color: red;'>Erreur : " . $e->getMessage() . "</p>";
    }
} else {
    echo "<p style='color: red;'>Accès interdit</p>";
}
?>
<a href="dashboard.php">Retour au Dashboard</a>
