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
    <title>Document</title>
</head>
<body bgcolor="#fcba03">
    <center>
        <h1>Rechercher un client</h1>
        <form action="nom.php" method="post">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>
            <div class="button-group">
                <input type="submit" value="Valider">
            </div>
        </form>
    </center>
    <h2>Retour au menu :</h2><a href="menu2.php">Menu</a>
</body>
</html>