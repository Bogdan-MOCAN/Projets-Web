<?php
session_start();

echo "Bienvenue, " . $_SESSION["Login"] . " !";
echo " Vous etes connecte en tant qu'" . $_SESSION["Fonction"] . ".";

@include("../connexion.php");

try {
    // Requête pour récupérer les produits
    $requete = "SELECT nom_produit FROM produits";
    $stmt = $pdo->query($requete);
    $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur lors de la récupération des produits : " . $e->getMessage());
}
?>

<!DOCTYPE html> 
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
</head>
<body bgcolor="#00ff44">
    <center>
    <h1>Liste des Produits</h1>
    <select style="text-align: center; font-weight: bold;">
        <option value="">-- Choisissez un produit --</option>
        <?php foreach ($produits as $produit) { ?>
            <option><?php echo htmlspecialchars($produit['nom_produit']); ?></option>
        <?php } ?>
    </select>
    </center>
</body>
</html>
