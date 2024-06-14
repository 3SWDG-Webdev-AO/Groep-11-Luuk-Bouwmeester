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
    <script src="js/account.js" defer></script>
</head>

<body>
    <?php include "php/header.php"; ?>

    <main>
        <section class="profiel_main">

            <?php
                // Controleer of de gebruiker is ingelogd
                if (isset($_SESSION["gebruikersnaam"]) && isset($_SESSION["id"])) {
                    // Vang info op
                    $gebruikersnaam = $_SESSION["gebruikersnaam"];
                    $id = $_SESSION["id"];
                
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

            <?php
                } else {
                    // De gebruiker is niet ingelogd, terug naar de login pagina
                    header("Location: login.php");
                    exit;
                }
            ?>

            <section class="profiel_details">
                <h1>Account details</h1>

                <label for="ID">ID</label>
                <input type="text" id="ID" name="ID" value="<?php echo $id; ?>" readonly>

                <label for="Gebruikersnaam">Gebruikersnaam</label>
                <input type="text" id="Gebruikersnaam" name="Gebruikersnaam" value="<?php echo $gebruikersnaam; ?>" readonly>

                <form method="POST" action="profiel.php"onsubmit="return isGeldigWachtwoord();">
                    <label class="account_label_bold">Verander wachtwoord</label>
                    <br>

                    <label for="oud_wachtwoord">Huidig wachtwoord</label>
                    <input type="password" id="oud_wachtwoord" name="oud_wachtwoord" required>

                    <label for="nieuw_wachtwoord">Nieuwe wachtword</label>
                    <input type="password" id="wachtwoord" name="wachtwoord" required>

                    <label for="bevestig_nieuw_wachtwoord">Bevestig nieuwe wachtwoord</label>
                    <input type="password" id="bevestig_wachtwoord" name="bevestig_wachtwoord" required>

                    <input type="submit" name="submit" value="Verander wachtwoord">
                </form>

                <a href="php/logout.php" class="button">Logout</a>
                <a href="#" id="verwijder_account" class="button">Verwijder account</a>
            </section>

            <section class="profiel_highscores">
                <section class="high_scores">
                    <section class="high_score_row">
                        <p class="column">Game</p>
                        <p class="column">Highscore</p>
                        <p class="column">Datum</p>
                    </section>
                        <?php
                            // Maak een object van de database class
                            $database = new Database();

                            $highscores = $database->getHighScoresUser($id);
                            // Kijk of we wel high scores zijn
                            if(count($highscores) > 0) {
                                // Loop door alle highscores
                                foreach($highscores as $highscore) {
                                    $game_id = $highscore["game_id"];
                                    $highscore_score = $highscore["highscore"];
                                    $timestamp = $highscore["timestamp"];
                                
                                    echo '<section class="high_score_row">';
                                    echo '<p class="column">' . $game_id . '</p>';
                                    echo '<p class="column">' . $highscore_score . '</p>';
                                    echo '<p class="column">' . $timestamp . '</p>';
                                    echo '</section>';
                                    echo '<hr>';
                                }
                            } else {
                                echo "Geen highscores gevonden!";
                            }
                                                    
                            // Sluit de connectie
                            $database->sluitConnectie();
                        ?>
                    </section>
                </section>

            <section class="profiel_vrienden">

            </section>


        </section>
    </main>

    <?php include "php/footer.php"; ?>
</body>
</html>