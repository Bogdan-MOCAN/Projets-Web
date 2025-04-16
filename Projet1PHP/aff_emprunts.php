<html>
    <body>
        <?php
        @include("connexion.php");
        $requete="select * from emprunts";
        $resultat=mysqli_query($conn,$requete);
        ?>
        <center><table border="1">
            <tr><td>ID_emprunt</td><td>Date_emprunt</td><td>Duree</td><td>#ID_Adherent</td><td>#Reference_Livre</td></tr>
            <?php 
            while($enreg=mysqli_fetch_array($resultat)) {
            ?>
                <tr>
                <td><?php echo $enreg["ID_emprunt"];?></td>
                <td><?php echo $enreg["Date_emprunt"];?></td>
                <td><?php echo $enreg["Duree"];?></td>
                <td><?php echo $enreg["#ID_Adherent"];?></td>
                <td><?php echo $enreg["#Reference"];?></td>
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