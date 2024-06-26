<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <meta name="description" content="Home pagina van Pixel Playground">
    <meta name="author" content="L. Bouwmeester">
    <meta name="keywords" content="pixel, playground, home">
    <title>Pixel Playground - Home</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/home.js" defer></script>
</head>

<body>
    <?php include "php/header.php"; ?>

    <main>

        <section class="home_begin">
            <img src="img/home_achtergrond.jpeg" alt="Slideshow van games">

            <section class="home_text_overlay">
                <h1>Speel je <span style="color: rgb(250, 105, 40);">favoriete</span> games, nu in je web browser!</h1>
                <p>Op onze website vind je diverse games, die hopelijk bij je passen.</p>

                <p>Hier is een lijst van onze games die je nu gelijk kunt spelen.</p>
                <a href="games.php" class="button">Bekijk games</a>
            </section>

        </section>

        <section class="home_middel">

            <section class="home_container">

                <?php
                    $slideshowAfbeeldingen = [
                        "img/game_1.jpg",
                        "img/game_2.jpg",
                        "img/game_3.jpg"
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
    
                <section class="high_scores">
                    <section class="high_score_row">
                        <p class="column">Game</p>
                        <p class="column">Gebruiker</p>
                        <p class="column">Highscore</p>
                        <p class="column">Datum</p>
                    </section>

                    <?php
                        // Include de database class
                        require_once "php/database.php";

                        // Maak een object van de database class
                        $database = new Database();

                        // Fetch de gebruikers
                        $highscores = $database->getHighscores();

                        // Kijk of we wel high scores zijn
                        if(count($highscores) > 0) {
                            // Loop door alle highscores
                            foreach($highscores as $highscore) {
                                $game_id = $highscore["game_id"];
                                $gebruiker_id = $highscore["gebruiker_id"];
                                $highscore_score = $highscore["highscore"];
                                $timestamp = $highscore["timestamp"];
                            
                                echo '<section class="high_score_row">';
                                echo '<p class="column">' . $game_id . '</p>';
                                echo '<p class="column">' . $gebruiker_id . '</p>';
                                echo '<p class="column">' . $highscore_score . '</p>';
                                echo '<p class="column">' . $timestamp . '</p>';
                                echo '</section>';
                                echo '<hr>';
                            }
                        } else {
                            echo "Geen highscores gevonden!";
                        }
     
                        // Sluit connectie
                        $database->sluitConnectie();
                    ?>

            </section>

        </section>

    </section>  

    </main>

    <?php include "php/footer.php"; ?>
</body>
</html>