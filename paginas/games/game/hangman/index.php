<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <meta name="description" content="Hangman pagina van Pixel Playground">
    <meta name="author" content="L. Bouwmeester">
    <meta name="keywords" content="pixel, playground, hangman">
    <title>Pixel Playground - Hangman</title>
    <link rel="stylesheet" type="text/css" href="../../../../shared/css/style.css">
    <script src="js/main.js" defer></script>
</head>

<body>
    <?php include "../../../../shared/php/header.php"; ?>

    <main>
        <section class="game_container">
            <p id="woord_display"></p>
            <p id="game_over_display"></p>

            <section class="gok_letter">

                <label for="gok_input">Gok een letter:</label>
                <input type="text" id="gok_input" maxlength="1">
                <button id="gok_button">Gok!</button>

            </section>

            <section class="raad_woord">

                <label for="raad_input">Raad het woordt:</label>
                <input type="text" id="raad_input">
                <button id="raad_button">Raad!</button>

            </section>
            
            <section class="hint_woord">

                <button id="hint_button">Krijg hint</button>
                <span id="hint_display"></span>

            </section>

        </section>
    </main>

    <?php include "../../../../shared/php/footer.php"; ?>
</body>
</html>