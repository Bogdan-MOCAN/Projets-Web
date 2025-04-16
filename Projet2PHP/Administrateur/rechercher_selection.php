<?php
@include("../connexion.php");

session_start();

echo "Bienvenue, " . $_SESSION["login"] . " !";
echo " Vous etes connecte en tant qu'" . $_SESSION["fonction"] . ".";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Produits</title>
</head>
<body bgcolor="#00ff44">
    <?php
    $requete = "SELECT * FROM produits";
    $resultat = mysqli_query($conn, $requete);
    ?>

    <form action="rechercher_affichage.php" method="POST">
        <select name="id_produit" style="text-align: center; font-weight: bold;">
            <option value="">-- Choisissez un produit --</option>
            <?php
            while ($produit = mysqli_fetch_array($resultat)) {
                echo "<option value='" . $produit['id_produit'] . "'>" . utf8_encode($produit['nom_produit']) . "</option>";
            }
            ?>
        </select>
        <input type="submit" name="b1" value="Rechercher le produit">
    </form>

    <?php
    mysqli_close($conn);
    ?>
</body>
</html>
