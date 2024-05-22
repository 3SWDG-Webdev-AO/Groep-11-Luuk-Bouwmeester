function fetchWoordennLijst() {
    // Vang onze woordenlijst json op
    fetch("data/woordenlijst.json")
        .then((response) => response.json())
        .then((json) => {
        // Nadat we dit hebben opgevangen, kunnen we onze wingman functie runnen
        // HIer geven we als parameter de data van de json, wat dus de woordenlijst is
        runHangMan(json);
    });
}

function runHangMan(woordenLijst) {
    // Pak een random woord uit onze woordenlijst
    const randomIndex = Math.floor(Math.random() * woordenLijst.length);
    const geselecteerdeWoord = woordenLijst[randomIndex];

    // Display de geselecteerde woord op de html
    const woordDisplay = document.getElementById("woord_display");
    woordDisplay.textContent = geselecteerdeWoord;

    // Deze variabelen gaan we later aanpassen, eerst moeten we ze initializeren
    let lettersOver = selectedWord.length;
    let onjuistGoks = 0;
    let geraadeLetters = [];

    console.log(geselecteerdeWoord);
}

fetchWoordennLijst();