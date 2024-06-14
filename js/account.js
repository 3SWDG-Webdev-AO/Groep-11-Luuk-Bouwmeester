// Vang nodige elementen op
const wachtwoordInput = document.getElementById("wachtwoord");
const bevestigWachtwoordInput = document.getElementById("bevestig_wachtwoord");
const verwijderAccountButton = document.getElementById("verwijder_account");

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


if(verwijderAccountButton) {
    verwijderAccountButton.addEventListener("click", function() {
        // Confirm of ze het zeker weten, dit is een destructive action
        const confirmed = confirm("Weet je zeker dat je je account wilt verwijderen?");

        if (confirmed) {
            // Fetch de verwijder account php
            fetch("php/verwijder_account.php", {
                method: "POST"
            })
            .then(response => {
            // Response is ok, ga verder
            if (response.ok) {
                // Alert dat de account is verwijderd
                alert("Je account is successvol verwijderd!");

                // Stuur terug naar de home pagina
                window.location.href = "index.php";
            // Er is iets misgegaan, maak dit duidelijk
            } else {
                alert("Er is een fout opgetreden bij het verwijderen van je account.");
            }
            })
            // Catch eventuele andere errors
            .catch(error => {
                console.error("Error:", error);
                alert("Er is een fout opgetreden");
            });
        }
    });
}