// Quantité sur la page d'un produit
const qvalue = document.getElementById('form_quantity');

// Vérifie si la quantité est négative
qvalue.oninput = () => { if (qvalue.value < 1) { return qvalue.value = 1; } };
