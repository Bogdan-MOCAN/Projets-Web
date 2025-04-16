<?php
session_start();

echo "Bienvenue, " . $_SESSION["login"] . " !";
echo " Vous etes connecte en tant qu'" . $_SESSION["fonction"] . ".";
?>

<html>
    <body bgcolor="#00ff44">
        <?php
        @include("../connexion.php");
        $requete="select * from commandes";
        $resultat=mysqli_query($conn,$requete);
        ?>
        <center><table border="1">
            <tr><td>Id_Commande</td><td>Id_Client</td><td>Date_commande</td><td>Montant_total</td></tr>
            <?php 
            while($enreg=mysqli_fetch_array($resultat)) {
            ?>
                <tr>
                <td><?php echo $enreg["id_commande"];?></td>
                <td><?php echo $enreg["id_client"];?></td>
                <td><?php echo $enreg["date_commande"];?></td>
                <td><?php echo $enreg["montant_total"];?></td>
                </tr>
            <?php 
            }
            ?>
            </table></center>
            <?php
            mysqli_close($conn);
            ?>
        <h2>Retour au menu :</h2><a href="menu1.php">Menu</a>
    </body>
</html>