<?php
@include("connexion.php"); // Inclusion de la connexion à la base de données

// Vérifie si la connexion est réussie
if (!isset($pdo)) {
    die("Erreur de connexion à la base de données");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sécurisation des données
    $titre = htmlspecialchars($_POST['titre']);
    $contenu = htmlspecialchars($_POST['contenu']);
    $identifiant_administrateur = intval($_POST['identifiant_administrateur']);
    $identifiant_categorie = !empty($_POST['identifiant_categorie']) ? intval($_POST['identifiant_categorie']) : NULL;
    $date_publication = date("Y-m-d"); // Date du jour

    $imagePath = NULL;
    if (!empty($_FILES["image"]["name"])) {
        // Répertoire cible pour les images
        $targetDir = "Images/"; // Le dossier "Images" situé dans "Mission12"

        // Vérifier si le répertoire existe, sinon le créer
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);  // Crée le dossier avec les bonnes permissions
        }

        $imageName = basename($_FILES["image"]["name"]);
        $imagePath = $targetDir . time() . "_" . $imageName; // Ajouter un préfixe unique pour éviter les doublons
        $imageType = strtolower(pathinfo($imagePath, PATHINFO_EXTENSION));

        // Vérification du format de l'image
        $extensions_valides = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageType, $extensions_valides)) {
            die("<p style='color: red;'>Format d'image non valide. (JPG, JPEG, PNG, GIF autorisés)</p>");
        }

        // Vérification de la taille de l'image (max 2Mo)
        if ($_FILES["image"]["size"] > 2 * 1024 * 1024) {
            die("<p style='color: red;'>L'image est trop grande (max 2Mo).</p>");
        }

        // Déplacer l'image vers le dossier cible
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) {
            die("<p style='color: red;'>Erreur lors de l'upload de l'image.</p>");
        }
    }


    // Insertion dans la base de données
    try {
        // Préparer la requête d'insertion
        $requete = $pdo->prepare("INSERT INTO article (Titre, Contenu, Image, Date_publication, Identifiant_Administrateur, Identifiant_Categorie) 
                                   VALUES (:titre, :contenu, :image, :date_publication, :identifiant_administrateur, :identifiant_categorie)");

        // Lier les paramètres
        $requete->bindParam(":titre", $titre);
        $requete->bindParam(":contenu", $contenu);
        $requete->bindParam(":image", $imagePath);
        $requete->bindParam(":date_publication", $date_publication);
        $requete->bindParam(":identifiant_administrateur", $identifiant_administrateur);
        $requete->bindParam(":identifiant_categorie", $identifiant_categorie, PDO::PARAM_NULL);

        // Exécuter la requête
        if ($requete->execute()) {
            echo "<p style='color: green;'>Article ajouté avec succès !</p>";
        } else {
            echo "<p style='color: red;'>Erreur lors de l'ajout de l'article.</p>";
        }
    } catch (PDOException $e) {
        echo "<p style='color: red;'>Erreur : " . $e->getMessage() . "</p>";
    }
} else {
    echo "<p style='color: red;'>Accès interdit</p>";
}
?>
<a href="ajouter.html">Retour</a>
