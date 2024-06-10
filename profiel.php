<?php 
    // Start de sessie
    session_start();

    // Controleer of de gebruiker is ingelogd
    if (isset($_SESSION["gebruikersnaam"]) && isset($_SESSION["id"])) {
        // Vang info op
        $gebruikersnaam = $_SESSION["gebruikersnaam"];
        $id = $_SESSION["id"];

        // Echo gebruiker
        echo "Welkom, " . $gebruikersnaam . "!";
    } else {
        // De gebruiker is niet ingelogd, terug naar de login pagina
        header("Location: login.php");
        
        // Exit
        exit;
    }
?>