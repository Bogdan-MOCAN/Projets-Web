function calculer() {
    // Récupérer les valeurs de prix et de quantité
    let prix1 = parseFloat(document.getElementById('p1').value) || 0;
    let prix2 = parseFloat(document.getElementById('p2').value) || 0;
    let prix3 = parseFloat(document.getElementById('p3').value) || 0;

    let quantite1 = parseFloat(document.getElementById('q1').value) || 0;
    let quantite2 = parseFloat(document.getElementById('q2').value) || 0;
    let quantite3 = parseFloat(document.getElementById('q3').value) || 0;

    // Calcul des résultats par ligne
    let resultat1 = prix1 * quantite1;
    let resultat2 = prix2 * quantite2;
    let resultat3 = prix3 * quantite3;

    // Affichage des résultats
    document.getElementById('r1').value = resultat1;
    document.getElementById('r2').value = resultat2;
    document.getElementById('r3').value = resultat3;

    // Calcul de la somme totale
    let sommeTotale = resultat1 + resultat2 + resultat3;
    document.getElementById('r4').value = sommeTotale;
}

function effacer() {
    // Réinitialisation des champs d'entrée
    document.getElementById('a1').value = "";
    document.getElementById('a2').value = "";
    document.getElementById('a3').value = "";
    document.getElementById('p1').value = "";
    document.getElementById('p2').value = "";
    document.getElementById('p3').value = "";
    document.getElementById('q1').value = "";
    document.getElementById('q2').value = "";
    document.getElementById('q3').value = "";
    document.getElementById('r1').value = "";
    document.getElementById('r2').value = "";
    document.getElementById('r3').value = "";
    document.getElementById('r4').value = "";
}