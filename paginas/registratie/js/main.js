// Vang ons formulier op
const registratieFormulier = document.getElementById("registratie_formulier");

// FUnctie om te checken of de 2 ingevulde wachtwoorden hetzelfde zijn
function isWachtwoordZelfde() {
    return true;
}

registratieFormulier.addEventListener("submit", (event) => {
    // Voorkom default gedrag, dus blokeer het formulier van versturen, totdat wij hem hebben gecheckt in javascript
    event.preventDefault(); 

    if(isWachtwoordZelfde) {
        registratieFormulier.submit();
    } else {
        console.log("Formulier ongeldig")
    }
});