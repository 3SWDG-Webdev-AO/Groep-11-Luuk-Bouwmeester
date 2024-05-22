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
        <p id="woord_display"></p>

        <label for="gok_input">Gok een letter:</label>
        <input type="text" id="gok_input" maxlength="1">
        <button id="gok_button">Gok!</button>

        <button id="hint_button">Krijg Hint</button>
        <span id="hint_display"></span>
    </main>

    <?php include "../../../../shared/php/footer.php"; ?>
</body>
</html>