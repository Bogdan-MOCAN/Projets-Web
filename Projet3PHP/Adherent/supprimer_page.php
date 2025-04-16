<?php
session_start();

echo "Bienvenue, " . $_SESSION["Login"] . " !";
echo " Vous etes connecte en tant qu'" . $_SESSION["Fonction"] . ".";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression de Produit</title>
    <link rel="stylesheet" href="supprimer.css">
</head>
<body bgcolor="#fcba03">
    <h1>Supprimer un Produit</h1>

    <form action="supprimer.php" method="post">
        <label for="id_produit">Entrez l'ID du produit à supprimer :</label>
        <input type="text" id="id_produit" name="id_produit" required>
        <br><br>
        <button type="submit">Supprimer</button>
        <a href="menu2.php"><button type="button">Retour</button></a>
    </form>
</body>
</html>
