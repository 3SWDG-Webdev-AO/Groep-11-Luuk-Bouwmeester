// Vang nodige elementen op
const registratieFormulier = document.getElementById("registratie_formulier");
const wachtwoordInput = document.getElementById("wachtwoord");
const bevestigWachtwoordInput = document.getElementById("bevestig_wachtwoord");

// FUnctie om te checken of de 2 ingevulde wachtwoorden hetzelfde zijn
function isWachtwoordZelfde() {
    const wachtwoord = wachtwoordInput.value;
    const bevestigWachtwoord = bevestigWachtwoordInput.value;
      
    // Wachtwoord komt niet overeen met het bevestig wachtwoord
    if (wachtwoord !== bevestigWachtwoord) {
        return false;
    }

    return true;
}

// Functie om te kijken of het wachtwoord meer dan 8 characters heeft
function isWachtwoordLang() {
    const wachtwoord = wachtwoordInput.value;

    // Wachtwoord is minder dan 8 characters
    if (wachtwoord.length < 8) {
        return false;
    }

    return true;
}

// Functie om beide te combineren en het overzichtelijk te hebben
function isGeldigWachtwoord() {
    if(!isWachtwoordZelfde()) {
        return false;
    }

    if(!isWachtwoordLang()) {
        return false;
    }

    return true;
}

registratieFormulier.addEventListener("submit", (event) => {
    // Voorkom default gedrag, dus blokeer het formulier van versturen, totdat wij hem hebben gecheckt in javascript
    event.preventDefault(); 

    // Check of het wachtwoord correct is, komt overeen etc
    let geldigWachtword = isGeldigWachtwoord();

    if(geldigWachtword) {
        console.log("Geldig");
        registratieFormulier.submit();
    } else {
        console.log("Formulier ongeldig");
    }
});