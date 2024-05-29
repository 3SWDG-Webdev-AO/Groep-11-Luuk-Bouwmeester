<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <meta name="description" content="Home pagina van Pixel Playground">
    <meta name="author" content="L. Bouwmeester">
    <meta name="keywords" content="pixel, playground, home">
    <title>Pixel Playground - Home</title>
    <link rel="stylesheet" type="text/css" href="../../shared/css/style.css">
    <script src="js/main.js" defer></script>
</head>

<body>
    <?php include "../../shared/php/header.php"; ?>

    <main>

        <section class="home_begin">
            <img src="img/achtergrond.jpeg" alt="Slideshow van games">

            <section class="home_text_overlay">
                <h1>Speel je <span style="color: rgb(250, 105, 40);">favoriete</span> games, nu in je web browser!</h1>
                <p>Op onze website vind je diverse games, die hopelijk bij je passen.</p>

                <p>Hier is een lijst van onze games die je nu gelijk kunt spelen.</p>
                <a href="../login/index.php" class="button">Bekijk games</a>
            </section>

        </section>

        <section class="home_middel">

            <section class="home_container">

                <?php
                    $slideshowAfbeeldingen = [
                        "img/1.jpg",
                        "img/2.jpg",
                        "img/3.jpg"
                    ];

                    echo '<h1>Naam van de game</h1>';

                    foreach ($slideshowAfbeeldingen as $afbeelding) {
                        echo '<section class="home_slideshow">';
                        echo '<img src="' . $afbeelding . '" alt="Slideshow van games">';
                        echo '</section>';
                    }
                
                ?>

            </section>

            <section class="home_container">

                <h1>Hier komt informatie en tekst over de website.</h1>
                <p>Tekst komt hier dus binnenkort.</p>

            </section>

        </section>

        <section class="home_middel">

            <section class="home_container">

                <h1>Laatste high scores.</h1>
                <p>Hier komen de laatste high scores.</p>

            </section>

        </section>

        <?php
            // Gegevens van de database
            $host = "localhost";
            $dbname = "pixelplayground";
            $username = "root";
            $password = "";

            try {
                // Connect d.m.v. pdo
                $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

                // Set pdo error mode
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Bereid de query voor
                $query = "SELECT * FROM highscores";

                // Voer de query uit
                $result = $pdo->query($query);

                // Fetch de highscores
                $highscores = $result->fetchAll(PDO::FETCH_BOTH);

                // Kijk of we wel high scores zijn
                if(count($highscores) > 0) {
                    // Loop door alle highscores
                    foreach($highscores as $highscore) {
                        echo "Gebruiker id: " . $highscore["gebruiker_id"] . ", highscore: " . $highscore["highscore"] . "<br>";
                    }
                } else {
                    echo "Geen gebruikers gevonden";
                }
                

                echo "In de database!";
            } catch (PDOException $e) {
                // Catch error
                echo "Foutmelding: " . $e->getMessage();
            }

            // Sluit connectie
            $pdo = null;
        ?>

    </main>

    <?php include "../../shared/php/footer.php"; ?>
</body>
</html>