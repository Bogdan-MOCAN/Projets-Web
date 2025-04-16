<?php
session_start();

// Inclure la connexion à la base de données
include("connexion.php");

// Déclaration de la variable d'erreur
$erreur = "";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier que les champs 'email' et 'mdp' sont présents dans le formulaire
    if (!empty($_POST['email']) && !empty($_POST['mdp'])) {
        // Si les champs sont remplis, on procède à la connexion
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];

        // Préparer la requête pour vérifier l'utilisateur dans la table "administrateur"
        $stmt = $pdo->prepare("SELECT * FROM administrateur WHERE Adresse_email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifier si l'utilisateur existe
        if ($utilisateur) {
            // Comparer le mot de passe haché avec celui stocké dans la base
            if (md5($mdp) === $utilisateur['Mdp']) { // Ajout de md5()
                $_SESSION['user'] = $utilisateur['Nom']; // Enregistrer l'utilisateur dans la session
                header("Location: index_admin.php"); // Rediriger vers le dashboard
                exit;
            } else {
                // Mot de passe incorrect
                $erreur = "Mot de passe incorrect.";
            }
        } else {
            // Email non trouvé
            $erreur = "Aucun utilisateur trouvé avec cet email.";
        }
    } else {
        // Un des champs est vide, afficher un message d'erreur
        $erreur = "Veuillez remplir tous les champs.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="connexion.css">
    <script src="connexion.js" defer></script>
</head>
<body>
    <div class="container">
        <form action="login.php" method="POST" class="login-form">
            <h2>Connectez-vous</h2>

            <!-- Email -->
            <div class="input-group">
                <input type="email" name="email" placeholder="Adresse Email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" required>
            </div>

            <!-- Mot de passe -->
            <div class="input-group">
                <input type="password" name="mdp" id="password" placeholder="Mot de passe" required>
                <span class="toggle-password" onclick="togglePassword()">👁</span>
            </div>

            <!-- Bouton de soumission -->
            <button type="submit">Se connecter</button>

            <!-- Message d'erreur -->
            <?php if (!empty($erreur)): ?>
                <p style="color: red;"><?= $erreur ?></p>
            <?php endif; ?>

            <p>Vous n'avez pas de compte ? <a href="inscription.html">Créez-en un</a></p>
        </form>
    </div>
    <div class="back-btn-container">
       <a href="index.php" class="back-btn">Retour au menu</a>
    </div>
</body>
</html>
