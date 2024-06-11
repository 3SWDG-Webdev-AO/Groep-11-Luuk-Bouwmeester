function fetchWoordennLijst() {
    // Vang onze woordenlijst json op
    fetch("data/woordenlijst.json")
        .then((response) => response.json())
        .then((json) => {
        // Nadat we dit hebben opgevangen, kunnen we onze hangman functie runnen
        // HIer geven we als parameter de data van de json, wat dus de woordenlijst is
        runHangMan(json);
    });
}

function updateGameOver(gameOverDisplay, restartButton, lettersOver, onjuisteGoks) {
    // Er zijn geen letters meer over, het woord is dus geraden, speler heeft gewonnen.
    if(lettersOver == 0) {
        gameOverDisplay.textContent = "Gewonnen";
        restartButton.style.display = "block";  
    }

    // Als er meer dan 6 gokken fout zijn, is het woord niet gevonden, en dus hebben ze verloren
    else if(onjuisteGoks > 6) {
        gameOverDisplay.textContent = "Verloren";
        restartButton.style.display = "block";  
    }
}

function runHangMan(woordenLijst) {
    // Pak een random woord uit onze woordenlijst
    const randomIndex = Math.floor(Math.random() * woordenLijst.length);
    const geselecteerdeWoord = woordenLijst[randomIndex];

    // Pak het actuele woord & hint op
    const woord = geselecteerdeWoord.woord;
    const betekenis = geselecteerdeWoord.betekenis;

    // Vang de displays op
    const woordDisplay = document.getElementById("woord_display");
    const gameOverDisplay = document.getElementById("game_over_display");
    const hintDisplay = document.getElementById("hint_display");

    // Zet de woord display content als _, zodat je weet hoelang het woord is
    woordDisplay.textContent = woord.split("").map(() => "_").join(" ");

    // Deze variabelen gaan we later aanpassen, eerst moeten we ze initializeren
    let lettersOver = woord.length;
    let onjuisteGoks = 0;
    let geraadeLetters = [];

    // Vang de gok text & knop op
    const gokInput = document.getElementById("gok_input");
    const gokButton = document.getElementById("gok_button");

    // Doe dit ook voor de raad fields
    const raadInput = document.getElementById("raad_input");
    const raadButton = document.getElementById("raad_button");
    const hintButton = document.getElementById("hint_button");
    const restartButton = document.getElementById("restart_button");

    // Event listener die wordt geroepen als je op de gok knop drukt.
    gokButton.addEventListener("click", () => {
        // Vang de input op (en maak dit lowercase om problemen te vermijden)
        const gok = gokInput.value.toLowerCase();

        // Maak de input weer leeg, voor de volgende gok
        gokInput.value = "";

        // Zorg ervoor dat de lengte zeker een character is
        if (gok.length != 1) {
            alert("Vul alsjeblieft maar een character in.");
            return;
        }

        // Gegokte letter zit al in de geraade letter array, dus hij is al eerder geweest.
        if(geraadeLetters.includes(gok)) {
            alert("Je hebt deze letter al geraden, probeer een ander letter.");
            return;
        }

        // Als we hier zijn gekomen, kunnen we de letter toevoegen aan de array.
        geraadeLetters.push(gok);

        // Gegokte letter zit in het woord
        if (woord.includes(gok)) {
            // Vervang de "_" in het woord met de juiste letter
            const woordArray = woordDisplay.textContent.split(" ");

            // We moeten dit bijhouden in een aparte variabele omdat er anders bij 2x dezelfde letter (bv p in appel) hij er maar 1 letter afhaald
            let aantalGevondenLetters = 0;
            woord.split("").forEach((letter, index) => {
                if (letter == gok) {
                    woordArray[index] = gok;
                    aantalGevondenLetters++;
                  }
            });

            woordDisplay.textContent = woordArray.join(" ");

            // Er is nu dus een letter geraden, dus haal dit van de letters over af
            lettersOver -= aantalGevondenLetters;
        }
        
        // Gegokte letter zit niet in het woord
        else {
            onjuisteGoks++;
        }

        updateGameOver(gameOverDisplay, restartButton, lettersOver, onjuisteGoks);
    });

    raadButton.addEventListener("click", () => {
        const raad = raadInput.value.toLowerCase();

        // Het geraade woord is hetzelfde als het woord, het is dus geraden.
        if(raad == woord) {
            lettersOver = 0;
            woordDisplay.textContent = woord.split("").join(" ");
        } else {
            onjuisteGoks++;
        }

        updateGameOver(gameOverDisplay, restartButton, lettersOver, onjuisteGoks);
    });

    hintButton.addEventListener("click", () => {
        hintDisplay.textContent = betekenis;
    });

    restartButton.addEventListener("click", () => {
        // Reset alles
        woordDisplay.textContent = "";
        gameOverDisplay.textContent = "";
        hintDisplay.textContent = "";
        gokInput.value = "";
        raadInput.value = "";
        lettersOver = 0;
        onjuisteGoks = 0;
        geraadeLetters = [];
        restartButton.style.display = "none";

        // Vang een nieuw woord op
        fetchWoordennLijst();
    });
        
    // console.log(geselecteerdeWoord);
}

fetchWoordennLijst();