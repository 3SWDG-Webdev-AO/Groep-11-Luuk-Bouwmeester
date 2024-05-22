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

    // Pak het actuele woord & hint op
    const woord = geselecteerdeWoord.woord;
    const betekenis = geselecteerdeWoord.betekenis;

    // Display de geselecteerde woord op de html
    const woordDisplay = document.getElementById("woord_display");
    woordDisplay.textContent = woord;

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

    // Event listener die wordt geroepen als je op de gok knop drukt.
    gokButton.addEventListener("click", () => {
        // Vang de input op (en maak dit lowercase om problemen te vermijden)
        const gok = gokInput.value.toLowerCase();

        // Maak de input weer leeg, voor de volgende gok
        gokInput.value = "";

        // Zorg ervoor dat de lengte zeker een character is
        if (gok.length != 1) {
            alert('Please enter a single letter.');
            return;
        }

        // Gegokte letter zit al in de geraade letter array, dus hij is al eerder geweest.
        if(geraadeLetters.includes(gok)) {
            alert("Je hebt deze letter al geraden, probeer een ander letter.");
            return;
        }

        // Gegokte letter zit in het woord
        if (woord.includes(gok)) {
            console.log("Woord zit er in");
            geraadeLetters.push(gok);
            lettersOver--;
        }
        
        // Gegokte letter zit niet in het woord
        else {
            console.log("Woord zit er niet in");
            onjuistGoks++;
        }
    });

    raadButton.addEventListener("click", () => {
        const raad = raadInput.value.toLowerCase();
        console.log(raad);
    });
        
    console.log(geselecteerdeWoord);
}

fetchWoordennLijst();