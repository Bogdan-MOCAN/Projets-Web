<html>
    <body>
        <?php
        @include("connexion.php");
        $requete="select * from adherents";
        $resultat=mysqli_query($conn,$requete);
        ?>
        <center><table border="1">
            <tr><td>ID_Adherent</td><td>Nom</td><td>Prenom</td><td>Date_naissance</td><td>Date_adhesion</td><td>Adresse</td><td>Num_tel</td><td>Mail</td></tr>
            <?php 
            while($enreg=mysqli_fetch_array($resultat)) {
            ?>
                <tr>
                <td><?php echo $enreg["ID_Adherent"];?></td>
                <td><?php echo $enreg["Nom"];?></td>
                <td><?php echo $enreg["Prenom"];?></td>
                <td><?php echo $enreg["Date_naissance"];?></td>
                <td><?php echo $enreg["Date_adhesion"];?></td>
                <td><?php echo $enreg["Adresse"];?></td>
                <td><?php echo $enreg["Num_tel"];?></td>
                <td><?php echo $enreg["Mail"];?></td>
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