<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <meta name="description" content="Games pagina van Pixel Playground">
    <meta name="author" content="L. Bouwmeester">
    <meta name="keywords" content="pixel, playground, games">
    <title>Pixel Playground - Games</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/games.js" defer></script>
</head>

<body>
    <?php include "php/header.php"; ?>

    <main>

        <section id="games_overzicht">
        </section>

        <template id="game_template">
            <section class="game">
                <h1 class="game_name"></h1>
                <p class="game_description"></p>

                <a id="game_ref" href="">
                    <img id="game_img" alt="Afbeelding van de game">
                </a>
            </section>
        </template>

    </main>

    <?php include "php/footer.php"; ?>
</body>
</html>