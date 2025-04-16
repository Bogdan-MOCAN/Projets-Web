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
    <title>Ajouter Produit</title>
    <link rel="stylesheet" href="ajouter.css">
</head>
<body bgcolor="#00ff44">
    <h1>Ajouter un Produit</h1>

    <form action="ajouter.php" method="post" enctype="multipart/form-data">
        <label for="nom_produit">Nom du produit :</label>
        <input type="text" id="nom_produit" name="nom_produit" required>
        <br>
        <label for="prix">Prix :</label>
        <input type="number" step="0.01" id="prix" name="prix" required>
        <br>
        <label for="stock">Stock :</label>
        <input type="number" id="stock" name="stock" required>
        <br>
        
        <label for="disponibilite">Disponibilité :</label>
        <select id="disponibilite" name="disponibilite" required>
            <option value="Oui">Oui</option>
            <option value="Non">Non</option>
        </select>

        <label for="image">Image du produit :</label>
        <input type="file" id="image" name="image">

        <br><br>

        <button type="submit">Ajouter</button>
        <a href="menu1.php"><button type="button">Retour</button></a>
    </form>
</body>
</html>
