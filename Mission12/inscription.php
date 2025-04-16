<?php
@include("connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier que tous les champs sont remplis
    if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['age']) || empty($_POST['nationalite']) ||
        empty($_POST['adresse_email']) || empty($_POST['mdp']) || empty($_POST['confirm_mdp'])) {
        die("<p style='color: red;'>Tous les champs sont requis.</p>");
    }

    // Récupération et sécurisation des données
    $nom = htmlspecialchars(trim($_POST['nom']));
    $prenom = htmlspecialchars(trim($_POST['prenom']));
    $age = intval($_POST['age']); // Convertit en entier
    $nationalite = htmlspecialchars(trim($_POST['nationalite']));
    $email = htmlspecialchars(trim($_POST['adresse_email']));
    $password = htmlspecialchars($_POST['mdp']);
    $confirm_password = htmlspecialchars($_POST['confirm_mdp']);

    // Vérification des mots de passe
    if ($password !== $confirm_password) {
        die("<p style='color: red;'>Les mots de passe ne correspondent pas.</p>");
    }

    // Vérifier si la table 'administrateur' existe
    $table_check = $pdo->query("SHOW TABLES LIKE 'administrateur'");
    if ($table_check->rowCount() == 0) {
        die("<p style='color: red;'>La table 'administrateur' n'existe pas dans la base de données.</p>");
    }

    // Hachage du mot de passe (md5 car PHP 5.4 ne supporte pas password_hash)
    $hashed_password = md5($password);

    // Vérifier si l'email est déjà utilisé
    $query = $pdo->prepare("SELECT Identifiant FROM administrateur WHERE Adresse_email = :email");
    $query->bindParam(":email", $email);
    $query->execute();

    if ($query->rowCount() > 0) {
        die("<p style='color: red;'>Cet email est déjà utilisé.</p>");
    }

    // Insérer le nouvel utilisateur
    $insert = $pdo->prepare("INSERT INTO administrateur (Nom, Prenom, Age, Nationalite, Adresse_email, Mdp) 
                             VALUES (:nom, :prenom, :age, :nationalite, :email, :password)");
    $insert->bindParam(":nom", $nom);
    $insert->bindParam(":prenom", $prenom);
    $insert->bindParam(":age", $age);
    $insert->bindParam(":nationalite", $nationalite);
    $insert->bindParam(":email", $email);
    $insert->bindParam(":password", $hashed_password);

    if ($insert->execute()) {
        echo '<div style="
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #c3e6cb;
            text-align: center;
            width: 50%;
            margin: 20px auto;
            font-family: Arial, sans-serif;
        ">
            <strong>Succes !</strong> Votre compte a ete cree avec succes.
        </div>';
    
        echo '<div style="text-align: center; margin-top: 15px;">
            <a href="login.php" style="
                background-color: #28a745;
                color: white;
                padding: 10px 20px;
                border-radius: 5px;
                text-decoration: none;
                font-weight: bold;
                display: inline-block;
                font-family: Arial, sans-serif;
            ">Retour a la page de connexion</a>
        </div>';
    } else {
        echo "<p style='color: red;'>Erreur lors de l'inscription.</p>";
    }
     
}
?>
<a href="login.php">Retour a la page de connexion</a>
