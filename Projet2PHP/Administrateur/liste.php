<?php
session_start();

echo "Bienvenue, " . $_SESSION["login"] . " !";
echo " Vous etes connecte en tant qu'" . $_SESSION["fonction"] . ".";
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
</head>
<body bgcolor="#00ff44">
    <?php
    include("../connexion.php");

    if (!$conn) {
        die("Erreur : Connexion à la base de données échouée.");
    }

    $requete = "SELECT * FROM produits";
    $resultat = mysqli_query($conn, $requete);

    if (!$resultat) {
        die("Erreur dans la requête SQL : " . mysqli_error($conn));
    }
    ?>

    <select style="text-align: center; font-weight: bold;">
        <option value="">--Choisissez un produit--</option>
        <?php
        while ($enre = mysqli_fetch_array($resultat)) {
            ?>
            <option><?php echo utf8_encode($enre['nom_produit']); ?></option>
            <?php
        }
        ?>
    </select>

    <?php mysqli_close($conn); ?>
</body>
</html>
