<?php
session_start();

echo "Bienvenue, " . $_SESSION["login"] . " !";
echo " Vous etes connecte en tant qu'" . $_SESSION["fonction"] . ".";
?>

<html>
    <body bgcolor="#00ff44">
        <?php
        @include("../connexion.php");
        $requete="select nom, email from clients";
        $resultat=mysqli_query($conn,$requete);
        ?>
        <center><table border="1">
            <tr><td>Nom</td><td>Email</td></tr>
            <?php 
            while($enreg=mysqli_fetch_array($resultat)) {
            ?>
                <tr>
                <td><?php echo $enreg["nom"];?></td>
                <td><?php echo $enreg["email"];?></td>
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