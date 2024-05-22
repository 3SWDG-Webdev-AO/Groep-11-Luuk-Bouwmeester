let woordenLijst;

function fetchWoordennLijst() {
    // Vang onze woordenlijst json op
    fetch("data/woordenlijst.json")
        .then((response) => response.json())
        .then((json) => {
        // Sla onze json op in de "woordenLijst" variable
        woordenLijst = json;
    });
}

fetchWoordennLijst();

function logWoordenLijst(){
    console.log(woordenLijst);
}

setInterval(logWoordenLijst, 1000);