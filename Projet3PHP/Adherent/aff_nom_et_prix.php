<?php
session_start();

echo "Bienvenue, " . $_SESSION["Login"] . " !";
echo " Vous etes connecte en tant qu'" . $_SESSION["Fonction"] . ".";
?>

<html>
    <body bgcolor="#fcba03">
        <?php
        @include("../connexion.php");

        try {
            $requete = "SELECT nom_produit, prix FROM produits";
            $stmt = $pdo->prepare($requete);
            $stmt->execute();
            $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
        ?>

        <center>
            <table border="1">
                <tr><td>Nom_produit</td><td>Prix</td></tr>
                <?php foreach ($resultat as $enreg) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($enreg["nom_produit"]); ?></td>
                        <td><?php echo htmlspecialchars($enreg["prix"]); ?></td>
                    </tr>
                <?php } ?>
            </table>
        </center>

        <h2>Retour au menu :</h2><a href="menu2.php">Menu</a>
    </body>
</html>
