// Functie om de gberuikers te filteren gebaseerd op wat je zoekt
function filterGebruikers() {
    // Vang onze elementen op
    const gebruikersnaam = document.getElementById("gebruikersnaam");
    const filter = gebruikersnaam.value.toUpperCase();

    const gebruikersLijst = document.querySelector(".gebruikers_lijst");
    const gebruikers = gebruikersLijst.querySelectorAll(".gebruiker");

    // Loop door onze gebruikers
    for (i = 0; i < gebruikers.length; i++) {
        // Haal de naam van de gebruikers op
        const textContent = gebruikers[i].textContent;
        // Als de naam van de gebruiker begint met de filter, zet de display, anders zet hem naar none
        if (textContent.toUpperCase().startsWith(filter)) {
            gebruikers[i].style.display = "";
        } else {
            gebruikers[i].style.display = "none";
        }
    }
}