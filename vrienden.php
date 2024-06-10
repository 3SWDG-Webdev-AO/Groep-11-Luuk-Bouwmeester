<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <meta name="description" content="Vrienden pagina van Pixel Playground">
    <meta name="author" content="L. Bouwmeester">
    <meta name="keywords" content="pixel, playground, games">
    <title>Pixel Playground - Vrienden</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/vrienden.js" defer></script>
</head>

<body>
    <?php include "php/header.php"; ?>

    <main>
        <section class="vrienden_header">

            <section class="vrienden_zoek">

                <label for="gebruikersnaam">Filter d.m.v. gebruikersnaam</label>
                <input type="text" id="gebruikersnaam" name="gebruikersnaam" onkeyup="filterGebruikers()" required>

            </section>

            <section class="vrienden_button">

                <a href="vrienden_verzoeken.php" class="button">Bekijk vrienden verzoeken</a>

            </section>

        </section>

        <?php
            // Include de database class
            require_once "php/database.php";

            // Maak een object van de database class
            $database = new Database();

            // Fetch de gebruikers
            $gebruikers = $database->getGebruikers();

            // Kijk of we wel gebruikers zijn
            if(count($gebruikers) > 0) {
                // Loop door alle gebruikers
                echo '<section class="gebruikers_lijst">';

                foreach($gebruikers as $gebruiker) {
                    echo "<section class='gebruiker'>";
                    echo "<h1><span style='color:white;'>" . $gebruiker["gebruikersnaam"] . "</span></h1>";
                    echo '<a href="#" class="button">Stuur vriendverzoek</a>';

                    echo "</section>";
                }

                echo '</section>';

            } else {
                echo "Geen gebruikers gevonden!";
            }

            // Sluit de connectie
            $database->sluitConnectie();
        ?>

    </main>

    <?php include "php/footer.php"; ?>
</body>
</html>