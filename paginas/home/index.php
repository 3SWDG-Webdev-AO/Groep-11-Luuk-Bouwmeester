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

        <?php
            $slideshowAfbeeldingen = [
                "img/1.jpg",
                "img/2.jpg",
                "img/3.jpg"
            ];

            foreach ($slideshowAfbeeldingen as $afbeelding) {
                echo '<section class="home_slideshow">';
                echo '<img src="' . $afbeelding . '" alt="Slideshow van games">';
                echo '</section>';
            }
          
        ?>

    </main>

    <?php include "../../shared/php/footer.php"; ?>
</body>
</html>