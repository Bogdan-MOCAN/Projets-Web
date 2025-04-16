<?php
session_start();

echo "Bienvenue, " . $_SESSION["Login"] . " !";
echo " Vous êtes connecté en tant qu'" . $_SESSION["Fonction"] . "'.";
?>

<html>
    <body bgcolor="#00ff44">
        <?php
        @include("../connexion.php");

        try {
            $requete = "SELECT id_produit, nom_produit, stock FROM produits WHERE stock > 10";
            $stmt = $pdo->query($requete);
            $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur SQL : " . $e->getMessage());
        }
        ?>

        <center>
            <table border="1">
                <tr>
                    <td>Id_Produit</td>
                    <td>Nom_Produit</td>
                    <td>Stock</td>
                </tr>
                <?php 
                foreach ($produits as $produit) {
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($produit["id_produit"]); ?></td>
                        <td><?php echo htmlspecialchars($produit["nom_produit"]); ?></td>
                        <td><?php echo htmlspecialchars($produit["stock"]); ?></td>
                    </tr>
                <?php 
                }
                ?>
            </table>
        </center>

        <h2>Retour au menu :</h2>
        <a href="menu1.php">Menu</a>
    </body>
</html>
