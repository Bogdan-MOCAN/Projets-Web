<?php
session_start();
@include("../connexion.php");

echo "Bienvenue, " . $_SESSION["Login"] . " !";
echo " Vous êtes connecté en tant qu'" . $_SESSION["Fonction"] . "'.";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Produits</title>
</head>
<body bgcolor="#00ff44">
    <?php
    try {
        // Requête sécurisée avec PDO
        $requete = "SELECT * FROM produits";
        $stmt = $pdo->query($requete);
        $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Erreur SQL : " . $e->getMessage());
    }
    ?>

    <form action="rechercher_affichage.php" method="POST">
        <select name="id_produit" style="text-align: center; font-weight: bold;">
            <option value="">-- Choisissez un produit --</option>
            <?php
            foreach ($produits as $produit) {
                echo "<option value='" . htmlspecialchars($produit['id_produit']) . "'>" . htmlspecialchars($produit['nom_produit']) . "</option>";
            }
            ?>
        </select>
        <input type="submit" name="b1" value="Rechercher le produit">
    </form>
    <h2>Retour au menu :</h2><a href="menu1.php">Menu</a>

</body>
</html>
