<?php
    // Start de sessie
    session_start();

    if (isset($_SESSION['gebruikersnaam']) && isset($_SESSION['id'])) {
        // Include de database class
        require_once "database.php";

        // Maak een object van de database class
        $database = new Database();

        // Verwijder de gebruiker van de database
        $deletedGebruiker = $database->deleteGebruiker($_SESSION['gebruikersnaam'], $_SESSION['id']);
        // Check of het gelukt is en return een response code
        if ($deletedGebruiker) {
            http_response_code(200);
            echo "Success: Gebruiker verwijderd";
        } else {
            http_response_code(500);
            echo "Error: verwijderen van gebruiker niet gelukt";
        }

        // Verwijder alle sessievariabelen
        session_unset();

        // Vernietig de sessie
        session_destroy();
    } else {
        // Gebruiker is niet ingelogd
        http_response_code(401);
        echo "Error: gebruiker is niet ingelogd";
    }

    exit;
?>