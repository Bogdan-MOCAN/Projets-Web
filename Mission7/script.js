// MOCAN Bogdan
// Fonction pour ajouter une nouvelle ligne de facture
function ajouterLigne() {
    // Récupère l'élément <tbody> de la table de la facture
    let tableBody = document.getElementById("factureBody");
    
    // Crée un nouvel élément <tr> pour la nouvelle ligne
    let newRow = document.createElement("tr");
    newRow.classList.add("ligne"); // Ajoute la classe "ligne" à la nouvelle ligne

    // Définir le contenu HTML de la nouvelle ligne avec les cellules d'entrée pour description, quantité, prix, et total
    newRow.innerHTML = `
        <td><input type="text" class="desc" placeholder="Article"></td>
        <td><input type="number" class="qte" value="1"></td>
        <td><input type="number" class="prix" value="0"></td>
        <td><input type="number" class="totalLigne" readonly></td>
    `;

    // Ajoute la nouvelle ligne à la table
    tableBody.appendChild(newRow);
}

// Fonction pour remplir automatiquement les champs de la facture avec des données fictives
function remplirAuto() {
    // Liste d'exemples de descriptions d'articles
    const descriptions = ["Ecran 17 pouces", "Souris", "Clé USB 16 Go", "Casque Audio", "Clavier Mécanique"];
    
    // Sélectionne toutes les lignes de la facture
    let lignes = document.querySelectorAll(".ligne");
    
    // Remplir chaque ligne avec des données aléatoires
    lignes.forEach(ligne => {
        // Choisir une description aléatoire
        let desc = descriptions[Math.floor(Math.random() * descriptions.length)];
        // Choisir une quantité aléatoire entre 1 et 10
        let qte = Math.floor(Math.random() * 10) + 1;
        // Choisir un prix aléatoire entre 1 et 100
        let prix = Math.floor(Math.random() * 100) + 1;

        // Remplir les champs de la ligne avec les valeurs générées
        ligne.querySelector(".desc").value = desc;
        ligne.querySelector(".qte").value = qte;
        ligne.querySelector(".prix").value = prix;
    });
}

// Fonction pour calculer le total de la facture
function calculerFacture() {
    // Sélectionne toutes les lignes de la facture
    let lignes = document.querySelectorAll(".ligne");
    
    // Variable pour accumuler le sous-total
    let sousTotal = 0;

    // Parcourt toutes les lignes pour calculer les totaux de chaque ligne
    lignes.forEach(ligne => {
        // Récupère la quantité et le prix, et calcule le total de la ligne
        let qte = parseFloat(ligne.querySelector(".qte").value) || 0;
        let prix = parseFloat(ligne.querySelector(".prix").value) || 0;
        let total = qte * prix;

        // Remplir le champ total de la ligne avec le total calculé
        ligne.querySelector(".totalLigne").value = total.toFixed(2);
        
        // Ajouter le total de la ligne au sous-total général
        sousTotal += total;
    });

    // Affiche le sous-total dans l'élément prévu
    document.getElementById("sousTotal").textContent = sousTotal.toFixed(2);

    // Récupère les valeurs de remise, taxe et frais d'expédition
    let remise = parseFloat(document.getElementById("remise").value) || 0;
    let taxe = parseFloat(document.getElementById("taxe").value) || 0;
    let fraisExpedition = parseFloat(document.getElementById("fraisExpedition").value) || 0;

    // Calcul du sous-total après application de la remise
    let sousTotalRemise = sousTotal - (sousTotal * remise / 100);
    
    // Calcul de la taxe à partir du sous-total après remise
    let taxeTotale = sousTotalRemise * taxe / 100;
    
    // Calcul du total général (sous-total après remise + taxe + frais d'expédition)
    let totalGeneral = sousTotalRemise + taxeTotale + fraisExpedition;

    // Affiche le total général dans l'élément prévu
    document.getElementById("totalGeneral").textContent = totalGeneral.toFixed(2);
}

// Fonction pour réinitialiser la facture (annuler toutes les modifications)
function annulerFacture() {
    // Réinitialiser le corps de la table à une ligne vide par défaut
    document.getElementById("factureBody").innerHTML = `
        <tr class="ligne">
            <td><input type="text" class="desc" placeholder="Article"></td>
            <td><input type="number" class="qte" value="1"></td>
            <td><input type="number" class="prix" value="0"></td>
            <td><input type="number" class="totalLigne" readonly></td>
        </tr>
    `;

    // Réinitialiser les valeurs des champs de montant total et sous-total
    document.getElementById("sousTotal").textContent = "0";
    document.getElementById("totalGeneral").textContent = "0";

    // Réinitialiser les champs de remise, taxe et frais d'expédition aux valeurs par défaut
    document.getElementById("remise").value = "0";
    document.getElementById("taxe").value = "10";
    document.getElementById("fraisExpedition").value = "5";
}
