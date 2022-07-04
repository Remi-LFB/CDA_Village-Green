const qvalue = document.getElementById('qvalue');

// Vérifie si la quantité est négative
qvalue.oninput = () =>
{ if (qvalue.value < 1)
    {
        return qvalue.value = 1;
    }
};
