<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>
<body bgcolor="#fcba03">
    <div class="session1"><h2>
        <?php
            echo "Bienvenue, " . $_SESSION["Login"] . " !";
            echo " Vous êtes connecté en tant qu'" . $_SESSION["Fonction"] . ".";
        ?>
    </h2></div>
    
    <h1>TP2 PHP - Commandes</h1>
    <button onclick="window.location.href='produits.php';">Lister les produits</button>
    <button onclick="window.location.href='aff_nom_et_email.php';">Afficher noms et emails des clients</button>
    <button onclick="window.location.href='aff_nom_et_prix.php';">Afficher noms et prix des produits</button>
    <button onclick="window.location.href='commandes.php';">Afficher les commandes</button>
    <button onclick="window.location.href='nom_page.php';">Afficher nom</button>
    <button onclick="window.location.href='stock.php';">Afficher stock</button>
    <button onclick="window.location.href='liste.php';">Afficher la liste</button>
    <button onclick="window.location.href='supprimer_page.php';">Supprimer</button>
    <button onclick="window.location.href='ajouter_page.php';">Ajouter</button>
    <button onclick="window.location.href='aff_special.php';">Affichage spécial</button>
    <button onclick="window.location.href='aff_css.php';">Affichage en css</button>
    <button onclick="window.location.href='rechercher_selection.php';">Rechercher</button>
    <button onclick="window.location.href='../logout.php';">Se déconnecter</button>
</body>
</html>