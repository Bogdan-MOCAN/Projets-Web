<html>
    <body>
        <?php
        @include("connexion.php");
        $requete="select * from livres";
        $resultat=mysqli_query($conn,$requete);
        ?>
        <center><table border="1">
            <tr><td>Reference</td><td>Nbre_pages</td><td>#ID_Auteur</td><td>Date_publication</td><td>Genre</td><td>Disponibilite</td><td>Nbre_emprunts</td><td>Etat</td><td>Nbre_exemplaire</td></tr>
            <?php 
            while($enreg=mysqli_fetch_array($resultat)) {
            ?>
                <tr>
                <td><?php echo $enreg["Reference"];?></td>
                <td><?php echo $enreg["Nbre_pages"];?></td>
                <td><?php echo $enreg["#ID_Auteur"];?></td>
                <td><?php echo $enreg["Date_publication"];?></td>
                <td><?php echo $enreg["Genre"];?></td>
                <td><?php echo $enreg["Disponibilite"];?></td>
                <td><?php echo $enreg["Nbre_emprunts"];?></td>
                <td><?php echo $enreg["Etat"];?></td>
                <td><?php echo $enreg["Nbre_exemplaire"];?></td>
                </tr>
            <?php 
            }
            ?>
            </table></center>
            <?php
            mysqli_close($conn);
            ?>
    </body>
</html>