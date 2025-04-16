<?php
session_start();

@include("../connexion.php");

$requete = "SELECT * FROM `produits`";
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
    <title>Affichage des Produits</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #00ff44;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h1 {
            font-size: 25px;
            font-weight: bold;
            color: red;
            margin-top: 20px;
        }

        .produit_container {
            border-radius: 10px;
            border: 1px solid white;
            background-color: yellow;
            width: 15%;
            height: 200px;
            text-align: center;
            margin: 5px;
            padding: 10px;
            display: inline-block;
            margin: 40px;
        }

        .produit_titre {
            color: red;
            font-size: 15px;
            font-weight: bold;
        }

        .produit_details span {
            color: red;
            font-size: 14px;
        }

        .produit_details span.value {
            font-weight: bold;
            color: black;
        }

        a {
            position: fixed;
            bottom: 50px;
            left: 50%;
            transform: translateX(-50%);
            text-decoration: none;
            color: black;
            font-weight: bold;
        }

        a:hover {
            color: darkblue;
        }

        .session1 {
            color: blue;
        }
    </style>
</head>

<body>
    <div class="session1"><h2>
        <?php
            echo "Bienvenue, " . $_SESSION["login"] . " !";
            echo " Vous êtes connecté en tant qu'" . $_SESSION["fonction"] . ".";
        ?>
    </h2></div>
    <h1>Affichage des Produits</h1>

    <?php while ($produit = mysqli_fetch_array($resultat)) { ?>
        <div class="produit_container">
            <h2 class="produit_titre">ID: <?php echo $produit['id_produit']; ?></h2>
            <p class="produit_details">
                <span>Nom: </span><span class="value"><?php echo $produit['nom_produit']; ?></span><br>
                <span>Prix: </span><span class="value"><?php echo $produit['prix']; ?> €</span><br>
                <span>Stock: </span><span class="value"><?php echo $produit['stock']; ?></span><br>
                <span>Disponibilite: </span><span class="value"><?php echo $produit['disponibilite']; ?></span>
            </p>
        </div>
    <?php } ?>
    
    <?php mysqli_close($conn); ?>

    <a href="menu1.php">Retour au menu</a>
</body>

</html>
