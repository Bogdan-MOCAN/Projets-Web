// MOCAN Bogdan
// Fonction pour vérifier les réponses et afficher le score
function testqcm() {
    const answers = {
        q1: ['false'],
        q2: ['ssd_speed', 'hdd_price'],
        q3: ['gpu'],
        q4: ['ghz'],
        q5: ['temporary_memory'],
        q6: ['sata'],
        q7: ['no'],
        q8: ['better_cooling'],
        q9: ['1tb'],
        q10: ['connect_internet']
    };

    let score = 0;
    let totalQuestions = Object.keys(answers).length;

    Object.keys(answers).forEach(question => {
        const selected = Array.from(document.querySelectorAll(`input[name="${question}"]:checked`))
                              .map(input => input.value);

        const isCorrect = arraysEqual(selected, answers[question]);

        document.querySelectorAll(`input[name="${question}"]`).forEach(input => {
            const label = input.parentElement;
            if (answers[question].includes(input.value)) {
                label.style.color = input.checked ? 'green' : 'black';
            } else if (input.checked) {
                label.style.color = 'red';
            } else {
                label.style.color = 'black';
            }
        });

        if (isCorrect) score++;
    });

    const scoreElement = document.getElementById('score');
    scoreElement.textContent = `Votre score : ${score} / ${totalQuestions}`;
    scoreElement.classList.remove('hidden');
}

// Fonction pour afficher les bonnes réponses dans une nouvelle page HTML
function afficherCorrige() {
    window.location.href = "corrige.html";
}

// Fonction pour comparer deux tableaux indépendamment de l'ordre
function arraysEqual(arr1, arr2) {
    return JSON.stringify(arr1.sort()) === JSON.stringify(arr2.sort());
}