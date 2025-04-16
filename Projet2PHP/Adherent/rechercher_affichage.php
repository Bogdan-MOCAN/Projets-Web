<?php
@include("../connexion.php");

session_start();

echo "Bienvenue, " . $_SESSION["login"] . " !";
echo " Vous etes connecte en tant qu'" . $_SESSION["fonction"] . ".";

if (isset($_POST['id_produit']) && !empty($_POST['id_produit'])) {
    $id_produit = $_POST['id_produit'];

    $requete = "SELECT * FROM produits WHERE id_produit = '$id_produit'";
    $resultat = mysqli_query($conn, $requete);

    if ($produit = mysqli_fetch_array($resultat)) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Détails du Produit</title>
        </head>
        <body bgcolor="#fcba03">
            <table border="1" align="center">
                <tr>
                    <th>ID Produit</th>
                    <th>Nom Produit</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th>Disponibilité</th>
                </tr>
                <tr>
                    <td><?php echo $produit['id_produit']; ?></td>
                    <td><?php echo utf8_encode($produit['nom_produit']); ?></td>
                    <td><?php echo $produit['prix']; ?></td>
                    <td><?php echo $produit['stock']; ?></td>
                    <td><?php echo utf8_encode($produit['disponibilite']); ?></td>
                </tr>
            </table>
            <br>
            <center><a href="rechercher_selection.php">Retour</a></center>
        </body>
        </html>
        <?php
    } else {
        echo "Aucun produit trouvé pour l'ID donné.";
    }
} else {
    echo "Veuillez sélectionner un produit.";
}

mysqli_close($conn);
?>
