<?php
@include("../connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = htmlspecialchars($_POST['nom_produit']);
    $b = htmlspecialchars($_POST['prix']);
    $c = htmlspecialchars($_POST['stock']);
    $d = htmlspecialchars($_POST['disponibilite']);
    
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $upload_dir = "../Images/";


        // Déplacement du fichier vers le dossier de destination
        $destination = $upload_dir . basename($file_name);
        if (move_uploaded_file($file_tmp, $destination)) {
            echo "<center><p>Image telechargee avec succes.</p></center>";
        } else {
            echo "<center><p>Erreur lors du telechargement de l'image.</p></center>";
            $file_name = null;
        }
    } else {
        $file_name = null;
    }

    try {

        $req = "INSERT INTO produits (nom_produit, prix, stock, disponibilite, image) 
                VALUES (:nom_produit, :prix, :stock, :disponibilite, :image)";

        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':nom_produit', $a, PDO::PARAM_STR);
        $stmt->bindParam(':prix', $b, PDO::PARAM_STR);
        $stmt->bindParam(':stock', $c, PDO::PARAM_INT);
        $stmt->bindParam(':disponibilite', $d, PDO::PARAM_STR);
        $stmt->bindParam(':image', $file_name, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo "<center><p>Enregistrement effectue</p></center>";
        } else {
            echo "<center><p>Erreur lors de l'insertion</p></center>";
        }
    } catch (PDOException $e) {
        echo "<center><p>Erreur SQL : " . $e->getMessage() . "</p></center>";
    }
}

echo "<center><a href='menu1.php'>Retour au menu</a></center>";
?>
