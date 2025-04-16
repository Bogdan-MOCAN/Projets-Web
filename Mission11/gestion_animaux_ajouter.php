<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un animal</title>
    <link rel="stylesheet" href="ajouter.css">
</head>
<body>
    <div class="main-content">
        <header>
            <h1>Ajouter un Animal</h1>
        </header>
        
        <form action="gestion_animaux_ajouter_.php" method="post" class="animal-form">
            <div class="form-row">
                <div class="form-group">
                    <label for="nom_animal">Nom :</label>
                    <input type="text" id="nom_animal" name="nom_animal" placeholder="Ex : Simba" required>
                </div>
                <div class="form-group">
                    <label for="id_Especes">Espèce :</label>
                    <select id="id_Especes" name="id_Especes" required>
                        <option value="">Sélectionnez une espèce</option>
                        <option value="1">Lion (Carnivore, 15 ans)</option>
                        <option value="2">Éléphant (Herbivore, 70 ans)</option>
                        <option value="3">Dauphin (Carnivore, 25 ans) - Aquatique</option>
                        <option value="4">Panda (Herbivore, 20 ans)</option>
                        <option value="5">Ours (Omnivore, 30 ans)</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="date_de_naissance">Année de naissance :</label>
                    <input type="date" id="date_de_naissance" name="date_de_naissance" required>
                </div>
                <div class="form-group">
                    <label for="sexe">Sexe :</label>
                    <select id="sexe" name="sexe" required>
                        <option value="F">Femelle</option>
                        <option value="M">Mâle</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group comment">
                    <label for="commentaire">Commentaire :</label>
                    <textarea id="commentaire" name="commentaire" rows="4" placeholder="Ajoutez un commentaire..."></textarea>
                </div>
            </div>
            <div class="form-row">
                <button type="submit" class="submit-btn">Ajouter</button>
            </div>
        </form>
    </div>
</body>
</html>
