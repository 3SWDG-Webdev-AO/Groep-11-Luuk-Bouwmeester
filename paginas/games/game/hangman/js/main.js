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

    // Deze variabelen gaan we later aanpassen, eerst moeten we ze initializeren
    let lettersOver = geselecteerdeWoord.length;
    let onjuistGoks = 0;
    let geraadeLetters = [];

    // Vang de gok text & knop op
    const gokInput = document.getElementById("gok_input");
    const gokButton = document.getElementById("gok_button");

    // Doe dit ook voor de raad fields
    const raadInput = document.getElementById("raad_input");
    const raadButton = document.getElementById("raad_button");

    gokButton.addEventListener("click", () => {
        const gok = gokInput.value.toLowerCase();
        console.log(gok);
    });

    raadButton.addEventListener("click", () => {
        const raad = raadInput.value.toLowerCase();
        console.log(raad);
    });
        
    console.log(geselecteerdeWoord);
}

fetchWoordennLijst();