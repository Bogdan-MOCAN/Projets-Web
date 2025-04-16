<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Animal</title>
    <link rel="stylesheet" href="modifier.css">
</head>
<body>
    <div class="container">
        <div class="main-content">
            <header>
                <h1>Modifier un Animal</h1>
                <form id="selection-form" action="" method="GET">
                    <label for="animal">Sélectionnez un animal :</label>
                    <select id="animal" name="id">
                        <?php
                        @include("connexion.php");
                        $requete = "SELECT id, nom_animal FROM animaux";
                        $resultat = mysqli_query($conn, $requete);
                        while ($row = mysqli_fetch_assoc($resultat)) {
                            echo "<option value='" . $row['id'] . "'>" . $row['id'] . " - " . $row['nom_animal'] . "</option>";
                        }
                        ?>
                    </select>
                    <button type="submit">Choisir</button>
                </form>
            </header>

            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                // Charger les données de l'animal sélectionné
                $requete = "SELECT * FROM animaux WHERE id = $id";
                $resultat = mysqli_query($conn, $requete);
                $animal = mysqli_fetch_assoc($resultat);

                if ($animal) {
                    ?>
                    <form class="modify-form" id="modify-form" action="gestion_animaux_modifier.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $animal['id']; ?>">

                        <div class="form-group">
                            <label for="nom_animal">Nom :</label>
                            <input type="text" id="nom_animal" name="nom_animal" value="<?php echo $animal['nom_animal']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="id_Especes">Espèce :</label>
                            <input type="text" id="id_Especes" name="id_Especes" value="<?php echo $animal['id_Especes']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="date_de_naissance">Date de naissance :</label>
                            <input type="date" id="date_de_naissance" name="date_de_naissance" value="<?php echo $animal['date_de_naissance']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="sexe">Sexe :</label>
                            <select id="sexe" name="sexe">
                                <option value="F" <?php echo ($animal['sexe'] == 'F') ? 'selected' : ''; ?>>F</option>
                                <option value="M" <?php echo ($animal['sexe'] == 'M') ? 'selected' : ''; ?>>M</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group comment">
                                <label for="commentaire">Commentaire :</label>
                                <textarea id="commentaire" name="commentaire" rows="4"><?php echo $animal['commentaire']; ?></textarea>
                            </div>
                        </div>
                        <button type="submit" class="modify-btn">Modifier</button>
                    </form>
                    <?php
                } else {
                    echo "<p style='color: red;'>Aucun animal trouvé avec cet ID.</p>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
