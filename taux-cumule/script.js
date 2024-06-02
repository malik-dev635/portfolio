function calculerCapital() {
  var capitalInitial = parseFloat(
    document.getElementById("capitalInitial").value
  );
  var tauxJournalier = parseFloat(document.getElementById("taux").value) / 100; // Convertir le pourcentage en décimal
  var periode = parseInt(document.getElementById("periode").value);
  var capitalFinal = capitalInitial;

  for (var i = 0; i < periode; i++) {
    capitalFinal *= 1 + tauxJournalier;
  }

  var capitalApresFrais = capitalFinal * 0.95;

  document.getElementById("resultat").innerHTML =
    "Capital final après " +
    periode +
    " jours : " +
    capitalFinal.toFixed(2) +
    " F CFA";
  document.getElementById("resultat").innerHTML +=
    "<br><hr>Capital final après frais de retrait de 5% : " +
    capitalApresFrais.toFixed(2) +
    " F CFA";
}
