<?php
session_start();

echo "Bienvenue, " . $_SESSION["login"] . " !";
echo " Vous etes connecte en tant qu'" . $_SESSION["fonction"] . ".";

@include("../connexion.php");

// Requête pour récupérer les produits
$requete = "SELECT id_produit, nom_produit, prix, stock, disponibilite FROM produits";
$resultat = mysqli_query($conn, $requete);

if (!$resultat) {
    die("Erreur lors de l'exécution de la requête : " . mysqli_error($conn));
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
    <center>
    <table border="1">
        <tr>
            <th>ID Produit</th>
            <th>Nom Produit</th>
            <th>Prix</th>
            <th>Stock</th>
            <th>Disponibilite</th>
            <th>Rechercher</th>
            <th>Suppression</th>
        </tr>
        <?php while ($enreg = mysqli_fetch_array($resultat)) { ?>
            <tr>
                <td><?php echo $enreg["id_produit"]; ?></td>
                <td><?php echo $enreg["nom_produit"]; ?></td>
                <td><?php echo $enreg["prix"]; ?> €</td>
                <td><?php echo $enreg["stock"]; ?></td>
                <td><?php echo $enreg["disponibilite"]; ?></td>
                <td>
                    <a href="rechercher.php?id=<?php echo $enreg['id_produit']; ?>">Rechercher</a>
                </td>
                <td>
                    <a href="supprimer2.php?id=<?php echo $enreg['id_produit']; ?>">Supprimer</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <br>
    <a href="menu2.php">Retour</a>
    </center>
</body>
</html>
<?php
mysqli_close($conn);
?>
