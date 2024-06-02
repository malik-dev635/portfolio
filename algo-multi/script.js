function executerAlgorithme() {
    var montantInitial = parseFloat(document.getElementById("montantInitial").value);
    var montantFinal = parseFloat(document.getElementById("montantFinal").value);
    var pourcentage = parseFloat(document.getElementById("pourcentage").value) / 100;
    var cpt_jours = 0;
    var i = 1;
    var tableau = '<table><tr><th>Jour</th><th>Somme</th><th>Profit</th></tr>';

    while (montantInitial < montantFinal) {
        var r = montantInitial * pourcentage;
        montantInitial += r;
        tableau += '<tr><td>' + i + '</td><td>' + montantInitial.toFixed(2) + '</td><td>' + r.toFixed(2) + '</td></tr>';
        i++;
        cpt_jours++;
    }
    
    tableau += '</table><p>Le nombre de jours est : ' + cpt_jours + ' et la somme est ' + montantInitial.toFixed(2) + '</p>';

    var jours_restants = cpt_jours;
    var cpt_mois = 0;

    while (jours_restants >= 30) {
        jours_restants -= 30;
        cpt_mois++;
    }

    tableau += '<p>Le nombre de mois est ' + cpt_mois + ' et ' + jours_restants + ' jours restants</p>';
    tableau += '<p>courage champion ! Continue à viser haut !</p>';

    document.getElementById("resultat").innerHTML = tableau;
}