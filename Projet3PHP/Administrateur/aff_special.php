<?php
session_start();

echo "Bienvenue, " . $_SESSION["Login"] . " !";
echo " Vous êtes connecté en tant qu'" . $_SESSION["Fonction"] . ".";

@include("../connexion.php");

try {
    // Requête pour récupérer les produits
    $requete = "SELECT id_produit, nom_produit, prix, stock, disponibilite FROM produits";
    $stmt = $pdo->prepare($requete);
    $stmt->execute();
    $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
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
    <table border="1">
        <tr>
            <th>ID Produit</th>
            <th>Nom Produit</th>
            <th>Prix</th>
            <th>Stock</th>
            <th>Disponibilité</th>
            <th>Rechercher</th>
            <th>Suppression</th>
        </tr>
        <?php foreach ($resultat as $enreg) { ?>
            <tr>
                <td><?php echo htmlspecialchars($enreg["id_produit"]); ?></td>
                <td><?php echo htmlspecialchars($enreg["nom_produit"]); ?></td>
                <td><?php echo htmlspecialchars($enreg["prix"]); ?> €</td>
                <td><?php echo htmlspecialchars($enreg["stock"]); ?></td>
                <td><?php echo htmlspecialchars($enreg["disponibilite"]); ?></td>
                <td>
                    <a href="rechercher.php?id=<?php echo urlencode($enreg['id_produit']); ?>">Rechercher</a>
                </td>
                <td>
                    <a href="supprimer2.php?id=<?php echo urlencode($enreg['id_produit']); ?>">Supprimer</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <br>
    <a href="menu1.php">Retour</a>
    </center>
</body>
</html>
