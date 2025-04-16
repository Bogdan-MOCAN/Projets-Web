<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Personnel</title>
    <link rel="stylesheet" href="modifier_employes.css">
</head>
<body>
    <div class="container">
        <div class="main-content">
            <header>
                <h1>Modifier un Personnel</h1>
                <form id="selection-form" action="" method="GET">
                    <label for="personnel">Sélectionnez un personnel :</label>
                    <select id="personnel" name="id">
                        <?php
                        @include("connexion.php");
                        $requete = "SELECT id, nom, prenom FROM personnels";
                        $resultat = mysqli_query($conn, $requete);
                        while ($row = mysqli_fetch_assoc($resultat)) {
                            echo "<option value='" . $row['id'] . "'>" . $row['id'] . " - " . $row['nom'] . " " . $row['prenom'] . "</option>";
                        }
                        ?>
                    </select>
                    <button type="submit">Choisir</button>
                </form>
            </header>

            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                // Charger les données du personnel sélectionné
                $requete = "SELECT * FROM personnels WHERE id = $id";
                $resultat = mysqli_query($conn, $requete);
                $personnel = mysqli_fetch_assoc($resultat);

                if ($personnel) {
                    ?>
                    <form class="modify-form" id="modify-form" action="gestion_employes_modifier_.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $personnel['id']; ?>">

                        <div class="form-group">
                            <label for="nom">Nom :</label>
                            <input type="text" id="nom" name="nom" value="<?php echo $personnel['nom']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prénom :</label>
                            <input type="text" id="prenom" name="prenom" value="<?php echo $personnel['prenom']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="date_de_naissance">Date de naissance :</label>
                            <input type="date" id="date_de_naissance" name="date_de_naissance" value="<?php echo $personnel['date_de_naissance']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="sexe">Sexe :</label>
                            <select id="sexe" name="sexe">
                                <option value="F" <?php echo ($personnel['sexe'] == 'F') ? 'selected' : ''; ?>>F</option>
                                <option value="M" <?php echo ($personnel['sexe'] == 'M') ? 'selected' : ''; ?>>M</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="login">Login :</label>
                            <input type="text" id="login" name="login" value="<?php echo $personnel['login']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe (laisser vide pour ne pas modifier) :</label>
                            <input type="password" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="salaire">Salaire :</label>
                            <input type="number" id="salaire" name="salaire" step="0.01" value="<?php echo $personnel['salaire']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="fonction">Fonction :</label>
                            <input type="text" id="fonction" name="fonction" value="<?php echo $personnel['fonction']; ?>">
                        </div>
                        <button type="submit" class="modify-btn">Modifier</button>
                    </form>
                    <?php
                } else {
                    echo "<p style='color: red;'>Aucun personnel trouvé avec cet ID.</p>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
