function test_age() {
    let age = prompt("Quel est votre âge ?");
    if (age<18)
    {
        document.write("Attention accès refusé, vous êtes mineur");
        document.body.style.backgroundColor="red";
    }
    else
    {
        document.write("Ok, vous êtes majeur")
        document.body.style.backgroundColor="green";
    }
}

function affichage() {
    let prenom = prompt("Saisir votre prénom");
    let nom = prompt("Saisir votre nom");

    document.write ("<div style='border: 5px solid blue; width: 400px; height: 300px; margin: auto; font-size: 2em; text-align: center'>");
    document.write ("Bonjour " + prenom + " " + nom);
    document.write ("</div>");
}

function calcul_moyenne() {
    var n1 = prompt("Donner la première note :");
    var n2 = prompt("Donner la deuxième note :");
    var n3 = prompt("Donner la troisième note :");

    var somme = Number(n1) + Number(n2) + Number(n3);

    document.write("Voici la somme : " + somme + "<br>");

    var moyenne = somme/3;

    document.write ("Voici la moyenne : " + moyenne + "<br>");

    if (moyenne<10) {
        document.write("Vous n'êtes pas admis");
        document.body.style.backgroundColor="red";
    }
    else if (moyenne>14) {
        document.write("Vous êtes admis avec mention bien");
        document.body.style.backgroundColor="green";
    }
    else {
        document.write("Vous êtes admis avec mention passable");
        document.body.style.backgroundColor="green";
    }
}

function test_couleur() {
    let couleur = prompt("Saisir une couleur")
    if (couleur == "rouge") {
        document.body.style.backgroundColor = "red"
    }
    else if (couleur == "bleu") {
        document.body.style.backgroundColor = "blue"
    }
    else if (couleur == "vert") {
        document.body.style.backgroundColor = "green"
    }

    else {
        document.write("Couleur non comprise")
    }
}