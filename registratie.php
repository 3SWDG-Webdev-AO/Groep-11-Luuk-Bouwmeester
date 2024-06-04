<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <meta name="description" content="Registratie pagina van Pixel Playground">
    <meta name="author" content="L. Bouwmeester">
    <meta name="keywords" content="pixel, playground, registreer">
    <title>Pixel Playground - Registratie</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/registratie.js" defer></script>
</head>

<body>
    <?php include "php/header.php"; ?>

    <main>
        <?php 
            // Include de database class
            require_once "php/database.php";

            // Check of het formulier is ingevuld
            if (isset($_POST["submit"])) {
                // Vang de gebruikersnaam & wachtwoord op zonder speciale characters
                $gebruikersnaam = htmlspecialchars($_POST["gebruikersnaam"]);
                $wachtwoord = htmlspecialchars($_POST["wachtwoord"]);

                // Maak een object van de database class
                $database = new Database();

                // Probeer in te registreren
                $registratieResult = $database->registreer($gebruikersnaam, $wachtwoord);

                if ($registratieResult === true) {
                    echo "Registratie succesvol";
                } else {
                    echo $registratieResult;
                }

                // Sluit de connectie
                $database->sluitConnectie();
            }
        ?>
    
        <form method="POST" action="registratie.php" class="account_formulier" id="registratie_formulier" onsubmit="return isGeldigWachtwoord();">
            <label class="account_label_bold">Account aanmaken</label>

            <label for="gebruikersnaam">Gebruikersnaam</label>
            <input type="text" id="gebruikersnaam" name="gebruikersnaam"required>

            <label for="wachtwoord">Wachtwoord</label>
            <input type="password" id="wachtwoord" name="wachtwoord"required>

            <label for="wachtwoord">Bevestig wachtwoord</label>
            <input type="password" id="bevestig_wachtwoord" name="bevestig_wachtwoord"required>

            <label for="geheime_vraag">Geheime vraag</label>
            <select id="geheime_vraag" name="geheime_vraag" required>
                <option value="eerste_huisdier">Wat is de naam van je eerste huisdier?</option>
                <option value="geboorteplaats">Wat is je geboorteplaats?</option>
                <option value="favoriete_sport">Wat is je favoriete sport?</option>
                <option value="middelbare_school">Wat was de naam van je middelbare school?</option>
            </select>

            <label for="geheime_vraag_antwoord">Antwoord geheime vraag</label>
            <input type="text" id="geheime_vraag_antwoord" name="geheime_vraag_antwoord" required>

            <input type="submit" name="submit" value="Verzenden">
        </form>

    </main>

    <?php include "php/footer.php"; ?>
</body>
</html>