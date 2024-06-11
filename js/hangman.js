class HangmanGame {
    woordenLijst;
    gameOverDisplay;
    restartButton;
    woordDisplay;
    hintDisplay;
    gokInput;
    gokButton;
    raadInput;
    raadButton;
    hintButton;
    restartButton;
    lettersOver;
    onjuisteGoks;
    geraadeLetters;

    constructor(woordenLijst) {
        this.woordenLijst = woordenLijst;
        this.gameOverDisplay = document.getElementById("game_over_display");
        this.restartButton = document.getElementById("restart_button");
        this.woordDisplay = document.getElementById("woord_display");
        this.hintDisplay = document.getElementById("hint_display");
        this.gokInput = document.getElementById("gok_input");
        this.gokButton = document.getElementById("gok_button");
        this.raadInput = document.getElementById("raad_input");
        this.raadButton = document.getElementById("raad_button");
        this.hintButton = document.getElementById("hint_button");
        this.restartButton = document.getElementById("restart_button");
    
        this.lettersOver = 0;
        this.onjuisteGoks = 0;
        this.geraadeLetters = [];
    }
  
    async fetchWoordenLijst() {
        try {
            // Vang onze woordenlijst json op
            const response = await fetch("json/woordenlijst.json");
            const json = await response.json();
    
            // Nadat we dit hebben opgevangen, kunnen we onze hangman functie runnen
            // Hier geven we als parameter de data van de json, wat dus de woordenlijst is
            this.startGame(json);
        } catch (error) {
            console.error("Error fetching woordenlijst:", error);
        }
    }
  
    startGame(woordenLijst) {
        // Pak een random woord uit onze woordenlijst
        const randomIndex = Math.floor(Math.random() * woordenLijst.length);
        const geselecteerdeWoord = woordenLijst[randomIndex];
    
        // Pak het actuele woord & hint op
        this.woord = geselecteerdeWoord.woord;
        this.betekenis = geselecteerdeWoord.betekenis;
    
        // Zet de woord display content als _, zodat je weet hoelang het woord is
        this.woordDisplay.textContent = this.woord.split("").map(() => "_").join(" ");

        // Deze variabelen gaan we later aanpassen, eerst moeten we ze initializeren
        this.lettersOver = this.woord.length;
        this.onjuisteGoks = 0;
    
        // Event listener die wordt geroepen als je op de gok knop drukt.
        this.gokButton.addEventListener("click", () => this.handleGok());
        this.raadButton.addEventListener("click", () => this.handleRaad());
        this.hintButton.addEventListener("click", () => this.showHint());
        this.restartButton.addEventListener("click", () => this.restartGame());
    }
  
    handleGok() {
        // Vang de input op (en maak dit lowercase om problemen te vermijden)
        const gok = this.gokInput.value.toLowerCase();

        // Maak de input weer leeg, voor de volgende gok
        this.gokInput.value = "";
    
        // Zorg ervoor dat de lengte zeker een character is
        if (gok.length !== 1) {
          alert("Vul alsjeblieft maar een character in.");
          return;
        }
    
        // Gegokte letter zit al in de geraade letter array, dus hij is al eerder geweest.
        if (this.geraadeLetters.includes(gok)) {
          alert("Je hebt deze letter al geraden, probeer een ander letter.");
          return;
        }

        // Als we hier zijn gekomen, kunnen we de letter toevoegen aan de array.
        this.geraadeLetters.push(gok);
        
        // Gegokte letter zit in het woord
        if (this.woord.includes(gok)) {
        
            // Vervang de "_" in het woord met de juiste letter
            const woordArray = this.woordDisplay.textContent.split(" ");
            
            // We moeten dit bijhouden in een aparte variabele omdat er anders bij 2x dezelfde letter (bv p in appel) hij er maar 1 letter afhaald
            let aantalGevondenLetters = 0;
            this.woord.split("").forEach((letter, index) => {
                if (letter == gok) {
                    woordArray[index] = gok;
                    aantalGevondenLetters++;
                }
            });
            this.woordDisplay.textContent = woordArray.join(" ");

            // Er is nu dus een letter geraden, dus haal dit van de letters over af
            this.lettersOver -= aantalGevondenLetters;

        // Gegokte letter zit niet in het woord
        } else {
          this.onjuisteGoks++;
        }
    
        // Update de game over
        this.updateGameOver();
    }
  
    handleRaad() {
        const raad = this.raadInput.value.toLowerCase();
    
        // Het geraade woord is hetzelfde als het woord, het is dus geraden.
        if (raad === this.woord) {
          this.lettersOver = 0;
          this.woordDisplay.textContent = this.woord.split("").join(" ");
        } else {
          this.onjuisteGoks++;
        }
    
        this.updateGameOver();
    }
  
    showHint() {
      this.hintDisplay.textContent = this.betekenis;
    }
  
    restartGame() {
        // Reset alles
        this.woordDisplay.textContent = "";
        this.gameOverDisplay.textContent = "";
        this.hintDisplay.textContent = "";
        this.gokInput.value = "";
        this.raadInput.value = "";
        this.lettersOver = 0;
        this.onjuisteGoks = 0;
        this.geraadeLetters = [];
        this.restartButton.style.display = "none";
  
        // Vang een nieuw woord op
        this.fetchWoordenLijst();
    }
  
    updateGameOver() {
        // Er zijn geen letters meer over, het woord is dus geraden, speler heeft gewonnen.
        if (this.lettersOver === 0) {
            this.gameOverDisplay.textContent = "Gewonnen";
            this.restartButton.style.display = "block";
    
            // We kunnen nu dus ook een highscore toevoegen aan de database
        }
    
        // Er zijn geen letters meer over, het woord is dus geraden, speler heeft gewonnen.
        else if (this.onjuisteGoks > 6) {
            this.gameOverDisplay.textContent = "Verloren";
            this.restartButton.style.display = "block";
        }
    }
  }
  
  const hangmanGame = new HangmanGame();
  hangmanGame.fetchWoordenLijst();