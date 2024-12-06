function ajouterLigne() {
    let tableBody = document.getElementById("factureBody");
    let newRow = document.createElement("tr");
    newRow.classList.add("ligne");

    newRow.innerHTML = `
        <td><input type="text" class="desc" placeholder="Article"></td>
        <td><input type="number" class="qte" value="1"></td>
        <td><input type="number" class="prix" value="0"></td>
        <td><input type="number" class="totalLigne" readonly></td>
    `;

    tableBody.appendChild(newRow);
}

function remplirAuto() {
    const descriptions = ["Ecran 17 pouces", "Souris", "Clé USB 16 Go", "Casque Audio", "Clavier Mécanique"];
    let lignes = document.querySelectorAll(".ligne");
    
    lignes.forEach(ligne => {
        let desc = descriptions[Math.floor(Math.random() * descriptions.length)];
        let qte = Math.floor(Math.random() * 10) + 1;
        let prix = Math.floor(Math.random() * 100) + 1;

        ligne.querySelector(".desc").value = desc;
        ligne.querySelector(".qte").value = qte;
        ligne.querySelector(".prix").value = prix;
    });
}

function calculerFacture() {
    let lignes = document.querySelectorAll(".ligne");
    let sousTotal = 0;

    lignes.forEach(ligne => {
        let qte = parseFloat(ligne.querySelector(".qte").value) || 0;
        let prix = parseFloat(ligne.querySelector(".prix").value) || 0;
        let total = qte * prix;

        ligne.querySelector(".totalLigne").value = total.toFixed(2);
        sousTotal += total;
    });

    document.getElementById("sousTotal").textContent = sousTotal.toFixed(2);

    let remise = parseFloat(document.getElementById("remise").value) || 0;
    let taxe = parseFloat(document.getElementById("taxe").value) || 0;
    let fraisExpedition = parseFloat(document.getElementById("fraisExpedition").value) || 0;

    let sousTotalRemise = sousTotal - (sousTotal * remise / 100);
    let taxeTotale = sousTotalRemise * taxe / 100;
    let totalGeneral = sousTotalRemise + taxeTotale + fraisExpedition;

    document.getElementById("totalGeneral").textContent = totalGeneral.toFixed(2);
}

function annulerFacture() {
    document.getElementById("factureBody").innerHTML = `
        <tr class="ligne">
            <td><input type="text" class="desc" placeholder="Article"></td>
            <td><input type="number" class="qte" value="1"></td>
            <td><input type="number" class="prix" value="0"></td>
            <td><input type="number" class="totalLigne" readonly></td>
        </tr>
    `;

    document.getElementById("sousTotal").textContent = "0";
    document.getElementById("totalGeneral").textContent = "0";
    document.getElementById("remise").value = "0";
    document.getElementById("taxe").value = "10";
    document.getElementById("fraisExpedition").value = "5";
}
