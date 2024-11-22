// MOCAN Bogdan
// Définition des exercices avec leurs titres, descriptions, codes et fonctions interactives
const exercises = [
    { 
      title: "Somme de deux nombres", 
      description: "Écrivez une fonction qui retourne la somme de deux nombres.",
      code: `function somme(a, b) {\n  return a + b;\n}\n\nconsole.log(somme(2, 3)); // Résultat attendu : 5`,
      interactive: true,
      handler: function () {
        // Fonction interactive pour calculer la somme de deux nombres
        const a = Number(prompt("Entrez le premier nombre :"));
        const b = Number(prompt("Entrez le second nombre :"));
        alert(`La somme de ${a} et ${b} est : ${a + b}`);
      }
    },
    {
        title: "Afficher les nombres de 1 à 10", 
        description: "Affichez les nombres de 1 à 10 dans une boîte de dialogue.",
        code: `for (let i = 1; i <= 10; i++) {\n  console.log(i);\n}`,
        interactive: true,
        handler: function () {
          // Fonction interactive pour afficher les nombres de 1 à 10
          let result = "";
          for (let i = 1; i <= 10; i++) {
            result += i + " ";
          }
          alert(`Les nombres de 1 à 10 sont : ${result}`);
        }
      },
    { 
      title: "Trouver le maximum", 
      description: "Écrivez une fonction qui retourne le plus grand de deux nombres.",
      code: `function maximum(a, b) {\n  return a > b ? a : b;\n}\n\nconsole.log(maximum(5, 10)); // Résultat attendu : 10`,
      interactive: true,
      handler: function () {
        // Fonction interactive pour trouver le maximum de deux nombres
        const a = Number(prompt("Entrez le premier nombre :"));
        const b = Number(prompt("Entrez le second nombre :"));
        alert(`Le maximum entre ${a} et ${b} est : ${Math.max(a, b)}`);
      }
    },
    {
      title: "Table de multiplication",
      description: "Affichez la table de multiplication d'un nombre donné.",
      code: `function tableMultiplication(n) {\n  for (let i = 1; i <= 10; i++) {\n    console.log(\`\${n} x \${i} = \${n * i}\`);\n  }\n}\n\ntableMultiplication(5);`,
      interactive: true,
      handler: function () {
        // Fonction interactive pour afficher la table de multiplication d'un nombre
        const n = Number(prompt("Entrez un nombre :"));
        let resultat = "";
        for (let i = 1; i <= 10; i++) {
          resultat += `${n} x ${i} = ${n * i}\n`;
        }
        alert(resultat);
      }
    },
    {
      title: "Inverser une chaîne",
      description: "Écrivez une fonction qui inverse une chaîne de caractères.",
      code: `function inverser(chaine) {\n  return chaine.split('').reverse().join('');\n}\n\nconsole.log(inverser("Bonjour")); // Résultat attendu : ruojnoB`,
      interactive: true,
      handler: function () {
        // Fonction interactive pour inverser une chaîne
        const chaine = prompt("Entrez une chaîne à inverser :");
        alert(`La chaîne inversée est : ${chaine.split('').reverse().join('')}`);
      }
    },
    {
      title: "Vérifier un palindrome",
      description: "Vérifiez si une chaîne de caractères est un palindrome.",
      code: `function estPalindrome(chaine) {\n  const reverse = chaine.split('').reverse().join('');\n  return chaine === reverse;\n}\n\nconsole.log(estPalindrome("radar")); // Résultat attendu : true`,
      interactive: true,
      handler: function () {
        // Fonction interactive pour vérifier si une chaîne est un palindrome
        const chaine = prompt("Entrez une chaîne :");
        const estPalindrome = chaine === chaine.split('').reverse().join('');
        alert(`"${chaine}" est ${estPalindrome ? "" : "pas "}un palindrome.`);
      }
    },
    {
      title: "Factorielle d'un nombre",
      description: "Calculez la factorielle d'un nombre.",
      code: `function factorielle(n) {\n  if (n === 0) return 1;\n  return n * factorielle(n - 1);\n}\n\nconsole.log(factorielle(5)); // Résultat attendu : 120`,
      interactive: true,
      handler: function () {
        // Fonction interactive pour calculer la factorielle d'un nombre
        const n = Number(prompt("Entrez un nombre :"));
        let fact = 1;
        for (let i = 1; i <= n; i++) {
          fact *= i;
        }
        alert(`La factorielle de ${n} est : ${fact}`);
      }
    },
    {
      title: "Nombre pair ou impair",
      description: "Vérifiez si un nombre est pair ou impair.",
      code: `function estPair(n) {\n  return n % 2 === 0;\n}\n\nconsole.log(estPair(4)); // Résultat attendu : true`,
      interactive: true,
      handler: function () {
        // Fonction qui vérifie si un nombre est pair en utilisant l'opérateur modulo (%)
        const n = Number(prompt("Entrez un nombre :"));
        alert(`Le nombre ${n} est ${n % 2 === 0 ? "pair" : "impair"}.`); // Si le reste de la division par 2 est égal à 0, le nombre est pair
      }
    },
    {
      title: "Somme des chiffres d'un nombre",
      description: "Calculez la somme des chiffres d'un nombre.",
      code: `function sommeChiffres(n) {\n  return n.toString().split('').reduce((acc, curr) => acc + Number(curr), 0);\n}\n\nconsole.log(sommeChiffres(123)); // Résultat attendu : 6`,
      interactive: true,
      handler: function () {
        // Fonction qui calcule la somme des chiffres d'un nombre
        const n = Number(prompt("Entrez un nombre :"));
        const somme = n.toString().split('').reduce((acc, curr) => acc + Number(curr), 0); // Convertit le nombre en chaîne de caractères, puis le divise en un tableau de chiffres
        alert(`La somme des chiffres de ${n} est : ${somme}`);
      }
    },
    {
      title: "Nombre aléatoire",
      description: "Générez un nombre aléatoire entre deux bornes.",
      code: `function nombreAleatoire(min, max) {\n  return Math.floor(Math.random() * (max - min + 1)) + min;\n}\n\nconsole.log(nombreAleatoire(1, 10));`,
      interactive: true,
      handler: function () {
        // Fonction qui génère un nombre aléatoire entre deux bornes (min et max)
        const min = Number(prompt("Entrez la borne inférieure :"));
        const max = Number(prompt("Entrez la borne supérieure :"));
        const nombre = Math.floor(Math.random() * (max - min + 1)) + min; // Génère un nombre entre min et max
        alert(`Nombre aléatoire généré : ${nombre}`);
      }
    },
    {
      title: "Vérifier une année bissextile",
      description: "Déterminez si une année est bissextile.",
      code: `function estBissextile(annee) {\n  return (annee % 4 === 0 && annee % 100 !== 0) || annee % 400 === 0;\n}\n\nconsole.log(estBissextile(2020)); // Résultat attendu : true`,
      interactive: true,
      handler: function () {
        // Fonction qui vérifie si une année est bissextile
        const annee = Number(prompt("Entrez une année :"));
        const estBissextile = (annee % 4 === 0 && annee % 100 !== 0) || annee % 400 === 0; // Conditions de l'année bissextile
        alert(`${annee} est ${estBissextile ? "" : "pas "}bissextile.`);
      }
    },
    {
      title: "Éléments uniques dans un tableau",
      description: "Retirez les doublons d'un tableau.",
      code: `function uniqueElements(arr) {\n  return [...new Set(arr)];\n}\n\nconsole.log(uniqueElements([1, 2, 2, 3, 4, 4])); // Résultat attendu : [1, 2, 3, 4]`,
      interactive: true,
      handler: function () {
        // Fonction qui retourne les éléments uniques d'un tableau en utilisant un Set
        const tableau = prompt("Entrez une liste de nombres séparés par des virgules :").split(',').map(Number);
        const uniques = [...new Set(tableau)];
        alert(`Éléments uniques : ${uniques.join(', ')}`);
      }
    },
    {
      title: "Tri d'un tableau",
      description: "Triez un tableau de nombres.",
      code: `function trierTableau(arr) {\n  return arr.sort((a, b) => a - b);\n}\n\nconsole.log(trierTableau([3, 1, 4, 1, 5])); // Résultat attendu : [1, 1, 3, 4, 5]`,
      interactive: true,
      handler: function () {
        // Fonction qui trie un tableau de nombres en ordre croissant
        const tableau = prompt("Entrez une liste de nombres séparés par des virgules :").split(',').map(Number);
        const sorted = tableau.sort((a, b) => a - b); // Trie le tableau par ordre croissant
        alert(`Tableau trié : ${sorted.join(', ')}`);
      }
    },
    {
        title: "Calculer la moyenne d'un tableau",
        description: "Calculez la moyenne d'un tableau donné.",
        code: `function moyenneTableau(arr) {\n  const somme = arr.reduce((acc, curr) => acc + curr, 0);\n  return somme / arr.length;\n}\n\nconsole.log(moyenneTableau([10, 20, 30, 40])); // Résultat attendu : 25`,
        interactive: true,
        handler: function () {
          // Fonction qui calcule la moyenne des éléments d'un tableau
          const tableau = prompt("Entrez une liste de nombres séparés par des virgules :").split(',').map(Number);
          const somme = tableau.reduce((acc, curr) => acc + curr, 0); // Calcule la somme des éléments
          const moyenne = somme / tableau.length; // Divise la somme par le nombre d'éléments pour obtenir la moyenne
          alert(`La moyenne est : ${moyenne}`);
        }
      },
      {
        title: "Compter les voyelles",
        description: "Comptez les voyelles dans une chaîne.",
        code: `function compterVoyelles(chaine) {\n  const voyelles = "aeiouyAEIOUY";\n  return chaine.split('').filter(char => voyelles.includes(char)).length;\n}\n\nconsole.log(compterVoyelles("Bonjour tout le monde")); // Résultat attendu : 9`,
        interactive: true,
        handler: function () {
          // Fonction qui compte le nombre de voyelles dans une chaîne
          const chaine = prompt("Entrez une chaîne :");
          const voyelles = "aeiouyAEIOUY"; // Liste des voyelles
          const nombreVoyelles = chaine.split('').filter(char => voyelles.includes(char)).length; // Filtre les voyelles et compte leur nombre
          alert(`Le nombre de voyelles est : ${nombreVoyelles}`);
        }
      }
    ];
    
  // Fonction pour afficher les exercices sur la page
  function renderExercises() {
    // Sélectionner l'élément qui contiendra tous les exercices
    const container = document.getElementById("exercises");
    // Parcourir chaque exercice et créer une interface pour chacun
    exercises.forEach((exercise, index) => {
      const div = document.createElement("div");
      div.className = "exercise";
      
      div.innerHTML = `
        <h2>Exercice ${index + 1}: ${exercise.title}</h2>
        <p>${exercise.description}</p>
        <div class="buttons">
          <button onclick="runExercise(${index})">Tester</button>
          <button onclick="showCode(${index})">Afficher le code</button>
        </div>
        <div class="output" id="output-${index}"></div>
        <div class="code-display" id="code-${index}"></div>
      `;
      
      container.appendChild(div);
    });
  }

  // Fonction pour exécuter l'exercice lorsqu'on clique sur "Tester"
  function runExercise(index) {
    const exercise = exercises[index];
    if (exercise.interactive) {
      // Si l'exercice est interactif, on appelle la fonction handler
      exercise.handler();
    } else {
      // Si l'exercice est statique, on affiche le code dans la console
      alert("Code statique : Exécutez-le dans la console.");
      console.log(exercise.code);
    }
  }
  
  // Fonction pour afficher ou cacher le code source de l'exercice
  function showCode(index) {
    const codeDiv = document.getElementById(`code-${index}`);
    if (codeDiv.style.display === "block") {
      codeDiv.style.display = "none";
    } else {
      codeDiv.style.display = "block";
      codeDiv.textContent = exercises[index].code;
    }
  }
  
  // Attacher l'événement au chargement du DOM pour afficher les exercices
  document.addEventListener("DOMContentLoaded", renderExercises);
  