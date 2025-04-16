<?php
@include("../connexion.php");

// Vérifier si l'ID est passé en paramètre dans l'URL
if (isset($_GET['id'])) {
    $id_produit = $_GET['id'];

    // Requête pour récupérer les informations du produit par ID
    $requete = "SELECT id_produit, nom_produit, prix, stock, disponibilite FROM produits WHERE id_produit = '$id_produit'";

    // Exécuter la requête
    $resultat = mysqli_query($conn, $requete);

    if ($resultat && mysqli_num_rows($resultat) > 0) {
        // Récupérer les données du produit
        $produit = mysqli_fetch_assoc($resultat);
        $nom_produit = $produit['nom_produit'];
        $prix = $produit['prix'];
        $stock = $produit['stock'];
        $disponibilite = $produit['disponibilite'];
    } else {
        echo "<p>Produit non trouvé.</p>";
        exit;
    }
} else {
    echo "<p>ID du produit non spécifié.</p>";
    exit;
}

mysqli_close($conn);
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
            <td><?php echo $id_produit; ?></td>
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
    <a href="menu2.php"><button>Retour</button></a>
    </center>
</body>
</html>
