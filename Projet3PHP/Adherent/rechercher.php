<?php
@include("../connexion.php");

// Vérifier si l'ID est passé en paramètre dans l'URL
if (isset($_GET['id'])) {
    $id_produit = $_GET['id'];

    try {
        // Requête pour récupérer les informations du produit par ID
        $requete = "SELECT id_produit, nom_produit, prix, stock, disponibilite FROM produits WHERE id_produit = :id_produit";
        $stmt = $pdo->prepare($requete);
        $stmt->bindParam(':id_produit', $id_produit, PDO::PARAM_INT);
        $stmt->execute();

        // Vérifier si un produit est trouvé
        if ($produit = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $nom_produit = htmlspecialchars($produit['nom_produit']);
            $prix = htmlspecialchars($produit['prix']);
            $stock = htmlspecialchars($produit['stock']);
            $disponibilite = htmlspecialchars($produit['disponibilite']);
        } else {
            echo "<p>Produit non trouvé.</p>";
            exit;
        }
    } catch (PDOException $e) {
        die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
    }
} else {
    echo "<p>ID du produit non spécifié.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Produit</title>
</head>
<body bgcolor="#fcba03">
    <center>
    <h1>Détails du Produit</h1>

    <table border="1">
        <tr>
            <th>ID Produit</th>
            <td><?php echo htmlspecialchars($id_produit); ?></td>
        </tr>
        <tr>
            <th>Nom Produit</th>
            <td><?php echo $nom_produit; ?></td>
        </tr>
        <tr>
            <th>Prix</th>
            <td><?php echo $prix; ?> €</td>
        </tr>
        <tr>
            <th>Stock</th>
            <td><?php echo $stock; ?></td>
        </tr>
        <tr>
            <th>Disponibilité</th>
            <td><?php echo $disponibilite; ?></td>
        </tr>
    </table>

    <br>
    <a href="aff_special.php"><button>Retour</button></a>
    </center>
</body>
</html>
