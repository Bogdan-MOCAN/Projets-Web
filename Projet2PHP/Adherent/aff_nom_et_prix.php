<?php
session_start();

echo "Bienvenue, " . $_SESSION["login"] . " !";
echo " Vous etes connecte en tant qu'" . $_SESSION["fonction"] . ".";
?>

<html>
    <body bgcolor="#fcba03">
        <?php
        @include("../connexion.php");
        $requete="select nom_produit, prix from produits";
        $resultat=mysqli_query($conn,$requete);
        ?>
        <center><table border="1">
            <tr><td>Nom_produit</td><td>Prix</td></tr>
            <?php 
            while($enreg=mysqli_fetch_array($resultat)) {
            ?>
                <tr>
                <td><?php echo $enreg["nom_produit"];?></td>
                <td><?php echo $enreg["prix"];?></td>
                </tr>
            <?php 
            }
            ?>
            </table></center>
            <?php
            mysqli_close($conn);
            ?>
        <h2>Retour au menu :</h2><a href="menu2.php">Menu</a>
    </body>
</html>