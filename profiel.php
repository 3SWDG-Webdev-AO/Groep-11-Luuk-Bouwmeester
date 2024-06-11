<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <meta name="description" content="Profiel pagina van Pixel Playground">
    <meta name="author" content="L. Bouwmeester">
    <meta name="keywords" content="pixel, playground, profiel">
    <title>Pixel Playground - Profiel</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/wachtwoord.js" defer></script>
</head>

<body>
    <?php include "php/header.php"; ?>

    <main>
        <?php
            // Controleer of de gebruiker is ingelogd
            if (isset($_SESSION["gebruikersnaam"]) && isset($_SESSION["id"])) {
                // Vang info op
                $gebruikersnaam = $_SESSION["gebruikersnaam"];
                $id = $_SESSION["id"];

                // Echo gebruiker
                echo "Welkom, " . $gebruikersnaam . "!";

            
            // Include de database class
            require_once "php/database.php";

            // Check of het formulier is ingevuld
            if (isset($_POST["submit"])) {
                // Vang de gebruikersnaam & wachtwoord op zonder speciale characters
                $oud_wachtwoord = htmlspecialchars($_POST['oud_wachtwoord']);
                $nieuw_wachtwoord = htmlspecialchars($_POST['wachtwoord']);

                // Maak een object van de database class
                $database = new Database();

                // Probeer in te loggen
                $veranderWachtwoordResult = $database->veranderWachtwoord($gebruikersnaam, $oud_wachtwoord, $nieuw_wachtwoord);

                if ($veranderWachtwoordResult === true) {
                    echo "Verander wachtwoord success";
                } else {
                    echo $veranderWachtwoordResult;
                }

                // Sluit de connectie
                $database->sluitConnectie();
            }
        ?>

        <!-- Logout button -->
        <a href="php/logout.php">Logout</a>

        <?php
            } else {
                // De gebruiker is niet ingelogd, terug naar de login pagina
                header("Location: login.php");
                exit;
            }
        ?>

        <form method="POST" action="profiel.php" class="account_formulier"onsubmit="return isGeldigWachtwoord();">
            <label class="account_label_bold">Verander wachtwoord</label>

            <label for="oud_wachtwoord">Huidig wachtwoord</label>
            <input type="password" id="oud_wachtwoord" name="oud_wachtwoord" required>

            <label for="nieuw_wachtwoord">Nieuwe wachtword</label>
            <input type="password" id="wachtwoord" name="wachtwoord" required>

            <label for="bevestig_nieuw_wachtwoord">Bevestig nieuwe wachtwoord</label>
            <input type="password" id="bevestig_wachtwoord" name="bevestig_wachtwoord" required>

            <input type="submit" name="submit" value="Verander wachtwoord">
        </form>
    </main>

    <?php include "php/footer.php"; ?>
</body>
</html>