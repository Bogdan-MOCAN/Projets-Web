<?php
session_start();
@include("../connexion.php");

try {
    // Requête sécurisée avec requête préparée
    $requete = "SELECT * FROM produits";
    $stmt = $pdo->prepare($requete);
    $stmt->execute();
    $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur SQL : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
</head>
<body bgcolor="#fcba03">

<?php
echo "Le nombre de produits est " . count($produits);
?>

<div class="form_box">
    <div class="form_value">
        <center>
            <table border="1" style="color:black;">
                <tr>
                    <th>Id_produit</th>
                    <th>Nom_produit</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th>Disponibilite</th>
                </tr>

                <?php foreach ($produits as $produit) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($produit['id_produit']); ?></td>
                    <td><?php echo htmlspecialchars($produit['nom_produit']); ?></td>
                    <td><?php echo htmlspecialchars($produit['prix']); ?></td>
                    <td><?php echo htmlspecialchars($produit['stock']); ?></td>
                    <td><?php echo htmlspecialchars($produit['disponibilite']); ?></td>
                </tr>
                <?php } ?>
            </table>
            <h2>Retour au menu :</h2><a href="menu2.php">Menu</a>
        </center>
    </div>
</div>

</body>
</html>
