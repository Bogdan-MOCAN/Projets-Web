<?php
session_start();

echo "Bienvenue, " . $_SESSION["login"] . " !";
echo " Vous etes connecte en tant qu'" . $_SESSION["fonction"] . ".";
?>

<html>
    <body bgcolor="#fcba03">
        <?php
        @include("../connexion.php");
        $requete="select id_produit, nom_produit, stock from produits where stock>10";
        $resultat=mysqli_query($conn,$requete);
        ?>
        <center><table border="1">
            <tr><td>Id_Produit</td><td>Nom_Produit</td><td>Stock</td></tr>
            <?php 
            while($enreg=mysqli_fetch_array($resultat)) {
            ?>
                <tr>
                <td><?php echo $enreg["id_produit"];?></td>
                <td><?php echo $enreg["nom_produit"];?></td>
                <td><?php echo $enreg["stock"];?></td>
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