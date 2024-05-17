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