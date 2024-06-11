// Vang nodige elementen op
const wachtwoordInput = document.getElementById("wachtwoord");
const bevestigWachtwoordInput = document.getElementById("bevestig_wachtwoord");

// Functie om te checken of de 2 ingevulde wachtwoorden hetzelfde zijn
function isWachtwoordZelfde() {
    // Wachtwoord komt niet overeen met het bevestig wachtwoord
    if (wachtwoordInput.value !== bevestigWachtwoordInput.value) {
        return false;
    }

    return true;
}

// Functie om te kijken of het wachtwoord meer dan 8 characters heeft
function isWachtwoordLang() {
    // Wachtwoord is minder dan 8 characters, of bevestig wachtwoord is minder dan 8 characters
    if (wachtwoordInput.value.length < 8 || bevestigWachtwoordInput.value.length < 8) {
        return false;
    }

    return true;
}

// Functie om beide te combineren en het overzichtelijk te hebben
function isGeldigWachtwoord() {
    if(!isWachtwoordLang()) {
        alert("Wachtwoord moet minimaal 8 tekens lang zijn!")
        return false;
    }

    if(!isWachtwoordZelfde()) {
        alert("De wachtwoorden komen niet overeen!")
        return false;
    }

    return true;
}