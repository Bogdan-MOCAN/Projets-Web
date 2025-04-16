<?php
    include("connexion.php");

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_naissance = $_POST['date_naissance'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $niveau = $_POST['niveau'];
    $commentaire = $_POST['commentaire'];

    $file = $_FILES['photo'];
    $file_name = $_FILES['photo']['name'];
    $file_tmp_name = $_FILES['photo']['tmp_name'];

    $requete = "INSERT INTO eleves VALUES ('', '$nom', '$prenom', '$date_naissance', '$email', '$telephone', '$adresse', '$ville', '$niveau', '$commentaire', '$file_name')";

    $path = "Site_images/$file_name";
    
    if (move_uploaded_file($file_tmp_name, $path)) {
        if (mysqli_query($conn, $requete)) {
            echo "Etudiant ajoute avec succes. <br><a href='index.html'>Retour au menu</a>";
        } else {
            echo "Erreur d'ajout : ";
        }
    } else {
        echo "Erreur de chargement de l'image.";
    }

    mysqli_close($conn);
?>
