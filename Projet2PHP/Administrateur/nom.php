<html>
    <body bgcolor="#00ff44">
        <?php
        session_start();
        
        echo "Bienvenue, " . $_SESSION["login"] . " !";
        echo " Vous etes connecte en tant qu'" . $_SESSION["fonction"] . ".";

        @include("../connexion.php");

        $a = $_POST['nom'];

        $requete = "SELECT * FROM clients WHERE nom = '$a'";
        $resultat = mysqli_query($conn, $requete);
        ?>
        <center><table border="1">
            <tr>
                <td>Id_Client</td>
                <td>Nom</td>
                <td>Prenom</td>
                <td>Email</td>
                <td>Date_inscription</td>
            </tr>
            <?php 
            while ($enreg = mysqli_fetch_array($resultat)) {
            ?>
                <tr>
                    <td><?php echo $enreg["id_client"]; ?></td>
                    <td><?php echo $enreg["nom"]; ?></td>
                    <td><?php echo $enreg["prenom"]; ?></td>
                    <td><?php echo $enreg["email"]; ?></td>
                    <td><?php echo $enreg["date_inscription"]; ?></td>
                </tr>
            <?php 
            }
            ?>
        </table></center>
        <?php
        mysqli_close($conn);
        ?>
        <h2>Retour à la recherche :</h2><a href="nom_page.php">Recherche</a>
    </body>
</html>
